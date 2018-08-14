@component('mail::message')

    <div class="appName">
        <h2>Bravo {{ $user->firstname }}</h2>
        <p><br></p>
        <h3>Vous vous êtes inscrit sur <strong>{{config('app.name')}}</strong>
            ! Vous pouvez suivre le lien ci-dessous pour payer votre adhésion.</h3>

        @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])

            Adhérer à la communauté

        @endcomponent

        <h3>Si vous avez oublié votre mot de passe, vous pouvez le changer en cliquant sur <strong
                    style="color: rgb(103,212,224);">Mot de passe oublié</strong></h3>

        @component('mail::button', ['url' => config('app.url'), 'color' => 'blue'])

            Mot de passe oublié

        @endcomponent

    </div>
@endcomponent
