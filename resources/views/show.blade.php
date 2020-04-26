@extends('welcome')
@if(isset($bakery))
<div class="flex_show">
    <div class="card">
        <img src="{{ $bakery->link }}" height="120px" style="margin-bottom: 20px">
        <div style="display:flex; justify-content: space-between; width: 150px; align-items: flex-end;">
            <div>{{ $bakery->name }}</div>
            <div style="font-size: 8px">Кол. {{ $bakery->valume }}</div>
        </div>
    </div>
    <div style="display: flex;">
        <div style="margin: 10px"><a class="btn btn-outline-primary" href="{{ route('bakery.index') }}">Назад</a></div>
        <div style="margin: 10px"><a class="btn btn-outline-warning" href="{{url('/bakery/'.$bakery->id.'/edit')}}">редактировать</a></div>
        <form style="display: flex; margin: 10px;" action="{{ route('bakery.destroy', ['bakery'=>$bakery->id]) }}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-outline-danger" type="submit">Удалить</button>
        </form>
    </div>
</div>
@endif


@if(isset($category))
<div class="flex_show">
    <div id="take_category" style="margin: 30px;">
        <img style="margin-left: 15px" src="{{ $category->link }}" height="28px">
        <span style="font-size: 20px; margin-left: 30px; margin-right: 20px">{{ $category->name_category }}</span>
    </div>
    <div style="display: flex;">
        <div style="margin: 10px"><a class="btn btn-outline-primary" href="{{ route('bakery.index') }}">Назад</a></div>
        <div style="margin: 10px"><a class="btn btn-outline-warning" href="{{ route('bakery.editadd', ['id'=>$category->id]) }}">редактировать</a></div>
        <form style="display: flex; margin: 10px" action="{{ route('bakery.destroyadd', ['id'=>$category->id]) }}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-outline-danger" type="submit">Удалить</button>
        </form>
    </div>
</div>
@endif