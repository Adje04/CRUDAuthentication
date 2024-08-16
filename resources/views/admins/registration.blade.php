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
                <form action="{{ route('registration.process') }}" method="POST">
                    @csrf
                    <h1 class="text-center mb-5">Insciption</h1>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    @endif

                    @if ($message = Session::get('error'))
                        <div> {{ $message }} </div><br />
                    @endif

                    <label for="name" class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="name" id="name" placeholder="Saisir le nom ici..."
                        class="form-control"><br />

                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Saisir l'email ici..."
                        class="form-control"><br />

                    <label for="role" class="form-label">Role</label>
                    <input type="text" name="role" id="role" placeholder="Saisir autorisation..."
                        class="form-control"><br />

                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici..."
                        class="form-control"><br />

                    <label for="passwordConfirm" class="form-label">Confirmer mot de passe</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm"
                        placeholder="Confirmer le mot de passe ici..." class="form-control"><br />

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Soumettre</button><br />
                    </div>
                    <a href="{{ route('login') }}">Se connecter</a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
