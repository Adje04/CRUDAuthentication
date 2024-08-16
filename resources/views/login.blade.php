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
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <h1 class="text-center mb-5">Connexion</h1>

                    @if ($errors->any())
                        <ul class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }} </div><br />
                    @endif

                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Saisir l'email ici..."
                        class="form-control"><br />

                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="text" name="password" id="password" placeholder="Saisir le mot de passe ici..."
                        class="form-control">
                    <br /><br />
                    <div class = "d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>

                    @if (Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('registration') }}">S'inscrire</a>

                    @endif 

                </form>
            </div>

        </div>
    </div>
</body>

</html>
