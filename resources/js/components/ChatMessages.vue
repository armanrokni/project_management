<template>
    <div>
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                            <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
                    </div>
                </div>
                <div class="inbox_chat">
                    <div @click="fetchMessages(AUser.id)" v-for="AUser in users" class="chat_list " :class="{ active_chat : isActive == AUser.id }">
                        <div class="chat_people">
                            <div class="chat_img" v-if="AUser.status" style="border: 2px solid green;border-radius:1000px"> <img v-bind:src="AUser.avatar" v-bind:alt="AUser.name" style="border-radius: 300px;"> </div>
                            <div class="chat_img" v-else style="border: 2px red solid;border-radius: 10000px;"> <img v-bind:src="AUser.avatar" v-bind:alt="AUser.name" style="border-radius: 300px;"> </div>
                            <div class="chat_ib">
                                <h5>{{ AUser.name }} <span class="chat_date">Dec 25</span></h5>
                                <div class="pull-right" v-if="AUser.unseen != 0" style="font-size: 10px;padding: 1px 8px;background-color: #89DA59;color: white;border-radius: 1000px;margin-bottom: 3px;" >{{ AUser.unseen }}</div>
                                <p v-if="AUser.last_message != ''">{{ AUser.last_message }}</p>
                                <p v-else style="color: #1956f3">No Messages Yet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history" id="ss">
                    <div class="incoming_msg" id="sst" >
                        <div v-for="message in messages">
                            <div v-if="message.user.id != user.id">
                                <div class="outgoing_msg">
                                    <div class="received_withd_msg">
                                        <p>{{ message.message }}</p>
                                        <span class="time_date"> {{ message.created_at }} </span></div>
                                </div>
                            </div>
                            <div v-else>
                                <div class="received_msg">
                                    <div class="sent_msg">
                                        <p>{{ message.message }}</p>
                                        <span class="time_date"> {{ message.created_at }} </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" v-model="newMessage" placeholder="Type a message" @keyup.enter="sendMessage" />
                        <button class="msg_send_btn" @click="sendMessage" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                messages: [],
                receiver: '',
                newMessage: '',
                users: [],
                isActive: 0
            }
        },

        created() {

            Echo.join('chat')
                .joining((user) => {

                    axios.post('/laravel_chat/public/user/'+ user.id + '/online', {}).then(response => {
                        for(var Au in this.users) {
                            if(this.users[Au].id == user.id)
                            {
                                this.users[Au].status = 1;
                            }
                        }
                    });

                })
                .leaving((user) => {
                    axios.post('/laravel_chat/public/user/' + user.id + '/offline', {}).then(response => {
                        for(var Au in this.users) {
                            if(this.users[Au].id == user.id)
                            {
                                this.users[Au].status = 0;
                            }
                        }
                    });

                }).listen('UserOnline', (e) => {

                    var user = e.user;

                    for(var Au in this.users) {
                        if(this.users[Au].id == user.id)
                        {
                            this.users[Au].status = 1;
                        }
                    }

                }).listen('UserOffline', (e) => {

                    var user = e.user;

                    for(var Au in this.users) {
                        if(this.users[Au].id == user.id)
                        {
                            this.users[Au].status = 0;
                        }
                    }

                });

            axios.post('/laravel_chat/public/users').then(response => {

                this.users = response.data;

            });

            let lk = 'user.update-' + this.user.id;
            // let lk = 'user.update';

            Echo.private(lk)
                .listen('Update', (e) => {
                    this.users = e.users;
                });


        },

        methods: {
            fetchMessages(receiver_id) {
                this.receiver = receiver_id;
                this.isActive = this.receiver;

                axios.get('/laravel_chat/public/messages/' + this.receiver).then(response => {
                    this.messages = response.data;
                    // console.log(this.messages);
                });


                axios.post('/laravel_chat/public/seen/' + this.receiver).then(response => {

                    for(let index in this.users) {
                        if(this.users[index].id == receiver_id) {
                            this.users[index].unseen = 0;
                        }

                    }

                });

                let lk = 'user.' + this.receiver + '-' + this.user.id;

                Echo.private(lk)
                    .listen('MessageSent', (e) => {
                        this.messages.push({
                            message: e.message.message,
                            user: e.user
                        });

                        var i = 0;
                        var s = setInterval(function() {

                            document.getElementById('ss').scrollTop = 999999;
                            i++;
                            if(i == 10) {
                                clearInterval(s);
                            }

                        }, 100);

                    });
                // document.getElementById('ss').scrollTop = 99999;
                // var container = this.$el.querySelector("#container");
                // container.scrollTop = container.scrollHeight;
                var s = setInterval(function() {

                    var height = document.getElementById('ss').scrollHeight;
                    if(height > 516) {
                        document.getElementById('ss').scrollTop = height;
                        clearInterval(s);
                    }
                }, 100);

            },

            sendMessage() {
                if(jQuery.trim(this.newMessage) == '') {
                    return;
                }
                let myVar = {
                    user: this.user,
                    message: this.newMessage,
                    receiver: this.receiver
                };

                for(let index in this.users) {
                    if(this.users[index].id == this.receiver) {
                        this.users[index].last_message = this.newMessage;
                    }

                }

                this.messages.push(myVar);
                this.$emit('messagesent', myVar);

                this.newMessage = '';

                var i = 0;
                var s = setInterval(function() {

                    document.getElementById('ss').scrollTop = 999999;
                    i++;
                    if(i == 20) {
                        clearInterval(s);
                    }

                }, 100);

            },
        }

    };
</script>