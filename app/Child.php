<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public $table = "children";
    protected $fillable = [
        'firstname', 'lastname', 'middle', 'date_of_birth', 'gender', 'user_id'
    ];
	
    public function user() {
        # Child has one parent
        # Define a one-to-many relationship.
        return $this->belongsTo('\P4\User');
    }
	
	public function events() {
        # Parent may have many children
        # Define a one-to-many relationship.
        return $this->hasMany('\P4\Event');
    }
}
