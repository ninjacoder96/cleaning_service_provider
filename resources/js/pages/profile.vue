<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-sm-auto">
                              <h4>Profile</h4>
                          </div>
                          <div class="col-sm text-right">
                              <button class="btn btn-sm btn-success" v-show="!editmode" @click='edit_profile()'><i class="fa fa-pen"></i></button>
                          </div>
                      </div>
                  </div>
                  <form @submit.prevent="update_profile()">
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Firstname:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="text" class="form-control form-control-sm" v-model="profile.firstname">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.firstname }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Middlename:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="text" class="form-control form-control-sm" v-model="profile.middlename">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.middlename }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Lastname:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="text" class="form-control form-control-sm" v-model="profile.lastname">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.lastname }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Address:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="text" class="form-control form-control-sm" v-model="profile.address">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.address }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Mobile Number:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="text" class="form-control form-control-sm" v-model="profile.mobile_number">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.mobile_number }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 text-right">
                          <label for="" class="form-label">
                            Date of Birth:
                          </label>
                        </div>
                        <div class="col-9">
                          <span v-show="editmode">
                            <input type="date" class="form-control form-control-sm" v-model="profile.date_of_birth">
                          </span>
                          <span v-show="!editmode">
                            {{ profile.date_of_birth }}
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center">
                        <button v-show="editmode" type="button" class="btn btn-sm btn-warning" @click="cancel_edit()">Cancel</button>
                        <button v-show="editmode" type="submit" class="btn btn-sm btn-success">Update</button>
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
            profile: {},
        }
    },
    methods:{
      get_profile(){
        axios.get('../../profile').then(({data}) => {
          this.profile = data;
        }).catch(() => {

        });
      },
      edit_profile(){
        this.editmode = true;
      },
      update_profile(){
        axios.put('../../profile/'+this.profile.id,{
          firstname: this.profile.firstname,
          lastname: this.profile.lastname,
          middlename: this.profile.middlename,
          date_of_birth: this.profile.date_of_birth,
          address: this.profile.address,
          mobile_number: this.profile.mobile_number,
        }).then(() => {
          this.editmode = false;
        }).catch(() => {

        });
      },
      cancel_edit(){
        this.editmode = false;
      }
    },
    created(){
      this.get_profile();
    }
}
</script>

<style>

</style>