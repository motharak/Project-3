<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class login extends Model
{
    function getUserLogin($username, $password)
    {
        $user = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->first();
        return $user;
        
    }
}
