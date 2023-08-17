<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h2 class="mt-3">User Registration</h2>
        <div class="col-md-5">
            @if(Session::has('success'))
                <div class="alert alert-light" role="alert">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
            @endif
            <form action="{{route('user.create')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                           placeholder="Enter Full Name">
                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}"
                           placeholder="Enter Email">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                    <span class="text-danger">@error('cpassword') {{$message}} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                Already Registered <a href="{{route('user.login')}}">Login</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
