
// <p>
//     Bonjour , {{ $user->last_name }} {{ $user->first_name }},
//     Vous avez demandé la reinitialisation de votre mot de passe associé à votre compte Locature.
//     pour cela, veuillez cliquer sur le lien suivant <a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">cliquer ici!</a>
// </p>

<p>Hello {{ $user->first_name }},</p>

<p>Somebody requested a new password for the [customer portal] account associated with [email].</p>

<p>No changes have been made to your account yet.</p>

<p>You can reset your password by clicking the link below:</p>
<a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">cliquer ici!</a>

<p>If you did not request a new password, please let us know immediately by replying to this email.</p>

<p>Yours,</p>
<p>The Locature team</p>
