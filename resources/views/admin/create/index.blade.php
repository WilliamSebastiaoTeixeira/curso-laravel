@extends('admin._layouts.template')

@section('titlePage')
    Create
@endsection

@section('content')
    <h1>Create</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('admin.store')}}" method="post">
        @csrf
        @include('admin._partials.form')
    </form>
@endsection
