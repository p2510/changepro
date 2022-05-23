@component('mail::message')
# Un utlisateur de changePro souhaite effectuer un échange avec vous .

Vous avez publier un transfert sur changePro et un utilisateur a accepté de faire l'échange avec vous . Votre numéro mentionné ( lors de la création du transfert ) a été récupéré , il vous contactera pour organiser une rencontre afin d'effectuer l'échange . 


@component('mail::button', ['url' =>  config('app.url')."/"])
Retourner sur ChangePro
@endcomponent

Merci pour votre confiance ,<br>
{{ config('app.name') }}
@endcomponent
