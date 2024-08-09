
<p>Bonjour {{ $user->first_name }},</p>

<p>Vous venez de créer un compte sur LOCATURE. Avant de pouvoir utiliser nos services, vous devez suivre le lien ci_dessous pour activer votre compte
  en : <a href="{{ env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }}">cliquant ici.</a></p>

<p>Cordialement, LOCATURE</p>

<p>Amusez-vous,</p>
<p>L'equipe Locature, <br>http://127.0.0.1:8000</p>
