<template>
               
        
        <div id="employees">

          <div>
            <router-link :to="{ name: 'create-employee', params:{} }">
                    <button type="button" class="p-1 mx-3 btn btn-light">
                        New Employee
                    </button>
                </router-link>
         </div>
        
          <div>

              <div class="card details-div text-center" v-for="employee in employees"  >
                <div class="card-header ">
                 <b><h4>Employee Name: {{ employee.name }} </h4> </b>                </div>

                

                <div class="card-body">
                  <h5 class="card-title " >Employer (company): {{ employee.company}} </h5>
                  <h6 class="card-subtitle  mb-2 text-muted"> Employee Email: {{ employee.email}}</h6>
                  <p class="card-text ">Created At: {{employee.created_at }}</p>

                  
                  <router-link :to="{ name: 'update-employee', params: { employeeId : employee.id } }">
                    <button type="button" class="p-1 mx-3  btn btn-primary">
                              Update
                    </button>
                  </router-link>

                  <button type="button"   
                        @click="deleteCompany(employee.id)"                  
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
        this.getEmployees();
      },
      data() {
        return {
          employees: {},
          next: null,
          prev: null
        };
      },
      methods: {
        getEmployees(address) {
          axios.get(address ? address : "/api/employees").then(response => {
            this.employees = response.data.data;
            this.prev = response.data.links.prev;
            this.next = response.data.links.next;
          });
        },
        deleteEmployee(id) {
          axios.delete("/api/employees/" + id).then(response => this.getEmployees())
        },
        navigate(address) {
          this.getEmployees(address)
        }
      }
    };
    </script>