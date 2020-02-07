<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Service Porvider Services</h4>
                          </div>
                          <div class="col-auto">
                              Search    
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control form-control-sm" @keyup="get_service_provider_services()" v-model="word">
                          </div>
						<div class="col text-right">
							<button class="btn btn btn-sm btn-primary" @click="new_service()">
								<i class="fa fa-plus"></i>
							</button>
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
                                  <th>Price</th>
                                  <th>Rate</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(s, index) in services" :key="index">
                                  <td>{{ s.name }}</td>
                                  <td>{{ s.desc }}</td>
                                  <td>{{ s.price }}</td>
                                  <td>
                                    <span v-show="s.rate == 1">Per Hour</span>
                                    <span v-show="s.rate == 2">Per Day</span>
                                  </td>
                                  <td>
                                    <button class="btn btn-sm btn-success" @click="edit_service(s)">
                                      <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" @click="delete_service(s.id)">
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
		<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="serviceModalLabel">
							<span v-show="!editmode">New Service</span>
							<span v-show="editmode">Edit Service</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form @submit.prevent="editmode == false ? store_service() : update_service()">
						<div class="modal-body">
							<div class="form-group row">
								<div class="col-3 text-right">
									<label for="" class="form-label">
										Name
									</label>
								</div>
								<div class="col-9">
									<input type="text" class="form-control form-control-sm" v-model="form.name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-3 text-right">
									<label for="" class="form-label">
										Description
									</label>
								</div>
								<div class="col-9">
									<textarea rows="3" class="form-control form-control" v-model="form.desc"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-3 text-right">
									<label for="" class="form-label">
										Price
									</label>
								</div>
								<div class="col-9">
									<input type="number" class="form-control form-control-sm" v-model="form.price">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-3 text-right">
									<label for="" class="form-label">
										Rate
									</label>
								</div>
								<div class="col-9">
									<select class="form-control form-control-sm" v-model="form.rate">
										<option value="1">Per Hour</option>
										<option value="2">Per Day</option>
									</select>
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
            services: [],
            word: '',
            form: {
            	id: '',
            	name: '',
            	desc: '',
            	rate: '',
            	price: '',
            },
        }
    },
    methods:{
        get_service_provider_services(){
            axios.get('../../service_provider_service?word='+this.word).then(({data}) => {
                this.services = data;
            });
        },
        new_service(){
        	this.editmode = false;
        	$('#serviceModal').modal('show');
        },
        store_service(){
        	axios.post('../../service_provider_service', {
        		name: this.form.name,
            	desc: this.form.desc,
            	rate: this.form.rate,
            	price: this.form.price,
        	}).then(() => {
        		this.get_service_provider_services();
        		$('#serviceModal').modal('hide');
        	}).catch(() => {

        	});
        },
        edit_service(s){
        	this.form = s;
        	this.editmode = true;
        	$('#serviceModal').modal('show');
        },
        update_service(){
        	axios.put('../../service_provider_service/'+this.form.id, {
                name: this.form.name,
                desc: this.form.desc,
                rate: this.form.rate,
                price: this.form.price
              }).then(() => {
        		this.get_service_provider_services();
        		$('#serviceModal').modal('hide');
        	}).catch(() => {

        	});
        },
        delete_service(id){
        	axios.delete('../../service_provider_service/'+id).then(() => {
        		this.get_service_provider_services();
        	})
        }
    },
    created(){
        this.get_service_provider_services();
    },
    mounted(){[

    ]}
}
</script>
<style>

</style>