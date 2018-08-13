@component('mail::message')

    <div class="appName">
        <h2>Bonjour {{ $subscription->user->firstname }}</h2>
        <p><br></p>
        <h3>Votre adhésion à <strong
            >{{config('app.name')}}</strong> arrive à son terme dans 1 mois. Vous pouvez dès à présent la renouveler.


        Je renouvele ma souscription sur mon compte REVV.fr</h3>


        @component('mail::button', ['url' => config('app.url'), 'color' => 'violet'])

            C'est parti !

        @endcomponent

        <h3>Si vous avez oublié votre mot de passe, vous pouvez le changer en cliquant sur : <strong
                    style="color: rgb(103,212,224);">Mot de passe oublié</strong></h3>

        @component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])

            Mot de passe oublié

        @endcomponent

        <a href="">Si vous ne souhaitez plus recevoir de relance de la part de REVV, cliquez ici.</a>

    </div>
@endcomponent
