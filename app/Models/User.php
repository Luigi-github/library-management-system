<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isLibrarian()
    {
        return $this->role === 'librarian';
    }

    public function isMember()
    {
        return $this->role === 'member';
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function overdueBooks()
    {
        // Assuming a relationship, adjust based on your actual database structure
        return $this->borrowings()->where('due_at', '<', now())->get();
    }
}

