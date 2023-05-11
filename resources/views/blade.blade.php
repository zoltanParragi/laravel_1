<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade</title>
</head>

<body>
    <h1>Notes on Blade</h1>
    <h2>What is Blade</h2>
    <p>It is a templating engine used by Laravel. Blade templates are compiled into plain PHP code and cached until they
        are modified. Extension: .blade.php, Stored at: resources/views</p>
    <p>Blade views may be returned from routes or controller using the global view helper. Data may be passed to the
        Blade view. Eg.:</p>
    <pre>
        Route::get('/', function () {
            return view('greeting', ['name' => 'Finn']);
        });
    </pre>

    <h2>Displaying Data</h2>
    <p>Eg.:</p>
    <pre>
        Route::get('/', function () {
            return view('welcome', ['name' => 'Samantha']);
        });

        AND

        Hello, { { $name } }.
    </pre>
    <p>This is blade's echo statement: { { ... } }</p>
    <p>Here it is:</p>
    {{ $data }}
    <p>You can put any PHP code you wish inside of a Blade echo statement:</p>
    <p>{{ print "This is some php code in blade's echo statement. </br>" }}</p>
    <p>This time comes from blade's echo statement: {{ time() }}.</p>
    <p>By default, Blade { { } } statements are automatically sent through PHP's htmlspecialchars function
        to prevent XSS attacks.</p>

    <h2>Blade & JavaScript Frameworks</h2>
    <p>Since many JavaScript frameworks also use "curly" braces to indicate a given expression should be displayed in
        the browser, you may use the @ symbol to inform the Blade rendering engine an expression should remain
        untouched. For example:</p>
    <pre>
        Hello, @{ { name } }.
    </pre>

    <h3>Rendering JSON</h3>
    <p>more <a href="https://laravel.com/docs/8.x/blade#rendering-json">here</a></p>

    <h3>The @ verbatim Directive</h3>
    <p>If you are displaying JavaScript variables in a large portion of your template, you may wrap the HTML in the
        @ verbatim directive so that you do not have to prefix each Blade echo statement with an @ symbol.</p>

    <h2>Blade Directives</h2>
    <p>Blade provides convenient shortcuts for common PHP control structures, such as conditional statements and loops.
    </p>

    <h3>If Statements</h3>
    <p> @ if, @ elseif, @ else, and @ endif</p>
    <p>For convenience, Blade also provides an @ unless directive</p>
    <p>In addition to the conditional directives already discussed, the @ isset and @ empty directives may be used as
        convenient shortcuts for their respective PHP functions</p>

    @unless (-1 > 2)
        {{ '-1 is not greater then 2 - unless' }}
    @endunless
    <br>
    @empty($x)
        {{ '$x is empty' }}
    @endempty

    <h3>Authentication Directives</h3>
    <p>The @ auth and @ guest directives may be used to quickly determine if the current user is authenticated or is a
        guest.</p>

    <h3>Environment Directives</h3>
    <p>You may check if the application is running in the production environment using the @ production directive.</p>
    <p>Or, you may determine if the application is running in a specific environment using the @ env directive.</p>

    <h3>Section Directives</h3>
    <p>...</p>

    <h3>Switch Statements</h3>
    <p>Switch statements can be constructed using the @ switch, @ case, @ break, @ default and @ endswitch directives
    </p>
    @switch(3>2)
        @case(true)
            {{ '3 is greater than 2' }}
        @break

        @case(false)
            {{ '3 is not greater than 2' }}
        @break

        @default
            {{ 'not set' }}
    @endswitch

    <h3>Loops</h3>
    <p>@ for, @ foreach, @ forelse, @ empty, @ while, @ continue, @ break</p>
    <p>ForElse is a ForEach loop, but with extra handling for empty array.</p>
    <ul>
        {{-- array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43") --}}
        @forelse(array() as $age)
            <li>{{ $age }}</li>
        @empty
            <li>{{ 'no people' }}</li>
        @endforelse
    </ul>
    <p>In case od continue and breake you can define the condition with if statement and add it as a parameter to the
        directivrs. eg.: @ continue($user->type == 1), @ break($user->number == 5) </p>

    <h3>The Loop Variable</h3>
    <p>While iterating through a foreach loop, a $loop variable will be available inside of your loop. This variable
        provides access to some useful bits of information such as the current loop index and whether this is the first
        or last iteration through the loop. And: index, iteration, remaining, count, even, odd, depth, parent</p>

    <h3>Conditional Classes</h3>
    <p>The @ class directive conditionally compiles a CSS class string. The directive accepts an array of classes where
        the array key contains the class or classes you wish to add, while the value is a boolean expression. If the
        array element has a numeric key, it will always be included in the rendered class list.</p>

    <h3>Including Subviews</h3>
    <p>...</p>
    <h3>The @ once Directive</h3>
    <p>Allows you to define a portion of the template that will only be evaluated once per rendering cycle.</p>

    <h3>Raw PHP</h3>
    <p>You can use the Blade @ php directive to execute a block of plain PHP within your template.</p>

    <h3>Comments</h3>
    <p>{ {-- ... --} }</p>

    <h2>Components</h2>

</body>

</html>
