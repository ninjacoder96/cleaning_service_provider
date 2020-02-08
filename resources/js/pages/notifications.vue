<template>
  <div class="container mt-2">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Notifications
            </div>
            <div v-for="(n,index) in notifications" :key="index" class="card-body">
               <h5 class="card-title">{{ n.sender_fullname }}</h5>
                  <p class="card-text">{{ n.notification }}</p>
              <hr>
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