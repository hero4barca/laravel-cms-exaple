  <template>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Company Dashboard </div>
      <div class="list-group list-group-flush">

      <a style="color: white" href="/employee/profile">Dashboard</a> 
      <a style="color: white" href="/company/profile">Profile</a> 
      <li>
        <router-link :to="{ name: 'company-profile', params: { userId } }">
                   Company details
        </router-link>
      </li>
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <header>
            <header class="d-inline">Welcome, {{ userName }}</header>
            <p @click="logout" class="float-right mr-3" style="cursor: pointer">Logout</p>
          </header>
          </div>
        </div>
         
        <div class="row">

         <nav>
          <section>     
            
           
            
            <ul>
              <li>
             <a style="color: white" href="/employee/profile">Dashboard</a> 
              </li>

            <li>
            <a style="color: white" href="/company/profile">Profile</a> 
            </li>
            
               <li>
                 <router-link :to="{ name: 'company-profile', params: { userId } }">
                   Company details
                 </router-link>
               </li>
               
               
            </ul>
        </section>
        </nav>

        <article >
         
          <div> 
            <router-view v-bind="myProps"></router-view> 
          </div>
        </article>

      </div>
      </div>
    </template>

        <style scoped>
      @import url(https://fonts.googleapis.com/css?family=Dosis:300|Lato:300,400,600,700|Roboto+Condensed:300,700|Open+Sans+Condensed:300,600|Open+Sans:400,300,600,700|Maven+Pro:400,700);
      @import url("https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css");
      * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }
      header {
        color: #d3d3d3;
      }
      nav {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 82%;
        left: 0;
        padding: 22px;
        border-right: 2px solid #161e23;
      }
      nav > header {
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
      }
      nav section {
        font-weight: 600;
      }
      nav section header {
        padding-top: 30px;
      }
      nav section ul {
        list-style: none;
        padding: 0px;
      }
      nav section ul a {
        color: white;
        text-decoration: none;
        font-weight: bold;
      }
      article {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 18%;
        overflow: auto;
        border-left: 2px solid #2a3843;
        padding: 20px;
      }
      article > header {
        height: 60px;
        border-bottom: 1px solid #2a3843;
      }
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

    