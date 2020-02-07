<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Booking Transaction</h4>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th>Client</th>
                              <th>Service</th>
                              <th>Date & Time</th>
                              <th>Status</th>
                              <th>Rating</th>
                              <th>Feedback</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-capitalize" v-for="(cs, index) in cleaner_schedules" :key="index">
                              <td>{{ cs.client_firstname }} {{ cs.client_middlename }} {{ cs.client_lastname }}</td>
                              <td>{{ cs.service_name }}</td>
                              <td>{{ cs.day_desc }} {{ cs.formated_start_time }} - {{ cs.formated_end_time }} </td>
                              <td>
                                <span v-show="cs.status == 1">Pending</span>
                                <span v-show="cs.status == 2">Approved</span>
                                <span v-show="cs.status == 3">Completed</span>
                                <span v-show="cs.status == 4">Rejected</span>
                                <span v-show="cs.status == 5">Cancel</span>
                              </td>
                              <td>{{ cs.rating }}</td>
                              <td>{{ cs.feedback }}</td>
                              <td>
                                <button v-show="cs.status == 1" type="button" class="btn btn-sm btn-success" @click="accept_cleaner_schedules(cs.id)">Accept</button>
                                <button v-show="cs.status == 1" type="button" class="btn btn-sm btn-warning" @click="decline_cleaner_schedules(cs.id)">Decline</button>
                                <button v-show="cs.status == 4" type="button" class="btn btn-sm btn-danger" @click="remove_cleaner_schedules(cs.id)">Remove</button>
                                <button v-show="cs.status == 3" type="button" class="btn btn-sm btn-info" @click="rate_client(cs)">Rate Client</button>
                                <button v-show="cs.status == 3" type="button" class="btn btn-sm btn-dark" @click="report_client(cs.client_id)">Report Client</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reportModalLabel">
                <span class="text-capitalize">Block {{ block_name }}</span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="store_report()">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-3 text-right">
                  Reason
                </div>
                <div class="col">
                  <textarea rows="4" class="form-control" v-model="reason"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary btn-sm">submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="rateModalLabel">
                <span class="text-capitalize">Rate {{ cs.client_firstname }} {{ cs.client_middlename }} {{ cs.client_lastname }}</span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="store_rate()">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-3 text-right">
                  Rating
                </div>
                <div class="col">
                  <input type="number" class="form-control" min="1" max="5" step="1">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-3 text-right">
                  Feedback
                </div>
                <div class="col">
                  <textarea rows="4" class="form-control" v-model="feedback"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary btn-sm">submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            cleaner_schedules: [],
            block_id: '',
            block_name: '',
            reason: '',
            cs: '',
            feedback: '',
            rating: '',
        }
    },
    methods:{
      get_cleaner_schedules(){
        axios.get('../../get_cleaner_schedules').then(({data}) => {
          this.cleaner_schedules = data;
        }).catch(() => {

        });
      },
      accept_cleaner_schedules(id){
        axios.get('../../approve_schedule/'+id).then(() => {
          this.get_cleaner_schedules();
        }).catch(() => {

        });
      },
      decline_cleaner_schedules(id){
        axios.get('../../reject_schedule/'+id).then(() => {
          this.get_cleaner_schedules();
        }).catch(() => {

        });
      },
      remove_cleaner_schedules(id){
        axios.get('../../remove_schedule/'+id).then(() => {
          this.get_cleaner_schedules();
        }).catch(() => {

        });
      },
      report_client(cs){
        this.block_id = cs.client_id;
        this.block_name = cs.client_firstname+ ' '+ cs.client_middlename + ' ' +cs.client_lastname;
        $('#reportModal').modal('show');
      },
      store_report(){
        axios.post('../../block',{
          block_id: this.block_id,
          reason: this.reason,
        }).then(() => {
          this.block_id = '',
          this.block_name= '',
          $('#reportModal').modal('hide');
        }).catch(() => {

        });
      },
      rate_client(cs){
        this.cs = cs;
        $('#rateModal').modal('show');
      },
      store_rate(){
        axios.put('../../rate_client/'+this.cs.id, {
          feedback: this.feedback,
          rating: this.rating,
        }).then(() => {
          $('#rateModal').modal('hide');
        }).catch(() => {

        });
      },
    },
    created(){
      this.get_cleaner_schedules();
    }
}
</script>

<style>

</style>