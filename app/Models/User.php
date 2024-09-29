<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'superadmin', // Eklenen sütun
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
    protected $casts = [ // Bu kısım değiştirildi
        'email_verified_at' => 'datetime',
        'superadmin' => 'boolean', // superadmin alanı boolean olarak ayarlandı
        'password' => 'hashed',
    ];

    /**
     * User'ın gönderileri.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
