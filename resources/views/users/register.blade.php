@extends('layout')
@section('content')
<form method="POST" action="/register" class="input-form">
    @csrf
    <h2>Register</h2>
    <table>
        @error('name')
        <tr>
            <td colspan="2" class="error">{{ $message }}</td>
        </tr>
        @enderror
        <tr>
            <td><label for="name">Name</label></td>
            <td><input type="text" name="name" placeholder="Name" value="{{old('name')}}" require autocomplete="username"></td>
        </tr>
        @error('email')
        <tr>
            <td colspan="2" class="error">{{ $message }}</td>
        </tr>
        @enderror
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" placeholder="Email" value="{{old('email')}}" require autocomplete="email"></td>
        </tr>
        @error('password')
        <tr>
            <td colspan="2" class="error">{{ $message }}</td>
        </tr>
        @enderror
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" placeholder="Password" require autocomplete="new-password"></td>
        </tr>
    </table>
    <button type="submit">Register</button>
</form>
@endsection