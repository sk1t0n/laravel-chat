export const scrollMessages = () => {
    const messages = document.getElementById('messages');

    setTimeout(() => {
        messages.scroll({
            top: messages.scrollHeight,
            behavior: 'smooth',
        });
    });
};
