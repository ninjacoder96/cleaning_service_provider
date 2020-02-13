<template>
  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-md-12">
        <h4>Admin Report</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
        Select:
      </div>
      <div class="col-sm-3">
        <select class="form-control form-control-sm" v-model="user_role">
          <option :value="role_data.id"> {{ role_data.name }}</option>

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
        <button class="btn btn-sm btn-primary" @click.prevent="admin_create_report()">create</button>
        <a class="btn btn-sm btn-primary" name="print_report" @click.prevent="print_data()">Print Report</a>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive-sm" id="report_data_table">
              <table class="table table-sm" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Mobile Number</th>
                  <th>Contact Person</th>
                  <th>Business Permit No</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(data,index) in reports_data" :key="index">
                  <td>{{ data.id }}</td>
                  <td>{{ data.name }}</td>
                  <td>{{ data.address }}</td>
                  <td>{{ data.mobile_number }}</td>
                  <td>{{ data.contact_person }}</td>
                  <td>{{ data.business_permit_no }}</td>
                  <td v-if="data.owner.is_active == 1">Yes</td>
                  <td v-else>No</td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
    </div>

  </div>
</template>
<style>
@media print {
  body * {
    visibility: hidden;
  }
  #report_data_table, #report_data_table * {
    visibility: visible;
  }
  #report_data_table {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
<script>
export default {
    data(){
        return{
            user_role: '',
            date_from: '',
            date_to: '',
            status:'',
            role_data: [],
            reports_data: [],

        }
    },
    methods:{
      admin_create_report(){
        axios.post('../../admin_create_report', {
          role_id: this.user_role,
          from: this.date_from,
          to:this.date_to,
          status: this.status
        }).then((res) => {
          this.reports_data = res.data;
        }).catch(() => {
          
        })
      },
      fetchRole(){
        axios.get('../../get_roles')
        .then((res) => {
          for ( var i = 1; i < res.data.length; i++ ) {
            console.log(res.data[i].name);
            if(res.data[i].name == 'Service Provider'){
              this.role_data = res.data[i];
              break;
            }
          }
        }).catch(() => {

        });
      },
       print_data(){
         window.print();
      },
    },
    created(){
      this.fetchRole();
    }
}
</script>