@extends('layout')

@section('content')
    <div class="h2 text-center mt-3">Добавление шкафа</div>
        @if($errors)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger mt-3">{{$error}}</div>
            @endforeach
        @endif

        <form class="mt-4" method="post" action="{{ route('lockersCreateReq') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Название шкафа</label>
                <input type="text" name="title" class="form-control" placeholder="Введите название шкафа">
                <small class="form-text text-muted">Вы даете название шкафу для ориентации по шкафам, так же шкафу будет выдан уникальный id</small>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
@endsection
