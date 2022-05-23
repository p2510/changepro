
<script>
import { ref} from 'vue';
import { Link , useForm } from '@inertiajs/inertia-vue3';
import BreezeNavLink from '@/Components/NavLink.vue';
import { Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
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
import { BellIcon, FireIcon, HomeIcon, MenuIcon, TrendingUpIcon, UserGroupIcon, XIcon } from '@heroicons/vue/outline'

const user = {
  imageUrl:"https://ui-avatars.com/api/?name=",
}
const navigation = [
  { name: 'Dashboard',link:'dashboard', href:'/dashboard', icon: HomeIcon},
  { name: 'Créer un transfert',link:'transfer.create', href:'/transfer/create', icon: FireIcon},
  { name: 'Fonctionnement',link:'working', href: '/working', icon: UserGroupIcon},
  { name: 'Recharge',link:'recharge', href: '/recharge', icon: TrendingUpIcon},
]


const userNavigation = [
  { name: 'Me deconnecter', href: '/logout', method:'POST' },
]

const tabs = [
  { name: 'Récent', href: '#', current: true },
  { name: 'Intéressant', href: '#', current: false },
  { name: 'Proche de vous', href: '#', current: false },
]
let f1=useForm({
      search:ref(null)
})

// searching form 
let searching = ()=>{
       f1.get(route('transfer.search'))
}


export default {
  components: {
    Link,
    BreezeNavLink,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
    PopoverButton,
    PopoverPanel,
    BellIcon,
    ChatAltIcon,
    CodeIcon,
    DotsVerticalIcon,
    EyeIcon,
    FlagIcon,
    MenuIcon,
    PlusIcon,
    SearchIcon,
    ShareIcon,
    StarIcon,
    ThumbUpIcon,
    XIcon,
  },
  props:{
     urlLogo:String,
     auth:Array
   },
  setup() {
    return {
      user,
      navigation,
      userNavigation,
      f1,
      searching 
      
    }
  },
}
</script>
<template>
  <div class="relative min-h-screen bg-gray-100">
    <!-- When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars -->
    <Popover as="template" v-slot="{ open }">
      <header :class="[open ? 'fixed inset-0 z-40 overflow-y-auto' : '', 'bg-white shadow-sm lg:static lg:overflow-y-visible']">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
            
            <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
              <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                <div class="w-full">
                  <label for="search" class="sr-only">Recherche</label>
                  <form @Submit.prevent="searching"   class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                      <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </div>
                    <div class="flex gap-x-2 ">
                        <input v-model="f1.search" id="search" name="search" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="montant , villes , pays ,Dévises" type="search" />
                        <input type="submit" class="cursor-pointer bg-indigo-700 text-white rounded-md hover:text-indio-600 hover:bg-white hover:text-indigo-600 hover:outline  :hover:outline-indigo-600 transition duration-500 ease-in-out p-1 sm:p-2 md:p-3 " value="Rechercher">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
              <!-- Mobile menu button -->
              <PopoverButton class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <MenuIcon v-if="!open" class="block h-6 w-6" />
                <XIcon v-else class="block h-6 w-6" />
              </PopoverButton>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
           
              <!-- Profile dropdown -->
              <Menu as="div" class="flex-shrink-0 relative ml-5">
                <div>
                  <MenuButton class="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    
                    <img class="h-8 w-8 rounded-full" :src="user.imageUrl+$page.props.auth.user.name" alt="photo" />{{$page.props.auth.user.name }}
                  </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                  <MenuItems class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none">
                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                      <Link :method="item.method" :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block py-2 px-4 text-sm text-gray-700']">{{ item.name }}</Link>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>

              <Link href="/transfer" class="ml-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Mes tranferts
              </Link>
            </div>
          </div>
        </div>

        <PopoverPanel as="nav" class="lg:hidden" aria-label="Global">
          <div class="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4">
            <BreezeNavLink v-for="item in navigation"  :key="item.name" :href="item.href"  :active="route().current(item.link)">
                <component :is="item.icon" :class="[item.current ? 'text-white' : 'text-white group-hover:text-white', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']"  />
                <span class="truncate">
                  {{ item.name }}
                </span>
            </BreezeNavLink>
            <Link href="/transfer" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Mes tranferts
            </Link>
          </div>
          <div class="border-t border-gray-200 pt-4 pb-3">
            <div class="max-w-3xl mx-auto px-4 flex items-center sm:px-6">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" :src="user.imageUrl+$page.props.auth.user.name" alt="Photo de profil" />
              </div>
              <div class="ml-3">
                <div class="text-base font-medium text-gray-800">{{  $page.props.auth.user.name }}</div>
                <div class="text-sm font-medium text-gray-500">{{  $page.props.auth.user.email }}</div>
              </div>
            </div>
            <div class="mt-3 max-w-3xl mx-auto px-2 space-y-1 sm:px-4">
              <Link :method="item.method" v-for="item in userNavigation" :key="item.name" :href="item.href" class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">{{ item.name }}</Link>
            </div>
          </div>
        </PopoverPanel>
      </header>
    </Popover>

    <div class="py-10">
      <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
          <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
            <div class="pb-8 space-y-1">
              <BreezeNavLink v-for="item in navigation" :key="item.name" :href="item.href"  :active="route().current(item.link)">
                <component :is="item.icon" :class="[item.current ? 'text-white' : 'text-white group-hover:text-white', 'flex-shrink-0 -ml-1 mr-3 h-6 w-6']"  />
                <span class="truncate">
                  {{ item.name }}
                </span>
              </BreezeNavLink>
            </div>
    
          </nav>
        </div>
        <!-- Page Content -->
        <main class="lg:col-span-9 xl:col-span-10">
             <slot />
        </main>
     
      </div>
    </div>
  </div>
</template>
