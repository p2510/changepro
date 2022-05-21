
<template>
  <Head title="Mes transferts" />
  <BreezeAuthenticatedLayout :urlLogo="urlLogo">
    <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <Card v-for="(item, index) in data_transfer" :key="index" :id="item.id" :option="item.option" :country_fixed="item.country_fixed" :country_selected="item.country_selected" :amount="item.amount" :currency="item.currency"/>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script >
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Card from '@/Components/Card.vue'
import { defineComponent } from 'vue'
export default defineComponent({
    components:{
        BreezeAuthenticatedLayout,
        Head, 
        Card
    },
    props:{
        urlLogo:String,
        SuccessfulTransfer:{type:String}, //message where user add transfer 
        data_transfer:{type:Array}
    },

    inject : ["$swal"],

    data() {
        return {
            defineSwal:this.$swal,
            show: null
        }
    },
  mounted(){
      
      if (this.SuccessfulTransfer) {
         this.defineSwal.fire(
            'Félicitation',
            'Votre transfert a été publié!',
            'Fermer'
        );
      }
    
  }
 


})
</script>

<style>
.checkbox:checked + .check-icon {
    display: flex;
}
</style>  