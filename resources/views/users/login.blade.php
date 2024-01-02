@extends('layout')
@section('content')
<form method="POST" action="/login" class="input-form">
    @csrf
    <h2>Login</h2>
    <table>
        @error('email')
        <tr>
            <td colspan="2" class="error">{{ $message }}</td>
        </tr>
        @enderror
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" placeholder="Email" value="{{old('email')}}" require autocomplete="username"></td>
        </tr>
        @error('password')
        <tr>
            <td colspan="2" class="error">{{ $message }}</td>
        </tr>
        @enderror
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" placeholder="Password" require autocomplete="current-password"></td>
        </tr>
    </table>
    <button type="submit">Login</button>
</form>
@endsection