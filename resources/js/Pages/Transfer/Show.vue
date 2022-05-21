
<template>
  <Head title="Mes transferts" />
  <BreezeAuthenticatedLayout :urlLogo="urlLogo">
          <section class="container mt-4 mx-0 sm:px-4 px-0">
              <div class="grid grid-cols-4 gap-2 sm:gap-x-4">
                <!-- details -->
                <h2 class="text-center  col-span-4 break-words text-md sm:text-lg md:text-2xl lg:text-5xl text-black text-opacity-90 font-bold my-4" v-if="data.option==0">Tranfert de {{data.country_fixed}} vers  </h2>  <strong v-if="data.option==1" class="text-center col-span-4 block break-words text-md sm:text-lg md:text-2xl lg:text-5xl text-black text-opacity-90 font-bold my-4">Tranfert de {{data.country_selected}} Vers</strong>      
                <span class="flex justify-center col-span-4">
                    <ArrowNarrowDownIcon class="text-indigo-700 h-10 sm:h-16 md:16 text-lg sm:text-2xl md:text-5xl lg:text-7xl"/>
                </span>
                <h2 class="text-center col-span-4 break-words text-md sm:text-lg md:text-2xl lg:text-5xl text-black text-opacity-90 font-bold my-4" v-if="data.option==1"> {{data.country_fixed}}  </h2>   <strong v-if="data.option==0" class="text-center col-span-4 block break-words text-md sm:text-lg md:text-2xl lg:text-5xl text-black text-opacity-90 font-bold my-4">{{data.country_selected}}</strong>      
                    
                <div class="col-span-full sm:col-span-2 flex mt-4">
                    <CashIcon class="text-indigo-900 w-10 h-10 sm:w-20 sm:h-20 basis-1/2 "/>
                    <p class="basis-1/2 text-sm sm:text-md md:text-lg lg:text-2xl drop-shadow-xl bg-indigo-700 rounded-md p-4 sm:p-6 text-white text-center ">Montant : {{data.amount}} {{data.currency}}</p>
                </div>
                                    
                <div class="col-span-full sm:col-span-2 flex mt-4">
                    <StatusOnlineIcon class="text-gray-900 w-10 h-10 sm:w-20 sm:h-20 basis-1/2"/>
                    <p v-if="data.status=='progressing'" class="basis-1/2 text-sm sm:text-md md:text-lg lg:text-2xl drop-shadow-xl bg-gray-700 rounded-md p-4 sm:p-6 text-white text-center ">Status : En cours  </p>
                    <p v-else-if="data.status=='declined'" class="basis-1/2 text-sm sm:text-md md:text-lg lg:text-2xl drop-shadow-xl bg-gray-700 rounded-md p-4 sm:p-6 text-white text-center ">Status : Annuler</p>
                    <p v-else class="basis-1/2 text-sm sm:text-md md:text-lg lg:text-2xl drop-shadow-xl bg-gray-700 rounded-md p-4 sm:p-6 text-white text-center ">Status : Terminé  </p>
                </div>
                <!-- date -->
                <div class="col-span-full sm:col-span-4 py-4">
                     <p class="text-center text-sm sm:text-md md:text-lg lg:text-2xl py-2">Mis en ligne  {{data.created_at}}</p>
                </div>
              </div>
          </section>
  </BreezeAuthenticatedLayout>
</template>
<script >
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { ArrowNarrowDownIcon,CashIcon,StatusOnlineIcon } from '@heroicons/vue/outline'
import { Head,Link } from '@inertiajs/inertia-vue3';
import { defineComponent } from 'vue'
export default defineComponent({
    components:{
        BreezeAuthenticatedLayout,
        Head, 
        ArrowNarrowDownIcon,
        CashIcon,
        StatusOnlineIcon,
        Link
    },
    props:{
        urlLogo:String,
        data:String
    },
    data() {
        return {
         
        }
    },

})
</script>
