<html>
    <head>
    </head>
    <body>
        <a href="{{ route('posts.create') }}">Create New</a>
        <hr>
        @if (session('message'))
            <div>
                {{session('message')}}
            </div>
            <hr>
        @endif 
        <h1>Posts</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>DETAILS</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td><a href="{{route('posts.show', $post->id)}}">Open</a></td>
                </tr>
            @endforeach
        </table> 
    </body>
</html> 