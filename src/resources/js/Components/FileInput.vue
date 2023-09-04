<script setup>
import { onMounted, ref } from "vue"

const input = ref(null)

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus()
    }
})

defineExpose({ focus: () => input.value.focus() })
</script>

<template>
    <input
        type="file"
        ref="input"
        class="block w-full text-sm bg-gray-100 file:bg-gray-100 text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:border-gray-500 file:text-sm file:font-semibold file:text-black"
    />
</template>
