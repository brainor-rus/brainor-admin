<template>
    <ul class="sub-menu">
        <li v-for="menuItem in menuItemNodes">
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
    export default {
        props: [ 'menuItemNodes' ],
        name: 'left-menu-recursive',
        computed: {
            sidebarOpen() {
                return this.$store.state.sidebar.sidebarOpen;
            }
        },
    }
</script>