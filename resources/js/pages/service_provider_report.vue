<template>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto">
                                <h4>Service Provider Report</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                Select:
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control form-control-sm" v-model="user_role">
                                    <option v-for="val in role_data" :key="val.id" :value="val.id">
                                        {{ val.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                From:
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control form-control-sm" v-model="date_from">
                            </div>
                            <div class="col-sm-1">
                                To:
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control form-control-sm" v-model="date_to">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm" v-model="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <br><br>
                            <div class="col-sm-4">
                                <button class="btn btn-sm btn-primary"
                                    @click.prevent="service_provider_create_report()">create</button>
                                <a class="btn btn-sm btn-primary" name="print_report"
                                    @click.prevent="print_data()">Print Report</a>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive-sm" id="report_data_table">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Mobile Number</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data,index) in reports_data" :key="index">
                                                <td>{{ data.id }}</td>
                                                <td>{{ data.profile.firstname   +" " + data.profile.lastname }}</td>
                                                <td>{{ data.profile.address }}</td>
                                                <td>{{ data.profile.mobile_number }}</td>
                                                <td v-if="data.is_active == 1">Yes</td>
                                                <td v-else>No</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                user_role: '',
                date_from: '',
                date_to: '',
                status: '',
                role_data: [],
                reports_data: [],
            }
        },
        methods: {
            service_provider_create_report() {
                axios.post('../../admin_create_report', {
                    role_id: this.user_role,
                    from: this.date_from,
                    to: this.date_to,
                    status: this.status
                }).then((res) => {
                    this.reports_data = res.data;
                }).catch(() => {

                })
            },
            fetchRole() {
                axios.get('../../get_roles')
                    .then((res) => {
                        for (var i = 0; i < res.data.length; i++) {
                            if (res.data[i].name == 'Client' || res.data[i].name == 'Cleaner') {
                                this.role_data.push(res.data[i]);
                            }
                        }
                        console.log(this.role_data);
                    }).catch(() => {

                    });
            },
            print_data() {
                window.print();
            },
        },
        mounted() {
            this.fetchRole();
        }
    }

</script>

<style>

</style>
