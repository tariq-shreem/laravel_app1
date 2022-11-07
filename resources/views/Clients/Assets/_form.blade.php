



    @csrf
    @yield('inputs')
    <label>name</label>
    <input type="text" name="name" value="{{old('name', $client->name ?? '')  }}" /> <br />
    @error('name')
    <h5>{{$message}}</h5>
    @enderror
    <label>phone</label>
    <input type="text" name="phone" value="{{old('phone', $client->phone ?? '') }}"/> <br />
    @error('phone')
    <h5>{{$message}}</h5>
    @enderror
    <label>email</label>
    <input type="text" name="email" value="{{old('email', $client->email ?? '')  }}" /> <br />
    @error('email')
    <h5>{{$message}}</h5>
    @enderror
    <input type="submit"  />
</form>
