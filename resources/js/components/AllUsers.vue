<template>
    <div>
        <h3 class="text-center">All Users</h3><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Emails</th>
                <th>Departments</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.emails.join(', ') }}</td>
                <td>{{ user.departments.join(', ') }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-primary">Edit
                        </router-link>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        }
    },
    created() {
        this.axios
            .get('/api/users/getAll')
            .then(response => {
                console.log('Kiki', response.data);
                this.users = response.data;
            });
    }
}
</script>
