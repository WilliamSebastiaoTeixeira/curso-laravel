<html>
    <head>
    </head>
    <body>
        <h1>
            Edit
        </h1>

        @if (session('message'))
            <div>
                {{session('message')}}
            </div>
            <hr>
        @endif 

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <hr>
        @endif

        <form action="{{route('admin.change', $post->id)}}" method="post">
            @csrf
            @method('put')
            <table>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" id="title" placeholder="" value="{{$post->title}}">
                    </td>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="1" placeholder="">{{$post->content}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Change</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>