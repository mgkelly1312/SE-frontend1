<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        student: Object
    }
)

const form = useForm({
    person_id: '',
    student_number: '',
});
</script>

<template>
    <Head title="Add a Student" />
    <form action="" @submit.prevent="form.post(route('students.store'))">
        <div>
            <label for="person_id">Person ID</label>
            <input type="text" name="person_id" id="person_id" v-model="form.person_id" placeholder="1">
        </div>
        <div>
            <label for="student_number">Student Number</label>
            <input type="text" name="student_number" id="student_number" v-model="form.student_number" placeholder="202301738">
        </div>
        <button type="submit" :disabled="form.processing">
            Create
        </button>
        <Link :href="route('students.index')">Go Back</Link>
    </form>
</template>


