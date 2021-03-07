
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Welcome to the Admin dashboard </title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: 'csrf_token() ' } </script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <style>
            html, body {
            background-color: #202B33;
            color: #738491;
            font-family: "Open Sans";
            font-size: 16px;
            font-smoothing: antialiased;
            overflow: hidden;
            }
            .details-div{
              padding-bottom: 10px;
              margin-bottom: 10px;
              padding-top: 10px;
              padding-left: 5px;
              margin-top: 10px;
              display: block;
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
    </body>
    </html>