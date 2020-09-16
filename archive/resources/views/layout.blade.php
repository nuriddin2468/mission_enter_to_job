<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Archive | Архив</title>

    <!-- Подключаем Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home')  }}">Archive | Архив</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-capitalize">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lockers.index') }}">шкафы</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('cells.index') }}">ячейки</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('folders.index') }}">папки</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('folders.files.index', 'all') }}">файлы</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" @section('search') hidden @show>
            @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <select name="stype" class="form-control">
                        <option value="1" class="dropdown-item">Поиск по айди</option>
                        <option value="2" class="dropdown-item">Поиск по названию</option>
                    </select>
                </div>
                <input name="sval" type="text" class="form-control" aria-label="Text input with dropdown button">
            </div>
            <button type="submit" class="btn btn-outline-success">Поиск</button>
        </form>
    </div>
</nav>

<div class="container mt-2">
    @yield('content')
</div>




<!-- Подключаем скрипты Bootstrap и Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>
</html>
