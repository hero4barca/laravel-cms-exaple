<template>
               
        
        <div id="companies">

          <div>
            <router-link :to="{ name: 'create-company', params: { userId } }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-light">
                        New Company
                    </button>
                </router-link>
         </div>
         <p>This is the para</p>
          <div>

            <div class="border details-div" v-for="company in companies">
               Company Name: {{ company.name }} 
               <br/>
               Company Url: {{ company.url}} 
               <br/> 
               Company Email: {{ company.email}}
               <br/>
               Created At: {{company.created_at }}
               <br/>

                <router-link :to="{ name: 'update-company', params: { companyId : company.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
                <button 
                    type="button" 
                    @click="deleteCompany(company.id)" 
                    class="p-1 mx-3 float-right btn btn-danger"
                >
                    Delete
                </button>
                <br/>
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