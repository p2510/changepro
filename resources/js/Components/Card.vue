<template>
  <div class="bg-white card dark:bg-gray-800 rounded py-5 pl-6 flex items-start drop-shadow-md hover:drop-shadow-lg hover:bg-gray-400 hover:bg-opacity-90 hover:cursor-pointer transition duration-300 ease-in-out">
            <div class="text-gray-700 dark:text-gray-400 icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="12" cy="13" r="2" />
                    <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                    <path d="M6.4 20a9 9 0 1 1 11.2 0Z" />
                </svg>
            </div>
            <div class="pl-3 pr-10 mt-1">
                <h3 v-if="option==0" class="font-normal leading-4 text-gray-800 dark:text-gray-100 text-base text1">De {{country_fixed}}</h3>
                <h3 v-if="option==1" class="font-normal leading-4 text-gray-800 dark:text-gray-100 text-base text1">De {{country_selected}}</h3>
                <div class="flex flex-col items-end mt-4 ">
                    <h2 class="basis-full text-indigo-700 dark:text-indigo-600 text-2xl leading-normal font-bold pricing">{{amount}}</h2>
                    <strong class="basis-full  text-indigo-700 dark:text-indigo-600 text-2xl leading-normal font-bold pricing"> {{currency}}</strong>
                    <p v-if="option==1" class="basis-full ml-2 break-words mb-1 text-sm text-gray-600 dark:text-gray-400 pricing">Vers {{country_fixed}}</p>
                    <p v-if="option==0" class="basis-full ml-2 break-words mb-1 text-sm text-gray-600 dark:text-gray-400 pricing">Vers {{country_selected}}</p>
                </div>
                <div class="flex items-center mt-5">
                    <div class="text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="3 17 9 11 13 15 21 7" />
                            <polyline points="14 7 21 7 21 14" />
                        </svg>
                    </div>
                    
                </div>
            <div class="flex w-full gap-x-2 m-2 rounded-md">
                <Link :href="route('transfer.show',id)"  class="bg-gray-500  text-white hover:bg-gray-700 transition duration-300 ease-in-out p-2 text-center">
                    Actions
                </Link>
            </div>
            </div>
        
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name:"Card",

    props:{
        id:{type:Number},
        option:{type:String},
        country_fixed:{type:String},
        country_selected:{type:String},
        amount:{type:Number},
        currency:{type:String},
    },
    components:{
        Link
    }

}
</script>

<style scoped > 

    .card:hover .icon{
           color: white;
    }
    .card:hover h3{
           color: white;
    }
    .card:hover .like{
           color: white;

    }
    .card:hover .princing{
           color: rgb(8, 8, 8);

    }

</style>