@extends('layout')

@section('content')
        <div class="text-right mt-3"><a href="{{ route('lockersCreate') }}" class="btn btn-success">Добавить шкаф</a></div>
        @if(count($lockers))
            @foreach($lockers as $locker)
            <div class="row mt-3 p-5">
                <div class="col-4">
                    <div class="card">
                        <div class="card-title text-center">
                            <span class="h4">{{ $locker->title }} , #{{ $locker->id }}</span>
                        </div>
                        <div class="card-body">
                            <p>Ячеек: </p>
                            <p>Папок: </p>
                            <p>Файлов: </p>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-danger">Удалить шкаф</button> <button class="btn btn-info">Изменить шкаф</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="h2 mt-3 text-danger text-center">Пока что нет никаких шкафов :( Создайте хотябы один!</div>
        @endif

@endsection
