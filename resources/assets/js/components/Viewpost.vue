<template id="view-post">
    <div class="container">
        <h3>{{ post.title }}</h3>
        <div>
            {{ post.body }}
        </div>
        <span class="glyphicon glyphicon-arrow-left"></span>
        <router-link v-bind:to="{ name: 'Listpost' }">Back to list</router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {post: {title: '', body: ''}}
        },
        created: function () {
            const url = '/post/' + this.$route.params.id;

            Axios.get(url).then((response) => {
                this.post = response.data.data;
            });
        }

    }
</script>