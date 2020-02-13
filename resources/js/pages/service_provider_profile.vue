<template>
    <form @submit.prevent="send_business_request()" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-4 text-right">
                    Company Name:
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="name"  v-model="name" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    Company Logo
                </div>
                <div class="col">
                    <input type="file" class="form-control form-control-sm" name="company_img" ref="company_img" @change="previewCompanyImage" required>
                </div>
                <div class="col-md-6">
                <div id="preview" class="justify-content-center align-items-center">
                    <img v-if="company_img_url" :src="company_img_url" class="img-fluid"/>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    Address:
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="address" v-model="address" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    Contact No:
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="mobile_number" v-model="mobile_number" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    Contact Person:
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="contact_person" v-model="contact_person" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    Business Permit No
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" name="business_permit_no" v-model="business_permit_no" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4 text-right">
                    File Optional
                </div>
                <div class="col">
                    <input type="file" name="permit_img">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-sm btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    data(){
      return {
        name: '',
        company_img: '',
        address: '',
        mobile_number:'',
        contact_person:'',
        business_permit_no:'',
        company_img_url:'',
        company_permit_url:'', 


      }
    },
    methods:{
        previewCompanyImage(e) {
            const file = e.target.files[0];
            this.company_img_url = URL.createObjectURL(file);
            this.company_img = e.target.files[0];
        },
         send_business_request() {
            let data = new FormData();
            console.log(this.company_img);
            data.append('name',this.name);
            data.append('company_img', this.company_img);
            data.append('company_address',this.address);
            data.append('mobile_number',this.mobile_number);
            data.append('contact_person',this.contact_person);
            data.append('business_permit_no',this.business_permit_no);

            let config = {
                header : {
                'Content-Type' : 'multipart/form-data'
                }
            }

            axios.post('../../send_business_request',data,config).then((res) => {
                console.log(res);
            }).catch(() => {

            });
        },
    },
    
}
</script>

<style scoped>
#preview img {
  max-width: 100%;
  max-height: 500px;
}
</style>