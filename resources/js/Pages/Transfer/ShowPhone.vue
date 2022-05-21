<template>
    <Head title="Mes transferts" />
    <BreezeAuthenticatedLayout :urlLogo="urlLogo">
         <div class="bg-gradient-to-r from-indigo-300 to-blue-200">
            <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
          
                <div v-if="get_phone" class="bg-white shadow overflow-hidden sm:rounded-lg pb-8" >
                    <div class="border-t border-gray-200 text-center pt-8">
                        <h1 class="text-2xl font-bold text-indigo-400">{{get_phone}}</h1>
                        <h1 class="text-md font-medium py-8">Votre compte a été crédité de 10 DH , vous pouvez désormais contacter ce numéro pour éffectuer un échange .</h1>
                        <p class="text-sm pb-8 px-12 font-medium"><strong class="text-red-700 underline">Attention</strong>  : Veuillez à bien noté ce numéro avant  de faire un retour sur la page précedente . </p>
                    </div>
                </div>
                 <div v-else class="bg-white shadow overflow-hidden sm:rounded-lg pb-8" >
                    <div class="border-t border-gray-200 text-center pt-8">
                      
                        <h1 class="text-md font-medium py-8">Votre recharge est insuffisante pour effectuer cette opération . Vous devez recharge votre compte d'au moins 10 dh pour poursuivre votre opération .</h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
      
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { defineComponent } from 'vue'
export default {
        components:{
        BreezeAuthenticatedLayout,
        Head, 
        Link
    },
    props:{
        urlLogo:String,
        data:String,
        get_phone:Number
    },

     
}
</script>
<style lang="css" scoped>
      .text-9xl{
      font-size: 14rem;
      }
      @media(max-width: 645px){
      .text-9xl{
      font-size: 5.75rem;
      }
      .text-6xl{
      font-size: 1.75rem;
      }
      .text-2xl {
      font-size: 1rem;
      line-height: 1.2rem;
      }
      .py-8 {
      padding-top: 1rem;
      padding-bottom: 1rem;
      }
      .px-6 {
      padding-left: 1.2rem;
      padding-right: 1.2rem;
      }
      .mr-6{
      margin-right: 0.5rem;
      }
      .px-12 {
      padding-left: 1rem;
      padding-right: 1rem;
      }
      }
    
</style>