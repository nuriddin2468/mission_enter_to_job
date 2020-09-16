@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Наименование файла: {{ $file->title }}</div>

    <div class="mt-4 btn-group"><a href="{{ route('files.edit', $file->id) }}" class="btn btn-info">Изменить файл</a><form class="float-left" method="post" action="{{ route('files.destroy', $file->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить файл</button></form></div>


    <div class="card w-50 mt-1">
        <div class="card-title text-center">О файле</div>
        <div class="card-body">
            <p>Шкаф: <a href="{{ route('lockers.show', $file->folder->cell->locker->id ) }}">{{ $file->folder->cell->locker->title }} #{{ $file->folder->cell->locker->id }}</a></p>
            <p>Ячейка: <a href="{{ route('cells.show', $file->folder->cell->id ) }}">{{ $file->folder->cell->title }} #{{ $file->folder->cell->id }}</a></p>
            <p>Папка: <a href="{{ route('folders.show', $file->folder->id ) }}">{{ $file->folder->title }} #{{ $file->folder->id }}</a></p>
        </div>
    </div>

        <div class="row mt-1 p-5">
                <div class="mt-3 container">
                    <p><b>Описание:</b> {{$file->description}}</p>
                    <p><b>Ссылка на скачивание файла:</b> <a href="{{$doc}}">Тык</a></p>
                </div>
        </div>
@endsection
