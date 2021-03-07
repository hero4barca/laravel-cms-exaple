<template>
               
        
        <div id="employee">

          
        
          <div>

            <div class="border details-div" >
              <p> Employee Name: {{ employee.name }} 
               <br/>

               Employer (company): {{ employee.company}}
               <br/>
               
               Employee Email: {{ employee.email}}
               <br/>
               Created At: {{employee.created_at }}
               <br/> </p> 

                <router-link :to="{ name: 'update-employee-details', params: { employeeId : employee.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
               
                <br/>
            </div>

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
        this.getEmployee();
      },
      data() {
        return {
          employee: {},
          
        };
      },
      methods: {
        getEmployee(address) {
          axios.get(address ? address : "/api/employees/get_user_employee/" + this.userId).then(response => {
            this.employee = response.data.data;
            
          });
        },
       
      }
    };
    </script>