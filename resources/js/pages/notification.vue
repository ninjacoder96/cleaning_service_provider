<template>
    <div>
		
        <li class="nav-item">
            <a class="nav-link" href="\notifications">
                Notifications <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ notifications }}</span>
            </a>
        </li>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                notifications: '',
            }
        },
        methods: {
            get_new_notifications() {
                axios.get('../../new_user_notifs').then(({
                    data
                }) => {
                    this.notifications = data;
                }).catch(() => {

                });
            },
        },
        created() {
            this.get_new_notifications();
        },
        mounted() {

        }
    }

</script>
