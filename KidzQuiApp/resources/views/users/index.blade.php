<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>All Users</h1>
        @if(empty($records))
            Nothing to show.
        @else
            @foreach($records as $record)
                <div>
                    {{ $record->firstName_kqt }}
                </div>
            @endforeach

        @endif

    </body>
</html>
