@component('mail::message')

    <div class="appName">
        <h2>Bonjour {{ $subscription->user->firstname }}</h2>
        <p><br></p>
        <h3>Votre adhésion à <strong>{{config('app.name')}}</strong> arrive à son terme dans 1 mois. Vous pouvez dès à
            présent la renouveler. Je renouvèle ma souscription sur mon compte {{config('app.name')}}</h3>

        @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])

            C'est parti !

        @endcomponent

        <h3>Si vous avez oublié votre mot de passe, vous pouvez le changer en cliquant sur <strong
                    style="color: rgb(103,212,224);">Mot de passe oublié</strong></h3>

        @component('mail::button', ['url' => config('app.url').'/password/reset', 'color' => 'blue'])

            Mot de passe oublié

        @endcomponent

        <p>Si vous ne souhaitez plus recevoir de relance de la part de REVV, <a
                    href="{{route('user.subscription.optOut', ['subscription' => $subscription->id, 'user' => $subscription->user->id])}}">cliquez
                ici</a></p>

    </div>
@endcomponent
