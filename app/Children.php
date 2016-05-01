<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    public function user_parent() {
        # Child has one parent
        # Define a one-to-many relationship.
        return $this->belongsTo('\P4\UserParent');
    }
}
