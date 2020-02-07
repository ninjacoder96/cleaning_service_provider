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
        <select class="form-control form-control-sm">
          <option value="2">Service Provider</option>
          <option value="3">Cleaner</option>
          <option value="4">Client</option>
        </select>
      </div>
      <div class="col-sm-1">
        From:
      </div>
      <div class="col-sm-2">
        <input type="date" class="form-control form-control-sm">
      </div>
      <div class="col-sm-1">
        To:
      </div>
      <div class="col-sm-2">
        <input type="date" class="form-control form-control-sm">
      </div>
      <div class="col-sm-1">
        <button class="btn btn-sm btn-primary">create</button>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive-sm">
              <table class="table table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Date of Birth</th>
                  <th></th>
                </tr>
              </thead>
            </table>
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
            role_id: '',
            from: '',
            to: '',
        }
    },
    methods:{
      admin_create_report(){
        axios.post('../../admin_create_report', {
          role_id: this.role_id,
          from: this.from,
          to:this.to,
        }).then(() => {
          
        }).catch(() => {
          
        })
      },
    },
    created(){

    }
}
</script>

<style>

</style>