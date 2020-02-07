<template>
	<li class="nav-item">
        <a class="nav-link" href="\messages">
          Messages <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{ messages.length }}</span>
        </a>

      </li>
</template>
<script>
	export default {
		data(){
			return{
				messages: [],
			}
		},
		methods:{
			get_new_messages(){
				axios.get('../../new_user_messages').then(({data}) => {
					this.messages = data;
				}).catch(() => {

				});
			},
		},
		created(){
			this.get_new_messages();
		},
		mounted(){

		}
	}
</script>