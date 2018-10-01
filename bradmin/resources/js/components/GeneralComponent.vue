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
                let ajaxUrl = '';
                if(this.$route.path === '/'+this.$store.state.options.adminUrl){
                    ajaxUrl = '/' + this.$store.state.options.adminUrl +'/dashboard';
                }
                else{
                    ajaxUrl = this.$route.path;
                }
                axios
                    .post(ajaxUrl)
                    .then(response => {
                        if (typeof response.data.data !== 'undefined') {
                            this.responseData = response.data.data;
                        }

                        if (typeof response.data.html !== 'undefined') {
                            this.responseHtml = response.data.html;
                        }

                        if (typeof response.data.meta !== 'undefined') {
                            if (typeof response.data.meta.title !== 'undefined') {
                                this.$store.commit('titleUpdate', response.data.meta.title);
                            }

                            if (typeof response.data.meta.class !== 'undefined') {
                                this.classes = response.data.meta.class;
                            }
                        }
                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            }
        }
    }
</script>