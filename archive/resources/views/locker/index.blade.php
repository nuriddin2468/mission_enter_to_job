@extends('layout')

@section('search')
    action='{{ route('lockers.search') }}'
@endsection

@section('content')
        <div class="text-right mt-3"><a href="{{ route('lockers.create') }}" class="btn btn-success">Добавить шкаф</a></div>
        @if(count($lockers))
            <div class="row mt-3 p-5">
                @foreach($lockers as $locker)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-title text-center">
                            <a href="{{ route('lockers.show', $locker->id) }}" class="h4">{{ $locker->title }} , #{{ $locker->id }}</a>
                        </div>
                        <div class="card-body">
                            <p>Ячеек: {{ $locker->cells->count() }}</p>
                        </div>

                        <div class="card-footer">
                            <form class="float-left" method="post" action="{{ route('lockers.destroy', $locker->id) }}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Удалить шкаф</button></form> <a href="{{ route('lockers.edit', $locker->id) }}" class="btn btn-info">Изменить шкаф</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            <div class="h2 mt-3 text-danger text-center">Пока что нет никаких шкафов :( Создайте хотябы один!</div>
        @endif

@endsection
