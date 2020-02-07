<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto">
                                <h4>Change Password</h4>
                            </div>
                        </div>
                    </div>
                    <form @submit.prevent="update_password()">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h5><span v-show="error" class="text-danger">These credentials do not match our
                                            records.</span></h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 text-right">
                                    Old Password:
                                </div>
                                <div class="col-9">
                                    <input type="password" class="form-control form-control-sm" v-model="old_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 text-right">
                                    New Password:
                                </div>
                                <div class="col-9">
                                    <input type="password" class="form-control form-control-sm" v-model="new_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3 text-right">
                                    Confirm Password:
                                </div>
                                <div class="col-9">
                                    <input type="password" class="form-control form-control-sm"
                                        v-model="confirm_password">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-sm btn-warning" type="reset">Cancel</button>
                                    <button class="btn btn-sm btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                new_password: null,
                confirm_password: null,
                old_password: null,
                error: false,
            }
        },
        methods: {
            update_password() {
                if (this.new_password == this.confirm_password) {
                    axios.post('../../change_password', {
                        new_password: this.new_password,
                        confirm_password: this.confirm_password,
                        old_password: this.old_password,
                    }).then(() => {
                        this.new_password = '';
                        this.confirm_password = '';
                        this.old_password = '';
                        this.error = false;
                        toast.fire({
                            type: 'success',
                            title: 'Change Password Successfuly'
                        });
                    }).catch((error) => {
                        toast.fire({
                            type: 'error',
                            title:'Something wrong!' + error
                        });
                    });
                } else {
                    this.error = true;
                }


            },
        },
        created() {

        }
    }

</script>

<style>

</style>
