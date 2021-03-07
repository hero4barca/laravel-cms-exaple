<template>
               
        
        <div id="users">

          <div>
            <router-link :to="{ name: 'create-admin-user', params:{} }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-light">
                        create new admin
                    </button>
                </router-link>
         </div>
        
          <div>

            <div class="border details-div" v-for="user in users">
              <p> User Name: {{ user.name }} 
               <br/>

               User Type (role): {{ user.role}}
               <br/>
               
               User Email: {{ user.email}}
               <br/>
               Created At: {{user.created_at }}
               <br/> </p> 

                <router-link :to="{ name: 'update-user', params: { userId : user.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
                <button 
                    type="button" 
                    @click="deleteUser(user.id)" 
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