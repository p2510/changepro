<template>
 <Head title="Recharge" />

<BreezeAuthenticatedLayout :urlLogo="urlLogo">
    <div class="bg-white drop-shadow-xl rounded-md">
    <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        <span class="block">Votre recharge actuelle est de : </span>
        </h2>
        <div class="mt-8 flex justify-center">
        <div class="inline-flex rounded-md shadow">
            <p class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
              {{amount}} DH
            </p>
        </div>
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
       amount:{type:Number}
  }
}
</script>

<style>

</style>