<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Registrar Usuario
    public function register(Request $request){
        
        // Validar
        $request->merge([
            'subscribed' => boolval($request->subscribed),
        ]); // parsear primero los valores tomados del checkbox que son 'on' o null a valores booleanos, usando función merge() para no tener que transferir $request->all() a otra variable.
        $fields = $request->validate([ // función del objeto request que toma un array asociativo, las llaves son inputs de formulario y los valores son reglas de Laravel. https://laravel.com/docs/11.x/validation#available-validation-rules link a la documentación de las reglas de validación de Laravel.
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'], // con 'unique' indicamos en qué tabla tiene que buscar la columna 'email' para comprobar que es un email único.
            'password' => ['required', 'min:3', 'confirmed'], // Laravel hashea la contraseña automáticamente.
            'subscribed' => ['required', 'boolean']
        ]);

        // Registrar
        $user = User::create($fields); // uso modelo User para crear una instancia del modelo con los mismos campos con los que hemos validado.

        // Iniciar sesión
        Auth::login($user); // uso este método para logear al usuario creado anteriormente.

        event(new Registered($user)); // esto activará el verificado obligatorio de mail. Registered es un evento built-in.

        if ($request->subscribed){
            event(new UserSubscribed($user));
        }

        // Redirigir
        return redirect()->route('dashboard'); // redirigimos al usuario al panel.
    }

    // Manejador de notificación de verificación de email
    public function verifyEmailNotice(){
        return view('auth.verify-email');
    }

    public function verifyEmailHandler(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    public function verifyEmailResend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link de verificación enviado.');
    }

    // Logear Usuario
    public function login(Request $request){
        
        // Validar
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Intentar logear usuario
        if(Auth::attempt($fields, $request->remember)) { // uso este método para intentar logear al usuario según los datos proporcionados anteriormente; uso '$request->remember' para checkear si existe el parámetro remember, es decir si la casilla Recuérdame ha sido marcada, en cuyo caso se recordará el usuario.
            return redirect()->intended(route('dashboard')); // si el logeo es exitoso, se nos redirige a la página que el usuario estaba intentando acceder sin estar logeado, por defecto redirige a la página principal, en este caso está especificado el panel del usuario.
        } else {
            return back()->withErrors([ // uso función 'back()' para devolver al usuario a la página de logeo
                'failed' => 'El email o la contraseña no existen.' // uso la función 'withErrors()' pasándole un array asociativo que muestra este mensaje cuando el logeo falla.
            ]);
        } 
    }

    // Cerrar Sesión
    public function logout(Request $request) {
        Auth::logout(); // uso este método para deslogear al usuario.

        // Laravel recomienda que después de deslogear al usuario, invalidar su sesión y regenerar el token @csrf.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // redirijo al ahora invitado a la página principal.
    }
}
