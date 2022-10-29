<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps ({
      customer: Object,
})
</script>

<template>
    <Head title="Customer" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customer
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table table-zebra w-full">
                              <thead>
                                    <tr>
                                          <th>ID</th>
                                          <th>Nama</th>
                                          <th>Email</th>
                                          <th>Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr v-for="c in customer.data" :key="c.id">
                                          <td>{{ c.id }}</td>
                                          <td>{{ c.nama }}</td>
                                          <td>{{ c.email }}</td>
                                          <td>Edit | Delete</td>
                                    </tr>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
