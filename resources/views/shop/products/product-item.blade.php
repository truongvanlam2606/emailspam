<div class="product-item col-md-4">
    <div class="img-product ">
        <a href="{{route('product.view', $product->id)}}">
            <div class="slick-images">
                @if ($product->images->isNotEmpty())
                    @foreach ($product->images as $image)
                        <img class="img-prd"
                            src="{{asset('storage/' .$image->path)}}"
                            alt="{{$image->name}}">
                    @endforeach
                @else
                <img class="img-prd"
                    src="https://via.placeholder.com/600"
                    alt="empty">
                @endif

            </div>
        </a>
    </div>
    <div class="content-product">
        <a href="{{route('product.view', $product->id)}}"> <h3 class="content-product-h3">{{$product->name}}</h3> </a>
        <div class="content-product-deltals">
            <div class="product-description">
                <p>{{$product->description}}</p>
            </div>
            <div class="price text-center">
                <span class="money"> Price: {{$product->price .' USD'}}</span>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-cart addProductToCart" data-productId="{{$product->id}}" >Add to cart</button>
            </div>
        </div>
    </div>
</div>
