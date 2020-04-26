@extends('welcome')
<div class="flex_show">
    <h3>Добавить продукт</h3>
    <form action="{{ route('bakery.store') }}" method="post" class="form" style="width: 40vw">
        {{csrf_field()}}
        <div class="form-group" >
            <label for="exampleFormControlInput1">Название Товара</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Количество</label>
            <input type="text" name="valume" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                @foreach($category as $category_one)
                <option value="{{ $category_one->id }}">{{ $category_one->name_category }}</option>
                @endforeach
            </select>
        </div>
        <input name="items" type="submit" class="btn btn-outline-success" value="Добавить Товар">
    </form>
</div> 
<hr style="width: 50%; color: black; height: 2px; background-color: black; border-radius: 5px" />
<div class="flex_show">
    <h3>Добавить категорию</h3>
    <form action="{{ route('bakery.store') }}" method="post" class="form" style="width: 40vw">
        {{csrf_field()}}
        <div class="form-group" >
            <label for="exampleFormControlInput1">Название Категории</label>
            <input type="text" name="name_category" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ссылка на картинку</label>
            <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <input name="categorys" type="submit" class="btn btn-outline-success" value="Добавить Категорию">
    </form>
</div>

