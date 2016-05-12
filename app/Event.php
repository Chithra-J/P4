<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	
	protected $fillable = [
        'event_name','event_date','level','rounds','standing','grade','school_name','school_year','winner', 'child_id', 'user_id'
    ];
	
    public function child() {
        # Child has one parent
        # Define a one-to-many relationship.
        return $this->belongsTo('\P4\Child');
    }
	public function user() {
        # Child has one parent
        # Define a one-to-many relationship.
        return $this->belongsTo('\P4\User');
    }
	
	
}
