<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Test Work</title>
</head>
<body>

<div class="outer">
    @if(\Illuminate\Support\Facades\Session::has('info'))
        <div class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('info')}}
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="name">
        <input type="submit" value="Загрузить">
    </form>

    <table>
        <tr><th>Размер</th><th>Дата загрузки</th><th>Сохранить</th><th>Удалить</th></tr>
        @forelse($data as $d)
        <tr>
            <th>{{\Illuminate\Support\Facades\Storage::size("public/".$d->name)}} байт</th>
            <th>{{$d->created_at}}</th>
            <th>
                <form action="{{route('download', ['name'=>$d->name])}}" method="get">
                    <input type="submit" value="Сохранить">
                </form>
            </th>
            <th>
                <form action="{{route('delete', ['name'=>$d->name])}}" method="get">
                    <input type="submit" value="Удалить">
                </form>
            </th>
        </tr>
        @empty
        <h2>Ещё нету файлов</h2>
        @endforelse
    </table>
</div>
</body>
</html>
