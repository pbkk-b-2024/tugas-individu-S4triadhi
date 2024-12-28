<template>
    <Frontend>
        <Head title="Home Page" />
         
        <h1>This is Home Page</h1>

        <!-- Button to see all products -->
        <div class="mt-4">
            <Link :href="route('products.index')" class="bg-blue-500 text-white py-2 px-4 rounded shadow">
                See All Products
            </Link>
        </div>
    </Frontend>
</template>

<script setup>
import Frontend from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from '@inertiajs/vue3'; // Import Link from Inertia
</script>
