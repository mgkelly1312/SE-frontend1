<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps(
    {
        barangay: Object
    }
)

const form = useForm(props.barangay);
</script>

<template>
    <Head title="Add a Barangay" />
    <form action="" @submit.prevent="form.put(route('barangays.update', barangay.id))">
        <div>
            <label for="barangay_name">Barangay Name</label>
            <input type="text" name="barangay_name" id="barangay_name" v-model="form.name" placeholder="Baliwasan">
        </div>
        <button type="submit" :disabled="form.processing">
            Update
        </button>
        <Link :href="route('barangays.index')">Go Back</Link>
    </form>
</template>


