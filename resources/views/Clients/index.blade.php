<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if(Session::has('msg'))
        {{ Session::get('msg') }}
    @endif
    <table border="1px">
        <thead>
            <tr>
                <td>name</td>
                <td>phone</td>
                <td>email</td>
                <td>delete</td>
                <td>edit</td>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td><a href="{{ route('clients.edit',[$client->id]) }}">edit</a></td>
                    <td>
                        <form action="{{ route('clients.delete') }}"
                        method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="client_id" value="{{ $client->id }}" />
                            <input type="submit" value="delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
