<template>
  <div class="container mt-2">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive-sm">
            <table class="table-sm">
              <tbody>
                <tr>
                  <td v-for="(contact, index) in contacts" :key="index" @click="select_user(contact)" v-show="contact.id !== user_id" class="text-center">
                    <div width="100px" height="100px">
                      <img :src="'img/service_providers/logos/CleanMeister.jpg'" class="rounded-circle" alt="img" width="65px" height="65px">
                      <div class="w-100"></div>
                      <small>{{ contact.profile.firstname }} {{ contact.profile.lastname }}</small>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
          <div class="col-12">
              <div class="card" :disabled="!ready"}
                  <div class="card-header">
                      <span v-show="ready">
                          {{ selected_user.firstname }}  {{ selected_user.lastname }}
                        </span>
                  </div>
                  <div class="card-body" style="height: 22rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="(m, index) in messages" :key="index" :class="{ 'text-left' : m.sender_id == selected_user.user_id, 'text-right' : m.sender_id == user_id }">
                            <span class="badge badge-pill" :class="{ 'badge-danger' : m.sender_id == selected_user.user_id, 'badge-primary' : m.sender_id == user_id }">
                              <small v-show="m.sender_id == selected_user.user_id">{{ m.sender_firstname }} {{ m.sender_middlename }} {{ m.sender_lastname }}</small>
                              <small v-show="m.sender_id == user_id">{{ m.receiver_firstname }} {{ m.receiver_middlename }} {{ m.receiver_lastname }} </small>
                              <div class="w-100"></div>
                              <h5>{{ m.text_message }}</h5>
                            </span>
                        </li>
                    </ul>
                  </div>
                  <div class="card-footer">
                      <form @submit.prevent="send_message()">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <textarea rows="3" v-model="message" class="form-control form-control-sm"></textarea>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-sm btn-primary">Sent</button>
                            </div>
                        </div>
                    </form>
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
            contacts: [],
            selected_user: {},
            messages: [],
            message: '',
            user_id: '',
            ready: false,
        }
    },
    methods:{
        get_contacts(){
            axios.get('../../contact').then(({data}) => {
                this.contacts = data;
            }).catch(() => {

            });
        },
        select_user(user){
            this.ready = true;
            this.selected_user = user.profile;
            this.get_messages();
        },
        get_messages(){
            axios.get('../../get_message/'+this.selected_user.user_id).then(({data}) => {
                this.messages = data;
            }).catch(() => {

            });
        },
        send_message(){
            axios.post('../../send_message/'+this.selected_user.user_id,{
                text_message: this.message,
            }).then(() => {
                this.message= '';
                this.get_messages();
            }).catch(() => {

            });
        },
        get_user(){
            axios.get('../../get_user_id').then(({data}) => {
                this.user_id = data;
            }).catch(() => {

            });
        },

    },
    created(){
        this.get_user();
        this.get_contacts();

    },
    mounted(){
      window.Echo.channel("message_created").listen(".message.created", (e) => {
          this.get_messages();
      });
      window.Echo.channel("message_updated").listen(".message.updated", (e) => {
          this.get_messages();
      });
    },
}
</script>

<style>
.list-group{
    height: 18rem !important;

    overflow-y:scroll;
    -webkit-overflow-scrolling: touch;

}
</style>