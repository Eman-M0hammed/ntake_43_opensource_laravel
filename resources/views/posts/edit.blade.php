<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <div class="row">
            <h1 class="col-8 mt-5">Edit Post</h1>
            <form action="{{route('post.edit', $post->id)}}" method="post" class="col-6 mx-5">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Post Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value=" {{$post->title}} ">  
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                  <label for="description" class="form-label">Post Description</label>
                  <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$post->description}}">
                </div>
                @error('description')
                    <div class="alert alert-danger" >{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>