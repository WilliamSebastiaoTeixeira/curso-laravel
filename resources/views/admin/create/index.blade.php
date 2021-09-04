<html>
    <head>
    </head>
    <body>
        <h1>Create</h1>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" id="title" placeholder="">
                    </td>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="1" placeholder=""></textarea>
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