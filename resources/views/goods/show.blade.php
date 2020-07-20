@extends('layouts.show')

@section('content')
    <div class="container">
        <div class="body-container">
            <div class="goods-details">
                <div class="link">
                    <ul>
                        <li><a href="{{ action('GoodsController@index') }}">ユニクロTOP</a> ></li>
                        <li><a href="#">WOMANトップ</a> ></li>
                        <li><a href="#">Tシャツ（半袖・タンクトップ）</a> ></li>
                        <li><a href="#">マーセライズコットンボートネックT（半袖）</a></li>
                    </ul>
                </div>
                <div class="detail">
                    <div class="details top" id="top">
                        <div class="goods-name">
                            <h1>{{ $goods->name }}</h1>
                        </div>
                        <div class="description">
                            <p>{{ $goods->description }}</p>
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{ asset('storage/image/'  . $goods->image_path) }}">
                        <div class="like-btn">
                            @if(Auth::guard('user')->check())
                                @if ($like)
                                    <button type="submit" class="like_btn like" >
                                        <i class="fas fa-heart"></i>
                                        Like <span class="likes_count">{{ $goods->likes->count() }}</span>
                                    </button>
                                @else
                                    <button type="submit" class="like_btn unlike">
                                        <i class="far fa-heart"></i>
                                        Like <span class="likes_count">{{ $goods->likes->count() }}</span>
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="details bottom" id="bottom">
                        <div class="select-color">
                            <h1>・カラーを選択</h1>
                        </div>
                        <div class="select-size">
                            <h1>・サイズを選択</h1>
                            <button class="btn">XS</button>
                            <button class="btn">S</button>
                            <button class="btn">M</button><br>
                            <button class="btn">L</button>
                            <button class="btn">XL</button>
                            <button class="btn">2XL</button>
                        </div>
                        <div>
                            <h1 style="font-size: 15px; margin-bottom: 10px">・数量を選択</h1>
                            <div class="qty">
                                <input type="button" value="-" id="minus">
                                <div id="count" style="display: inline-block;">0</div>
                                <input type="button" value="+" id="plus">
                            </div>
                        </div>
                        <form action="/mycart" method="post" class="add-cart">
                            @csrf
                            <input type="hidden" name="goods_id" value="{{ $goods->id }}">
                            <input type="submit" value="カートに入れる" class="button">
                        </form>
                        <input type="submit" value="在庫を確認する" class="button"></input>
                        <ul class="link-more">
                            <li><a href="#">はじめてのお客様へ</a></li>
                            <li><a href="#">在庫について</a></li>
                            <li><a href="#">返品・返金・交換について</a></li>
                            <li><a href="#">法人のお客様へ</a></li>
                            <li><a href="#">大量購入希望のお客様へ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="recommendation">
                <h1 class="recommend-goods">このアイテムを見た人は、こちらのアイテムも見ています</h1>
                @foreach ($goods_recommends as $recommend)
                    <div class="recommends">
                        <img src="{{ asset('storage/image/'  . $recommend->image_path) }}">
                        <h1>{{ $recommend->name }}</h1>
                        <p>¥1500</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {

    // いいねする
    $(document).on("click", "button.like_btn.unlike", function() {
        const goods = @json($goods);
        let url = "/goods/" + goods.id + "/likes_store";
        console.log('url_unlike', url);
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({	
            url: url,
            type:"post",
            contentType: "application/json",
            // サーバから返されるデータの種類
            // "json"を指定すると、JavaScriptオブジェクトを返す
            dataType:"json",
        }).done(function(data,textStatus,jqXHR) {
            $("#p1").text(jqXHR.status); //例：200
            console.log("goods", data.goods); //1
            const goods = data.goods;
            $("span.likes_count").text(goods.likes_count);
            const heart = $("button.like_btn .fa-heart");

            heart.removeClass("far");
            heart.addClass("fas");

            const likeBtn = $("button.like_btn");
            likeBtn.removeClass('unlike');
            likeBtn.addClass('like');
            

        }).fail(function(jqXHR, textStatus, errorThrown){
            $("#p1").text("err:"+jqXHR.status); //例：404
            $("#p2").text(textStatus); //例：error
            $("#p3").text(errorThrown); //例：NOT FOUND
        }).always(function(){
        });
    });

    // いいね解除
    $(document).on("click", "button.like_btn.like", function() {
        const goods = @json($goods);
        let url = "/goods/" + goods.id + "/likes_destroy";
        console.log('url_like', url);

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({	
            url: url,
            type:"post",
            contentType: "application/json",
            // サーバから返されるデータの種類
            // "json"を指定すると、JavaScriptオブジェクトを返す
            dataType:"json",
        }).done(function(data,textStatus,jqXHR) {
            $("#p1").text(jqXHR.status); //例：200
            console.log("goods", data.goods); //1
            const goods = data.goods;
            $("span.likes_count").text(goods.likes_count);
            const heart = $("button.like_btn .fa-heart");
            heart.removeClass("fas");
            heart.addClass("far");

            const likeBtn = $("button.like_btn");
            likeBtn.removeClass('like');
            likeBtn.addClass('unlike');
        
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("#p1").text("err:"+jqXHR.status); //例：404
            $("#p2").text(textStatus); //例：error
            $("#p3").text(errorThrown); //例：NOT FOUND
        }).always(function(){
        });
    });
});
</script>