<template>
    <div class="content сontacts">
        <div class="loading" v-if="loading">Загрузка....</div>
        <div class="error" v-if="error">{{ error}}</div>
        <ul v-if="contacts">
            <li v-for="contact in contacts">
                <span>{{ contact.user}}</span><br>
                <span>{{ contact.address}}</span><br>
                <span v-for="tel in contact.tels">{{ tel}}</span><br>
                <span>{{ contact.email}}</span><br>
            </li>
        </ul>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                loading: false,
                contacts: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.users = null;
                this.loading = true;
                axios
                    .get('/api/contacts')
                    .then(response => {
                        this.contacts = response.data.data;
                        this.loading = false;
                        this.$store.commit('titleUpdate', response.data.meta.title);
                    })
                    .catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            }
        }
    }
</script>