<?php

namespace Modules\Core\Http\Controllers;

use Modules\Core\Models\Entities\User;

class UserController
{
    public function index()
    {
        $user = new User(['email' => 'test@test.com']);

        dd($user);
    }
}