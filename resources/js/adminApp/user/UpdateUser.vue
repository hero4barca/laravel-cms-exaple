<template>
      <div class="container">
        <form>
          <div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
            <span v-if="successful" class="label label-sucess">Updated!</span>
          </div>

          <div class="form-group">
            
            <input type="name" ref="name" class="form-control" id="name"  required>

            <div :class="['form-group m-1 p-3', errors.name ? 'alert-danger' : '']">
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            </div>

          </div>

          <div class="form-group">
            <input type="email" ref="email" class="form-control" id="email"  required>

            <div :class="['form-group m-1 p-3', errors.email ? 'alert-danger' : '']">
            <span v-if="errors.email" class="label label-danger">
              {{ errors.email[0] }}
            </span>
            </div>

          </div>

           

          <button type="submit" @click.prevent="update" class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>
    </template>

    <script>
    export default {
      mounted() {
        this.getUser();
        
      },
      props: {
        acctUserId: {
          type: Number,
          required: true
        }
      },
      data() {
        return {
        
          error: false,
          successful: false,
          errors: []
        };
      },
      methods: {
        
        update() {
          let name = this.$refs.name.value;         
          let email = this.$refs.email.value;

          const axiosParams = {
              headers: {
               'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'application/json',
                'Access-Control-Allow-Origin': 'always', 
              },
            params: { name, email} };

          axios
            .put("/api/users/" + this.acctUserId, { name, email} )
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
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
        },
        getUser() {
          axios.get("/api/users/" + this.acctUserId).then(response => {
            this.$refs.name.value = response.data.data.name;
            this.$refs.email.value = response.data.data.email;
            //this.$refs.logo.value = response.data.data.logo;
          });
        }
      }
    };
    </script>