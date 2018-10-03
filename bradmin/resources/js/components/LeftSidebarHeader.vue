<template>
    <button @click="changeSidebarOpenCookie(sidebarOpenButtonAction)">Развернуть</button>
</template>
<script>

    export default {
        data(){
            return {};
        },
        computed: {
            sidebarOpenButtonAction: {
                get: function() {
                    if (typeof this.$cookie.get('sidebarOpen') !== 'undefined') {
                            return this.$cookie.get('sidebarOpen') === 'true'? false : true;
                    }else {
                        return true;
                    }
                },
                set: function(newValue) {
                    this.lpairs = { ...this.lpairs, xx: newValue };
                }
            }
        },
        methods: {
            changeSidebarOpenCookie(actionValue) {
                console.log(actionValue);
                this.sidebarOpenButtonAction = actionValue;

                this.$store.commit('sidebarOpenState', actionValue);
                this.$cookie.set('sidebarOpen', actionValue, { expires: '1Y' });
            }
        }
    }
</script>