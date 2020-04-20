<template>
    <div class="container">
        <h1>test</h1>
    </div>
</template>

<script>
    export default {
         data() {
                return {
                    posts : {},
                    auth_user : ''
                }
            },
            created(){
                this.getPost();
                

            },
            methods : {
                getPost() {
                    axios.get(`/ShowPost/${this.$route.params.slug}`)
                    .then(response =>this.posts = response.data)
                    .catch(err => console.log(err));
                }
            },
        }
</script>
