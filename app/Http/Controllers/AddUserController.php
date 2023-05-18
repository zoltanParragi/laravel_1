<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
use App\Models\User2;

class AddUserController extends Controller
{   
    private $posts_array;
    function __construct() {
        $this->posts_array = json_decode(
            '[
                {
                  "postId": 1,
                  "id": 1,
                  "name": "id labore ex et quam laborum",
                  "email": "Eliseo@gardner.biz",
                  "body": "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"
                },
                {
                  "postId": 1,
                  "id": 2,
                  "name": "quo vero reiciendis velit similique earum",
                  "email": "Jayne_Kuhic@sydney.com",
                  "body": "est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et"
                },
                {
                  "postId": 1,
                  "id": 3,
                  "name": "odio adipisci rerum aut animi",
                  "email": "Nikita@garfield.biz",
                  "body": "quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione"
                }
            ]'
        );
    }

    function adduser(AddUserRequest $request) {
        $request->validated();

        //save user in the database
        User2::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'posts_json'=>$this->posts_array,
            'salary'=>$request->salary,
        ]);

        return redirect()->back()->with('successmessage', 'User successfully added.');
    }
}
