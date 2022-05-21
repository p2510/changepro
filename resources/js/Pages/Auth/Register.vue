<script setup>
import { ref, onMounted } from 'vue'
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import {countries} from './../../Exports/countries'
import {cities} from './../../Exports/cities'

const form = useForm({
    name: '',
    surname: '',
    native_country:'Côte d\'ivoire',
    city:'Casablanca',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});
defineProps({
     urlLogo:String
})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <BreezeGuestLayout :urlLogo="urlLogo">
        <Head title="Inscription" />
        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="name" value="Votre nom" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <BreezeLabel for="surname" value="Votre prénom" />
                <BreezeInput id="surname" type="text" class="mt-1 block w-full" v-model="form.surname" required autofocus autocomplete="surname" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="native_country" value="Votre pays d'origine" />
                <select name="native_country" id="native_country" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"   v-model="form.native_country" required autofocus autocomplete="native_country">
                    <option v-for="(country, index) in countries" :key="index" :value="country">{{country}}</option>
                </select>
     
            </div>

            <div class="mt-4">
                <BreezeLabel for="city" value="Où vivez vous au maroc ?" />
                <select name="city" id="city" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"   v-model="form.city" required autofocus autocomplete="city">
                    <option v-for="(city, index) in cities" :key="index" :value="city">{{city}}</option>
                </select>
     
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Mot de passe" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirmation mot de passe" />
                <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Vous avez un compte ?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Créer mon compte
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
