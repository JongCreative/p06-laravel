<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list($aapje)
    {
        $users = [
            'koen ln1',
            'daisy ln2',
            'erwin ln3',
            'test after adding array to route',
            'test after creating UserController in artisan & migration ofa array to UserController',
            'test after creating layout.app template & extend@ to other files, to avoid repetition',
        ];
    
        return view('pages.users', [
            'kippetjes' => $users, 'kippetje' =>$aapje
            ]);
    }
}
