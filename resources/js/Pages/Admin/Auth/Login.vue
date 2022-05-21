<template>
  <!-- component -->
<!-- Container -->
<div class="flex flex-col h-screen bg-gray-100">
    <!-- Auth Card Container -->
    <div class="grid place-items-center mx-2 my-20 sm:my-auto">
        <div class="flex">
            <span class="text-center font-bold my-20 mx-auto">        
               
                   Panel ChangePro
               
            </span>
        </div>
    
    
        <!-- Auth Card -->
        <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-white rounded-lg shadow-md lg:shadow-lg">

            <!-- Card Title -->
            <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
               Me connecter
            </h2>

            <form class="mt-10" @submit.prevent="submit" method="POST">
                <!-- Email Input -->
                <label for="identify" class="block text-xs font-semibold text-gray-600 uppercase">Identifiant</label>
                <input id="identify" type="text" name="identify" autocomplete="identify"
                    class="block w-full py-3 px-1 mt-2 
                    text-gray-800 appearance-none 
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                    required v-model="form.identify"/>

                <!-- Password Input -->
                <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Mot de passe</label>
                <input id="password" type="password" name="password" autocomplete="current-password"
                    class="block w-full py-3 px-1 mt-2 mb-4
                    text-gray-800 appearance-none 
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                    required v-model="form.password"/>

                <!-- Auth Buttton -->
                <input type="submit"
                    class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-700 cursor-pointer hover:shadow-none" value="Me connecter">
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
                  form:{
                      identify:"",
                      password:"",
                      
                  },
             }
        },
        methods: {
                 submit(){
                     this.$inertia.post(route('admin.login'),this.form)
               }
    },

}
</script>

<style>

</style>