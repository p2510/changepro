<template>
 <Head title="Fonctionnement" />

<BreezeAuthenticatedLayout :urlLogo="urlLogo">
 <div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-extrabold text-white">
        Comment fonctionne Change Pro ?
      </h2>
      <div class="mt-6 border-t border-indigo-300 border-opacity-25 pt-10">
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-12">
          <div v-for="faq in faqs" :key="faq.id">
            <dt class="text-lg leading-6 font-medium text-white">
              {{ faq.question }}
            </dt>
            <dd class="mt-2 text-base text-indigo-200">
              {{ faq.answer }}
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';


export default {
  components:{
      BreezeAuthenticatedLayout,
      Head,
      Link,
  },
  props:{
       urlLogo:{type:String}, 
  },
  data() {
      return {
          faqs : [
                    {
                        id: 1,
                        question: "C'est quoi Change Pro ?",
                        answer:
                        "ChangePro est un système de mise en relation pour les échanges monétaires multidirectionnels . Elle permet aux subsahérien(nes) vivant au Maroc de pouvoir échanger de l'argent vers leur pays d'origine .",
                    },
                    {
                        id: 2,
                        question: "Comment ça fonctionne ?",
                        answer:
                        "Un exemple pour vous aider : Supposons qu'un Ivoirien au Maroc veuille envoyer de l'argent vers la côte divoire . Il commence tout d'abord à publier sa demande avec le montant souhaiter et bon numéro,un utilisateur qui souhaite faire l'opération inverse pourra récupérer son numéro pour le joindre enfin d'organiser une rencontre pour un échange. ",
                    },
                    {
                        id: 3,
                        question: "Combien pour ce service ?",
                        answer:
                        "Le coût de ChangePro est très bas afin d'aider les subsahérien(nes) au Maroc,pour change opération changé Pro prélève 10D H sur votre compte rechage .",
                    },
                    {
                        id: 4,
                        question: "C'est quoi le compte recharge  ?",
                        answer:
                        "Le compte rechargé est constitue votre solde . Elle vous permet de pouvoir payer les frais de services uniquement.",
                    },
                    {
                        id: 5,
                        question: "Comment recharger mon compte   ?",
                        answer:
                        "Pour recharger votre compte il suffit de faire un dépôt wafacash sur ce numéro de compte 0648 5140 0094 1931 puis d'envoyer la photo du reçu sur ce whatsapp +212 07 76 09 19 82 . Votre recharge sera alors validée.",
                    },
                    {
                        id: 6,
                        question: "Pourquoi pas un autre service  ?",
                        answer:
                        "La différence entre ChangePro et les habitudes à publier dans les groupes résident dans le rassemblement de toute la communauté subsahérien(ne)",
                    },
                    {
                        id: 7,
                        question: "Différence de prix ",
                        answer:
                        "Dans les transferts le coût part de 20 DH minimums pour un transfert de 200 DH vers la Côte d'Ivoire par exemple . En revanche sur ChangePro , vous pouvez envoyer jusqu'à l'infini en payant comme frais unique de transfert 10 DH .",
                    },

                ]

      }
  },
}
</script>

<style>

</style>