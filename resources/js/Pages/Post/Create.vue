<script setup>

import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import { Link, Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

const form = reactive({
    title: '',
    content: ''
})

function submit() {
    router.post('/posts', form)
}

defineOptions({ layout: MainLayout })

</script>

<template>

    <Head title="Create" />

    <h1 class="mb-2">Create</h1>
    <form @submit.prevent="submit">
        <div class="mb-4">
            <input type="text" name="title" placeholder="Title" class="rounded-full w-full border-gray-500" v-model="form.title">
        </div>
        <div class="mb-4">
            <textarea placeholder="Content" name="content" class="rounded-full w-full border-gray-500" v-model="form.content">

            </textarea>
        </div>
        <div>
            <button type="submit" class="hover:bg-white hover:text-sky-500 border border-sky-500 block mx-auto text-white bg-sky-500 w-32 rounded-full p-2">Store</button>
        </div>
    </form>
    <div class="text-center pt-2">
        <Link :href="route('posts.index')" class="text-sky-500">
            Index
        </Link>
    </div>

</template>

<style scoped>

</style>
