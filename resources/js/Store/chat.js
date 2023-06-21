import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useChatStore = defineStore('chat', () => {
    const messages = ref([]);
    const errors = ref([]);
    const isLoading = ref(false);

    function addMessage(message) {
        messages.value.push(message);
    }

    function addError(error) {
        errors.value.push(error);
    }

    return {
        messages,
        errors,
        isLoading,
        addMessage,
        addError,
    };
});
