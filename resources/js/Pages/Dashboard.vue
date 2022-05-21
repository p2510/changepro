<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { ArrowNarrowRightIcon } from '@heroicons/vue/outline'
import {
  ChatAltIcon,
  CodeIcon,
  DotsVerticalIcon,
  EyeIcon,
  FlagIcon,
  PlusIcon,
  SearchIcon,
  ShareIcon,
  StarIcon,
  ThumbUpIcon,
} from '@heroicons/vue/solid'
import { BellIcon, FireIcon, HomeIcon, MenuIcon, TrendingUpIcon, UserGroupIcon, XIcon,ChevronDoubleLeftIcon , ChevronDoubleRightIcon } from '@heroicons/vue/outline'
import {ref,onMounted,inject} from "vue";

 
defineProps({
    urlLogo:String,
    data_transfer:Array,
    
})



</script>
<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout :urlLogo="urlLogo">

      <div class="mt-4">
            <ul  role="list" class="space-y-4">
              <li v-for="item in data_transfer.data" :key="item.id" class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg" >
                <article>
                  <div>
                    <div class="flex space-x-3">
                      <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" :src="'https://ui-avatars.com/api/?name='+item.name" alt="photo de profil" />
                      </div>
                      <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                          <strong v-if="item.user_id!==$page.props.auth.user.id" class="hover:underline">{{ item.name }}  {{ item.surname }}</strong>
                          <strong v-else class="hover:underline">Vous</strong>
                          
                        </p>
                        <p class="text-sm text-gray-500">
                          <strong  class="hover:underline">
                            <time>{{ item.created_at }}</time>
                          </strong>
                        </p>
                      </div>
                      <div class="flex-shrink-0 self-center flex">
                        <Menu as="div" class="relative inline-block text-left">
                          <div>
                            <MenuButton class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600">
                              <span class="sr-only">Option ouverture</span>
                              <DotsVerticalIcon class="h-5 w-5" aria-hidden="true" />
                            </MenuButton>
                          </div>

                          <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                              <div class="py-1">
                           
                                <MenuItem v-slot="{ active }">
                                  <Link :href="route('signal',item.id)" method="post" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                                    <FlagIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                                    <span>Signaler</span>
                                  </Link>
                               
                                </MenuItem>
                              </div>
                            </MenuItems>
                          </transition>
                        </Menu>
                      </div>
                    </div>
                    <h2 v-if="item.option==0" class="mt-4 text-base font-medium text-gray-900 break-words">
                      Je suis à {{item.city_selected}} au Maroc et je souhaite envoyer <strong>{{item.amount}} {{item.currency}}</strong> vers 
                      {{item.country_selected}} . <strong v-if="item.user_id!==$page.props.auth.user.id">Si vous  êtes intéressé , vous pouvez récupérer le numéro pour m'appeler en appuyant ici </strong> 
                      <Link  v-if="item.user_id!==$page.props.auth.user.id" :href="route('transfer.show.phone',item.id)"  class="inline-block ml-2 p-1 sm:p-3 bg-indigo-700 rounded-md drop-shadow-lg hover:bg-indigo-500 hover:bg-opacity-85 text-white transition duration-500 ease-linear">Récupérer</Link>
                      <br>
                       <hr class="my-2">
                      <div class="flex mt-2">
                       <p class="basis-1/3"> Direction : de Maroc </p>
                        <div class="basis-1/3 flex   direction_icon">
                           <ArrowNarrowRightIcon class="w-6 h-4 sm:w-8 sm:h-6 text-indigo-700 "/>
                        </div>
                        
                       <p class="basis-1/3">  {{item.country_selected}} </p>
                      </div>
                    
                    </h2>
                    <h2 v-if="item.option==1" class="mt-4 text-base font-medium text-gray-900 break-words">
                      Je suis à {{item.city_selected}}  et je dois reçevoir  <strong>{{item.amount}} {{item.currency}}</strong> au 
                      Maroc depuis {{item.country_selected}} . <strong v-if="item.user_id!==$page.props.auth.user.id">Si vous  êtes intéressé , vous pouvez récupérer le numéro pour m'appeler en appuyant ici </strong> 
                      <Link  v-if="item.user_id!==$page.props.auth.user.id" :href="route('transfer.show.phone',item.id)" class=" inline-block ml-2 p-1 sm:p-3 bg-indigo-700 rounded-md drop-shadow-lg hover:bg-indigo-500 hover:bg-opacity-85 text-white transition duration-500 ease-linear">Récupérer</Link>
                      <br>
                      <hr class="my-2">
                     <div class="flex mt-2">
                       <p class="basis-1/3"> Direction : de {{item.country_selected}} </p>
                        <div class="basis-1/3 flex direction_icon">
                           <ArrowNarrowRightIcon class="w-6 h-4 sm:w-8 sm:h-6 text-indigo-700 "/>
                        </div>
                       <p class="basis-1/3">  Maroc </p>
                      </div>
                    </h2>

                  </div>
                  <div class="mt-6 flex justify-between space-x-8">
 

                  </div>
                </article>
              </li>
              <!--paginate data_transfer -->
              <div  class="max-w-8xl mx-auto container py-10">
                  <ul  class="flex justify-center items-center w-full ">
                      <li v-for="(item, index) in data_transfer.links" :key="index">
                          <Link v-if="item.label.includes('Suivant') || item.label.includes('Previous')" :href="item.url" class="flex text-indigo-700 hover:bg-indigo-600 hover:text-white text-base leading-tight font-bold cursor-pointer shadow transition duration-150 ease-in-out mx-2 sm:mx-4 rounded px-3 py-2 focus:outline-none">
                              <ChevronDoubleRightIcon class="w-6 h-6 "/>
                              
                          </Link>
                          <Link v-else-if="item.label.includes('Précédent') || item.label.includes('Next') " :href="item.url"  class="flex text-indigo-700 hover:bg-indigo-600 hover:text-white text-base leading-tight font-bold cursor-pointer shadow transition duration-150 ease-in-out mx-2 sm:mx-4 rounded px-3 py-2 focus:outline-none">
                              <ChevronDoubleLeftIcon class="w-6 h-6 "/>
                          </Link>
                          <Link v-else :href="item.url" :class="{active_paginate:item.active}" class="flex text-indigo-700 hover:bg-indigo-600 hover:text-white text-base leading-tight font-bold cursor-pointer shadow transition duration-150 ease-in-out mx-2 sm:mx-4 rounded px-3 py-2 focus:outline-none">
                              {{item.label}} 
                          </Link>
                      </li>
                    
                  </ul>
              </div>
            </ul>

      </div>



    </BreezeAuthenticatedLayout>
</template>
<style scoped>
  .direction_icon{

    animation-name: animate_icon;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    justify-content: start;
  }
  @keyframes animate_icon {
      from{
        justify-content: start;
      };
      50%{
        justify-content:center;
      }
      to{  
        justify-content:end;
      }
  }

  /* paginate */

  .active_paginate{
      background-color:rgb(67 56 202);
      color: white;
  }

</style>
