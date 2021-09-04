<html>
    <head>
    </head>
    <body>
        <a href="{{ route('posts.create') }}">Create New</a>
        <hr> 
        <h1>Posts</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>CONTENT</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                </tr>
            @endforeach
            </table> 
    </body>
</html> 