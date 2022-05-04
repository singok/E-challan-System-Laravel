<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>@yield('title')</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('images/fornt-logo/nepal-govt.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <style>

    *{
        margin: 0%;
        padding: 0%;
        font-family: Arial, Helvetica, sans-serif;
    }
      
    /* signin page */
    .sign-in {
        margin:auto auto;
        margin-top: 70px;
        width: 380px;
        border: 1px solid;
        border-radius: 25px;
        padding: 45px 30px;
    }

    .sign-in input {
        padding: 13px 13px;
    }
    .sign-in input:focus {
        background-color: rgb(245, 245, 245);
        box-shadow: none;
    }

    #title-signin {
        font-size: 30px;
    }

    .signin-logo {
        float: right;
        margin-top: -22px;
        height: 110px;
        width: 110px;
    }

    .sign-in button {
        color: white;
        border-radius: 30px;
        width: 100%;
        background-color: rgb(37, 155, 90);
        border: none;
        padding: 13px 0px;
    }

    .sign-in button:hover {
        background-color: rgb(108, 207, 153);
    }

    .forget-password {
        color: red;
    }
    .forget-password:hover {
        color: rgb(28, 40, 196);
        text-decoration: none;
    }

    .form-label {
        font-weight: bold;
    }

    .admin-login {
        color: green;
    }
    .admin-login:hover {
        color: rgb(19, 23, 226);
        text-decoration: none;
    }
    .heading {
        font-size: 19px;
    }

  </style>

</head>

<body>
    
    <div class="container">

        @yield('content')

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>