<x-app-layout>
    <title>Show Post</title>
    <style>
        *{
            box-sizing: border-box;
        }
        .content{
            width: 600px;  
            margin: 10px 10px 30px;
            padding-bottom: 15px;
            border: 1px solid rgba(0, 0, 0, 0.295);
            border-radius: 5px;
            font-size: 23px;
            overflow: hidden;
        }

        .content p{
            margin-left: 25px;
        }
        .content p:first-child{
            color:red;
            background: #f0f0f0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.295);
            padding: 10px;
            margin: 0;
        }
        .content span{
            font-weight: bolder;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>

    <section class="container">
        <h1>Post Show</h1>
        <div class="content">
            <p>Post info</p>
            <p>
                <span>title:- </span> {{ $post->title }} <br>
                <span> Description:- </span>  <br>
                {{ $post->description }} <br> <br>
                <span>Created at:- </span> {{ $post->created_at }} <br>
            </p>
        
        </div>

        <div class="content">
            <p>Post Creator info</p> 
            <p> <span>name:- </span> {{ $post->user->name }}  <br>
                <span>Email:- </span> {{ $post->user->email }} <br>
                <span>Created at:- </span> {{ $post->user->created_at }} <br>
            </p>
        </div>
    </section>
</x-app-layout>