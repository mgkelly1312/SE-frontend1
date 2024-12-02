<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        professor: Object
    }
)

const form = useForm({
    person_id: '',
    salary: '',
});
</script>

<template>
    <Head title="Add a Professor" />
    <form action="" @submit.prevent="form.post(route('professors.store'))">
        <div>
            <label for="person_id">Person ID</label>
            <input type="text" name="person_id" id="person_id" v-model="form.person_id" placeholder="1">
        </div>
        <div>
            <label for="salary">Student Number</label>
            <input type="text" name="salary" id="salary" v-model="form.salary" placeholder="12000">
        </div>
        <button type="submit" :disabled="form.processing">
            Create
        </button>
        <Link :href="route('professors.index')">Go Back</Link>
    </form>
</template>


