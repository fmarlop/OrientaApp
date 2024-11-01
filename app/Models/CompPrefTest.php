<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class CompPrefTest extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id', // se podría añadir este campo manualmente aquí porque es uno de los campos requeridos en la base de datos para asociar cada post con un usuario, pero en vez de eso pasaré el user_id directamente en el PostController cuando se crea un post.
        'mathComp',
        'mathPref',
        'langComp',
        'langPref',
        'histComp',
        'histPref',
        'flangComp',
        'flangPref',
        'slangComp',
        'slangPref',
        'physComp',
        'physPref',
        'chemComp',
        'chemPref',
        'bioComp',
        'bioPref',
        'geolComp',
        'geolPref',
        'geogComp',
        'geogPref',
        'tecdComp',
        'tecdPref',
        'plarComp',
        'plarPref',
        'techComp',
        'techPref',
        'philComp',
        'philPref',
        'phedComp',
        'phedPref',
        'musComp',
        'musPref',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class); // cada instancia de comppref pertenece a una instancia de usuario.
    }
}
