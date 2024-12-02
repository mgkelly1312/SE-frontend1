<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
</script>
<template>
    <div>
        Welcome
        <ul>
            <li>
                <Link :href="route('people.index')">
                People
                </Link>
            </li>
            <li>
                <Link :href="route('barangays.index')">
                Barangays
                </Link>
            </li>
            <li>
                <Link :href="route('address.index')">
                Addresses
                </Link>
            </li>
            <li>
                <Link :href="route('students.index')">
                Students
                </Link>
            </li>
            <li>
                <Link :href="route('professors.index')">
                Professors
                </Link>
            </li>
        </ul>
    </div>
</template>
