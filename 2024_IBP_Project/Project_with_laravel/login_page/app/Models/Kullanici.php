<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTraiti;

class Kullanici extends Model implements Authenticatable
{
    use HasFactory, Notifiable, AuthenticableTraiti;
    
    protected $table = "kullanici";
    protected $primaryKey = 'id'; // Eğer id sütunu başka bir isimde ise bu değiştirilebilir

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
    ];
}