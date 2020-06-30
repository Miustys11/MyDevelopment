@extends('layouts.show')

@section('content')
<div class="container-fluid">
   <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
            {{ Auth::guard("user")->user()->name }}さんのカートの中身一覧</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($carts as $cart)
                        <div class="mycart_box">
                            <p>ユーザーID：{{$cart->user_id}}</p>
                            <p>アイテムID：{{$cart->goods_id}}</p>
                        </div>
                    @endforeach

                </div>
                <!--<div class="spinner_area">-->
                <!--    <input type="number" value="0" class="counter1" data-max="500" data-min="0">-->
                <!--    <input type="button" value="＋" class="btnspinner" data-cal="1" data-target=".counter1">-->
                <!--    <input type="button" value="－" class="btnspinner" data-cal="-1" data-target=".counter1">-->
                <!--</div>-->
                <a href="/">商品一覧へ</a>
            </div>
        </div>
   </div>
</div>
@endsection