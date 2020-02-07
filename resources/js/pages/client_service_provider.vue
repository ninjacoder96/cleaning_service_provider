<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Service Providers</h4>
                          </div>
                          <div class="col-auto">
                              Search    
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control form-control-sm" @keyup="get_service_providers()" v-model="word">
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-hover">
                          <thead>
                              <tr>
                                  <th width="25%" colspan="2">Service Provider</th>
                                  <th width="45%">Services</th>
                                  <th width="10%">Ratings</th>
                                  <th width="10%"></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(sp, index) in service_providers" :key="index">
                                  <td>
                                    <img :src="'img/service_providers/logos/'+sp.company_img" alt="img" height="150px" width="150px">
                                  </td>
                                  <td>{{ sp.name }}</td>
                                  <td>
                                    <tr v-for="(s, index) in sp.services" :key="index">
                                      <td>{{ s.name }}</td>
                                      <td>{{ s.desc }}</td>
                                      <td>{{ s.price }}</td>
                                      <td>
                                        <span v-show="s.rate == 1">Per Hour</span>
                                        <span v-show="s.rate == 2">per Day</span>
                                      </td>
                                    </tr>
                                  </td>
                                  <td></td>
                                  <td>
                                    <button class="btn btn-primary" type="button" @click="book(sp.id)">
                                      Book
                                    </button>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookModalLabel">
                  <span>Book A Service</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="store_book()">
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">Choose Service: </label>
                    </div>
                    <div class="col-9">
                      <select class="form-control form-control-sm" @change="get_cleaners()" v-model="form.service_id">
                        <option v-for="(s, index) in services" :key="index" :value="s.id">{{ s.name }}</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">Choose Cleaner: </label>
                    </div>
                    <div class="col-9">
                      <select class="form-control form-control-sm" @change="get_schedules()" v-model="form.cleaner_id" :disabled="cleaners.length == 0">
                        <option v-for="(c, index) in cleaners" :key="index" :value="c.id">{{ c.firstname }} {{ c.middlename }} {{ c.lastname }} - {{ c.rating }}</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">Choose Schedule: </label>
                    </div>
                    <div class="col-9">
                      <select class="form-control form-control-sm"  v-model="form.schedule_id" :disabled="schedules.length == 0">
                        <option v-for="(s, index) in schedules" :key="index" :value="s.id" >
                          {{ s.day_desc }}: {{ s.formated_start_time }} - {{ s.formated_end_time }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">LandMark Address: </label>
                    </div>
                    <div class="col-5">
                      <textarea rows="3" class="form-control form-control-sm" v-model="form.landmark_address"></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
            </div>
        </div>
      </div>
      <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">
                  <span>Book A Service</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editmode == false ? store_cleaner() : update_cleaner()">
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">Choose Service: </label>
                    </div>
                    <div class="col-9">
                      <select class="form-control form-control-sm" @change="get_cleaners()" v-model="form.service_id">
                        <option v-for="(s, index) in services" :key="index" :value="s.id">{{ s.name }}</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-3 text-right">
                      <label for="" class="form-label">Choose Cleaner: </label>
                    </div>
                    <div class="col-9">
                      <table class="table table-sm table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Ratings</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(c, index) in cleaners" :key="index">
                            <td>{{ c.firstname }} {{ c.middlename }}  {{ c.lastname }}</td>
                            <td>{{ c.ratings }}</td>
                            <td>
                              <button class="btn btn-sm btn-primary" type="button" @click="view_profile()">
                                view profile
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
    data(){
        return{
            services: [],
            cleaners: [],
            schedules: [],
            service_providers: [],
            word: '',
            form: {
              service_provider_id: '',
              service_id: '',
              cleaner_id: '',
              schedule_id: '',
              landmark_address: '',
            },
            reset_form: {
              service_provider_id: '',
              service_id: '',
              cleaner_id: '',
              schedule_id: '',
              landmark_address: '',
            },
        }
    },
    methods:{
        get_service_providers(){
            axios.get('../../service_provider').then(({data}) => {
                this.service_providers = data;
            }).catch(() => {

            });
        },
        get_services(id){
          axios.get('../../service_provider/'+this.form.service_provider_id).then(({data}) => {
            this.services = data.services;
          }).catch(() => {

          });
        },
        book(id){
          this.form.service_provider_id = id;
          this.get_services();
          $('#bookModal').modal('show');
        },
        get_cleaners(){
          axios.get('../../service_cleaners/'+this.form.service_id).then(({data}) => {
            this.cleaners = data;
          }).catch(() => {

          });
        },
        format_form(){
          this.form = this.reset_form;
        },
        get_schedules(){
          axios.get('../../cleaner_schedules/'+this.form.cleaner_id+'/'+this.form.service_id).then(({data}) => {
            this.schedules = data;
          }).catch(() => {

          });
        },
        store_book(){
          axios.post('../../store_book', {
              schedule_id: this.form.schedule_id,
              landmark_address: this.form.landmark_address,
          }).then(() => {
            this.format_form;
            $('#bookModal').modal('hide');
          }).catch(() => {

          });
        }
    },
    created(){
        this.get_service_providers();
    }
}
</script>

<style>

</style>