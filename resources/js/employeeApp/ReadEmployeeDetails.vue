<template>
               
        
        <div id="employee">


          <div>

            <div class="card details-div text-center"   >
                <div class="card-header ">
                 <b><h4>Employee Name: {{ employee.name }} </h4> </b>                </div>

                

                <div class="card-body">
                  <h5 class="card-title " >Employer (company): {{ employee.company}} </h5>
                  <h6 class="card-subtitle  mb-2 text-muted"> Employee Email: {{ employee.email}}</h6>
                  <p class="card-text ">Created At: {{employee.created_at }}</p>
                  
                  <router-link :to="{ name: 'update-employee-details', params: { employeeId : employee.id } }">
                    <button type="button" class="p-1 mx-3  btn btn-primary">
                        Update
                    </button>
                </router-link>
                    
                </div>
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