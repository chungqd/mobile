@extends('layouts.master')
@section('content')
    <div class="lab-breadcrumb">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="breadcrumb clearfix">
                <div class="breadcrumb-i">
                    <a class="home" href="{{route('home')}}" title="Trở lại trang chủ">Trang chủ</a>
                    {{-- <span class="navigation-pipe">&gt;</span> --}}
                    {{--<span class="navigation_page"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="" title="Smartphones" ><span itemprop="title">Hãng</span></a></span><span class="navigation-pipe">></span>{{ $nameBrand->name }}</span>--}}
                </div>
            </div>
            <!-- /Breadcrumb -->
        </div>
    </div>

    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row">
                <div id="center_column" class="center_column col-xs-12 col-sm-12">
                    <h1 class="page-heading product-listing"><span class="cat-name">Sản phẩm&nbsp;</span>
                        {{-- <span class="heading-counter">There are 30 products.</span> --}}
                    </h1>
                {{-- <div class="content_sortPagiBar clearfix">
    <div class="sortPagiBar clearfix">
        <ul class="display hidden-xs pull-left">
<li class="display-title">View Style:</li>
<li id="grid"><a rel="nofollow" href="javascript:void(0)" title="Grid"><i class="icon-th"></i></a></li>
<li id="list"><a rel="nofollow" href="javascript:void(0)" title="List"><i class="icon-list"></i></a></li>
</ul>

<form id="productsSortForm" action="http://labbluesky.com/prestashop/lab_techstore16/en/3-smartphones" class="productsSortForm pull-right">
<div class="select selector1">
<label for="selectProductSort">Sort by</label>
<select id="selectProductSort" class="selectProductSort form-control">
<option value="position:asc" selected="selected">--</option>
                <option value="price:asc">Price: Lowest first</option>
    <option value="price:desc">Price: Highest first</option>
            <option value="name:asc">Product Name: A to Z</option>
<option value="name:desc">Product Name: Z to A</option>
                <option value="quantity:desc">In stock</option>
            <option value="reference:asc">Reference: Lowest first</option>
<option value="reference:desc">Reference: Highest first</option>
</select>
</div>
</form>
<!-- /Sort products -->


    </div>
</div> --}}




                <!-- Products list -->
                    <ul class="lablistproducts product_list grid row">
                        @foreach ($productByPrices as $productByPrice)
                            <li class="ajax_block_product item-inner  col-xs-12 col-sm-3 col-md-3">
                                <div class="product-container item" itemscope itemtype="https://schema.org/Product">
                                    <div class="left-block">
                                        <h5 class="product-name">
                                            <a href="{{ route('detail',$productByPrice->id) }}" title="{{ $productByPrice->name }}" itemprop="url" >
                                                {{ $productByPrice->name }}
                                            </a>
                                        </h5>
                                        <div class="product-image-container">
                                            <a class= "product_image" href="uploads/products/{{ $productByPrice->hinhanh }}" title="{{ $productByPrice->name }}">
                                                <img class="img-responsive img1" src="uploads/products/{{ $productByPrice->hinhanh }}" alt="{{ $productByPrice->name }}" />
                                                {{-- <img  class="img-responsive img2" src="../25-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  /> --}}
                                            </a>
                                            <a class="new-box" href="{{ route('detail',$productByPrice->id) }}">
                                                @if ($productByPrice->giamoi)
                                                    <span class="sale-label">Sale</span>
                                                @else
                                                    <span class="new-label">New</span>
                                                @endif
                                            </a>
                                        </div>

                                    </div>
                                    <div class="right-block">
                                        <div class="hook-reviews">
                                            <div class="comments_note" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                                <div class="star_content clearfix">
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <meta itemprop="worstRating" content = "0" />
                                                    <meta itemprop="ratingValue" content = "5" />
                                                    <meta itemprop="bestRating" content = "5" />
                                                </div>
                                                <span class="nb-comments"><span itemprop="reviewCount">1</span> Review(s)</span>
                                            </div>

                                        </div>
                                        <p class="product-desc" itemprop="description">
                                            Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!
                                        </p>
                                        <div class="media-body">
                                            <div class="content_price pull-left">

							                     <span itemprop="price" class="price product-price">{{ $productByPrice->giamoi == 0 ? number_format($productByPrice->giacu) : number_format($productByPrice->giamoi)}}</span>
                                                <meta itemprop="priceCurrency" content="Vnđ" />
                                                @if ($productByPrice->giamoi == 0)
                                                
                                                @else
                                                    <span class="old-price product-price">{{number_format($productByPrice->giacu)}}</span>
                                                @endif


                                            </div>
                                            <div class="lab-quick-view pull-right">
                                                <a class="quick-view" href="{{ route('detail',$productByPrice->id) }}"
                                                   data-id-product="1"
                                                   title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="color-list-container"></div>
                                        <div class="flags">
                                        </div>
                                        <span class="availability">
											<span class=" label-success">In stock</span>
										</span>
                                        <div class="lab-cart">
                                            <a class="button ajax_add_to_cart_button btn btn-default" href="order7a0f.html?add=1&amp;id_product=1&amp;token=8094a5532f541448c6101a27e0f8d489"
                                               data-id-product="{{ $productByPrice->id }}"
                                               title="Add to cart" >
                                                <i class="mdi mdi-basket"></i>
                                                <span>Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                {{-- <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', {{ $productByPrice->id }}, $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                       data-id-product="{{ $productByPrice->id }}"
                                                       title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>

                                                </li> --}}
                                                <li class="lab-compare pull-left">
                                                    <a class=""
                                                       href="{{ route('addcart', $productByPrice->id) }}"
                                                       data-product-name="{{ $productByPrice->name }}"
                                                       data-product-cover="uploads/products/{{ $productByPrice->hinhanh }}"
                                                       data-id-product="{{ $productByPrice->id }}"
                                                       title="Add to Cart">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Add to Cart
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div><!-- .product-container> -->
                            </li>
                        @endforeach

                    </ul>
                    <div class="content_sortPagiBar">
                        {{ $productByPrices->links() }}
                    </div>
                </div><!-- #center_column -->
            </div><!-- .row -->
        </div><!-- #columns -->
    </div><!-- .columns-container -->
@endsection