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

        <form action="{{route('admin.store')}}" method="post">
            @csrf
            @include('_partials.form')
        </form>
    </body>
</html> 