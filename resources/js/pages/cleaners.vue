<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Cleaner</h4>
                          </div>
                          <div class="col-auto">
                              Search    
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control form-control-sm" @keyup="get_cleaners()" v-model="word">
                          </div>
                          <div class="col text-right">
                              <button class="btn btn-sm btn-primary" @click="new_cleaner()">
                                  <span>
                                      <i class="fa fa-plus"></i>
                                  </span>
                              </button>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-hover table-striped">
                          <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Mobile Number</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(c, index) in cleaners" :key="index">
                                  <td>{{ c.id }}</td>
                                  <td>{{ c.fullname }}</td>
                                  <td>{{ c.age }}</td>
                                  <td>{{ c.address }}</td>
                                  <td>{{ c.mobile_number }}</td>
                                  <td>
                                      <button class="btn btn-sm btn-success" @click="edit_cleaner(c)">
                                          <i class="fa fa-pen"></i>
                                      </button>
                                      <button class="btn btn-sm btn-danger" @click="delete_cleaner(c.id)">
                                          <i class="fa fa-trash"></i>
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
      <div class="modal fade" id="cleanerModal" tabindex="-1" role="dialog" aria-labelledby="cleanerModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="cleanerModalLabel">
                      <span v-show="!editmode">New Cleaner</span>
                      <span v-show="editmode">Update Cleaner</span>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form @submit.prevent="editmode == false ? store_cleaner() : update_cleaner()">
                  <div class="modal-body">
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  username
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.username">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  password
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="password" class="form-control form-control-sm" v-model="form.password">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  email
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="email" class="form-control form-control-sm" v-model="form.email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  firstname
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.firstname">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  middlename
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.middlename">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  lastname
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.lastname">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  date of birth
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="date" class="form-control form-control-sm" v-model="form.date_of_birth">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  address
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.address">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-3 text-right">
                              <label for="" class="form-label text-capitalize">
                                  mobile number
                              </label>
                          </div>
                          <div class="col-9">
                              <input type="text" class="form-control form-control-sm" v-model="form.mobile_number">
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
            editmode: false,
            cleaners: [],
            cleaner:{},
            word: '',
            form: {
                id: '',
                username: '',
                password: '',
                email: '',
                firstname: '',
                lastname: '',
                middlename: '',
                date_of_birth: '',
                address: '',
                
            },
        }
    },
    methods:{
        get_cleaners(){
            axios.get('../cleaner?word='+this.word).then(({data}) => {
                this.cleaners = data;
            }).catch(() => {

            });
        },
        new_cleaner(){
            this.editmode = false;
            $('#cleanerModal').modal('show');
        },
        store_cleaner(){
            axios.post('../cleaner',{
                username: this.form.username,
                password: this.form.password,
                email: this.form.email,
                firstname: this.form.firstname,
                lastname: this.form.lastname,
                middlename: this.form.middlename,
                date_of_birth: this.form.date_of_birth,
                address: this.form.address,
                mobile_number: this.form.mobile_number,
            }).then(() => {
                this.get_cleaners();
                $('#cleanerModal').modal('hide');
            }).catch(() => {

            });
        },
        edit_cleaner(c){
            this.editmode = true;
            this.form = c;
            $('#cleanerModal').modal('show');
        },
        update_cleaner(){
            axios.put('../cleaner/'+this.form.id,{
                username: this.form.username,
                password: this.form.password,
                email: this.form.email,
                firstname: this.form.firstname,
                lastname: this.form.lastname,
                middlename: this.form.middlename,
                date_of_birth: this.form.date_of_birth,
                address: this.form.address,
                mobile_number: this.form.mobile_number,
            }).then(() => {
                this.get_cleaners();
                $('#cleanerModal').modal('hide');
            }).catch(() => {

            });
        },
        delete_cleaner(id){
            axios.delete('../cleaner/'+id).then(() => {
                this.get_cleaners();
        	})
        }
    },
    created(){
        this.get_cleaners();
    },
    mounted(){[

    ]}
}
</script>
<style>

</style>