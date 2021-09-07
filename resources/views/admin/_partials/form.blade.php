<table>
    <tr>
        <th>Title</th>
        <th>Content</th>
    </tr>
    <tr>
        <td>
            <input type="text" name="title" id="title" placeholder="" value="{{ $post->title ?? old('title')}}">
        </td>
        <td>
            <textarea name="content" id="content" cols="30" rows="1" placeholder="">{{ $post->content ?? old('content') }}</textarea>
        </td>
        <td>
            <input type="file" name="image" id="image">
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit">Change</button>
        </td>
    </tr>
</table>