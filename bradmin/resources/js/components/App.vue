<style>
    @import '~selectize/dist/css/selectize.bootstrap3.css';
</style>
<template>
    <div class="main-wrapper">
            <div class="fixed-sidebar-wrapper"
                 v-bind:class="fixedSidebarclasses"
                 @mouseover="mouseOver"
                 @mouseleave="mouseLeave"
            >
                <left-sidebar-header></left-sidebar-header>
                <left-menu></left-menu>
        </div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 panel-header">
                        <h1>{{ title }}</h1>
                    </div>
                </div>
                <div class="row panel-content-wrapper">
                    <div class="col-12 panel-content">
                        <transition name="router">
                            <router-view :key="$route.fullPath"></router-view>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LeftMenu from './LeftMenu';
    import LeftSidebarHeader from './LeftSidebarHeader';

    export default {
        components: { LeftMenu, LeftSidebarHeader },
        data(){
            return {
                fixedSidebarclasses: ''
            };
        },
        computed: {
            title() {
                return this.$store.state.title.title;
            }
        },
        methods: {
            mouseOver: function(){
                this.fixedSidebarclasses = 'open';
                this.$store.commit('sidebarOpenState', true);
            },
            mouseLeave: function(){
                this.fixedSidebarclasses = '';
                this.$store.commit('sidebarOpenState', false)
            }
        }
    }
</script>
