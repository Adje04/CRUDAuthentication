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

                <a href="">
                    Retour
                </a><br/>
                <form action=" {{route('users.update', $user->id)}} " method="POST">
                    @csrf

                    @method("PUT")
                    <h3 class="text-center mb-3">Modifier un utilisateur</h3>

                    @if ($errors->any())
                        <ul class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }} </div><br />
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }} </div><br />
                    @endif
                    
                    <label for="name" class="form-label">nom</label>
                    <input type="text" name="name" id="name" placeholder="Saisir le nom ici..."
                        class="form-control"><br />

                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Saisir l'email ici..."
                        class="form-control"><br />

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">modifier</button>
                      

                       

                    </div>

                </form>
            <div>
        </div>
    </div>   
</body>

</html>
