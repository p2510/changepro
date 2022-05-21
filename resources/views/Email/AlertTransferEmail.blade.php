@component('mail::message')
# Un utlisateur de changePro souhaite éffectuer un échange avec vous .

Vous avez publier un transfert sur changePro et un utilisateur a accepté de faire l'échange avec vous . Votre numéro mentionnez a été récupérer , il vous contactera pour organiser une rencontre pour éffectuer l'échange . 


@component('mail::button', ['url' =>  config('app.url')."/"])
Retourner sur ChangePro
@endcomponent

Merci pour votre confiance ,<br>
{{ config('app.name') }}
@endcomponent
