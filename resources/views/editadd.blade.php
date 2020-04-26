@extends('welcome')
<div class="flex_show">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <h2>Редактирование категории: {{ $category->name_category }}</h2>
    <form action="{{ route('bakery.updateadd', ['id'=>$category->id]) }}" method="post" class="form" style="width: 40vw">
        {{csrf_field()}}
        {{ method_field('PATCH') }}
        <div class="form-group" >
            <label for="exampleFormControlInput1" >Название Категории</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $category->name_category }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $category->link }}">
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Сохранить">
    </form>
</div>
<hr style="width: 45%; color: black; height: 2px; background-color: black; border-radius: 5px" />