<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Login</h1>
<form method="post" action="{{url('/login/verify')}}">
    @csrf
    <p>
        <label for="">Email</label>
        <input type="email" name="username" placeholder="Username" />
    </p>
    <p>
        <label for="">Password</label>
        <input type="password" name="password" />
    </p>
    <p>
        <input type="submit">
    </p>
</form>

</body>
</html>
