<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UserModel {
    public function getUser(){
        $users = DB::table('user')->orderBy('ID','desc')->get();
        return $users;
    }
    public function addUser($data)
    {
        return DB::table("user")->insert($data);
    }
    // public function addCategory($data)
    // {
    //     return DB::table("caterories")->insert($data);
    // }
    function getUserLogin($username, $password)
    {
        $user = DB::table('user')
            ->where('email', $username)
            ->where('password', $password)
            ->first();
        return $user;
    }
    public function checkemail($email){
        $user = DB::table("user")->where("email", $email)->first();
        return $user;
    }
    function getPic($user)
    {
        $Picture = DB::table('user')
            ->where('email', $user)
            ->value('Picture');
        return $Picture;
    }
    public function findUserById($id){
        return DB::table('user')->where('ID', $id)->first();
    }
    public function update($id, $data){
        return DB::table('user')->where('ID',$id)->update($data);
    }
    public function deleteUser($id)
    {
        return DB::table('user')->where('ID', $id)->delete();
    }
}



?>