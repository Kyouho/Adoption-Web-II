<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'adoption_date',
        'observations',
    ];

    // Relaciones

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}