require('./bootstrap');
window.Vue = require('vue');

Vue.component('chat-messages', require('./components/ChatMessages.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    methods: {

        addMessage(message, receiver) {

            axios.post('/laravel_chat/public/messages', message, receiver).then(response => {
              console.log(response.data);
            });

        }
    }
});