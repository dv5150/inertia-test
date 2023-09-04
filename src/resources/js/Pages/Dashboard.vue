<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head } from "@inertiajs/vue3"
import MessageForm from "@/Components/MessageForm.vue"
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <MessageForm :title="'Send a message'"></MessageForm>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
