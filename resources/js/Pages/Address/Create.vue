<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        address: Object
    }
)

const form = useForm({
    street: '',
    city:'',
    barangay_id:'',
    person_id:'',
});
</script>

<template>
    <Head title="Add an Address" />
    <form class="d-flex justify-center align-items-center mt-5" action="" @submit.prevent="form.post(route('address.store'))">
        <div class="border">
    <div class="d-flex justify-content-center align-items-center">
        <div class="mb-3 w-100 ">
        <label class="form-label "><h3>Add an Address</h3></label>
        </div>
    </div>

        <div class="mb-1 w-100 p-2">
        <label for="street" class="form-label "> Type</label>
        <input type="text" name="street" class="form-control" id="street" v-model="form.street" placeholder="">
        </div>
         
        <div class="mb-1 w-100 p-2">
        <label for="city" class="form-label "> Number of Household</label>
        <input type="text"  name="city" class="form-control" id="city" v-model="form.city" placeholder="">
        </div>

        <div class="mb-1 w-100 p-2">
        <label for="barangay_id" class="form-label "> Barangay ID </label>
        <input type="text" name="barangay_id" class="form-control" id="barangay_id" v-model="form.barangay_id" placeholder="">
        </div>
        <div class="mb-1 w-100 p-2">
        <label for="person_id" class="form-label "> Person ID </label>
        <input type="text"  class="form-control" name="person_id" id="person_id" v-model="form.person_id" placeholder="">
        </div>
    
    <div class=" d-flex justify-content-center align-items-center">
  <button type="submit" class="btn btn-primary mx-3" :disabled="form.processing">Create</button>
  
  <Link :href="route('address.index')"><button buttontype="button" class="btn btn-secondary mx-3">Go Back</button></Link>
</div>     

</div>
    </form>
</template>



<style>
.border{
    border: solid rgb(12, 12, 12);
    width: 450px;
    display: flex;
    height: 600px;
    flex-direction: column;
    align-items: center;
    border-radius: 5px;
}

</style>