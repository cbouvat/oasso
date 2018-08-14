<div>
    <h1 style="text-align: center"> Bulletin d'adhésion de M/Mme {{$user->lastname}} à REVV</h1>
</div>

<div class="container">
    <div class="row">
        <h2 style="text-align: center">Votre Identité</h2>
        <div class="col-xs">
            <h3>Adhérent :</h3>
            <p>Nom : {{$user->lastname}}</p>
            <p>Prénom : {{$user->firstname}}</p>
            <p>Adresse : {{$user->address_line1}}</p>
            <p>Complément d'adresse : {{$user->address_line2}}</p>
            <p>date de naissance : {{$user->birthdate}}</p>
            <p>Téléphone 1 : {{$user->phone_number_1}}</p>
            <p>Téléphone 2 : {{$user->phone_number_2}}</p>
        </div>
        <div class="col-xs">
            <h3>Conjoint :</h3>
            <p>Nom : {{$user->lastname_joint}}</p>
            <p>Prénom : {{$user->firstname_joint}}</p>
            <p>Date de naissance : {{$user->birthdate_joint}}</p>
            <p>E-mail : {{$user->email_joint}}</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs">
            <h2 style="text-align: center">Votre adhésion</h2>
            <p> Type d'adhésion : </p>
            <p> Montant de l'adhésion :</p>
        </div>
        <div class="col-xs">
            <p> Paiement :</p>
            <input class="form-check-control" type="checkbox">Chèque</input>
            <input class="form-check-control" type="checkbox">Espèces</input>
        </div>
    </div>
</div>
