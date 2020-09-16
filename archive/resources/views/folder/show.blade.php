@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Наименование папки: {{ $folder->title }}</div>

    <div class="mt-4 btn-group"><a href="{{ route('folders.edit', $folder->id) }}" class="btn btn-info">Изменить папку</a><form class="float-left" method="post" action="{{ route('folders.destroy', $folder->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить папку</button></form></div>
    <div class="mt-4 float-right"><a class="btn btn-outline-primary" href="{{ route('folders.files.create', $folder->id) }}">Добавить файл</a></div>
    <div class="mt-4">
        <h3>Всего файлов: {{ count($folder->files) }}</h3>
    </div>

    @if(count($folder->files))
        <div class="row mt-1 p-5">
            @foreach($folder->files as $file)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <a href="{{ route('files.show', $file->id) }}" class="h4">{{ $file->title }} , #{{ $file->id }}</a>
                        </div>
                        <div class="card-body">
                            <p>Шкаф: <a href="{{ route('lockers.show', $folder->cell->locker->id) }}"> {{ $folder->cell->locker->title }} #{{ $folder->cell->locker->id }}</a></p>
                            <p>Ячейка: <a href="{{ route('cells.show', $folder->cell->id) }}">{{ $folder->cell->title }} #{{ $folder->cell->id }}</a></p>
                            <a>Папка: <a href="{{ route('folders.show', $folder->id) }}">{{$folder->title}} #{{ $folder->id }}</a></a>
                        </div>

                        <div class="card-footer pl-1">
                            <form class="float-left" method="post" action="{{ route('files.destroy', $file->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить файл</button></form> <a href="{{ route('files.edit', $file->id) }}" class="btn btn-info">Изменить файл</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
