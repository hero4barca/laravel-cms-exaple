<template>

               
        
        <div id="employees">
        
          <div>

            <div class="border details-div" v-for="employee in employees">
              <p> Employee Name: {{ employee.name }} 
               <br/>

               Employer (company): {{ employee.company}}
               <br/>
               
               Employee Email: {{ employee.email}}
               <br/>
               Created At: {{employee.created_at }}
               <br/> </p> 

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
            this.prev = response.data.links.prev;
            this.next = response.data.links.next;
          });
        },
        deleteEmployee(id) {
          axios.delete("/api/employees/" + id).then(response => this.getCompanyEmployees())
        },
        navigate(address) {
          this.getCompanyEmployees(address)
        }
      }
    };
    </script>