<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Services</h4>
                          </div>
                          <div class="col-auto">
                              Search    
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control form-control-sm" @keyup="get_services()" v-model="word">
                          </div>

                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                      <table class="table table-sm table-hover table-striped">
                          <thead>
                              <tr>
                                  <th>Service</th>
                                  <th>Description</th>
                                  <th>Rate</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(s, index) in services" :key="index" @click="select_service(s.id)">
                                  <td>{{ s.name }}</td>
                                  <td>{{ s.desc }}</td>
                                  <td>{{ s.rate }}</td>
                              </tr>
                          </tbody>
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
            cleaners : [],
        }
    },
    methods:{
        get_cleaners(){
            axios.get('../cleaner?service_id='+this.$route.params.id).then(({data}) => {
                this.cleaners = data;
            });
        },
        select_cleaner(id){
            location.replace("../cleaner/"+id);
        },
    },
    created(){
        this.get_services();
    },
    mounted(){
        
    }
}
</script>
<style>

</style>