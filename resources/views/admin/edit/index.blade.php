
@extends('admin._layouts.template')

@section('titlePage')
    Edit
@endsection

@section('content')
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
        @include('admin._partials.form')
    </form> 
@endsection
