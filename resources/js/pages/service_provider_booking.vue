<template>
  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-auto">
                              <h4>Booking Transaction</h4>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive-sm">
                        <table class="table table-sm table-hover">
                          <thead>
                              <tr>
                                <th>Service</th>
                                <th>Cleaner</th>
                                <th>Schedule</th>
                                <th>Client</th>
                                <th>Rate</th>
                                <th>Feedback</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(spb, index) in service_provider_bookings" :key="index">
                                <td>{{ spb.service_name }}</td>
                                <td>{{ spb.cleaner_firstname }} {{ spb.cleaner_middlename }} {{ spb.cleaner_lastname }}</td>
                                <td>{{ spb.start_time }} - {{ spb.end_time }}</td>
                                <td>{{ spb.client_firstname }} {{ spb.client_middlename }} {{ spb.client_lastname }}</td>
                                <td>{{ spb.rating }}</td>
                                <td>{{ spb.feedback }}</td>
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
          service_provider_bookings: [],
        }
    },
    methods:{
      get_service_provider_bookings(){
        axios.get('../../get_service_provider_booking').then(({data}) => {
          this.service_provider_bookings = data;
        }).catch(() => {

        });
      }
    },
    created(){
      this.get_service_provider_bookings();
    }
}
</script>

<style>

</style>