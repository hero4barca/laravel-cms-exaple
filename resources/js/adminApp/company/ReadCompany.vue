<template>               
        
        <div id="companies">

          <div>
            <router-link :to="{ name: 'create-company', params:{} }">
                    <button type="button" class="p-1 mx-3  btn btn-light">
                        New Company
                    </button>
                </router-link>
         </div>
         
         
        
          
          
          <div>

              <div class="card details-div text-center" v-for="company in companies"  >
                <div class="card-header text-center">
                 <b><h4>Company Name: {{ company.name }} </h4> </b> 
                </div>

                <div class="">
                <img :src="company.logo_url " class="card-img-top"  alt="Card image cap">
                </div>

                <div class="card-body">
                  <h5 class="card-title text-center" >Company Url: {{ company.url}} </h5>
                  <h6 class="card-subtitle text-center mb-2 text-muted"> Company Email: {{ company.email}}</h6>
                  <p class="card-text text-center ">Created At: {{company.created_at }}</p>

                  
                  <router-link :to="{ name: 'update-company', params: { companyId : company.id } }">
                    <button type="button" class="p-1 mx-3  btn btn-primary">
                              Update
                    </button>
                  </router-link>

                  <button type="button"   
                        @click="deleteCompany(company.id)"                  
                        class="p-1 mx-3  btn btn-danger" >
                        Delete
                    </button>
                    
                </div>
              </div>
                
          </div>


            <div>
                <button 
                    v-if="next" 
                    type="button" 
                    @click="navigate(next)" 
                    class="m-3 btn btn-primary"
                >
                  Next
                </button>
                <button 
                    v-if="prev" 
                    type="button" 
                    @click="navigate(prev)" 
                    class="m-3 btn btn-primary"
                >
                  Previous
                </button>
            </div>


        </div>
    </template>
     <script>
    export default {
      mounted() {
        this.getCompanies();
      },
      data() {
        return {
          companies: {},
          next: null,
          prev: null
        };
      },
      methods: {
        getCompanies(address) {
          axios.get(address ? address : "/api/companies").then(response => {
            this.companies = response.data.data;
            this.prev = response.data.links.prev;
            this.next = response.data.links.next;
          });
        },
        deleteCompany(id) {
          axios.delete("/api/companies/" + id).then(response => this.getCompanies())
        },
        navigate(address) {
          this.getCompanies(address)
        }
      }
    };
    </script>