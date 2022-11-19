<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class serviceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDependencyInjection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertSame($foo1, $foo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function($app){
            return new Person("As", "Zaychik");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('As', $person1->firstName);
        self::assertEquals('As', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }
    public function testSingleton()
    {
        $this->app->singleton(Person::class, function($app){
            return new Person("As", "Zaychik");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('As', $person1->firstName);
        self::assertEquals('As', $person2->firstName);
        self::assertSame($person1, $person2);
    }
    public function testInstance()
    {
        $person = new Person("As", "Zaychik");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('As', $person1->firstName);
        self::assertEquals('As', $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testDepencyInjection()
    {
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1, $bar2);
    }

    public function testInterfaceToClass()
    {

        // $this->app->singleton(HelloService::class,HelloServiceIndonesia::class);
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals('Halo As', $helloService->hello('As'));
    }
}
