<template>
               
        
        <div id="users">

          <div>
            <router-link :to="{ name: 'create-admin-user', params:{} }">
                    <button type="button" class="p-1 mx-3 btn btn-light">
                        create new admin
                    </button>
                </router-link>
         </div>
        
          <div>

             <div class="card details-div text-center" v-for="user in users"  >
                <div class="card-header ">
                 <b><h4>User Name: {{ user.name }} </h4> </b> 
                 </div>

                

                <div class="card-body">
                  <h5 class="card-title " >User Type (role): {{ user.role}}} </h5>
                  <h6 class="card-subtitle  mb-2 text-muted"> User Email: {{ user.email}}</h6>
                  <p class="card-text ">Created At: {{user.created_at }}</p>

                  
                  <router-link :to="{ name: 'update-user', params: { acctUserId : user.id } }">
                    <button type="button" class="p-1 mx-3  btn btn-primary">
                              Update
                    </button>
                  </router-link>

                  <button type="button"   
                        @click="deleteCompany(user.id)"                  
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
        this.getUsers();
      },
      data() {
        return {
          users: {},
          next: null,
          prev: null
        };
      },
      methods: {
        getUsers(address) {
          axios.get(address ? address : "/api/users").then(response => {
            this.users = response.data.data;
            this.prev = response.data.links.prev;
            this.next = response.data.links.next;
          });
        },
        deleteUser(id) {
          axios.delete("/api/users/" + id).then(response => this.getUsers())
        },
        navigate(address) {
          this.getUsers(address)
        }
      }
    };
    </script>