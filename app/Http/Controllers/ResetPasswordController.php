<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\cambiarcontrasenniaMailable;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    // Mostrar formulario para cambiar contraseña usando token
    public function showResetFormWithToken($token)
{
    return view('AuthViews.cambiarcontrasennia', ['token' => $token]);
}

    // Enviar correo con link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['correo' => 'required|email']);

        $user = DB::table('usuarios')
            ->where('correo_electronico', $request->correo)
            ->where('activo', 1)
            ->first();

        if (!$user) {
            return back()->with('mensaje', 'Correo no registrado o usuario inactivo');
        }

        $token = Str::uuid()->toString();
        $expira = Carbon::now()->addMinutes(10);

        DB::table('usuarios')
            ->where('correo_electronico', $request->correo)
            ->update([
                'token_recuperacion' => $token,
                'token_expiracion' => $expira
            ]);

        Mail::to($request->correo)->send(
            new cambiarcontrasenniaMailable($user->nombre_completo, $token)
        );

        return back()->with('mensaje', 'Revisa tu correo para continuar');
    }

    // Actualizar contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'contrasennia' => 'required|min:8',
            'recontrasennia' => 'required|same:contrasennia',
            'mytoken' => 'required'
        ]);

        DB::table('usuarios')
            ->where('token_recuperacion', $request->mytoken)
            ->update([
                'contrasennia' => Hash::make($request->contrasennia),
                'token_recuperacion' => null,
                'token_expiracion' => null
            ]);

        return redirect(route('login'))
            ->with('mensaje', 'Contraseña cambiada correctamente');
    }
}
