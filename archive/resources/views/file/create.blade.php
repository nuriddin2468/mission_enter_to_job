@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Добавление файла</div>
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mt-3">{{$error}}</div>
        @endforeach
    @endif

    <form class="mt-4" enctype="multipart/form-data" method="post" action="{{ route('folders.files.store', $folder_id) }}">
        @csrf
        <div class="form-group">
            <label>Название файла</label>
            <input type="text" name="title" class="form-control" placeholder="Введите название ячейки">
            <small class="form-text text-muted">Вы даете название файла для ориентации по файлами, так же шкафу будет выдан уникальный id</small>
            <label>Маленькое описание файлу</label>
            <textarea class="form-control" name="description"></textarea>
            <label>Выберите файл формата pdf или txt</label>
            <input class="form-control" type="file" name="path">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
