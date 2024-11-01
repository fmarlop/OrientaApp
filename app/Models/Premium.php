<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Premium extends Model
{
    use HasFactory;

    protected $table = 'premiums'; // hay que especificar esto porque si no Laravel busca el plural 'premia', cosas de Laravel.

    protected $fillable = [
        // 'user_id',
        'is_active',
        'start_date',
        'end_date',
        'months',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class); // cada instancia de premium pertenece a una instancia de usuario.
    }
}
