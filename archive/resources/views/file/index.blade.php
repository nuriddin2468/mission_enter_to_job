@extends('layout')


@section('search')
    action='{{ route('folders.files.search') }}'
@endsection


@section('content')
    @if(count($files))
        <div class="row mt-3 p-5">
            @foreach($files as $file)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <a href="{{ route('files.show', $file->id) }}" class="h4">{{ $file->title }} , #{{ $file->id }}</a>
                        </div>
                        <div class="card-body">
                            <p>Шкаф: <a href="{{ route('lockers.show', $file->folder->cell->locker->id) }}"> {{ $file->folder->cell->locker->title }} #{{ $file->folder->cell->locker->id }}</a></p>
                            <p>Ячейка: <a href="{{ route('cells.show', $file->folder->cell->id) }}">{{ $file->folder->cell->title }} #{{ $file->folder->cell->id }}</a></p>
                            <p>Папка:  <a href="{{ route('folders.show', $file->folder->id) }}">{{ $file->folder->title }} #{{ $file->folder->id }}</a></p>
                        </div>

                        <div class="card-footer pl-1">
                            <form class="float-left" method="post" action="{{ route('files.destroy', $file->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить файл</button></form> <a href="{{ route('files.edit', $file->id) }}" class="btn btn-info">Изменить файл</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="h2 mt-3 text-danger text-center">Пока что нет никаких папок :( Создайте хотябы один!</div>
    @endif

@endsection
