  <template>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Company Dashboard </div>
      <div class="list-group list-group-flush">

        <router-link :to="{ name: 'company-profile', params: { userId } }">
          <a  class="list-group-item list-group-item-action bg-light" >Company details</a>
        </router-link>
      


      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <!-- 
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ userName}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          
                <div class="dropdown-divider"></div>
                <p @click="logout" class="dropdown-item" href="#">Logout</p>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid article">
        <div> 
            <router-view v-bind="myProps"></router-view> 
          </div>

      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper --> 
    </template>

    <style scoped>
         
      
    </style>
    <script>
    export default {
        computed: {
            myProps() {
              return { userId: this.userId, userName: this.userName }             
            }
          },
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
      data() {
        return {};
      },
      methods: {
        logout() {
          axios.post("/logout").then(() => {
            window.location = "/";
          });
        }
      }
    };
    </script>

    