<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>

        .active {
            background: gray;
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

    <a href="{{route('post.create')}}" style="font-size:20px; display:inline-block; margin:20px 5px 5px;">create new post</a>
    @if(Session::has('created'))
    <div class="alert-success">{{Session::get('created')}}</div>
    @endif
    <h1>All Posts</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Post Creator</th>
                <th>Created at</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="@if ($loop->first) active @endif">
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->postCreator }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                    <form action="{{ route('post.show', $post->id) }}" method="get"><button>Show</button></form>
                    <form action="" method="post"><button>Edit</button></form>
                    <form action="" method="post"><button>Delete</button></form>
                    
                    </td>
                </tr>
              
            @endforeach
        </tbody>
    </table>

</body>

</html>
