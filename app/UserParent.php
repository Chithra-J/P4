<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class UserParent extends Model
{
    //protected $fillable = ['firstname','lastname','middle','picture'];
    public function children() {
        # Parent may have many children
        # Define a one-to-many relationship.
        return $this->hasMany('\P4\Children');
    }
}
