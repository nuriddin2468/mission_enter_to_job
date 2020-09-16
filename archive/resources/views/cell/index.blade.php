@extends('layout')

@section('search')
    action='{{ route('cells.search') }}'
@endsection


@section('content')
    <div class="text-right mt-3"><a href="{{ route('cells.create') }}" class="btn btn-success">Добавить ячейку</a></div>
    @if(count($cells))
            <div class="row mt-3 p-5">
                @foreach($cells as $cell)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <a href="{{ route('cells.show', $cell->id) }}" class="h4">{{ $cell->title }} , #{{ $cell->id }}</a>
                        </div>
                        <div class="card-body">
                            <p>Шкаф: <a href="{{ route('lockers.show', $cell->locker->id) }}"> {{ $cell->locker->title }} #{{ $cell->locker->id }}</a></p>
                            <p>Папок: {{ $cell->folders->count() }}</p>
                        </div>

                        <div class="card-footer pl-1">
                            <form class="float-left" method="post" action="{{ route('cells.destroy', $cell->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить ячейку</button></form> <a href="{{ route('cells.edit', $cell->id) }}" class="btn btn-info">Изменить ячейку</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    @else
        <div class="h2 mt-3 text-danger text-center">Пока что нет никаких ячеек :( Создайте хотябы один!</div>
    @endif

@endsection
