<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class profiles extends EloquentUserProvider
{
    //
    use Authenticatable, Authorizable, CanResetPassword;
    public function user()
    {
        return $this->belongsTo('User');
    }

}
