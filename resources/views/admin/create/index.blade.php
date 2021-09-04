<html>
    <head>
    </head>
    <body>
        <h1>Create</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" id="title" placeholder="" value="{{old("title")}}">
                    </td>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="1" placeholder="">{{old("content")}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Send</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html> 