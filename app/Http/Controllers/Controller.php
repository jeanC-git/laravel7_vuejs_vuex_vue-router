<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        // VERIFICAR SI ESTÁ LOGEADO Y ESTA EN UNA RUTA DIFERENTE A LOGIN
        if (!Auth::check() && $request->path() != 'login') {
            return  redirect()->route('inicio');
        }
        if (!Auth::check() && $request->path() == 'login') {
            return view('welcome');
        }


        // SI ESTA LOGEADO (VERFICAR ROLES)
        if ($request->path() == 'login') {
            return redirect('/panel');
        }
        return view('welcome');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function getUsers()
    {
        return User::all();
    }
}
