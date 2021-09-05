@extends('admin._layouts.template')

@section('titlePage')
    Post
@endsection

@section('content')
    @if (session('message'))
        <div>
            {{session('message')}}
        </div>
        <hr>
    @endif 
    <h1>Posts</h1>

    <form action="{{route('admin.filter')}}" method="post">
        @csrf
        <input type="text" name="filter" id="filter">
        <button type="submit">Filter</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>DETAILS</th>
            <th>EDIT</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td><a href="{{route('admin.show', $post->id)}}">Show</a></td>
                <td><a href="{{route('admin.edit', $post->id)}}">Edit</a></td>
            </tr>
        @endforeach
    </table> 

    <hr>
    @if (isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
@endsection