<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
import Pagination from "@/Components/Pagination.vue";
import debounce from "lodash/debounce";

const props = defineProps({
    customer: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {
        console.log("triggered");
        Inertia.get(
            "/customer",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300)
);
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
                        <input
                            v-model="search"
                            type="text"
                            placeholder="Search..."
                            class="border rounded mb-3"
                        />
                        <Link :href="route('customer.create')"
                            ><button class="btn btn-primary btn-sm">
                                Add New
                            </button></Link
                        >
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
                                    <td>
                                        <Link
                                            :href="route('customer.edit', c.id)"
                                            class="btn btn-warning btn-sm mr-1"
                                            >Edit</Link
                                        >
                                        <Link
                                            :href="
                                                route('customer.destroy', c.id)
                                            "
                                            method="delete"
                                            class="btn btn-error btn-sm"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination
                            :pagination="props.customer"
                            class="mt-10"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
