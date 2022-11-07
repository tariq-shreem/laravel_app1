@if ($errors->any())
@foreach ($errors->all() as $error )
      {{ $error }}
@endforeach
@endif
<form method="post" action=@yield('route')>
    @csrf
    @yield('method')
    @yield('inputs')
    <label>name</label>
    <input type="text" name="name" value="@yield('name_value')" /> <br />
    <label>phone</label>
    <input type="text" name="phone" value="@yield('phone_value')"/> <br />
    <label>email</label>
    <input type="text" name="email" value="@yield('email_value')" /> <br />
    <input type="submit"  />
</form>
