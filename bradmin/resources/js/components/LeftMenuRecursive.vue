<template>
    <ul class="sub-menu">
        <li v-for="menuItem in menuItemNodes">
            <router-link :to="menuItem.url" :class="{ 'router-link-exact-active' : menuItem.url === activeUrlParams}">
                <i v-if="menuItem.iconText" class="icon">{{ menuItem.iconText }}</i>
                <template v-else>
                    <i v-if="menuItem.icon" class="icon" :class="menuItem.icon"></i>
                </template>
                <transition name="fade">
                    <span v-show="sidebarOpen">{{ menuItem.text }}</span>
                </transition>
            </router-link>
            <left-menu-recursive v-if="menuItem.nodes" :menuItemNodes="menuItem.nodes" :sidebarOpen="sidebarOpen"></left-menu-recursive>
        </li>
    </ul>
</template>
<script>
    export default {
        props: [ 'menuItemNodes' ],
        name: 'left-menu-recursive',
        computed: {
            sidebarOpen() {
                return this.$store.state.sidebar.sidebarOpen;
            },
            activeUrlParams: {
                get: function() {
                    return this.$store.state.options.activeUrlParams;
                },
                set: function(newValue) {
                    return newValue;
                }
            }
        },
    }
</script>