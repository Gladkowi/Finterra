@extends('welcome')
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('bakery.index') }}">Тестовое</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('register') }}">{{__('Регистрация')}}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">{{__('Войти')}}<span class="sr-only">(current)</span></a>
            </li>
            @endguest
            @auth
            <li class="nav-item active">
                <div class="nav-link">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="https://image.flaticon.com/icons/svg/1828/1828395.svg" height="20px" title="Выйти"></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </li>
            @endauth
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('bakery.index') }}"><img src="https://www.flaticon.com/premium-icon/icons/svg/2782/2782921.svg" height="25px" title="Сбросить"><span class="sr-only">Сбросить</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('bakery.index') }}" style="display: flex">
            <div>
                <select class="custom-select" name="sort">
                    <option value="val">Сортировать по кол</option>
                    <option value="val_desc">Сортировать по кол обратно</option>
                    <option value="name">Сортировать по имени</option>
                    <option value="name_desc">Сортировать по имени обратно</option>
                </select>
            </div>
            <div style="margin: 0 20px 0 10px"><button class="btn btn-outline-success" type="submit">Сортировать</button></div>
        </form>
        @livewire('counter')
    </div>
</nav>

<div class="main">

    @foreach($category as $category_one)
    <? $buf = 0; ?>
    @foreach($bakery[$category_one->id] as $bakery_one)
    @if($category_one->id == $bakery_one->id_category)
    <? $buf = $category_one->id; ?>
    @endif
    @endforeach

    @if($buf == $category_one->id)
    <div class="category">
        <div id="take_category">
            <div>
                @auth
                <a style="margin: 0 10px" href="{{ route('bakery.showadd', ['id'=>$category_one->id]) }}"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="25px"></a>
                <img src="{{ $category_one->link }}" height="28px">
                @endauth
                @guest
                <img style="margin-left: 15px" src="{{ $category_one->link }}" height="28px">
                @endguest
            </div>
            <span style="font-size: 20px; margin-left: 30px;">{{ $category_one->name_category }}</span>
            <img style="margin-right: 20px" id="activ" src="https://image.flaticon.com/icons/svg/748/748063.svg" height="25px">
        </div>
        <div style="display: flex;  flex-direction: column;">
            <div id="show_content">
                <div style="display: flex; flex-wrap: wrap">
                    @foreach($bakery[$category_one->id] as $bakery_one)
                    @if($bakery_one->id_category == $category_one->id)
                    <div class="card">
                        <img src="{{ $bakery_one->link }}" height="120px" style="margin-bottom: 20px">
                        <div style="display:flex; justify-content: space-between; width: 150px; align-items: flex-end;">
                            <div>{{ $bakery_one->name }}</div>
                            <div style="font-size: 8px">Кол. {{ $bakery_one->valume }}</div>
                            @auth
                            <a href="{{ route('bakery.show', ['bakery'=>$bakery_one->id]) }}"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="20px"></a>
                            @endauth
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div style="display: flex; justify-content: center; align-items: center;">{{ $bakery[$category_one->id]->links() }}</div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <a style="margin: 15px" href="{{ route('bakery.create') }}"><img id="add" src="https://image.flaticon.com/icons/svg/748/748113.svg" height="30px" title="Добавить товар или категорию"></a>
</div>