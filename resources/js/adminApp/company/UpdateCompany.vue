<template>
      <div class="container">
        <form>
          <div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
            <span v-if="successful" class="label label-sucess">Updated!</span>
          </div>

          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>

            <span v-if="errors.email" class="label label-danger">
              {{ errors.email[0] }}
            </span>

            <span v-if="errors.url" class="label label-danger">
              {{ errors.url[0] }}
          </span>

            <span v-if="errors.logo" class="label label-danger">
              {{ errors.logo[0] }}
            </span>
            
          </div>

          <div class="form-group">
            <input type="name" ref="name" class="form-control" id="name"  required>
          </div>

          <div class="form-group">
            <input type="email" ref="email" class="form-control" id="email"  required>
          </div>

          <div class="form-group">
            <input type="url" ref="url" class="form-control" id="url"  required>
          </div>

          <div class="custom-file mb-3">
            <input type="file" ref="logo" name="logo" class="custom-file-input" id="logo" required>
            <label class="custom-file-label" >{{ }}</label>
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
        this.getCompany();
      },
      props: {
        companyId: {
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
          let url = this.$refs.url.value;
          let logo = this.$refs.logo.value;
          let email = this.$refs.email.value;

          axios
            .put("/api/companies/" + this.companyId, { name, email, url, logo})
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
        },
        getCompany() {
          axios.get("/api/companies/" + this.companyId).then(response => {
            this.$refs.name.value = response.data.data.name;
            this.$refs.email.value = response.data.data.email;
            this.$refs.url.value = response.data.data.url;
            this.$refs.logo.value = response.data.data.logo;
          });
        }
      }
    };
    </script>