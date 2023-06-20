<script setup>
import { reactive } from 'vue';
import axios from 'axios';
import { useChatStore } from '@/Store/chat';
import { scrollMessages } from '@/Helpers/messages';

const form = reactive({
    message: ''
});

const store = useChatStore();

async function addMessage() {
    try {
        store.errors = [];

        const response = await axios.post(route('chat.addMessage'), form);
        store.addMessage(response.data);

        scrollMessages();
    } catch (e) {
        store.addError(e.response.data.message);
    } finally {
        form.message = '';
    }
}
</script>

<template>
    <div v-if="store.errors" class="text-red-500 py-4">
        <template v-for="(message, key) in store.errors" :key="key">
            <span>{{ message }}</span>
        </template>
    </div>
    <div class="relative flex">
        <input v-model="form.message" type="text" :placeholder="$t('Write your message')"
            class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-4 bg-gray-200 rounded-md py-3"
            @keyup.enter="addMessage">
        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button type="button" @click="addMessage"
                class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                <span class="font-bold">{{ $t('Send') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="h-6 w-6 ml-2 transform rotate-90">
                    <path
                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</template>
