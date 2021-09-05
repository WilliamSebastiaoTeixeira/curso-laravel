
@extends('admin._layouts.template')

@section('titlePage')
    Show
@endsection

@section('content')
    <h1>Show</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
        </tr>
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
        </tr>

        <tr>
            <td>
                <form action="{{route('admin.delete', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </table>
@endsection