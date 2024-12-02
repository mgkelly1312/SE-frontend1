<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        people: Object
    }
)

const form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    phone_no: '',
    email: '',
});
</script>

<template>
    <Head title="Add a Person" />
    <form action="" @submit.prevent="form.post(route('people.store'))">
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" v-model="form.first_name" placeholder="John">
        </div>
        <div>
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" v-model="form.middle_name" placeholder="Dela">
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" v-model="form.last_name" placeholder="Doe">
        </div>
        <div>
            <label for="phone_no">Phone Number</label>
            <input type="text" name="phone_no" id="phone_no" v-model="form.phone_no" placeholder="42-42-564">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" v-model="form.email" placeholder="sample@sample.com">
        </div>
        <button type="submit" :disabled="form.processing">
            Create
        </button>
        <Link :href="route('people.index')">Go Back</Link>
    </form>
</template>


