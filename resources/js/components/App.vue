<template>
    <div class="main-wrapper">
            <div class="fixed-sidebar-wrapper"
                 v-bind:class="fixedSidebarclasses"
                 @mouseover="mouseOver"
                 @mouseleave="mouseLeave"
            >
                <left-menu></left-menu>
        </div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 panel-header">
                        <h1>Vue Router Demo App</h1>
                    </div>
                </div>
                <div class="row panel-content-wrapper">
                    <div class="col-12 panel-content">
                        <transition name="router">
                            <router-view></router-view>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import LeftMenu from './LeftMenu';

    export default {
        components: { LeftMenu },
        data(){
            return {
                fixedSidebarclasses: ''
            };
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