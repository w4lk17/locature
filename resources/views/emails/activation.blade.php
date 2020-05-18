<h1>Hello</h1>

<p>
   Bonjour, Afin d'activer votre compte, veuillez

<a href="{{ env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }}">cliquer ici.</a>
</p>