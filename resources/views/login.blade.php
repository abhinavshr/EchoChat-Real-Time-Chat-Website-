<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EchoChat Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
</head>

<body>
    <div class="container">
        <h1>EchoChat Login</h1>
        <form action="{{ route('handleLogin') }}" method="POST">
            @csrf
            <img src="{{ asset('images/profile.png') }}" alt="User  image" class="userImage">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td>
                        <input type="text" id="username" name="username"
                               placeholder="{{ $errors->has('username') ? $errors->first('username') : 'Enter Your Username' }}"
                               value="{{ old('username') }}"
                               style="{{ $errors->has('username') ? 'border-color: red;' : '' }}">
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Login">
        </form>
        {{-- <button onclick="fireEvent()" class="btnLogin">Login</button> --}}
    </div>
</body>

</html>
