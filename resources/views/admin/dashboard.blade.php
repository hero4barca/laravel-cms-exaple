
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Welcome to the Admin dashboard </title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: 'csrf_token() ' } </script>
        <!-- Just disable this stylesheet to style-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <style>
            body,html {
        
        background-color: #738491;
        color: #738491;
        font-family: "Open Sans";
        font-size: 16px;
        font-smoothing: antialiased;
        
      }

      body{        
        overflow-y: auto;             
             }

            .details-div{
              padding-bottom: 10px;
              margin-bottom: 10px;
              padding-top: 10px;
              padding-left: 5px;
              margin-top: 10px;
              display: block;
              clear: both;
              border: 1px solid #dee2e6!important;
              
                        }

       /*Simple side bar*/

    /*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */

 #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

      .wrapper {
              position: relative;
              overflow: hidden;
            }

            .wrapper:after {
              content: '';
              display: block;
              padding-top: 100%;
            }

            .wrapper img {
              width: auto;
              height: 100%;
              max-width: none;
              position: absolute;
              left: 50%;
              top: 0;
              transform: translateX(-50%);
            }
            .card-img-top{
              max-width: 450px;
              max-height: 200px;
            }

        </style>
    </head>
    <body>

      <div id="app">
        <Homepage 
          :user-name='@json(auth()->user()->name)' 
          :user-id='@json(auth()->user()->id)'
        ></Homepage>
      </div>

      <script src="{{ asset('js/app.js') }}"></script>

      <!-- Bootstrap core JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>
    </html>