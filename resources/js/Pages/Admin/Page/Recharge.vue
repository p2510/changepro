<template>
<Layout>
 <div class="bg-indigo-50">
            <p v-if="success" class="p-4 bg-green-400 text-white text-center font-bold">
                {{success}}
            </p>
            <div class="xl:px-20 md:px-10 sm:px-6 px-4 md:py-12 py-9 2xl:mx-auto 2xl:container md:flex items-center justify-center">
                <form @submit.prevent="submit" method="put" class="bg-white shadow-lg rounded xl:w-1/3 lg:w-5/12 md:w-1/2 w-full lg:px-10 sm:px-6 sm:py-10 px-2 py-6">
                    <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Recharge le compte d'un utilisateur </p>
                    <div>
                        <label for="email" class="text-sm font-medium leading-none text-gray-800"> Email </label>
                        <input v-model="form.email" id="email" aria-labelledby="email" type="email" class="bg-gray-200 border rounded text-xs font-medium leading-none placeholder-gray-800 text-gray-800 py-3 w-full pl-3 mt-2" placeholder="e.g: john@gmail.com " />
                    </div>
                    <div class="mt-6 w-full">
                        <label for="pass" class="text-sm font-medium leading-none text-gray-800"> Montant  </label>
                        <div class="relative flex items-center justify-center">
                            <input v-model="form.amount" id="amount" type="number"  class="bg-gray-200 border rounded text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2" />
                        </div>
                    </div>
                    <div class="mt-8">
                        <input value="Recharger " role="button" type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">
                    </div>
                </form>
                <div class="xl:w-1/3 md:w-1/2 lg:ml-16 ml-8 md:mt-0 mt-6">
                    <div class="flex items-start mt-8">
                        <div>
                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.0666 6.65142C15.7914 6.17428 16.6517 5.94576 17.5177 6.00035C18.3837 6.05493 19.2085 6.38965 19.8677 6.95402C20.5268 7.51839 20.9845 8.28179 21.1718 9.12907C21.3591 9.97636 21.2658 10.8616 20.906 11.6512C20.5461 12.4408 19.9393 13.092 19.177 13.5065C18.4146 13.921 17.5382 14.0764 16.6798 13.9492C15.8215 13.822 15.0277 13.4192 14.4184 12.8014C13.809 12.1836 13.4171 11.3844 13.3016 10.5244C12.9366 8.73142 12.7946 6.57642 13.5086 4.62542C14.2746 2.53542 15.9726 0.821417 19.0136 0.0254175C19.2671 -0.0328119 19.5332 0.00995174 19.7556 0.144642C19.978 0.279332 20.1392 0.495356 20.205 0.746904C20.2708 0.998453 20.2361 1.26575 20.1081 1.4921C19.9802 1.71846 19.7691 1.88608 19.5196 1.95942C17.0596 2.60342 15.9096 3.88942 15.3866 5.31342C15.2316 5.73842 15.1266 6.18742 15.0666 6.65142Z"
                                    fill="#4B5563"
                                />
                                <path
                                    d="M2.06664 6.65142C2.79142 6.17428 3.65171 5.94576 4.51773 6.00035C5.38375 6.05493 6.20853 6.38965 6.86766 6.95402C7.5268 7.51839 7.98454 8.28179 8.17183 9.12907C8.35912 9.97636 8.26581 10.8616 7.90597 11.6512C7.54612 12.4408 6.93927 13.092 6.17695 13.5065C5.41463 13.921 4.53818 14.0764 3.67982 13.9492C2.82145 13.822 2.02772 13.4192 1.41836 12.8014C0.808998 12.1836 0.417052 11.3844 0.301644 10.5244C-0.0633559 8.73142 -0.205356 6.57642 0.508644 4.62542C1.27464 2.53542 2.97264 0.821417 6.01364 0.0254175C6.26706 -0.0328119 6.53318 0.00995174 6.7556 0.144642C6.97801 0.279332 7.13921 0.495356 7.20502 0.746904C7.27084 0.998453 7.23609 1.26575 7.10814 1.4921C6.98019 1.71846 6.7691 1.88608 6.51964 1.95942C4.05964 2.60342 2.90964 3.88942 2.38664 5.31342C2.23164 5.73842 2.12664 6.18742 2.06664 6.65142Z"
                                    fill="#4B5563"
                                />
                            </svg>
                        </div>
                        <p class="sm:text-2xl text-xl leading-7 text-gray-600 pl-2.5">Nous pouvons recharger le compte d'un utilisateur sur ce espace . Avant un rechargement , nous devons nous rassurer de l'authenticité du dépôt .</p>
                    </div>
                </div>
            </div>
        </div>
</Layout>
</template>

<script>
import Layout from '../Layout.vue'
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components:{
        Layout,
        Link
    },
    props:{
       success:{type:String}
    },
    data() {
        return {
            form:{
                email:null,
                amount:null
            }
        };
    },
    methods:{
        submit(){
              this.$inertia.put(route("admin.recharge.put"),this.form)
        }
    }

}
</script>

<style>

</style>