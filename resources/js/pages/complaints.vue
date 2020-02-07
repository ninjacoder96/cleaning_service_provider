<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Complaints</h4>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-hover">
              
                        </table>
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

        }
    },
    methods:{

    },
    created(){
        this.get_users();
    }
}
</script>

<style>

</style>