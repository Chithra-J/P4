<?php

namespace P4;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'middle', 'firstname', 'lastname', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function children() {
        # Parent may have many children
        # Define a one-to-many relationship.
        return $this->hasMany('\P4\Child');
    }
	
	public function events() {
        # Parent may have many children
        # Define a one-to-many relationship.
        return $this->hasMany('\P4\Event');
    }
}
