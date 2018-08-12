@component('mail::message')

    <h4>Bonjour , {{ $user->firstname }}</h4>
    <h5>Vous faites maintenant partie de la communauté<span><strong>REVV</strong></span> !</h5>



@component('mail::button', ['url' => config('app.url').'/user/edit/'.$user->id, 'color' => 'green'])

    Connectez-vous !

@endcomponent

Force et Honneur
@endcomponent
