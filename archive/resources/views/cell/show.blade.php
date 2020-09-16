@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Наименование ячейки: {{ $cell->title }}</div>

    <div class="mt-4 btn-group"><a href="{{ route('cells.edit', $cell->id) }}" class="btn btn-info">Изменить ячейку</a><form class="float-left" method="post" action="{{ route('cells.destroy', $cell->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить ячейку</button></form></div>

    <div class="mt-4">
        <h3>Всего папок: {{ count($folders) }}</h3>
    </div>

    @if(count($folders))
        <div class="row mt-1 p-5">
            @foreach($folders as $folder)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <a href="{{ route('folders.show', $folder->id) }}" class="h4">{{ $folder->title }} , #{{ $folder->id }}</a>
                        </div>
                        <div class="card-body">
                            <p>Шкаф: <a href="{{ route('lockers.show', $folder->cell->locker->id) }}"> {{ $folder->cell->locker->title }} #{{ $folder->cell->locker->id }}</a></p>
                            <p>Ячейка: <a href="{{ route('cells.show', $folder->cell->id) }}">{{ $folder->cell->title }} #{{ $folder->cell->id }}</a></p>
                            <p>Файлов: {{ $folder->files->count() }}</p>
                        </div>

                        <div class="card-footer pl-1">
                            <form class="float-left" method="post" action="{{ route('folders.destroy', $cell->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить папку</button></form> <a href="{{ route('folders.edit', $folder->id) }}" class="btn btn-info">Изменить папку</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
