<script setup>
import { Head } from '@inertiajs/vue3';
import ChatMessage from '@/Components/Chat/ChatMessage.vue';
import ChatForm from '@/Components/Chat/ChatForm.vue';

defineProps({
    currentUser: {
        type: Object,
        required: true
    },
    messages: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Chat" />

    <main>
        <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
            <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                <div class="relative flex items-center space-x-4">
                    <div class="flex flex-col leading-tight">
                        <div class="text-2xl mt-1 flex items-center">
                            <span class="text-gray-700 mr-3">{{ currentUser.name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="messages"
                class="flex flex-1 flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                <template v-for="(message, index) in messages" :key="index">
                    <ChatMessage :currentUser="currentUser" :message="message" />
                </template>
            </div>
            <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                <ChatForm />
            </div>
        </div>
    </main>
</template>
