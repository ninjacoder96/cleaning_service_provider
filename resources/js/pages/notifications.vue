<template>
  <div class="container mt-2">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Notifications
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                <table class="table table-sm table-hover">
                  <tbody>
                    <tr v-for="(n, index) in notifications" :key="index">
                      <td class="text-capitalize">
                        <span>{{ n.sender_fullname }}</span> <span>{{ n.notification }}</span>
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
            notifications: [],
        }
    },
    methods:{
        get_notifications(){
            axios.get('../../get_user_notifs').then(({data}) => {
                this.notifications = data;
            })
        }
    },
    created(){
      this.get_notifications();

    },
    mounted(){

    }
}
</script>

<style>
.list-group{
    height: 23rem;

    overflow-y:scroll;
    -webkit-overflow-scrolling: touch;
}
</style>