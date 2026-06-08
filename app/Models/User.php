<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

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

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function favoriteBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_user_favorites')
            ->withTimestamps();
    }

    // helpers
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }


    // ADDED: multiple role checker
    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    // ADDED: admin shortcut
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    // ADDED: manager shortcut
    public function isManager()
    {
        return $this->hasRole('manager');
    }

    // ADDED: blogger shortcut
    public function isBlogger()
    {
        return $this->hasRole('blogger');
    }
}
