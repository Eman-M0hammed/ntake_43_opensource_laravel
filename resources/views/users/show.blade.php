<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Post</title>
    <style>
        *{
            box-sizing: border-box;
        }
        div{
            width: 900px;  
            margin: 10px 10px 30px;
            padding-bottom: 15px;
            border: 1px solid rgba(0, 0, 0, 0.295);
            border-radius: 5px;
            font-size: 23px;
            overflow: hidden;
        }

        div p{
            margin-left: 25px;
        }
        div p:first-child{
            color:red;
            background: #f0f0f0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.295);
            padding: 10px;
            margin: 0;
        }
        div span{
            font-weight: bolder;
            display: inline-block;
            margin-bottom: 10px;
        }
        table{
            overflow: hidden;
            text-align: center;
        }
        table form{
            display: inline-block;
        }
        table td {
            padding: 5px 10px;
        }
        table form button{
            text-decoration: none;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #dfd7fa;
            padding: 5px 15px;
            margin: 0 5px;
        }
        .alert-success{
            background-color: #adb3ed;
            padding: 20px;
            font-size: 20px;
            margin-top: 10px;
            width: 25%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>User Info</h1>
    
    <div>
        <p>Posts Creator info</p> 
        <p> <span>name:- </span> {{ $user->name }}  <br>
            <span>Email:- </span> {{ $user->email }} <br>
            <span>Created at:- </span> {{ $user->created_at }} <br>
        </p> 
    </div>
    <h1>His Posts</h1>
    <a href="{{route('post.create')}}" style="font-size:20px; display:inline-block; margin:20px 5px 5px;">create new post</a>
    @if(Session::has('success'))
    <div class="alert-success">{{Session::get('success')}}</div>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
                <tr class="@if ($loop->first) active @endif">
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                    <form action="{{ route('post.show', $post->id) }}" method="get"><button>Show</button></form>
                    <form action="{{ route('post.update', $post->id) }}" method="get"> <button>Edit</button></form>
                    <form action="{{ route('post.destroy', $post->id) }}" method="post"> 
                        @method('delete')
                        @csrf()
                        <button>Delete</button>
                    </form>
                    
                    </td>
                </tr>
              
            @endforeach
        </tbody>
    </table>
</body>
</html>