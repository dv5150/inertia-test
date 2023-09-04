<script setup>
import TextInput from "@/Components/TextInput.vue"
import InputLabel from "@/Components/InputLabel.vue"
import InputError from "@/Components/InputError.vue"
import PrimaryButton from "@/Components/PrimaryButton.vue"

import { useForm } from "@inertiajs/vue3"

const form = useForm({
    name: null,
    email: null,
    password: null,
    passwordConfirmation: null,
})

defineProps({
    title: String,
})

const createUser = () => {
    form.post(route("users.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
        },
    })
}
</script>

<template>
    <div class="p-6 text-gray-900">
        <h1 class="text-2xl">
            {{ title }}
        </h1>

        <div class="mt-6">
            <InputLabel
                for="name"
                value="Name"
            />

            <TextInput
                id="name"
                type="text"
                placeholder="Johnny"
                class="mt-1 block w-full"
                v-model="form.name"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.name"
            />
        </div>

        <div class="mt-6">
            <InputLabel
                for="email"
                value="E-Mail"
            />

            <TextInput
                id="email"
                type="email"
                placeholder="johnny@myapp.com"
                class="mt-1 block w-full"
                v-model="form.email"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.email"
            />
        </div>

        <div class="mt-6">
            <InputLabel
                for="password"
                value="Password"
            />

            <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.password"
            />
        </div>

        <div class="mt-6">
            <InputLabel
                for="password_confirmation"
                value="Password Confirmation"
            />

            <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.passwordConfirmation"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.passwordConfirmation"
            />
        </div>

        <div class="mt-6">
            <PrimaryButton
                @click.prevent="createUser"
                :disabled="form.processing"
            >
                Create
            </PrimaryButton>
        </div>

        <div
            class="mt-6"
            v-if="$page.props.flash.success"
        >
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert"
            >
                <strong class="font-bold">Success!</strong>&nbsp;
                <span class="block sm:inline">{{ $page.props.flash.success }}</span>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
