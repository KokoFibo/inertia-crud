<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

let form = useForm ({
      nama: '',
      email: '',
});


let submit =  () => {
      form.post('/customer');
};




</script>

<template>
    <Head title="Add Customer" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Customer
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <form @submit.prevent="submit" class="mx-auto">
                            <div class="form-control w-full max-w-xs mt-5">
                                <label class="label">
                                    <span class="label-text">Nama</span>
                                </label>
                                <input
                                v-model="form.nama"
                                    type="text"
                                    placeholder="Fullname"
                                    class="input input-bordered w-full max-w-xs rounded-lg"
                                />
                            </div>
                            <div v-if="form.errors.nama" v-text="form.errors.nama" class="text-red-500 text-xs mt-1"></div>

                            <div class="form-control w-full max-w-xs mt-5">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input
                                v-model="form.email"

                                    type="text"
                                    placeholder="nama@companyname.com"
                                    class="input input-bordered w-full max-w-xs rounded-lg"
                                />
                            </div>
                            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>

                            <div class="mt-5 ">

                                  <button type="submit" class="btn btn-success" :disabled="form.processing">Save</button>
                                  <Link href="/customer"><button class="btn btn-primary btn-sm">Back</button></Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
