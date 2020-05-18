
<p>
    Bonjour , {{ $user->last_name }} {{ $user->first_name }},
    Vous avez demandé la reinitialisation de votre mot de passe associé à votre compte Locature.
    pour cela, veuillez cliquer sur le lien suivant <a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">cliquer ici!</a>
</p>