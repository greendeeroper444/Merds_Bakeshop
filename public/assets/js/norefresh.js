import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
    // Add additional configuration options based on your WebSocket server setup
});

document.addEventListener('livewire:load', function () {
    window.Echo.private(`App.Models.Comment.${commentId}`)
        .listen('.comment.updated', (event) => {
            Livewire.find('component-selector').wire.refresh();
        });
});
