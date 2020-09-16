@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Изменение файла</div>
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mt-3">{{$error}}</div>
        @endforeach
    @endif

    <form class="mt-4" enctype="multipart/form-data" method="post" action="{{ route('files.update', $file->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Название файла</label>
            <input value="{{ $file->title }}" type="text" name="title" class="form-control" placeholder="Введите название ячейки">
            <small class="form-text text-muted">Вы даете название файла для ориентации по файлами, так же шкафу будет выдан уникальный id</small>
            <label>Маленькое описание файлу</label>
            <textarea class="form-control" name="description">{{ $file->description }}</textarea>
            <label>Выберите файл формата pdf или txt, <a href="{{ $doc }}">Данный файл</a> </label>
            <input class="form-control" type="file" name="path">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
