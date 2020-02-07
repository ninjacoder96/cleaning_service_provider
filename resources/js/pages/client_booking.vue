<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
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
                                  <th>Service</th>
                                  <th>Cleaner</th>
                                  <th>Schedule</th>
                                  <th>Status</th>
                                  <th>Time</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-capitalize" v-for="(cs, index) in client_schedules" :key="index">
                                  <td>{{ cs.service_desc }}</td>
                                  <td>{{ cs.cleaner_firstname }} {{ cs.cleaner_middlename }} {{ cs.cleaner_lastname }}</td>
                                  <td>{{ cs.day_desc }}-{{ cs.formated_start_time }}-{{ cs.formated_end_time }}</td>
                                  <td>
                                    <span v-show="cs.status == 1">Pending</span>
                                    <span v-show="cs.status == 2">Approved</span>
                                    <span v-show="cs.status == 3">Completed</span>
                                    <span v-show="cs.status == 4">Rejected</span>
                                    <span v-show="cs.status == 5">Cancel</span>
                                  </td>
                                  <td>
                                    <div>Time In: {{ cs.time_in }}</div>
                                    <div>Time Out: {{ cs.time_out }}</div>
                                  </td>
                                  <td class="text-center">
                                    <button v-show="cs.status == 1" class="btn btn-sm btn-warning" @click="cancel_client_schedules(cs.id)">
                                      cancel  
                                    </button>
                                    <button v-show="cs.status == 5" class="btn btn-sm btn-danger" @click="remove_client_schedules(cs.id)">
                                      remove
                                    </button>
                                    <span v-show="cs.status == 2">
                                      <button type="button"  v-show="cs.time_in == null" @click="new_time_in(cs.id)" class="btn btn-sm btn-primary">
                                        time in
                                      </button>
                                      <button type="button" v-show="cs.time_in != null && cs.time_out == null" @click="new_time_out(cs.id)" class="btn btn-sm btn-primary">time out</button>
                                    </span>
                                    <button type="button" v-show="cs.status == 3 && cs.rating != 'null'" class="btn btn-sm btn-success" @click="new_rate(cs.id)">Rate</button>
                                    <button v-show="cs.status == 3 " type="button" class="btn btn-sm btn-dark" @click="report_cleaner(cs)">Report Cleaner</button>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="timeModal" tabindex="-1" role="dialog" aria-labelledby="timeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="timeModalLabel">
                <span v-show="time == 1">TIME IN</span>
                <span v-show="time == 2">TIME OUT</span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="time == 1 ? store_time_in() : store_time_out()">
            <div class="modal-body">
              <input type="time" class="form-control form-control-sm" v-model="time_form"required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary btn-sm">save</button>
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
                <span v-show="time == 1">Rate</span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="store_rate()">
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-3 text-right">
                  Rate:
                </div>
                <div class="col">
                  <input type="number" class="form-control" v-model="rate" min="1" max="5" step="1">
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
  </div>
</template>

<script>
export default {
    data(){
        return{
            time: 1,
            client_schedules: [],
            time_form: '',
            cs_id: '',
            rate: 1,
            feedback: '',
            block_id: '',
            block_name: '',
            reason: '',
        }
    },
    methods:{
      get_client_schedules(){
        axios.get('../../get_client_schedules').then(({data}) => {
          this.client_schedules = data;
        }).catch(() => {

        });
      },
      cancel_client_schedules(id){
        axios.get('../../cancel_schedule/'+id).then(() => {
          this.get_client_schedules();
        }).catch(() => {

        });
      },
      remove_client_schedules(id){
        axios.get('../../remove_schedule/'+id).then(() => {
          this.get_client_schedules();
        }).catch(() => {

        });
      },
      new_time_in(id){
        this.time = 1;
        this.cs_id = id;
        $('#timeModal').modal('show');
      },  
      new_time_out(id){
        this.time = 2;
        this.cs_id = id;
        $('#timeModal').modal('show');
      },
      store_time_in(){
        axios.put('../../time_in/'+this.cs_id,{
          time_in: this.time_form,
        }).then(() => {
          this.get_client_schedules();
          this.time_form = '';
          $('#timeModal').modal('hide');
        }).catch(() => {

        });
      },
      store_time_out(){
        axios.put('../../time_out/'+this.cs_id,{
          time_out: this.time_form,
        }).then(() => {
          this.get_client_schedules();
          this.time_form = '';
          this.cs_id = '';
          $('#timeModal').modal('hide');
        }).catch(() => {

        });
      },
      new_rate(id){
        this.cs_id = id;
        $('#rateModal').modal('show');
      },
      store_rate(){
        axios.put('rate/'+this.cs_id, {
          rate: this.rate,
          feedback: this.feedback,
        }).then(() => {
          this.get_client_schedules();
          $('#rateModal').modal('hide');
          this.rate = '';
          this.feedback = '';
          this.cs_id = '';
        });
      },
      report_cleaner(cs){
        this.block_id = cs.cleaner_id;
        this.block_name = cs.cleaner_firstname+ ' '+ cs.cleaner_middlename + ' ' +cs.cleaner_lastname;
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
      }
    },
    created(){
      this.get_client_schedules();
    }
}
</script>

<style>

</style>