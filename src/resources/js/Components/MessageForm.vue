<script setup>
import TextInput from "@/Components/TextInput.vue"
import InputLabel from "@/Components/InputLabel.vue"
import InputError from "@/Components/InputError.vue"
import TextArea from "@/Components/TextArea.vue"
import PrimaryButton from "@/Components/PrimaryButton.vue"
import FileInput from "@/Components/FileInput.vue"

import { useForm } from "@inertiajs/vue3"

const form = useForm({
    recipientEmail: null,
    recipientName: null,
    subject: null,
    text: null,
    attachment: null,
})

defineProps({
    title: String,
})

const sendMessage = () => {
    form.post(route("mail.send"), {
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
                for="recipientEmail"
                value="Recipient's Email"
            />

            <TextInput
                id="recipientEmail"
                type="email"
                placeholder="johnny@myapp.com"
                class="mt-1 block w-full"
                v-model="form.recipientEmail"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.recipientEmail"
            />
        </div>

        <div class="mt-6">
            <InputLabel
                for="recipientName"
                value="Recipient's Name"
            />

            <TextInput
                id="recipientName"
                type="text"
                placeholder="Johnny"
                class="mt-1 block w-full"
                v-model="form.recipientName"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.recipientName"
            />
        </div>

        <div class="mt-4">
            <InputLabel
                for="subject"
                value="Subject"
            />

            <TextInput
                id="recipient"
                type="text"
                placeholder="Hello Johnny!"
                class="mt-1 block w-full"
                v-model="form.subject"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.subject"
            />
        </div>

        <div class="mt-4">
            <InputLabel
                for="text"
                value="Message"
            />

            <TextArea
                id="text"
                placeholder="This is my message for you."
                class="mt-1 block w-full"
                v-model="form.text"
                required
            />

            <InputError
                class="mt-2"
                :message="form.errors.text"
            />
        </div>

        <div
            class="mt-4"
            v-if="$page.props.auth.user.can.attachFiles"
        >
            <InputLabel
                for="file"
                value="Attach file"
            />

            <FileInput
                id="attachment"
                @input="form.attachment = $event.target.files[0]"
            ></FileInput>
        </div>

        <div class="mt-6">
            <PrimaryButton
                @click.prevent="sendMessage"
                :disabled="form.processing"
            >
                Send E-Mail
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
