<template>
    <div class="content users">
        <div class="loading" v-if="loading">Загрузка....</div>
        <div class="error" v-if="error">{{ error}}</div>
        <ul v-if="users">
            <li v-for="user in users">
                <span>{{ user.name}}</span>
                <span>{{ user.email}}</span>
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
                users: null,
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
                    .get('/api/users')
                    .then(response => {
                        this.users = response.data.data;
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