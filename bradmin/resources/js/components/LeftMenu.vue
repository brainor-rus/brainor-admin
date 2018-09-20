<template>
    <ul class="main-menu" :class="classes">
        <li class="error" v-if="error">{{ error}}</li>
        <li v-for="menuItem in responseData">
            <router-link :to="menuItem.url">
                <i class="icon" :class="menuItem.icon"></i>
                <transition name="fade">
                    <span v-show="sidebarOpen">{{ menuItem.text }}</span>
                </transition>
            </router-link>
        </li>
    </ul>
</template>
<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                responseData: null,
                error: null,
                classes: ''
            };
        },
        created() {
            this.fetchData();
        },
        computed: {
            sidebarOpen() {
                return this.$store.state.sidebar.sidebarOpen;
            }
        },
        methods: {
            fetchData() {
                this.error = this.responseData = null;
                this.classes = '';
                axios
                    .get('/bradmin/sidebar-menu')
                    .then(response => {
                        this.responseData = response.data.data;
                        this.classes = response.data.meta.class;
                    })
                    .catch(error => {
                        this.error = error.response.data.message || error.message;
                    });
            }
        }
    }
</script>