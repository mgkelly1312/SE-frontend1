<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';


const props = defineProps(
    {
        professor: Object
    }
)

const form = useForm(props.professor);

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        form.delete(route('professors.destroy', id))
    }
}

let search = ref('');

watch(search, value => {
    router.get('/professors', { search: value }, { preserveState: true });
});

const resetSearch = () => {
    search.value = '';
};
</script>

<template>
    <Head title="Index of Professors" />
    <div>
        <Link :href="route('home')">Home</Link>
    </div>
    
    <img src="/img/cityhall.png" class="img2" alt="">
    
</template>


<style>

</style>
