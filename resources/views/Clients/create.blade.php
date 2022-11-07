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
    @section('route') {{route('clients.store')}}  @endsection

    @section('name_value'){{old('name') }}@endsection
    @section('phone_value'){{old('phone') }}@endsection
    @section('email_value'){{old('email') }}@endsection


</body>
</html>
