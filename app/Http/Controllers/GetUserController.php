<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // nem statikus változat
// use Illuminate\Suppport\Facedes\Request; // statikus változat
use App\Models\User;
use App\Models\User2;
use Illuminate\Support\Facades\DB;

class GetUserController extends Controller
{
    function getusersX(Request $request) {
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
    function getusers() {
        $users = User::where('email', 'like', '%a%')->where(function($query){
            $query->where('email', 'like', '%b%');
            $query->orwhere('email', 'like', '%c%');
            $query->orwhere('email', 'like', '%d%');
        })->get();

        // select * from users where name like '%a%' or (('%b%' and '%c%') or ('%d%' and '%e%'))
        $users2 = User::where('email', 'like', '%a%')->orwhere(function($query) {
            $query->where('email', 'like', '%b%')->where('email', 'like', '%c%');
            $query->orwhere('email', 'like', '%d%')->where('email', 'like', '%e%');
        })->get();

        // select * from users where name like '%a%' or (('%b%' and '%c%') or ('%d%' and '%e%'))
        $users3 = User::where(function($query){
            $query->where('email', 'like', '%a%');
            $query->orwhere('email', 'like', '%b%');
        })->where(function($query){
            $query->where('email', 'like', '%c%');
            $query->orwhere('email', 'like', '%d%');
        })->get(); //egy objetumból álló tömböt ad vissza

        $users4 = DB::table('users')->where('name', 'Elmira Kshlerin')->first(); //egy objektumot ad vissza

        $users5 = DB::table('users')->where('name', 'Elmira Kshlerin')->value('email');// egy stringet ad vissza

        $users6 = DB::table('users')->find(3); //egy objektumot ad vissza

        $users7 = User::pluck('email'); // az adott oszlop elemeiből álló tömböt ad vissza

        $users8 = User::pluck('email', 'name'); // Objektumot ad vissza. A name kulcsokon szerepelnek  értékként az email-ek.

        $users9 = User::orderBy('name')->get();

        $users10 = User::orderBy('name')->chunk(10, function($users) {
            foreach($users as $user) {
                /* ... */
            }
        });

        $users11 = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();

        return view('getusers')->with('user_list', $users11);
        //return view('getusers', ['user_list'=>$users]);
    }

    function getuser2s() {
        $users = User2::get();
        return view('addusers')->with('user_list', $users);
    }
}
