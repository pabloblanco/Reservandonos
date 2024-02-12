<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Escucha el evento saving
        static::saving(function ($user) {

            // Aplica la lógica para convertir nombre y apellido a minúsculas y eliminar caracteres especiales
            $user->name = strtolower($user->name);

            // Elimina caracteres especiales
            $user->name = preg_replace('/[^a-z]/', '', $user->name);

        });
    }  
    
    /**
     * Defines a one-to-many relationship with the reservations associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
        
    /**
     * Defines a one-to-many relationship with the likes associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
