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
            width: 600px;  
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
    </style>
</head>
<body>
    <h1>Post Show</h1>
    <div>
        <p>Post info</p>
        <p>
            <span>title:- </span> {{ $post->title }} <br>
            <span> Description:- </span>  <br>
            {{ $post->description }} <br> <br>
            <span>Created at:- </span> {{ $post->created_at }} <br>
        </p>
    
    </div>

    <div>
        <p>Post Creator info</p> 
        <p> <span>name:- </span> {{ $post->user->name }}  <br>
            <span>Email:- </span> {{ $post->user->email }} <br>
            <span>Created at:- </span> {{ $post->user->created_at }} <br>
        </p>
        
        
    </div>
</body>
</html>