<template>
      <div class="container">
        
        <form>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]">
            <span v-if="successful" class="label label-sucess">Admin created!</span>
          </div>

          <div :class="['form-group m-1 p-3', errors.name ? 'alert-danger' : '']">
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            </div>
          <div class="form-group">
            <input type="name" ref="name" class="form-control" id="name" placeholder="Admin's name" required>
          </div>

          <div :class="['form-group m-1 p-3', errors.email ? 'alert-danger' : '']">
            <span v-if="errors.email" class="label label-danger"> 
              {{ errors.email[0] }} 
            </span>
            </div>
          <div class="form-group">
            <input type="email" ref="email" class="form-control" id="email" placeholder="Enter Admin's email" required>
          </div>

          <div :class="['form-group m-1 p-3', errors.password ? 'alert-danger' : '']">
            <span v-if="errors.password" class="label label-danger"> 
              {{ errors.password[0] }} 
            </span>
            </div>
          <div class="form-group">
            <input type="password" ref="password" class="form-control" id="password" placeholder="password" required>

          </div>

     
         
          <button type="submit" @click.prevent="create" class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>

    </template>

     <script>
       
    export default {
      props: {
        
      },
      mounted() {
        
      },
      data() {
        return {
          
          error: false,
          successful: false,
          errors: []
          

        };
      },
      methods: {
        
        create() {
          const formData = new FormData();

          formData.append("name", this.$refs.name.value);
          formData.append("email", this.$refs.email.value);
          formData.append("password", this.$refs.password.value);          
          

            const axiosParams = {
              headers: {
               'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'application/json',
                'Access-Control-Allow-Origin': 'always', 
              },
            params: formData };

          axios
            .post("/api/users/create_admin", formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];


              this.$refs.name.value = "";
              this.$refs.email.value = "";
              this.$refs.password.value = "";
              

            })
            .catch(error => {
              if (!_.isEmpty(error.response)) {
                if ((error.response.status = 422)) {
                  this.errors = error.response.data.error;
                  this.successful = false;
                  this.error = true;
                }
              }
            });

          
        }
      }
    };
    </script>