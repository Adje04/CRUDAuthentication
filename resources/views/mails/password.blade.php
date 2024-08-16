<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/icons/fontawesome/css/all.min.css') }}">
    <title>Authentication</title>
</head>

<body>

    <div class="container">
        <div class="col-xl-4 col-lg-2 col-md-4 col-sm-6 col-xs-12 mx-auto">
            <div class="card mt-5 p-3">

              <h3>Bonjour, {{ $email }}</h3>

              <h1>{{ $password }}</h1>

              <h4>Utiliser le mot de passe  ci-dessus pour confirmer vous connecter</h4>
              
            </div>
        </div>
    </div>
</body>

</html>
