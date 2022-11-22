<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class RedirectController extends Controller
{
    public function redirectTo(Request $request): String{
        return "Redirect To";
    }

    public function redirectFrom(Request $request): RedirectResponse{
        return redirect("/redirect/to");
    }

    public function redirectHello(string $name): String{
        return "Hello $name";
    }

    public function redirectName(): RedirectResponse{
        return redirect()->route('redirect-hello', ['name' => 'aszaychik']);
    }

    public function redirectAction(): RedirectResponse{
        return redirect()->action([RedirectController::class, "redirectHello"], ['name' => 'aszaychik']);
    }

    public function redirectAway(): RedirectResponse{
        return redirect()->away("https://github.com/Aszaychik");
    }
}
