<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps(
    {
        people: Object
    }
)

const form = useForm(props.people);

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        form.delete(route('people.destroy', id))
    }
}

let search = ref('');

watch(search, value => {
    router.get('/people', { search: value }, { preserveState: true });
});

const resetSearch = () => {
    search.value = '';
};
</script>

<template>
    <Head title="Index of People" />
    <div>
        <Link :href="route('home')">Home</Link>
    </div>
    <div>
        <Link :href="route('people.create')">Add Person</Link>
    </div>
    <div>
        <input type="text" placeholder="Search..." v-model="search">
        <button @click="resetSearch">Reset</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="person in people" :key="person.id">
                <tr>
                    <td>{{ person.id }}</td>
                    <td>{{ person.first_name }}</td>
                    <td>{{ person.middle_name }}</td>
                    <td>{{ person.last_name }}</td>
                    <td>{{ person.phone_no }}</td>
                    <td>{{ person.email }}</td>
                    <td>
                        <Link :href="route('people.edit', person.id)">Edit</Link>
                    </td>
                    <td><button @click="destroy(person.id)">Delete</button></td>
                </tr>
            </template>
        </tbody>
    </table>
</template>


