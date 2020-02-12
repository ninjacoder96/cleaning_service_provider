<template>
     <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title">Number of Service Providers</h3>
                <h4 class="card-text">
                    <span>{{ total_service_providers }}</span>
                </h4>
              </div> 
            </div>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title">Pending Request</h3>
                <h4 class="card-text">
                    <span>{{ pending_requests  }}</span>
                </h4>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<style scoped>
.content{
    padding:5px;
}
</style>


<script>
export default {
    data(){
        return{
            total_service_providers: null,
            pending_requests: null,
        }
    },
    methods:{
      get_all_service_provider(){
        axios.get('../get_total_service_provider')
        .then((res) => {
            this.total_service_providers = res.data;
        }).catch(() => {
          
        })
      },
      get_pending_requests(){
        axios.get('../../pending_request',{
            params:{
                action: 'get-total-request'
            }
        }).then((response) => {
          this.pending_requests = response.data.total_count;
        }).catch(() => {

        });
      },
    },
    created(){
        this.get_all_service_provider();
        this.get_pending_requests();
    }
}
</script>
