<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    @extends('Clients.form')
    @section('route') {{route('clients.update')}}  @endsection
    @section('method') @method("put") @endsection
    @section('inputs')
        <input type="hidden" value="{{ $client->id }}" name="client_id" />
    @endsection
    @section('name_value'){{$client->name}}@endsection
    @section('phone_value'){{$client->phone}}@endsection
    @section('email_value'){{$client->email}}@endsection



</body>
</html>
