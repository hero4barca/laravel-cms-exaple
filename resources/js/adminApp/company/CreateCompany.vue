<template>
      <div class="container">
        
        <form>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]">
            <span v-if="successful" class="label label-sucess">Company created!</span>
          </div>
          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
             
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            <span v-if="errors.email" class="label label-danger"> 
              {{ errors.email[0] }} 
            </span>
            <span v-if="errors.password" class="label label-danger"> 
              {{ errors.password[0] }} 
            </span>
            <span v-if="errors.url" class="label label-danger"> 
              {{ errors.url[0] }} 
            </span>
            <span v-if="errors.logo" class="label label-danger"> 
              {{ errors.logo[0] }} 
            </span>
          </div>

          <div class="form-group">
            <input type="name" ref="name" class="form-control" id="name" placeholder="Enter company name" required>
          </div>

          <div class="form-group">
            <input type="email" ref="email" class="form-control" id="email" placeholder="Enter company email" required>
          </div>

          <div class="form-group">
            <input type="password" ref="password" class="form-control" id="password" placeholder="password" required>

          </div>

          <div class="form-group">
            <input type="url" ref="url" class="form-control" id="url" placeholder="Website url" required>
          </div>

         

          <div class="custom-file mb-3">
            <input type="file" ref="logo" name="logo" class="custom-file-input" id="logo" required>
            <label class="custom-file-label" >Choose file...</label>
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
          formData.append("role_id", 2);
          
          formData.append("logo", this.$refs.logo.files[0]);
          formData.append("url", this.$refs.url.value);

          axios
            .post("/api/companies", formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];

            })
            .catch(error => {
              if (!_.isEmpty(error.response)) {
                if ((error.response.status = 422)) {
                  this.errors = error.response.data.errors;
                  this.successful = false;
                  this.error = true;
                }
              }
            });

          this.$refs.name.value = "";
          this.$refs.email.value = "";
          this.$refs.password.value = "";
          this.$refs.logo.value = "";
          this.$refs.url.value = "";
        }
      }
    };
    </script>