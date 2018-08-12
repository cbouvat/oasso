@component('mail::message')


    <h2>Bonjour, {{ $user->firstname }}</h2><p><br></p><h3>Vous faites maintenant partie de la communauté <strong
                style="color: rgb(102, 163, 224);">REVV</strong> !</h3>



    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])

        Connectez-vous !

    @endcomponent

    Force et Honneur
@endcomponent
