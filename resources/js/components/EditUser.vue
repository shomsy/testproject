<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {}
        }
    },
    created() {
        this.axios
            .get(`/api/users/edit/${this.$route.params.id}`)
            .then((response) => {
                this.user = response.data;
            });
    },
    methods: {
        updateUser() {
            this.axios
                .post(`/api/users/update/${this.$route.params.id}`, this.user)
                .then((response) => {
                    this.$router.push({name: 'home'});
                });
        }
    }
}
</script>
