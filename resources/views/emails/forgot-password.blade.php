{{-- <p>
	Bonjour , {{ $user->last_name }} {{ $user->first_name }},
	Vous avez demandé la reinitialisation de votre mot de passe associé à votre compte Locature.
	pour cela, veuillez cliquer sur le lien suivant <a
		href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">cliquer ici!</a>
</p> --}}

{{-- <p>Hello {{ $user->first_name }},</p>

<p>Somebody requested a new password for the [customer portal] account associated with [email].</p>

<p>No changes have been made to your account yet.</p>

<p>You can reset your password by clicking the link below:</p>
<a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">cliquer ici!</a>

<p>If you did not request a new password, please let us know immediately by replying to this email.</p>

<p>Yours,</p>
<p>The Locature team</p> --}}


<p>Bonjour {{ $user->first_name }},</p>

<p>Quelqu'un a demandé un nouveau mot de passe pour le compte LOCATURE associé à {{ $user->email }}.</p>

<p>Aucune modification n'a encore été apportée à votre compte.</p>

<p>Vous pouvez réinitialiser votre mot de passe en cliquant sur le lien ci-dessous : <br><a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}" /a></p>

<p>Si vous n'avez pas demandé de nouveau mot de passe, veuillez nous en informer immédiatement en répondant à cet
	e-mail.</p>

<p>Cordialement <br>L'équipe Locature</p>