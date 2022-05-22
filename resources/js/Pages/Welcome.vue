
<template>
    <Head title="Bienvenue" />

      <div class="relative   flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
          <div v-if="canLogin" class=" fixed top-0 right-0 px-6 py-4  block z-50">
              <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm  text-neutral-50 p-4 bg-indigo-700 bg-opacity-80 rounded-md  hover:bg-white hover:text-neutral-800 shadow-md shadow-neutral-500 ">
                  Mon compte
              </Link>

              <template v-else>
                  <Link :href="route('login')" class="text-sm text-neutral-50 p-4 bg-indigo-700 bg-opacity-80 rounded-md  hover:bg-white hover:text-neutral-800 shadow-md shadow-neutral-500 ">
                      Me connecter
                  </Link>

                  <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-neutral-50 p-4 bg-indigo-700 bg-opacity-80 rounded-md hover:bg-white hover:text-neutral-800 shadow-md shadow-neutral-500  ">
                      M'inscrire
                  </Link>
              </template>
          </div>
            
       <main class="mt-10 sm:mt-24">

        <div class="lg:px-20 md:px-6 px-4 md:py-12 py-8">
            <div class="lg:flex items-center justify-between">
                <div class="lg:w-1/3">
                    <h1 class="text-4xl font-semibold leading-9 text-gray-800 dark:text-white">Vous êtes au Maroc ou en Afrique subsaharienne?</h1>
                    <p class="text-base leading-6 mt-4 text-gray-600 dark:text-gray-100">Vous avez des difficultés pour envoyer de l'argent au Maroc ou vers votre pays d'origine . Dès maintenant , vous pouvez entrer en contact pour effectuer un échange rapidement</p>
                  
                </div>
                <div class="lg:w-7/12 lg:mt-0 mt-8">
                    <div class="w-full h-full bg-red-200">
                        <img :src="urlHome3" alt="Elle est heureuse après son transfert" class="w-full " />
                       
                    </div>
                    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 lg:gap-8 gap-6 lg:mt-8 md:mt-6 mt-4">
                        <img :src="urlHome2" class="w-full" alt="Comment envoyer de l'argent sur changepro" />
                        <img :src="urlHome1" class="w-full" alt="Toutes les monnaies " />
                    </div>
                </div>
            </div>
        </div>
     <!--feature -->
     
    <div class="dark:bg-gray-900">
      <section class="mx-auto container py-20">
        <div class="flex justify-center items-center flex-col">
          <div class="lg:text-6xl md:text-5xl text-4xl font-black leading-10 text-center text-gray-800 dark:text-white">
            <h1 class="leading-loose">Fonctionnalités sur <strong class="bg-indigo-700 p-1 text-white">ChangePro</strong></h1>
          </div>
          <div class="pt-24 grid lg:grid-cols-3 md:grid-cols-2 justify-center items-center xl:gap-y-16 gap-y-20 gap-x-16 lg:gap-x-20 xl:gap-x-0 lg:px-10 xl:px-0">
            <div class="cursor-pointer hover:shadow py-6 xl:px-4 rounded xl:w-96 w-60 flex justify-center items-center flex-col">
              <div class="mb-6">
               <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/feature_7-svg1.svg" alt="arrow-1">
              </div> 
              <div class="text-gray-800 dark:text-white text-2xl font-semibold text-center">
                <h2>Flux de transfert</h2>
              </div>
              <div class="text-gray-600 dark:text-gray-300 mt-2 text-lg text-center">
                <p>Les flux de transfert peuvent aider à rationaliser et à automatiser les tâches de transferts répétables.</p>
              </div>
            </div>
            <div class="cursor-pointer hover:shadow py-6 xl:px-4 rounded xl:w-96 w-60 flex justify-center items-center flex-col">
              <div class="mb-6">
               <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/feature_7-svg2.svg" alt="3 bars">
              </div>
              <div class="text-gray-800 dark:text-white text-2xl font-semibold text-center">
                <h2>Moins chère</h2>
              </div>
              <div class="text-gray-600 dark:text-gray-300 mt-2 text-lg text-center">
                <p>Nous facilitons les paiements avec un tarif pour chaque opération à seulement <br><strong class="text-indigo-700">10 DH </strong></p>
              </div>
            </div>
            <div class="cursor-pointer hover:shadow py-6 xl:px-4 rounded xl:w-96 w-60 flex justify-center items-center flex-col">
              <div class="mb-6">
               <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/feature_7-svg3.svg" alt="bars">
              </div>
              <div class="text-gray-800 dark:text-white text-2xl font-semibold text-center">
                <h2>Sécurité</h2>
              </div>
              <div class="text-gray-600 dark:text-gray-300 mt-2 text-lg text-center">
                <p>Nous gérons votre sécurité afin de point laisser transparaître vos informations personnelles</p>
              </div>
            </div>
           
          
            
          </div>
        </div>
      </section>
    </div>
 
    <!-- Explain feature --> 
        <div class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">
            <p class="font-normal text-sm leading-3 text-indigo-700 dark:text-indigo-500 hover:text-indigo-800 cursor-pointer pb-2">Découverte</p>
            <div class="flex lg:flex-row flex-col lg:gap-8 sm:gap-10 gap-12">
                <div class="w-full lg:w-6/12 mb-4 sm:mb-0">
                    <h2 class="w-full font-bold lg:text-4xl text-3xl lg:leading-10 dark:text-white leading-9">Comprendre les différentes fonctionnalités de ChangePro</h2>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-gray-200 mt-6">Nous savons à quel point vous avez hâte d'effectuer votre inscription mais une minute .Nous vous recommandons de prendre connaissance de ces informations afin de mieux comprendre le fonctionnement de ChangePro pour tirer une meilleure expérience.</p>
                </div>
                <div class="w-full lg:w-6/12">
                    <img class=" w-full" :src="urlDescription" alt="découverte de changepro" />
                </div>
            </div>

            <div class="relative mt-24">
                <div class="grid sm:grid-cols-3 grid-cols-2 sm:gap-8 gap-4">
                    <div class="z-20 w-12 h-12 bg-gray-800 rounded-full flex justify-center items-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/about-us-3-svg1.svg" alt="flag" />
                    </div>
    
                  <img class="z-20" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/about-us-3-svg2.svg" alt="note" />
    
                   <img class="z-20 sm:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/about-us-3-svg3.svg" alt="users" />
                </div>
                <hr class="z-10 absolute top-2/4 w-full bg-gray-200" />
            </div>
            <div class="grid sm:grid-cols-3 grid-cols-2 sm:gap-8 gap-4">
                <div>
                    <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white mt-6">Sécurité</p>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-gray-200 mt-6">Nous garantissons une grande sécurité . Nous savons que vous aimez garder vos informations personnelles de façon secrète,c'est donc plus que nécessité pour nous.</p>
                </div>
                <div>
                    <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white mt-6">Tarif</p>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-gray-200 mt-6">Les frais de ChangePro sont moins coûteux . Pour chaque prise de numéro pour un échange,ChangePro vous facture 10 DH et cela peu importe le montant .</p>
                </div>
                <div class="sm:block hidden">
                    <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white mt-6">Pays</p>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-gray-200 mt-6">ChangePro est disponible avec les transactions sur les pays suivants : Maroc,Côte d'Ivoire,Cameroun,Congo-Kinshasa , Congo-Brazzaville,Ghana,Gabon, Mali,Burkina Faso,Centrafique , Guninée,Togo</p>
                </div>
            </div>
            <div class="sm:hidden block relative mt-8">
                <div class="grid sm:grid-cols-3 grid-cols-2 sm:gap-8 gap-4">
                   <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/about-us-3-svg3.svg" alt="user" />
                </div>
                <hr class="z-10 absolute top-2/4 w-full bg-gray-200" />
            </div>
           
    
            <div class="flex lg:flex-row flex-col md:gap-14 gap-16 justify-between lg:mt-20 mt-16">
                <div class="w-full lg:w-6/12  mb-4 sm:mb-0">
                    <h2 class="font-bold lg:text-4xl text-3xl lg:leading-9 leading-7 text-gray-800 dark:text-white">Pourquoi aujourd'hui</h2>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-gray-200 mt-6 w-full lg:w-10/12 xl:w-9/12"><strong>ChangePro</strong>  est une plateforme en ligne qui vise à mettre en relation les subsahariens au Maroc pour un transfert d'argent. ChangePro permet donc de trouver un système un partenaire pour un échange . Rien que choisir <strong>ChangePro</strong>  , c'est décidé d'éliminer un problème .
                   </p>
                </div>
                <div class="w-full lg:w-6/12">
                 <h2 class="font-bold lg:text-4xl text-3xl lg:leading-9 leading-7 text-gray-800 dark:text-white  mb-2 sm:mb-0">Comment ça fonctionne ?</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 lg:gap-12 gap-10">
                        <!-- step 1-->
                        <div class="flex p-4 shadow-md">
                           
                            <div class="">
                                <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white">Étape 1 : S'inscrire</p>
                                <p class="mt-2 font-normal text-base leading-6 text-gray-600 dark:text-gray-200">Avant de commencer une trsaction,vous devez posséder un compte . L'inscription est simple et rapide . Cliquer ici<Link class="underline" :href="route('register')">Cliquer ici</Link></p>
                            </div>
                        </div>
    
                        <!-- step 2-->
                        <div class="flex p-4 shadow-md">
                           
                            <div class="">
                                <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white">Étape 2 : Recharger votre compte</p>
                                <p class="mt-2 font-normal text-base leading-6 text-gray-600 dark:text-gray-200">Une fois que vous êtes inscrit,vous devez recharger votre compte d'au moins 100 DH . le rechargement se fait par wafacash</p>
                            </div>
                        </div>
                        <!-- step 3-->
                        <div class="flex p-4 shadow-md">
                           
                            <div class="">
                                <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white">Étape 3 : Choisissez une option</p>
                                <p class="mt-2 font-normal text-base leading-6 text-gray-600 dark:text-gray-200">Votre compte sera désormais actif. vous avez deux options envoyez de l'argent du MAROC vers votre pays ou recevoir de l'argent depuis votre pays.</p>
                            </div>
                        </div>
                        <!-- step 2-->
                        <div class="flex p-4 shadow-md">
                           
                            <div class="">
                                <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 text-gray-800 dark:text-white">Étape 4 : Transférer</p>
                                <p class="mt-2 font-normal text-base leading-6 text-gray-600 dark:text-gray-200">Vous avez la liste des offres pour effectuer un transfert . Pour chaque transfert, votre compte est facturé de 10 DH </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- footer -->
     
        <div class="px-4 py-9 md:px-6 md:py-12 lg:px-20 lg:py-12">
            <div class="flex flex-col md:flex-row md:justify-between pb-10">
                <div class="flex flex-col items-center">
                  <Link :href="route('register')" class="w-full md:w-auto px-24 py-2 dark:bg-white bg-gray-800 text-white dark:text-gray-800 border rounded-md text-xl font-semibold leading-tight  hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-200 focus:ring-opacity-50">
                      Commençer
                  </Link>
                    
   
                </div>
                <div>
                    <p class="w-72 pt-9 md:py-0 text-sm leading-tight dark:text-gray-300 text-gray-600  ">Lundi - Dimanche Maroc , Casablanca </p>
                </div>
            </div>
    
            <div class="w-full px-8 dark:border-white border-gray-800 border rounded-md flex gap-y-4 flex-col justify-start md:flex-row md:justify-between lg:justify-center gap-2 md:gap-20 py-6">
                <p class="text-sm leading-none dark:text-gray-300 text-gray-600  mb-1">Maroc , Casablanca </p>
                <div class="flex justify-start gap-4">
                   <img class="bg-gray-800 rounded" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/footer_4-svg1.svg" alt="Email">
                    <p class="text-sm leading-none dark:text-gray-300 text-gray-600  ">changepro212@gmail.com</p>
                </div>
            </div>
    
            <div class="pt-10 flex flex-col xl:flex-row justify-between">
                <div class="flex flex-col md:gap-10">
                    <div class="flex items-start w-full">
                        <div class="pb-10 md:pb-0">
                            <h3 class="text-xl cursor-default font-semibold leading-tight dark:text-white text-gray-800   mb-8">Entreprise</h3>
                            <a href="https://aide.changepro.ma/#Entreprise" target="_blank" class="text-sm cursor-pointer block leading-none dark:text-gray-300 text-gray-600   mb-6">Demander un partenariat</a>
                            <a href="https://aide.changepro.ma/#Entreprise" target="_blank" class="text-sm cursor-pointer block leading-none dark:text-gray-300 text-gray-600   mb-6">Devenir affilié </a>
                            
                        </div>
                        <div class="pb-10 md:pb-0 2xl:pl-20 pl-16">
                            <h3 class="text-xl cursor-default font-semibold leading-tight dark:text-white text-gray-800   mb-8">Support</h3>
                            <a href="https://aide.changepro.ma/#Support" target="_blank" class="text-sm block cursor-pointer leading-none dark:text-gray-300 text-gray-600   mb-6">Moyen de paiement</a>
                            <a href="https://aide.changepro.ma/#Support" target="_blank" class="text-sm block cursor-pointer leading-none dark:text-gray-300 text-gray-600   mb-6">Faq</a>
                        </div>
                        <div class="pb-10 md:pb-0 2xl:pl-20 pl-16 md:block hidden">
                            <h3 class="text-xl cursor-default font-semibold leading-tight dark:text-white text-gray-800   mb-8">service</h3>
                            <a href="https://aide.changepro.ma/#Services" target="_blank" class="text-sm cursor-pointer block leading-none dark:text-gray-300 text-gray-600   mb-6">Service client</a>
                            <a href="https://aide.changepro.ma/#Services" target="_blank" class="text-sm cursor-pointer block leading-none dark:text-gray-300 text-gray-600   mb-6">Investisseurs</a>
                            <a href="https://aide.changepro.ma/#Services" target="_blank" class="text-sm cursor-pointer block leading-none dark:text-gray-300 text-gray-600   mb-6">Pays</a>
                        </div>
                        <div class="pb-10 md:pb-0 2xl:pl-20 pl-16 md:block hidden">
                            <h3 class="text-xl cursor-default font-semibold leading-tight dark:text-white text-gray-800   mb-8">Contacts</h3>
                            <a href="https://aide.changepro.ma/#Contact" target="_blank" class="text-sm block cursor-pointer leading-none dark:text-gray-300 text-gray-600   mb-6">+212 776 091 982 ( whatsapp )</a>
                            
                        </div>
                    </div>
 
                </div>
    
            </div>
    
            <div class="pt-10 lg:pt-24 flex justify-around sm:justify-center md:justify-start gap-12">
                <a href="https://www.facebook.com/Changepro-104347582288179/" target="_blank"><img class="bg-gray-800 rounded p-0.5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/footer_4-svg2.svg" alt="facebook"></a>
                <a href="https://www.instagram.com/changepro.officiel/" target="_blank"><img class="bg-gray-800 rounded p-0.5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/footer_4-svg4.svg" alt="instagram"></a>
            </div>
        </div>
    
    
  
      </main>
      </div>

   

  
</template>
<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { CheckIcon, XIcon } from '@heroicons/vue/outline';
export default defineComponent({
    components: {
            Head,
            Link,
            CheckIcon,
            XIcon
            
    },
    
    props:{
        canLogin:Boolean,
        canRegister:Boolean,
        urlLogo:String,
        urlDescription:String,
        urlHome1:String,
        urlHome2:String,
        urlHome3:String,

    },
    data() {
          return {
           
          }
    },

})

</script>
<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>
