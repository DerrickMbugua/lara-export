<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function create(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return $user;
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.pdf');
    }
}
