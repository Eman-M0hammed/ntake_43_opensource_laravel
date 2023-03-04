<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>

        .active {
            background: gray;
        }
        table{
            overflow: hidden;
            text-align: center;
            margin-bottom: 25px;
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
            width: 35%;
            border-radius: 5px;
        }
    </style>
</head>

<body>

   
    <section class="container">
        <a href="{{route('user.create')}}" style="font-size:20px; display:inline-block; margin:20px 5px 5px;">Add new User</a>
        @if(Session::has('success'))
        <div class="alert-success">{{Session::get('success')}}</div>
        @endif
    <h1>All Users</h1>
    <div class="d-flex flex-column">
        <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="@if ($loop->first) active @endif">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                    <form action="{{ route('user.show', $user->id) }}" method="get"><button>Show</button></form>
                    <form action="{{ route('user.update', $user->id) }}" method="get"> <button>Edit</button></form>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post"> 
                        @method('delete')
                        @csrf()
                        <button>Delete</button>
                    </form>
                    
                    </td>
                </tr>
              
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
