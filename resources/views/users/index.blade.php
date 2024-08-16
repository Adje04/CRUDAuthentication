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

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id </th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Operation</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    
                    <td>

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
