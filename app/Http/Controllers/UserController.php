<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function register(RegisterRequest $request) {
        $request->validated();

        //saving into the database: ...

        //feedback on succes:

        //$request->session()->flash('sussessmessage', 'Successful registration.');
        //return redirect()->back();
        return redirect()->back()->with('successmessage', 'Successful registration.');
    }
}
