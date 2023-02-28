<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <div class="row">
            <h1 class="col-8 mt-5">Edit User Data</h1>
            <form action="{{route('user.edit', $user->id)}}" method="post" class="col-6 mx-5">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">User Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value=" {{$user->name}} ">  
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                  <label for="email" class="form-label">user Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                </div>
                @error('email')
                    <div class="alert alert-danger" >{{ $message }}</div>
                @enderror
                <div class="mb-3">
                  <label for="password" class="form-label">user Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{$user->password}}">
                </div>
                @error('password')
                    <div class="alert alert-danger" >{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>