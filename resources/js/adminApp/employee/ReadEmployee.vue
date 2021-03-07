<template>
               
        
        <div id="employees">

          <div>
            <router-link :to="{ name: 'create-employee', params:{} }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-light">
                        New Employee
                    </button>
                </router-link>
         </div>
        
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

                <router-link :to="{ name: 'update-employee', params: { employeeId : employee.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
                <button 
                    type="button" 
                    @click="deleteEmployee(employee.id)" 
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