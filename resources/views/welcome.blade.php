<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 1</title>
</head>

<body>
    <h1>Laravel</h1>
    <h2>Installation</h2>
    <p>Needed:</p>
    <ul>
        <li>xampp (php 8)</li>
        <li>composer</li>
        <li>(packagist.org)</li>
    </ul>
    <p>with certain laravel version: <i>composer create-project laravel/laravel:8.* project-name</i></p>
    <p>or with the latest laravel version: <i>composer create-project laravel/laravel project-name</i></p>
    <p><i>php artisan serve</i></p>
    <h2>Folders and files</h2>
    <div>
        <ol>
            <li>Public folder. The only folder that is available from outside. .htaccess file redirects every request to
                the index.php, index.php - do not touch it </li>
            <li>Routes folder. web.php - defines the routes, access mode and callbacks</li>
            <li>Resources folder. views folder. welcome.blade.php - here we are. .blade.php belongs to laravel. Makes
                life easier if you want to add php code to this file.</li>
            <li>@csrf - generates a token(signature key) with a hidden field in the form</li>
        </ol>
        {{-- this is a comment --}}
    </div>
    <h2>Form example</h2>

    @if (Session::has('successmessage'))
        <div>{{ Session::get('successmessage') }}</div>
    @endif

    <form action="" method="post">
        @csrf
        <input type="text" name="name" placeholder="name" value={{ old('name') }}>
        <br>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <input type="email" name="email" placeholder="email" value={{ old('email') }}>
        <br>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <br>
        <input type="password" name="password_confirmation" placeholder="password_confirmation">
        <br><br>
        <button type="submit">Login</button>
    </form>

    <h2>Test functions</h2>
    <p>dd(), eg.: dd( Request::all() ); prints all the request data. If you check it in the network - header you'll see
        the '500 Internal Server Error' message. It exitst the execution of the programme. The next lines in the code
        after the dd() will not be executed.</p>
    <p>dump(), eg.: dump(Request::all()); prints all the request data. Network - header: '200 OK' . The execution of the
        programme will not stop.</p>

    <h2>Controller</h2>
    <p>make controller: <i>php artisan make:controller ControllerName</i></p>
    <p>the place of new controller: app/Http/Controllers/</p>
    <p>processes that belong to a post method do not have a view, they run in the background and return a certain view
        (often the last view)</p>
    <p>Illuminate\Support\Facades\ contains static classes that can be used right away. Static classes contains lots of
        information about the system: eg. sessions, cookies, post, get, request, server - they now "everything"</p>
    <p>UserController::class refers to the class itself. See more <a
            href="https://stackoverflow.com/questions/30770148/what-is-class-in-php">here</a> </p>
    <p>The use Illuminate\Http\Request; class can provide the data sent.</p>
    <p>dependency injection: eg.: function myfunc('Request $request') {...} . Here the Request class will provide its
        all data and abilities to the variable $request and the function will be able to use them. Then you can use the
        $request variable eg. this way: $request->all(). Here, all() is not a static function. More on dependency
        injection <a href="https://www.tutorialspoint.com/what-is-dependency-injection-in-php">here</a></p>
    <p>Request (or $request) is able to validate the data it carries. Available validation rules: <a
            href="https://laravel.com/docs/10.x/validation#available-validation-rules">here</a></p>
    <p>resources/lang/validation.php contains the validation messages. You can wirite cusom messages too. :attribute is
        the inut filed's name.</p>
    <p>"password"=> 'confirmed' checks automatically wether the second password is equal with the first one, but only if
        in
        the form name="password_confirmation" is used in the second password field. </p>
    <p> value=\{\{ old('name') \}\} uses the session with a flesh to put the old value back into input fileds. flesh
        storage - in case of revisiting the page it will be empty</p>

    <p>creating custom request class: php artisan make:request RegisterRequest . It will be created at App\Http\Request
        . ... Then you can use the $request class' validated() method: $request->validated() If data from the
        inputfields are validated the execution goes on otherwise not.</p>
    <h3>giving feedback (with session)</h3>
    <p>Adding key value pair to session: $request->session()->put('key', 'value')</p>
    <p>reading from session: $request->session()->get('key')</p>
    <p>delete a key value pair: $request->session()->forget('key')</p>
    <p>Saving key value pair into session for one time (after one usage they will be deleted):
        $request->session()->flash('key', 'value')</p>
    <p>Reading from session in welcome.blade.php eg.: Session::has('successmessage'), Session::get('successmessage')</p>
    <p>!! Every class has a static version eg.: $request->session()->flash('sussessmessage', 'Successful
        registration.'); AND Session::get('successmessage')</p>
    <p>Finally in the RegisterRequest file we navigate back to the page where the form was. eg.: return
        redirect()->back(); OR with the simplified version: </p>

    <h2>Configuration</h2>
    <p>.env file. Here you can define the database name and password.</p>
    <p>Configuration settings are in the config folder too.</p>
    <p>After setting a new config data the config cache must be recreated. The config cache data is collected in the
        bootstrap/cache folder. To recreate the config cache files use this command: php artisan config:cache</p>
    <h2>Databases</h2>
    <p>database/migration folder, here are ...table.php files</p>
    <p>Tables define a data structure (Schema). You can change them or create a new one.</p>
    <p>To create the tables in the database use this command: php artisan migrate</p>
    <p>nullable() - you can define null default value. Default is 'required'.</p>
    <p>rememberToken(), timestamps() has inbuild default value null, we don't have to set it.</p>
    <p>rememberToken() needed if you want a page to remember you when login.</p>

    <p>creating fake data: seeders/DatabaseSedder.php, comment out: \App\Models\User::factory(10)->create();</p>
    <p>then: php artisan db:seed </p>
    <p>előadás: 15:42</p>

</body>

</html>
