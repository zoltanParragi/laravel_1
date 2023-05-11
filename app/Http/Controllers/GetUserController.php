<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // nem statikus változat
// use Illuminate\Suppport\Facedes\Request; // statikus változat
use App\Models\User;

class GetUserController extends Controller
{
    function getusers(Request $request) {
        //dd($request);

        
        /*  $test1 = ['a' => 'apple', 'b' => 'banana', 'c' => 'cat'];
            $test2 = [11, 22, 33, 44, 55];
            dd(compact('test1', 'test2'));
            //compact() : creates one associative array(keys are test1 and test2) of associate arrays  OR associative array(keys are test1 and test2) of arrays

            then:
            return view('getusers', ['test1' => $test1, 'test2' => $test2] );
            OR it is shorter with compact() :
            return view('getusers', compact('test1', 'test2') );
        */

        //Feltételes lekérdezés: a where()-en belül használhatunk egy függvényt (paraméter: $query), amelyben feltételes lekérdezést tudunk csinálni.

        //külső változó használata egy függvényben: function() use ($variable) {...}
        
        $users = User::where( function($query) use ($request){

            //Request::get('q') lenne a $request->q helyett, ha Illuminate\Suppport\Facedes\Request -et használánk (statikus változat)
            if($request->q) {
                $query->where('name', 'like', '%'.$request->q.'%');
            }
        })->get();
        //return view('getusers', ['user_list'=>$users] ); // 2. paraméterként egy asszociatív tömböt lehet megadni
        return view('getusers')->with('user_list', $users); // ->with() , ha csak egy key-value párt akarunk megadni
    }

    // select * from users where name like '%a%' and ('%b%' or '%c%' or '%d%')
    function getusers2() {
        $users = User::where('email', 'like', '%a%')->where(function($query){
            $query->where('email', 'like', '%b%');
            $query->orwhere('email', 'like', '%c%');
            $query->orwhere('email', 'like', '%d%');
            $query->orwhere('email', 'like', '%e%');
            $query->orwhere('email', 'like', '%f%');
            $query->orwhere('email', 'like', '%g%');
            $query->orwhere('email', 'like', '%h%');
            $query->orwhere('email', 'like', '%i%');
        })->get();
        return view('getusers')->with('user_list', $users);
    }
}
