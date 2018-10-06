<template >
    <div class="content" :class="classes">
        <div class="loading" v-if="loading">Загрузка....</div>
        <div class="error" v-if="error">{{ error}}</div>
        <div v-html="responseHtml"></div>


        <nav v-if="pagination.pagesNumber.length > 1">
            <ul class="pagination" role="navigation">
                <li class="page-item" v-bind:class="[ pagination.current_page <= 1 ? 'disabled' : '']">
                    <router-link :to="{query: {page: 1}}" class="page-link" aria-label="« First">
                        <span aria-hidden="true">‹‹</span>
                    </router-link>
                </li>
                <li class="page-item" v-bind:class="[ pagination.current_page <= 1 ? 'disabled' : '']">
                    <router-link :to="{query: {page: pagination.current_page - 1}}" class="page-link" aria-label="« Previous">
                        <span aria-hidden="true">‹</span>
                    </router-link>
                </li>
                <li class="page-item" v-for="page in pagination.pagesNumber"
                    v-bind:class="[ page == currentPage ? 'active' : '']">
                    <router-link :to="{query: {page: page}}" class="page-link">
                        {{page}}
                    </router-link>
                </li>
                <li class="page-item" v-bind:class="[ pagination.current_page >= pagination.last_page ? 'disabled' : '']">
                    <router-link :to="{query: {page: pagination.current_page + 1}}" class="page-link" aria-label="Next »">
                        <span aria-hidden="true">›</span>
                    </router-link>
                </li>
                <li class="page-item" v-bind:class="[ pagination.current_page >= pagination.last_page ? 'disabled' : '']">
                    <router-link :to="{query: {page: pagination.last_page}}" class="page-link" aria-label="Last »">
                        <span aria-hidden="true">››</span>
                    </router-link>
                </li>
            </ul>
        </nav>

        <div v-if="showModal">
            <transition name="modal">
                <modal @close="showModal = false"></modal>
            </transition>
        </div>

    </div>
</template>


<script>
    import axios from 'axios';
    import $ from 'jquery'
    import 'selectize';
    import modal from './DeleteModal';

    export default {
        components: { modal },
        data(){
            return {
                loading: false,
                responseData: null,
                responseHtml: null,
                error: null,
                classes: '',
                showModal: false,
                pagination: {
                    total: 0,
                    per_page: 7,
                    from: 1,
                    to: 0,
                    last_page: 1,
                    current_page: 1,
                    each_side: 3,
                    pagesNumber:[]
                },
                link:"",
            };
        },
        computed: {
            currentPage() {
                if (typeof this.$route.query.page === 'undefined') {
                    return 1;
                }else{
                    return this.$route.query.page;
                }
            },
        },
        created: function () {
            this.fetchData(this.currentPage);
            this.$store.commit('activeUrlParams', this.$route.path);

        },
        updated: function () {
            this.$nextTick(function () {
                $('.multiselect').selectize({
                    plugins: ['remove_button'],
                    delimiter: ',',
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input
                        }
                    }
                });
            });
            var vm = this;
            $('.delete-btn').on('click', function () {
                vm.show_modal();
                vm.setLink($(this).data('deleteLink'));
                console.log(this.showModal);
            });
        },
        methods: {
            show_modal(){
                this.showModal = true;
            },
            setLink(link){
                this.link = link;
            },
            fetchData(page) {
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
                    .post(ajaxUrl,
                        {'page':this.currentPage,}
                    )
                    .then(response => {
                        if (typeof response.data.data !== 'undefined') {
                            this.responseData = response.data.data;
                            if (typeof response.data.data.pagination !== 'undefined') {


                                this.pagination.total = response.data.data.pagination.total;
                                this.pagination.per_page = response.data.data.pagination.per_page;
                                this.pagination.from = response.data.data.pagination.from;
                                this.pagination.to = response.data.data.pagination.to;
                                this.pagination.last_page = response.data.data.pagination.last_page;
                                this.pagination.current_page = response.data.data.pagination.current_page;

                                var from = this.pagination.current_page - this.pagination.each_side;
                                if (from < 1) {
                                    from = 1;
                                }
                                var to = from + (this.pagination.each_side * 2);
                                if (to >= this.pagination.last_page) {
                                    to = this.pagination.last_page;
                                }
                                var pagesArray = [];
                                while (from <= to) {
                                    pagesArray.push(from);
                                    from++;
                                }
                                this.pagination.pagesNumber = pagesArray;

                                if( this.pagination.pagesNumber.length > 1){
                                    this.$router.replace({ query: {page: page} })
                                }
                            }
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
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.fetchData(page);
            }
        }
    }
</script>