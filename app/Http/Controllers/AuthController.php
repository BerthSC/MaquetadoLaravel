<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\cambiarcontrasenniaMailable;

class AuthController extends Controller
{
    // login
    public function showLoginForm()
    {
        return view('AuthViews.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contrasennia' => 'required'
        ]);

        $usuario = DB::table('usuarios')
            ->where('correo_electronico', $request->correo_electronico)
            ->first();

        // comparación directa de texto plano
        if (!$usuario || $request->contrasennia !== $usuario->contrasennia) {
            return back()->withErrors(['correo_electronico' => 'Datos incorrectos']);
        }

        Session::put('id', $usuario->id);
        Session::put('nombre', $usuario->nombre_completo);

        return redirect('/principal');
    }

    // LOGOUT
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    // formulario olvido su contraseña
    public function showForgotForm()
    {
        return view('ResetPasswordViews.olvidosucontrasennia');
    }

    // token de recuperacion
    public function sendRecoveryLink(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email'
        ]);

        $usuario = DB::table('usuarios')
            ->where('correo_electronico', $request->correo_electronico)
            ->first();

        if (!$usuario) {
            return back()->with('error', 'El correo no existe en el sistema');
        }

        // generar token
        $token = Str::uuid()->toString();

        // guardar token en la BD
        DB::table('usuarios')
            ->where('id', $usuario->id)
            ->update(['token_recuperacion' => $token]);

        // enviar correo usando tu Mailable
        Mail::to($usuario->correo_electronico)
            ->send(new cambiarcontrasenniaMailable($usuario->nombre_completo, $token));

        return back()->with('success', 'Se ha enviado un enlace de recuperación a tu correo');
    }

    // mostrar formulario de recuperacion de contraseña
    public function showResetForm($token)
    {
        $usuario = DB::table('usuarios')
            ->where('token_recuperacion', $token)
            ->first();

        if (!$usuario) {
            return redirect('/login')->with('error', 'Token inválido');
        }

        return view('ResetPasswordViews.cambiarcontrasennia', [
            'token' => $token
        ]);
    }

    // actualizar contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'contrasennia' => 'required|min:4|confirmed'
        ]);

        $usuario = DB::table('usuarios')
            ->where('token_recuperacion', $request->token)
            ->first();

        if (!$usuario) {
            return redirect('/login')->with('error', 'Token inválido');
        }

        // guardar contraseña directamente en texto plano
        DB::table('usuarios')
            ->where('id', $usuario->id)
            ->update([
                'contrasennia' => $request->contrasennia,
                'token_recuperacion' => null
            ]);

        return redirect('/login')->with('success', 'Contraseña actualizada');
    }
}
