<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        address: Object
    }
)

const form = useForm(props.address);

</script>

<template>
    <Head title="Add an Address" />
    <form action="" @submit.prevent="form.put(route('address.update', address.id))">
        <div>
            <label for="street">Type</label>
            <input type="text" name="street" id="street" v-model="form.street" placeholder="Chico">
        </div>
        <div>
            <label for="city">Number of Household</label>
            <input type="text" name="city" id="city" v-model="form.city" placeholder="Zamboanga">
        </div>
        <div>
            <label for="barangay_id">Barangay ID</label>
            <input type="text" name="barangay_id" id="barangay_id" v-model="form.barangay_id" placeholder="1">
        </div>
        <div>
            <label for="person_id">Person ID</label>
            <input type="text" name="person_id" id="person_id" v-model="form.person_id" placeholder="Jason">
        </div>
        <button type="submit" :disabled="form.processing">
            Create
        </button>
        <Link :href="route('address.index')">Go Back</Link>
    </form>
</template>


