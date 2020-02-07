<template>
  <div class="container mt-2">
      <div class="row d-print-none">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Reports</h4>
              <form @submit.prevent="create_client_report()">
                <div class="row d-print-none">
                  <div class="col-sm-auto text-right">From:</div>
                  <div class="col-sm-2">
                    <input type="date" class="form-control form-control-sm" v-model="from">
                  </div>
                  <div class="col-sm-auto text-right">To:</div>
                  <div class="col-sm-2">
                    <input type="date" class="form-control form-control-sm" v-model="to">
                  </div>
                  <div class="col-sm-auto">
                    <button class="btn btn-sm btn-primary" type="submit">
                      create
                    </button>
                  </div>
                  <div class="col-sm text-right">
                  <button class="btn btn-sm btn-primary" type="button" @click="print()">print</button>
                </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
              <div class="table-responsive-sm">
                <table class="table table-sm table-bordered table-white">
                <thead>
                  <tr>
                    <th>Service</th>
                    <th colspan="3" class="text-center">Schedule</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-if="report_data.length == 0">
                    <td colspan="10" class="text-center">No Data</td>
                  </tr>
                  <tr v-else v-for="(d, index) in report_data" :key="index">
                    <td>{{ d.service_name }}</td>
                    <td>{{ d.day_desc }}</td>
                    <td>{{ d.formated_start_time }}</td>
                    <td>{{ d.formated_end_time }}</td>
                    <td>
                      <span v-show="d.status == 1">Pending</span>
                      <span v-show="d.status == 2">Approved</span>
                      <span v-show="d.status == 3">Completed</span>
                      <span v-show="d.status == 4">Rejected</span>
                      <span v-show="d.status == 5">Cancel</span>
                    </td>
                    <td>{{ d.client_firstname }} {{ d.client_middlename }} {{ d.client_lastname }}</td>
                    <td>{{ d.time_in }}</td>
                    <td>{{ d.time_out }}</td>
                    <td>{{ d.rating }}</td>
                    <td>{{ d.feedback }}</td>
                  </tr>
                </tbody>
            </table>
              </div>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            from: '',
            to: '',
            report_data: [],
        }
    },
    methods:{
      print(){
        window.print();
      },
      create_client_report(){
        axios.post('cleaner_create_report', {
          from: this.from,
          to: this.to,
        }).then(({data}) => {
          this.report_data = data;
        });
      }
    },
    created(){

    }
}
</script>

<style>

</style>