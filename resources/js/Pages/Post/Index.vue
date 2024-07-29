<script setup>

import {Head, Link, router} from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import {computed, reactive} from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineOptions({ layout: MainLayout })

const posts = computed(() => usePage().props.posts);

function submit(id) {
    router.delete(route('posts.destroy', id))
}

</script>

<template>

    <Head
        title="Posts"
    />

    <h1 class="text-center text-lg mb-5">Posts</h1>
    <div class="mb-8">
        <Link :href="route('posts.create')" class="hover:bg-white hover:text-sky-500 border border-sky-500 block mx-auto text-center text-white p-2 w-32 bg-sky-500 rounded-full">
            Add post
        </Link>
    </div>
    <div v-if="posts">
        <div v-for="post in posts" class="border-t border-gray-500 mb-6 text-sky-500">
            <h3>{{ post.title }}</h3>
            <p>{{ post.content }}</p>
            <Link :href="route('posts.show', post.id)" class="hover:text-green-500 text-red-700 block text-right">
                Show
            </Link>
            <Link :href="route('posts.edit', post.id)" class="hover:text-green-500 text-red-700 block text-right">
                Edit
            </Link>
            <form @submit.prevent="submit(post.id)">
                <button class="hover:text-green-500 text-red-700 block ml-auto" type="submit">Delete</button>
            </form>
            <p class="text-right">{{ post.date }}</p>
        </div>
    </div>

</template>

<style scoped>

</style>
