<template>
    <ul class="main-menu">
        <li>
            <router-link :to="{ name: 'users.index' }">
                <i class="fas fa-users icon"></i>
                <transition name="fade">
                    <span v-show="sidebarOpen">Пользователи</span>
                </transition>
            </router-link>
        </li>
        <li>
            <router-link :to="{ name: 'contacts.index' }">
                <i class="fas fa-address-book icon"></i>
                <transition name="fade">
                    <span v-show="sidebarOpen">Контакты</span>
                </transition>
            </router-link>
        </li>
    </ul>
</template>
<script>
    export default {
        computed: {
            sidebarOpen() {
                return this.$store.state.sidebar.sidebarOpen;
            }
        }
    }
</script>