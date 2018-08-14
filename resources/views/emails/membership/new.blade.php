@component('mail::message')

    <div class="appName">
        <h2>Bonjour {{ $subscription->user->firstname }}</h2>
        <p><br></p>
        <h3>Vous faites maintenant parti de la communauté
            <strong class="appName">{{config('app.name')}}</strong></h3>

        <h3>Vous avez une adhésion {{ $subscription->type->name }} pour la somme de {{ $subscription->amount }} €. Votre
            adhésion est valable 1 an.</h3>


        @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])

            {{config('app.name')}}

        @endcomponent

    </div>
@endcomponent