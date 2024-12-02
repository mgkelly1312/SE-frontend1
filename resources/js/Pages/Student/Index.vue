<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps(
    {
        student: Object
    }
)

const form = useForm(props.student);

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        form.delete(route('students.destroy', id))
    }
}

let search = ref('');

watch(search, value => {
    router.get('/students', { search: value }, { preserveState: true });
});

const resetSearch = () => {
    search.value = '';
};
</script>

<template>
    <Head title="Index of Students" />
    <div>
        <Link :href="route('home')">Home</Link>
    </div>
    <div>
        <Link :href="route('students.create')">Add Student</Link>
    </div>
    <div>
        <input type="text" placeholder="Search..." v-model="search">
        <button @click="resetSearch">Reset</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Person ID</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="student in student" :key="student.id">
                <tr>
                    <td>{{ student.id }}</td>
                    <td>{{ student.person_id }}</td>
                    <td>{{ student.student_number }}</td>
                    <td>{{ student.person.last_name + ', ' + student.person.first_name }}</td>
                    <td>
                        <Link :href="route('students.edit', student.id)">Edit</Link>
                    </td>
                    <td><button @click="destroy(student.id)">Delete</button></td>
                </tr>
            </template>
        </tbody>
    </table>
</template>


