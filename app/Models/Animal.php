<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'breed',
        'age',
        'gender',
        'health_status',
        'vaccines',
        'description',
        'status',
        'image',
    ];

    // Relaciones

    public function applications()
    {
        return $this->hasMany(Application::class);
    }


public function adoption()
{
    return $this->hasOneThrough(
        Adoption::class,
        Application::class,
        'animal_id',
        'application_id',
        'id',
        'id'
    );
}

}