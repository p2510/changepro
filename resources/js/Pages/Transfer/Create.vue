<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { ArrowRightIcon, ArrowLeftIcon} from '@heroicons/vue/outline'
import 'animate.css'
import { ref} from 'vue'
import BreezeInput from '@/Components/Input.vue';
import BreezeButton from '@/Components/Button.vue';
import { Head , useForm } from '@inertiajs/inertia-vue3';
import {countries} from './../../Exports/countries'
import {cities} from './../../Exports/cities'
import {currencies} from './../../Exports/currencies'
const props= defineProps({
    urlLogo:{type:String,required:true},
    can_post_transfer:{type:Boolean,required:true}
    

})
let form=useForm({
      option:ref(false),
      country_fixed:'Maroc',
      country_selected:"Côte d\'ivoire",
      city_selected:"Casablanca",
      amount:null,
      phone:null
})

// submit form 
let submit = ()=>{
       form.post(route('transfer.store'))
}
</script>
<template>
    <Head title="Transférer" />
    <BreezeAuthenticatedLayout :urlLogo="props.urlLogo">
        <div class="container mx-0 px-auto">
            <h2 class=" mt-2 text-center font-bold text-sm sm:text-lg md:text-2xl py-2 text-black text-opacity-85 bg-white rounded-md drop-shadow-md">
                Publier votre transfert 
            </h2>
            <BreezeValidationErrors class="mb-4" />
            <form @Submit.prevent="submit" class="grid grid-cols-3 gap-x-2 mt-2">
                <!-- separator -->
                <p class="col-span-3 grid justify-items-center " >Appuyer pour changer le sens </p>
                <div class="col-span-3 mx-auto  flex flex-col items-center">

                    <div class="mx-auto pb-12 py-2 flex flex-col items-center">
                    
                        <div class="cursor-pointer my-5 rounded-full bg-indigo-700 relative shadow-sm">
                            <input v-model="form.option"  aria-label="toggle 2"  type="checkbox" name="option" id="toggle2" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 checkbox w-6 h-6 rounded-full bg-white absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                            <label for="toggle2" class="toggle-label dark:bg-gray-700 block w-12 h-4 overflow-hidden rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </div>
        
                </div>
                <!-- part one : choose option  -->
                <div class="col-span-1 mt-2">
                    <BreezeInput id="country" disabled value="Maroc" type="text" class="mt-1 block w-full"  required autofocus autocomplete="country" />
                </div>
                <transition enter-active-class="animate__animated animate__rotateIn" leave-active-class="animate__animated animate__rotateOut" mode="out-in">
                    <span v-if="!form.option" class="col-span-1   w-full content-center">
                    <ArrowRightIcon class="col-span-1 w-full h-6 sm:h-10 text-indigo-700" />
                    </span>
                    <span v-else class="col-span-1   w-full content-center">
                    <ArrowLeftIcon class="col-span-1 w-full h-6 sm:h-10 text-indigo-700" />
                    </span>
                </transition>
                <div class="col-span-1 ">
                    
                  <select v-model="form.country_selected" name="country_selected"  id="country_selected" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"    required autofocus autocomplete="country_selected">
                    <option v-for="(country, index) in countries" :key="index" :value="country">{{country}}</option>
                  </select>
                </div>
                <p class="col-span-3 sm:col-span-2 mt-4 text-center" >
                     <strong class="break-words">Dans quelle ville souhaitez-vous effectuer la transaction au Maroc ? </strong> 
                </p>
                <div class="col-span-3 sm:col-span-1 mt-2">
                    
                  <select v-model="form.city_selected" name="city_selected"  id="city_selected" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"    required autofocus autocomplete="city_selected">
                    <option v-for="(city, index) in cities" :key="index" :value="city">{{city}}</option>
                  </select>
                </div>
                <p class="col-span-3 sm:col-span-2 mt-4 text-center" >
                    <strong class="break-words">Sur quel numéro souhaitez-vous être contacté pour un échange  ? </strong> 
                </p>
                <div class="col-span-3 sm:col-span-1 mt-4">
                    <BreezeInput  v-model="form.phone" id="phone" placeholder="ex: 0620446100"  type="number" class="mt-1 block w-full"  required autofocus autocomplete="phone" />
                </div>
                <!--part two  : define amount -->
                <div class="col-span-2 mt-4">
                    <BreezeInput  v-model="form.amount" id="amount" placeholder="montant de transfert"  type="number" class="mt-1 block w-full"  required autofocus autocomplete="amount" />
                </div>
                <transition enter-active-class="animate__animated animate__fadeInUp" leave-active-class="animate__animated animate__fadeOutDown" mode="out-in">
                  <p class="col-span-1 mt-4" v-if="!form.option">
                     <strong>DH</strong> 
                  </p>
                  <p v-else>
                    <transition enter-active-class="animate__animated animate__fadeInUp" leave-active-class="animate__animated animate__fadeOutDown" mode="out-in">
                      <strong v-if="form.country_selected==='Guinée'">
                          GNF
                      </strong>  
                      <strong v-if="form.country_selected==='Ghana'">
                          CÉDI
                      </strong>
                      <strong v-if="form.country_selected==='Côte d\'ivoire' || form.country_selected==='Burkina faso' || form.country_selected==='Mali' || form.country_selected==='Cameroun'    || form.country_selected==='Togo' || form.country_selected==='Mali' || form.country_selected==='Cameroun' ||form.country_selected==='Congo-Brazzaville' || form.country_selected==='Congo-Kinshasa' || form.country_selected==='Gabon' || form.country_selected==='Centrafique'">
                          CFA
                      </strong>

                    </transition>
                   </p>
              </transition>
            <BreezeButton v-if="props.can_post_transfer" type="submit"  class="col-start-2 col-end-3 mt-6 " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Publier
            </BreezeButton>
            <div v-else class="w-full col-span-full mx-auto mt-4">
                <div  class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div><span class="font-medium">Information !</span>  Votre recharge  est insuffisante, vous  ne pouvez pas créer de transfert . Le montant minimum pour un transfert est de 10 DH</div>
                </div>
            </div>
            </form>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<style>
    .checkbox:checked {
        /* Apply class right-0 and border-indigo-700*/
        right: 0;
        border-color: #4c51bf;
                    }
    .checkbox:checked + .toggle-label {
    /* Apply class bg-indigo-700 */
    background-color: #4c51bf;
                    }
</style>