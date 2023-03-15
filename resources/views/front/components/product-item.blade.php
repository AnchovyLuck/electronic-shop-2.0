<div class="product-item item {{$product->tag}}">
    <div class="pi-pic">
        <img src="{{URL('front/img/products/').'/'.$product->productImages[0]->path}}" alt="">
        @if ($product->discount != null)
            <div class="sale">Sale</div>
        @endif
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li><a class="w-icon active" href="cart/add/{{$product->id}}"><i class="icon_bag_alt"></i></a></li>
            <li><a class="quick-view" href="shop/product/{{$product->id}}" >+ Quick View</a></li>
            <li><a class="w-icon" href=""><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{$product->tag}}</div>
        <a href="shop/product/{{$product->id}}">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">
            @if ($product->discount != null)
                {{$product->discount}} đ <span>{{$product->price}} đ</span>
            @else
                {{$product->price}} đ
            @endif
        </div>
    </div>
</div>