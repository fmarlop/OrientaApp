<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword // para verificar email
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'subscribed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts() : HasMany { // como quiero crear los posts a través del usuario, creando una relación "uno muchos" a nivel base de datos creo esta función. No es necesario especificar que esta función devuelve HasMany pero para dejarlo claro, y que tiene que ser importada.
        return $this->hasMany(Post::class); // cada instancia de usuario tiene muchas instancias de post.
    }

    public function comments() : HasMany { 
        return $this->hasMany(Comment::class); // cada instancia de usuario tiene muchas instancias de comment.
    }

    public function comppreftests() : HasOne {
        return $this->hasOne(CompPrefTest::class); // cada instancia de usuario tiene una instancia de comppref.
    }

    public function premiums() : HasOne {
        return $this->hasOne(Premium::class); // cada instancia de usuario tiene una instancia de premium.
    } 
}
