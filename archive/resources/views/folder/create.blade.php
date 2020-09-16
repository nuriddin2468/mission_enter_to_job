@extends('layout')

@section('content')
    <script type="text/javascript">
        function getCells(id) {
                let cellsField = document.getElementById('cell_id');
                if(id != -1) {
                fetch('http://127.0.0.1:8000/api/cells/' + id, {method: 'GET'}).then(response => response.json()).then(json => {
                    console.log(json)
                    cellsField.innerHTML = '<option value="-1">Выберите поле</option>';
                    for (let i = 0; i < json.length; i++) {
                        console.log(json[i].title);
                        cellsField.innerHTML = cellsField.innerHTML + "<option value='" + json[i].id + "'>" + json[i].title + " #" + json[i].id +"</option>";
                    }
                });
            }else{

                }
        }
    </script>



    <div class="h2 text-center mt-3">Добавление папки</div>
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mt-3">{{$error}}</div>
        @endforeach
    @endif

    <form class="mt-4" method="post" action="{{ route('folders.store') }}">
        @csrf
        <div class="form-group">
            <label>Название папки</label>
            <input type="text" name="title" class="form-control" placeholder="Введите название папки">
            <small class="form-text text-muted">Вы даете название папки для ориентации по шкафам, так же шкафу будет выдан уникальный id</small>
            <label>Выберите шкаф</label>
            <select name="locker_id" class="form-control" onchange="getCells(this.value)">
                <option value="-1">Выберите поле</option>
                @foreach($lockers as $locker)
                    <option value="{{ $locker->id }}">{{$locker->title}} #{{ $locker->id }}</option>
                @endforeach
            </select>
            <label>Выберите ячейку</label>
            <select name="cell_id" id="cell_id" class="form-control">
                <option>Обрабатывается. . .</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
