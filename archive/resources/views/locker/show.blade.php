@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Наименование шкафа: {{ $locker->title }}</div>

    <div class="mt-4 btn-group"><a href="{{ route('lockers.edit', $locker->id) }}" class="btn btn-info">Изменить шкаф</a><form class="float-left" method="post" action="{{ route('lockers.destroy', $locker->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить шкаф</button></form></div>

    <div class="mt-4">
        <h3>Всего ячеек: {{ count($cells) }}</h3>
    </div>

    @if(count($cells))
        <div class="row mt-1 p-5">
            @foreach($cells as $cell)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <span class="h4">{{ $cell->title }} , #{{ $cell->id }}</span>
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
    @endif
@endsection
