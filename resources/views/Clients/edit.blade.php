<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post" action="{{route('clients.update')}}">
    @method('PUT')
    @extends('Clients.form')

    @section('inputs')
        <input type="hidden" value="{{ $client->id }}" name="client_id" />
    @endsection
</body>
</html>
