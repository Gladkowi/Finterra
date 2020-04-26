<div>
    <form class="form-inline my-2 my-lg-0" action="{{ route('bakery.index') }}" wire:model="search">
        <input class="form-control mr-lg-2" name="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="https://image.flaticon.com/icons/svg/483/483356.svg" height="25px"></button>
    </form>
    <div style="display: flex; flex-direction: column; position: absolute; top: 50px; right: 20px; z-index: 500;">
        @if(!empty($posts))
        @php $treck = 0; @endphp
        @foreach($posts as $post)
        @if($treck < 8)
        <div class="card_smoll" style="margin-bottom: 5px;">
            <div>
                @auth
                <a style="margin: 0 5px" href="{{ route('bakery.show', ['bakery'=>$post->id]) }}"><img src="https://image.flaticon.com/icons/svg/2099/2099058.svg" height="25px"></a>
                <img src="{{ $post->link }}" height="19px">
                @endauth
                @guest
                <img style="margin-left: 15px" src="{{ $post->link }}" height="19px">
                @endguest
            </div>
            <span style="font-size: 15px; margin-left: 15px;">{{ $post->name }}</span>
            <div style="font-size: 8px; margin-right: 20px">Кол. {{ $post->valume }}</div>
        </div>
        @php $treck++ @endphp
        @endif
        @endforeach
        @endif
    </div>
</div>