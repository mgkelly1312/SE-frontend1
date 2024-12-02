<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap";


const props = defineProps(
    {
        address: Object
    }
)

const form = useForm(props.address);

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        form.delete(route('address.destroy', id))
    }
}

let search = ref('');

watch(search, value => {
    router.get('/address', { search: value }, { preserveState: true });
});

const resetSearch = () => {
    search.value = '';
};
</script>

<template>
    <Head title="Index of Addresses" />
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <Link :href="route('home')"  :class="{ 'no-decoration': true }"><a class="navbar-brand" style="color: rgb(255, 238, 238)"> <i class="bi bi-house-fill"></i> Home</a></Link>
            
        </div>
    </nav>
    <body >
    <div class="buttons">
        <button type="button" class="btn btn-primary add-btn m-3">
            <Link
                style="color: white"
                :class="{ 'no-decoration': true }"
                :href="route('address.create')"
                >Add Masterlist</Link
            >
        </button>
        
        <div class="d-flex justify-content-center">
        <div class=" d-flex sbar-custom w-100">
            <input
                class="form-control me-3 w-50 rounded-pill mx-5"
                type="search"
                placeholder="Search for Client"
                aria-label="Search"
                v-model="search"
            />
            <div class="dropdown mx-3">
                <a class="btn btn-secondary dropdown-toggle rounded-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   All Status
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle rounded-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        All Types
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="space">

    </div>
    <div class="d-flex justify-content-center">
    <table class="table table-bordered text-center rounded-4 custom-table">
        <thead>
            <tr>
                <th scope="col">Client Number</th>
                <th scope="col">Fullname</th>
                <th scope="col">Spouse Name</th>
                <th scope="col">Number of Household</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="address in address" :key="address.id">
                <tr >
                    <td>{{ address.id }}</td>
                    <td>{{ address.person.first_name + ' ' + address.person.last_name }} </td>
                    <td>{{ address.person.first_name + ' ' + address.person.last_name }} </td>
                    <td>{{ address.city }}</td>
                    <td>{{ address.street }}</td>
                    
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                           
                            <button type="button" class="bi bi-trash custom-icon1" @click="destroy(address.id)"></button>
                        </div>
                     </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end pnav-custom">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<v-img
  :width="300"
  aspect-ratio="16/9"
  cover
  src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
></v-img>
</body>
</template>


<style>
  /* Customize the icon size */
  .custom-icon {
    font-size: 1.5rem; /* Adjust the size as needed */
  }

  .custom-icon1 {
    font-size: 1.5rem; /* Adjust the size as needed */
    color: red;
    margin-left: 10%;
  }

  .space{
    height: 20px;
  }

 .custom-table{
    width: 90%;
    
 } 
.sbar-custom{
    margin-left: 2%;
}
body{
    background-color: #DADADA;
}

.pnav-custom{
    margin-right: 5%;
}

</style>