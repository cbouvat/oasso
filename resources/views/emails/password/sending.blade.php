@component('mail::message')

    <div class="appName">
        <h2>bonjour {{ $user->firstname }}</h2>
        <p><br></p>
        <h3>Le mot de passe pour vous connectez sur <strong
            >{{config('app.url')}}</strong> est : </h3><h2><strong
        >{{ $password }}</strong></h2>

        @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])

            Connectez-vous !

        @endcomponent

    </div>
@endcomponent
