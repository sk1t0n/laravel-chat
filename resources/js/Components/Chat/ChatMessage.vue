<script setup>
import { computed } from 'vue';

const props = defineProps({
    currentUser: {
        type: Object,
        required: true
    },
    message: {
        type: Object,
        required: true
    }
});

const isCurrentUser = computed(() => {
    return props.currentUser.name === props.message.user.name;
});
</script>

<template>
    <div class="chat-message">
        <div class="flex items-end" :class="{ 'justify-end': !isCurrentUser }">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2" :class="{
                'order-2': isCurrentUser,
                'items-start': isCurrentUser,
                'order-1': !isCurrentUser,
                'items-end': !isCurrentUser
            }">
                <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none" :class="{
                    'bg-gray-300': isCurrentUser,
                    'text-gray-600': isCurrentUser,
                    'bg-blue-600': !isCurrentUser,
                    'text-white': !isCurrentUser
                }">{{ message.message }}</span>
            </div>
        </div>
    </div>
</template>
