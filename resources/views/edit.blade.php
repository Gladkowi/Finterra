@extends('welcome')
<div class="flex_show">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <h2>Редактирования товара: {{ $bakery->name ?? '' }}</h2>
    <form action="{{ route('bakery.update', ['bakery'=>$bakery->id]) }}" method="post" class="form" style="width: 40vw">
        {{csrf_field()}}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Название Товара</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $bakery->name ?? '' }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Количество</label>
            <input type="text" name="valume" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $bakery->valume ?? '' }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $bakery->link ?? '' }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория товара</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                @foreach($category as $category_one)
                @if($bakery->id_category == $category_one->id)
                <option value="{{ $category_one->id }}" selected>{{ $category_one->name_category }}</option>
                @else
                <option value="{{ $category_one->id }}">{{ $category_one->name_category }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Сохранить">
    </form>
</div>
<hr style="width: 50%; color: black; height: 2px; background-color: black; border-radius: 5px" />