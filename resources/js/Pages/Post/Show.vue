<script setup>

import { Head, Link } from "@inertiajs/vue3";
import { usePage} from "@inertiajs/vue3";
import { computed } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";

const post = computed(() => usePage().props.post)

defineOptions({ layout: MainLayout })

</script>

<template>

    <Head
        title="Post"
    />

    <h1 class="text-center text-lg mb-5">Post</h1>
    <Link :href="route('posts.index')" class="hover:text-sky-500 text-green-700 block text-right">
        Back
    </Link>
    <div v-if="post">
        <div class="border-t border-gray-500 mb-6 text-red-500">
            <h3><span class="text-black">Title:</span> {{ post.title }}</h3>
            <p><span class="text-black">Content:</span> {{ post.content }}</p>
            <p class="text-right">{{ post.date }}</p>
        </div>
    </div>

</template>

<style scoped>

</style>
