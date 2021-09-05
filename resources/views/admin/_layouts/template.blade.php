<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titlePage') - {{config('app.name')}}</title>
</head>
<body>
    <a href="{{ route('admin.posts') }}">Posts</a>
    <a href="{{ route('admin.create') }}">Create New</a>
    <hr>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>