<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    
    /**
     * Roles disponibles
     */
    public const ROLES = [
        'customer' => 'Cliente',
        'admin' => 'Administrador',
        'chef' => 'Chef',
        'waiter' => 'Mesero',
        'manager' => 'Gerente',
    ];

    /**
     * Verifica si el usuario tiene un rol específico
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Obtiene el nombre legible del rol
     */
    public function getRoleNameAttribute(): string
    {
        return self::ROLES[$this->role] ?? $this->role;
    }

}
