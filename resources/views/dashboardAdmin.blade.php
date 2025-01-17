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
    <table width = "100%" >
        <tbody>
            <tr>
                <td>
                    <h3>Tableau de bord</h3>
                </td>
                <td>
                    <li>
                        <a href="{{ route('users.index') }}">
                            Liste des utilisateurs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}">
                            Creer un utilisateur
                        </a>
                    </li>
                    <li>
                        <a href="">
                            modifier un utilisateur
                        </a>
                    </li>
                  
                </td>
                <td>
                    <a href="{{route('logout')}}">
                        se deconnecter
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>

</html>


