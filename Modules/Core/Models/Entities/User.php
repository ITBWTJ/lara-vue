<?php

namespace Modules\Core\Models\Entities;

use Illuminate\Foundation\Auth\User as Authenticate;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticate
{
    use HasRolesAndAbilities;

    protected $fillable = [
      'email'
    ];
}