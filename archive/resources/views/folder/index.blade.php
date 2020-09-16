@extends('layout')


@section('search')
    action='{{ route('folders.search') }}'
@endsection

@section('content')
    <div class="text-right mt-3"><a href="{{ route('folders.create') }}" class="btn btn-success">Добавить папку</a></div>
    @if(count($folders))
        <div class="row mt-3 p-5">
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
                            <form class="float-left" method="post" action="{{ route('folders.destroy', $folder->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить папку</button></form> <a href="{{ route('folders.edit', $folder->id) }}" class="btn btn-info">Изменить папку</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="h2 mt-3 text-danger text-center">Пока что нет никаких папок :( Создайте хотябы один!</div>
    @endif

@endsection
