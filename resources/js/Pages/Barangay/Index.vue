<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps(
    {
        barangay: Object
    }
)

const form = useForm(props.barangay);

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        form.delete(route('barangays.destroy', id))
    }
}

let search = ref('');

watch(search, value => {
    router.get('/barangays', { search: value }, { preserveState: true });
});

const resetSearch = () => {
    search.value = '';
};
</script>

<template>
    <Head title="Index of Barangays" />
    <div>
        <Link :href="route('home')">Home</Link>
    </div>
    <div>
        <Link :href="route('barangays.create')">Add Barangay</Link>
    </div>
    <div>
        <input type="text" placeholder="Search..." v-model="search">
        <button @click="resetSearch">Reset</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="barangay in barangay" :key="barangay.id">
                <tr>
                    <td>{{ barangay.id }}</td>
                    <td>{{ barangay.name }}</td>
                    <td>
                        <Link :href="route('barangays.edit', barangay.id)">Edit</Link>
                    </td>
                    <td><button @click="destroy(barangay.id)">Delete</button></td>
                </tr>
            </template>
        </tbody>
    </table>
</template>


