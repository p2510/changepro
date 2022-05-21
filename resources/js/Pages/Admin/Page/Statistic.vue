<template>
<Layout>
    <div class="dark:bg-gray-900">
      <div class="pb-20">
        <div class="mx-auto bg-gradient-to-l from-blue-600 to-blue-700 h-96">
          <div class="mx-auto container w-full flex flex-col justify-center items-center">
            <div class="flex justify-center items-center flex-col">
              <div class="mt-20">
                <h2 class="lg:text-6xl md:text-5xl text-4xl font-black leading-10 text-white">Mes statistiques</h2>
              </div>
              <div class="mt-6 mx-2 md:mx-0 text-center">
                <p class="lg:text-lg md:text-base leading-6 text-sm text-white">Controler les trafic et maintenir l'audience sur ChangePro</p>
              </div>
            </div>
          </div>
        </div>
        <div class="mx-auto  flex justify-center items-center">
          <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-2 gap-x-2 gap-y-2 lg:gap-x-6 md:gap-x-6  md:gap-y-6">
            <div class="flex justify-center flex-col items-center w-36 h-36 md:w-44 md:h-48 lg:w-56 lg:h-56 bg-white shadow rounded-2xl">
              <h2 class="lg:text-5xl md:text-4xl text-2xl font-extrabold leading-10 text-center text-gray-800">{{user_count}}</h2>
              <p class="mt-4 text-sm md:text-base lg:text-lg leading-none text-center text-gray-600">Nombre utilisateur</p>
            </div>
            <div class="flex justify-center flex-col items-center w-36 h-36 md:w-44 md:h-48 lg:w-56 lg:h-56 bg-white shadow rounded-2xl">
              <h2 class="lg:text-5xl md:text-4xl text-2xl font-extrabold leading-10 text-center text-gray-800">{{transfer_count}}</h2>
              <p class="mt-4 text-sm md:text-base lg:text-lg leading-none text-center text-gray-600">Nombre total de transferts réalisés</p>
            </div>
            <div class="flex justify-center flex-col items-center w-36 h-36 md:w-44 md:h-48 lg:w-56 lg:h-56 bg-white shadow rounded-2xl">
              <h2 class="lg:text-5xl md:text-4xl text-2xl font-extrabold leading-10 text-center text-gray-800">{{transfer_progressing_count}}</h2>
              <p class="mt-4 text-sm md:text-base lg:text-lg leading-none text-center text-gray-600">Transferts en cours </p>
            </div>
            <div class="flex justify-center flex-col items-center w-36 h-36 md:w-44 md:h-48 lg:w-56 lg:h-56 bg-white shadow rounded-2xl">
              <h2 class="lg:text-5xl md:text-4xl text-2xl font-extrabold leading-10 text-center text-gray-800">{{transfer_finished_count}}</h2>
              <p class="mt-4 text-sm md:text-base lg:text-lg leading-none text-center text-gray-600">Transferts terminés</p>
            </div>
            <div class="flex justify-center flex-col items-center w-36 h-36 md:w-44 md:h-48 lg:w-56 lg:h-56 bg-white shadow rounded-2xl">
              <h2 class="lg:text-5xl md:text-4xl text-2xl font-extrabold leading-10 text-center text-gray-800">{{transfer_declined_count}}</h2>
              <p class="mt-4 text-sm md:text-base lg:text-lg leading-none text-center text-gray-600">Transferts annulés</p>
            </div>


          </div>
        </div>
      </div>
    </div>
</Layout>
</template>

<script>
import Layout from '../Layout.vue'
export default {
    
    props:{
        user_count:{
            type:Number
        },
        transfer_count:{
            type:Number
        },
        transfer_progressing_count:{
            type:Number
        },
        transfer_finished_count:{
            type:Number
        },
        transfer_declined_count:{
            type:Number
        },
        
        
        
        
      
    },
    components:{
        Layout,
    }

}
</script>

<style>

</style>