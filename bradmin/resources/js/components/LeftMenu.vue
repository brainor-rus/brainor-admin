<template>
    <ul class="main-menu">
        <li class="error" v-if="error">{{ error}}</li>
        <li v-for="menuItem in responseData">
            <router-link v-if="menuItem.nodes" :to="menuItem.url">
                <i class="icon" :class="menuItem.icon"></i>
                <transition name="fade">
                    <span v-show="sidebarOpen">{{ menuItem.text }}</span>
                </transition>
            </router-link>
            <router-link v-else :to="menuItem.url" exact>
                <i class="icon" :class="menuItem.icon"></i>
                <transition name="fade">
                    <span v-show="sidebarOpen">{{ menuItem.text }}</span>
                </transition>
            </router-link>
            <left-menu-recursive v-if="menuItem.nodes" :menuItemNodes="menuItem.nodes" :sidebarOpen="sidebarOpen"></left-menu-recursive>
        </li>
    </ul>
</template>
<script>
    import axios from 'axios';
    import LeftMenuRecursive from './LeftMenuRecursive';

    export default {
        components: { LeftMenuRecursive },
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
                    .post('/bradmin/sidebar-menu')
                    .then(response => {
                        this.responseData = response.data;
                    })
                    .catch(error => {
                        this.error = error.response.data.message || error.message;
                    });
            }
        }
    }
</script>