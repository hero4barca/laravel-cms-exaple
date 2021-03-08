<template>

               
        
        <div id="employees">
        
          <div>

            <div class="card details-div text-center" v-for="employee in employees"  >
                <div class="card-header ">
                 <b><h4>Employee Name: {{ employee.name }} </h4> </b>                </div>

                

                <div class="card-body">
                  <h5 class="card-title " >Employer (company): {{ employee.company}} </h5>
                  <h6 class="card-subtitle  mb-2 text-muted"> Employee Email: {{ employee.email}}</h6>
                  <p class="card-text ">Created At: {{employee.created_at }}</p>
                  
                    
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
      
      props: {
        userId: {
          type: Number,
          required: true
        },
        userName: {
          type: String,
          required: true
        }
      },
      mounted() {
        this.getCompanyEmployees();
      },
      data() {
        return {
          employees: {},
          next: null,
          prev: null
        };
      },
      methods: {
        getCompanyEmployees(address) {
          axios.get(address ? address : "/api/companies/" + this.userId + "/company_employees")
          .then(response => {
            this.employees = response.data.data;
            //this.prev = response.data.links.prev;
            //this.next = response.data.links.next;
          });
        },
        navigate(address) {
          this.getCompanyEmployees(address)
        }
      }
    };
    </script>