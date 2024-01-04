<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller{
    
    /**
     * ユーザのパスワードを更新
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
     
     public function update(Request $request)
     {
         //新しいパスワードの長さをバリデート
         
         $request->user()->fill([
             'password' => Hash::make($request->newPassword)
             ])->save();
        
         $hashed = Hash::make('password', [
         'rounds' => 12,
         ]);
         
         $hashed = Hash::make('password', [
             'memory' => 1024,
             'time' => 2,
             'threads' => 2,
             ]);
             
        if (Hash::check('plain-text', $hashedPassword)){
            //パスワードが一致
        }
        
        if(Hash::needsRehash($hashed)){
            $hashed = Hash::make('plain-text');
        }
         
     }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the bcrypt algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Bcrypt algorithm. This will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Argon algorithm. These will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
