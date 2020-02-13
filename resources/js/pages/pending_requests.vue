<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Pending Requests</h4>
                          </div>

                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                      <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th colspan="2" class="text-center">Company</th>
                          <th>Address</th>
                          <th>Mobile Number</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(sp, index) in pending_requests" :key="index">
                          <td>
                            <img :src="'/img/service_providers/logos/' + sp.company_img" height="180px" width="180px">
                          </td>
                          <td>{{ sp.name }}</td>
                          <td>{{ sp.address }}</td>
                          <td>{{ sp.mobile_number }}</td>
                          <td>
                            <button class="btn btn-sm btn-primary" @click="view_sp(sp)">
                              <i class="fa fa-eye"></i>
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
      <div class="modal fade" id="spModal" tabindex="-1" role="dialog" aria-labelledby="spModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="spModalLabel">View Service Provider</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-3 text-right">
                  Company:
                </div>
                <div class="col">
                  {{ sp.name }}
                </div>
              </div>
              
              <div class="row">
                <div class="col-3 text-right">
                  Owner:
                </div>
                <div class="col">
                  {{ sp.owner }}
                </div>
              </div>
              
              <div class="row">
                <div class="col-3 text-right">
                  Contact No:
                </div>
                <div class="col">
                  {{ sp.contact_no }}
                </div>
              </div>
              <div class="row">
                <div class="col-3 text-right">
                  Contact Person:
                </div>
                <div class="col">
                  {{ sp.contact_person }}
                </div>
              </div>
              
              <div class="row">
                <div class="col-3 text-right">
                  Address:
                </div>
                <div class="col">
                  {{ sp.address }}
                </div>
              </div>
              <div class="row">
                <div class="col-3 text-right">
                  Business Permit No:
                </div>
                <div class="col">
                  {{ sp.business_permit_no }}
                </div>
              </div>
              <div class="row">
                <div class="col-3 text-right">
                  Business Permit:
                </div>
                <div class="col">
                  <img :src="'img/service_providers/permits/'+sp.permit_img" alt="" width="250px" height="250px">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" @click="decline_sp()">Decline</button>
              <button type="button" class="btn btn-success" @click="approved_sp()">Approve</button>
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
            pending_requests: [],
            sp:{
              id: '',
              name: '',
              address: '',
              mobile_number: '',
            },
        }
    },
    methods:{
      get_pending_requests(){
        axios.get('../../pending_request').then(({data}) => {
          this.pending_requests = data;
        }).catch(() => {

        });
      },
      view_sp(sp){
        this.sp = sp;
        $('#spModal').modal('show');
      },
      approved_sp(){
        axios.put('../../approved_service_provider/'+this.sp.id).then(() => {
          this.get_pending_requests();
          $('#spModal').modal('hide');
        }).catch(() => {

        })
      },
      decline_sp(){
        axios.put('../../decline_service_provider/'+this.sp.id).then(() => {
          this.get_pending_requests();
          $('#spModal').modal('hide');
        }).catch(() => {

        });
      }
    },
    created(){
        this.get_pending_requests();
    }
}
</script>

<style>

</style>