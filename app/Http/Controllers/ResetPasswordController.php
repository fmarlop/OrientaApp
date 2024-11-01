<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function passwordEmail (Request $request) { // la ruta de nombre password.email llamará a esta función.
        $request->validate(['email' => ['required', 'email']]);
     
        $status = Password::sendResetLink(
            $request->only('email') // se envía el email de restablecer contraseña.
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset (string $token) {
        return view('auth.reset-password', ['token' => $token]); // muestro la vista de resetear contraseña y le paso token para validar la vista.
    }

    public function passwordUpdate (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]); // validación de datos de email con los nuevos campos proporcionados.
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save(); // se guardan los cambios en la base de datos.
     
                event(new PasswordReset($user)); // evento de restablecer contraseña.
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status)) // si se restablece redirige a login.
                    : back()->withErrors(['email' => [__($status)]]); // y si no, muestra un error
    }
}
