@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Добавление ячейки</div>
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mt-3">{{$error}}</div>
        @endforeach
    @endif

    <form class="mt-4" method="post" action="{{ route('cells.store') }}">
        @csrf
        <div class="form-group">
            <label>Название ячейки</label>
            <input type="text" name="title" class="form-control" placeholder="Введите название ячейки">
            <small class="form-text text-muted">Вы даете название ячейки для ориентации по шкафам, так же шкафу будет выдан уникальный id</small>
            <label>Выберите шкаф</label>
            <select name="locker_id" class="form-control">
                @foreach($lockers as $locker)
                    <option value="{{ $locker->id }}">{{$locker->title}} #{{ $locker->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
