<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Schedules</h4>
                          </div>
                          <div class="col text-right">
                              <button class="btn btn-sm btn-primary" @click="new_schedule()">
                                  <i class="fa fa-plus"></i>
                            </button> 
                          </div>
 
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-bordered table-dark">
                          <thead>
                            <tr>
                              <th width="14%">Sunday</th>
                              <th width="14%">Monday</th>
                              <th width="14%">Tuesday</th>
                              <th width="14%">Wednesday</th>
                              <th width="14%">Thursday</th>
                              <th width="14%">Friday</th>
                              <th width="14%">Saturday</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-center">
                              <td>
                                <h5 v-for="(s, index) in sundays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in mondays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in tuesdays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in wednesdays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in thursdays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in fridays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                              <td>
                                <h5 v-for="(s, index) in saturdays" :key="index">
                                    <span class="badge badge-success">
                                      {{ s.service_desc }}
                                      <div class="w-100"></div>
                                      {{ s.formated_start_time }}-{{ s.formated_end_time }}
                                    </span>
                                </h5>
                              </td>
                            </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleModalLabel">
                    <span v-show="!editmode">New Schedule</span>
                    <span v-show="editmode">Update Schedule</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode == false ? store_schedule() : update_schedule()">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label for="" class="form-label">Service</label>
                        </div>
                        <div class="col-auto">
                            <select name="" id="" class="form-control form-control-sm" v-model="form.service_id" required>
                                <option v-for="service in services" :key="service.id" :value="service.id">
                                    <span>{{ service.name }}</span>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label for="" class="form-label">Day</label>
                        </div>
                        <div class="col-9">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th><small>Sunday</small></th>
                                        <th><small>Monday</small></th>
                                        <th><small>Tuesday</small></th>
                                        <th><small>Wednesday</small></th>
                                        <th><small>Thursday</small></th>
                                        <th><small>Friday</small></th>
                                        <th><small>Saturday</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" v-model="form.days" value="1" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="2" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="3" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="4" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="5" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="6" name="days"></td>
                                        <td><input type="checkbox" v-model="form.days" value="7" name="days"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label for="" class="form-label">Start Time:</label>
                        </div>
                        <div class="col-9">
                            <input type="time" class="form control form-control-sm" v-model="form.start_time" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label for="" class="form-label">End Time:</label>
                        </div>
                        <div class="col-9">
                            <input type="time" class="form control form-control-sm" v-model="form.end_time" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <span v-show="error" class="text-danger">
                                Schedule Overlap
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            sundays: [],
            mondays: [],
            tuesdays: [],
            wednesdays: [],
            thursdays: [],
            fridays: [],
            saturdays: [],

            editmode: false,
            schedules: [],
            schedule:{},
            word: '',
            form:{
                id: '',
                days: [],
                start_time: '',
                end_time: '',
                service_id: '',
            },
            days: [],
            services: [],
            error: false,
        }
    },
    methods:{
        get_sunday(){
          axios.get('get_sunday').then(({data}) => {
            this.sundays = data;
          }).catch(() => {

          });
        },
        get_monday(){
          axios.get('get_monday').then(({data}) => {
            this.mondays = data;
          }).catch(() => {

          });
        },
        get_tuesday(){
          axios.get('get_tuesday').then(({data}) => {
            this.tuesdays = data;
          }).catch(() => {

          });
        },
        get_wednesday(){
          axios.get('get_wednesday').then(({data}) => {
            this.wednesdays = data;
          }).catch(() => {

          });
        },
        get_thursday(){
          axios.get('get_thursday').then(({data}) => {
            this.thursdays = data;
          }).catch(() => {

          });
        },
        get_friday(){
          axios.get('get_friday').then(({data}) => {
            this.fridays = data;
          }).catch(() => {

          });
        },
        get_saturday(){
          axios.get('get_saturday').then(({data}) => {
            this.saturdays = data;
          }).catch(() => {

          });
        },
        get_services(){
            axios.get('../service').then(({data}) => {
                this.services = data;
            }).catch(() => {

            });
        },
        get_days(){
            axios.get('../day').then(({data}) => {
                this.days = data;
            }).catch(() => {

            });
        },
        get_schedules(){
            axios.get('../cleaner_service').then(({data}) => {
                this.schedules = data;
            }).catch(() => {

            });
        },
        new_schedule(){
            this.editmode = false;
            $('#scheduleModal').modal('show');

        },
        store_schedule(){
            axios.post('../schedule', {
                days: this.form.days,
                start_time: this.form.start_time,
                end_time: this.form.end_time,
                service_id: this.form.service_id,
            }).then(({data}) => {

                this.get_all();
                $('#scheduleModal').modal('hide');
            }).catch(() => {

            });
        },
        edit_schedule(s){
            this.form = s;
            this.editmode = true;
            $('#scheduleModal').modal('show');
        },
        update_schedule(){
            axios.put('../schedule/'+this.form.id,{
                days: this.form.days,
                start_time: this.form.start_time,
                end_time: this.form.end_time,
                service_id: this.form.service_id,
            }).then(() => {
                this.get_all();
                $('#scheduleModal').modal('hide');
            }).catch(() => {

            });
        },
        delete_schedule(id){
            axios.delete('../schedule/'+id).then(() => {
                this.get_all();
            }).catch(() => {

            });
        },
        get_all(){
          this.get_sunday();
          this.get_monday();
          this.get_tuesday();
          this.get_wednesday();
          this.get_thursday();
          this.get_friday();
          this.get_saturday()
        }
    },
    created(){
        this.get_days();
        // this.get_all();
        this.get_services();
        this.get_all();
    }
}
</script>

<style>

</style>