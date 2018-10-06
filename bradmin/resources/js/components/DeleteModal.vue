<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" @click="$emit('close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <form :action="getLink" method="post">
                            <button type="submit"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            getLink() {
                return this.$parent.$data.link;
            },
        },
    }
</script>