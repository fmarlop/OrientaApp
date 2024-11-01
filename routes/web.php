<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompatibilityController;
use App\Http\Controllers\CompPrefTestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'posts.main')->name('home'); // renombro las rutas con esta función para que la navegación siga funcionando aunque cambie las URLs.

// route::redirect('/', 'posts'); // en caso de querer redirigir desde la página principal a posts.index

Route::resource('posts', PostController::class); // método resource() para la definición de todas las rutas para controladores de recursos.

// Renombrar rutas creadas con resource?

Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('userposts'); //para crear una página dinámica de posts del usuario para cada usuario necesito bindear modelo usuario para usar la instancia del usuario como parametro para la uri, con las llaves {}.

Route::middleware('auth')->group(function() { // '->middleware('auth')' Con esta función encadenada podría proteger el acceso a una ruta para usuarios no autenticados, y nos redirigiría automaticamente a la vista de logeo. Pero en vez de esto, voy a usar la función desde route para agrupar todas las rutas posibles. El método 'group()' toma una función callback con la que puedo envolver a las rutas.
    
    Route::get('/panel', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard'); // las clases de DashboardController nos darán las vistas de los paneles de usuarios logeados. Si el usuario no está verificado no podrá acceder al panel.
    
    Route::post('/delogear', [AuthController::class, 'logout'])->name('logout');
    
    // Rutas de verificación de email
    Route::get('/email/verify', [AuthController::class, 'verifyEmailNotice'])->name('verification.notice'); // notificación de verificación de email. Estos nombres no deberían ser cambiados porque Laravel automáticamente busca esos nombres. Documentación de Laravel sobre verificación https://laravel.com/docs/11.x/verification
        
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmailHandler'])->middleware('signed')->name('verification.verify'); // verificación de email
    
    Route::post('/email/verification-notification', [AuthController::class, 'verifyEmailResend'])->middleware('throttle:6,1')->name('verification.send'); // reenviado de email de verificacion
    
    // Multi-step formularios y tal
    Route::get('/comppref', [CompPrefTestController::class, 'render'])->name('comppref');
    Route::post('/comppref/update', [CompPrefTestController::class, 'update'])->name('updateComppref');

    Route::get('/compatibilidad', [CompatibilityController::class, 'show'])->name('compatibility');
   
});

Route::middleware('guest')->group(function() {
 
    Route::view('/registrar', 'auth.register')->name('register');
    Route::post('/registrar', [AuthController::class, 'register']); // las clases de AuthController procesarán los formularios.
    
    Route::view('/logear', 'auth.login')->name('login');
    Route::post('/logear', [AuthController::class, 'login']);

    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request'); // restablecer contraseña.
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.email'); // no haría falta el name password.email porque como las anteriores rutas tiene la misma uri que password.request.

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});

