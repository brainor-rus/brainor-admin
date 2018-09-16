<template >
    <div class="content" :class="classes">
        <div class="loading" v-if="loading">Загрузка....</div>
        <div class="error" v-if="error">{{ error}}</div>
        <div v-html="responseHtml"></div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                loading: false,
                responseData: null,
                responseHtml: null,
                error: null,
                classes: ''
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.responseData = null;
                this.loading = true;
                this.classes = '';
                axios
                    .get('/api'+this.$router.history.current.path)
                    .then(response => {
                        this.responseData = response.data.data;
                        this.responseHtml = response.data.html;
                        this.loading = false;
                        this.classes = response.data.meta.class;
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