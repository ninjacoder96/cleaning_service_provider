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
    data(){
        return{
            services: [],
        }
    },
    methods:{

    },
    created(){

    }
}
</script>

<style>

</style>