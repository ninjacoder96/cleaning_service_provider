<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Clients</h4>
                          </div>
                          <div class="col-auto">
                              Search    
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control form-control-sm" @keyup="get_clients()" v-model="word">
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
                              <tr v-for="(c, index) in clients" :key="index">
                                  <td>{{ c.id }}</td>
                                  <td>{{ c.fullname }}</td>
                                  <td>{{ c.age }}</td>
                                  <td>{{ c.address }}</td>
                                  <td>{{ c.mobile_number }}</td>
                                  <td>
                                    <button type="button" class="btn btn-sm btn-dark" @click="block_user(c)">Block</button>
                                  </td>
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
            clients: [],
            word: '',
            reason: '',
            blocked_id: '',
            block_name: '',
        }
    },
    methods:{
        get_clients(){
            axios.get('../client?word='+this.word).then(({data}) => {
                this.clients = data;
            }).catch(() => {

            });
        },
        block_user(cs){
            this.block_id = cs.id;
            this.block_name = cs.fullname;
            axios.post('../../block', {
              blocked_id: this.blocked_id,
              reason: this.reason,
            }).then(() => {
              this.get_clients();
            }).catch(() => {

            });
        }
    },
    created(){
        this.get_clients();
    },
    mounted(){[

    ]}
}
</script>
<style>

</style>