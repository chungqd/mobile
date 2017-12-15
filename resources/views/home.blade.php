@extends('layouts.master')
@section('slide')
    @include('layouts.slide')
@endsection
@section('content')
{{-- <div class="blockPosition1 blockPosition">
    <div class="container">
        <div class="row">
            <div class="support-footer-inner">
                <div class="lab-row">
                    <div class="lab-col-2 col-sm-4 col-xs-6 ">
                        <div class="row-normal clearfix">
                            <div class="support-info">
                                <div class="info-title"><i class="pe-7s-gift"></i>Gift Card</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-col-2 col-sm-4 col-xs-6 ">
                        <div class="row-normal clearfix">
                            <div class="support-info">
                                <div class="info-title"><i class="pe-7s-car"></i>Free Shipping</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-col-2 col-sm-4 col-xs-6 ">
                        <div class="row-normal clearfix">
                            <div class="support-info">
                                <div class="info-title"><i class="pe-7s-refresh"></i>Money Back</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-col-2 col-sm-4 col-xs-6 ">
                        <div class="row-normal clearfix">
                            <div class="support-info">
                                <div class="info-title"><i class="pe-7s-headphones"></i>24/7 Support</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-col-2 col-sm-4 col-xs-6">
                        <div class="row-normal clearfix">
                            <div class="support-info">
                                <div class="info-title"><i class="pe-7s-credit"></i>Credit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> --}}
<div class="blockPosition2 blockPosition">
    <div class="container">
        <div class="row">
            
            <div class="type-tab lablistproducts laberthemes clearfix ">
                <div class="lab_tab">
                    <ul id="LabProducts" class="nav nav-tabs clearfix">
                        <li class=" active"><a data-toggle="tab" href="#Lab-new-prod_tab" class="tab_li">Sản phẩm mới</a></li>
                        {{--<li class=""><a data-toggle="tab" href="#Lab-feature-prod_tab" class="tab_li">Feature products</a></li>--}}
                        {{--<li class=""><a data-toggle="tab" href="#Lab-specail-prod_tab" class="tab_li">Specail</a></li>--}}
                    </ul>
                </div>
                <div class="tab-content clearfix labContent " >
                    <div id="Lab-new-prod_tab" class="Lab-new-prod tab-pane  active">
                        <div class="labProducts row">
                            <div class="owlProducts-1-Lab-new-prod">
                            @foreach ($productsNew as $productNew)
                                <div class="item-inner  ajax_block_product">
                                    <div class="item">
                                        <div class="left-block">
                                            <h5 class="product-name"><a href="{{ route('detail', $productNew->id) }}" title="Ipad 4 16Gb">{{ $productNew->name }}</a></h5>
                                            <div class="product-image-container" style="padding-top: 10px;">
                                                <a class= "product_image" href="{{ route('detail', $productNew->id) }}" title="{{ $productNew->name }}">
                                                    <img class="img-responsive img1" src="uploads/products/{{ $productNew->hinhanh }}" alt="{{ $productNew->name }}" />
                                                </a>
                                                @if ($productNew->giamoi)
                                                    <span class="sale-label">Sale</span>
                                                @else
                                                    <span class="new-label">New</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">{{ $productNew->giamoi == 0 ? number_format($productNew->giacu) : number_format($productNew->giamoi)}}</span>
                                                    <meta itemprop="priceCurrency" content="Vnđ" />
                                                    @if ($productNew->giamoi == 0)
                                                    
                                                    @else
                                                        <span class="old-price product-price">{{number_format($productNew->giacu)}}</span>
                                                    @endif
                                                    
                                                </div>
                                                    
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="{{ route('detail', $productNew->id) }}"
                                                    data-id-product="{{ $productNew->id }}"
                                                    title="Quick view">
                                                        <i class="pe-icon pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <ul class="add-to-links ">  
                                                    {{-- <li class="lab-Wishlist pull-left">
                                                        <a onclick="WishlistCart('wishlist_block_list', 'add', {{ $productNew->id }}, $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                        data-id-product="{{ $productNew->id }}"
                                                        title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                        
                                                    </li> --}}
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_cart" 
                                                        href="{{ route('addcart', $productNew->id) }}"
                                                        data-product-name="{{ $productNew->name }}"
                                                        data-product-cover="uploads/products/{{ $productNew->hinhanh }}"
                                                        data-id-product="{{ $productNew->id }}"
                                                        title="Add to Cart">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Add to Cart
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/29-faded-short-sleeves-tshirt.html" title="Beats Solo HD">Apple Ipad 4 128Gb</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/29-faded-short-sleeves-tshirt.html" title="Apple Ipad 4 128Gb">
                                                        <img class="img-responsive img1" src="front/134-large_default/faded-short-sleeves-tshirt.jpg" alt="Apple Ipad 4 128Gb" />

                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="tshirts/29-faded-short-sleeves-tshirt.html"
                                                            data-id-product="29"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '29', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="29"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/29-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Apple Ipad 4 128Gb"
                                                            data-product-cover="front/134-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="29"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/131-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/132-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                                    </div>
                                    
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="media-body">
                                                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                <span itemprop="price" class="price product-price">
                                                                    $ 34.78                                                 </span>
                                                                    <meta itemprop="priceCurrency" content="USD" />
                                                                    
                                                                    <span class="old-price product-price">
                                                                        $ 36.61
                                                                    </span>
                                                                                                                                       <span class="price-percent-reduction">-5%</span>
                                                                       
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/28-printed-summer-dress.html"
                                                    data-id-product="28"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '28', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="28"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/28-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/131-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="28"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="casual-dresses/27-printed-dress.html" title="BlackBerry Porsche  Design P’9983">Samsung Galaxy Tab 4</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="casual-dresses/27-printed-dress.html" title="Samsung Galaxy Tab 4">
                                                        <img class="img-responsive img1" src="front/128-large_default/printed-dress.jpg" alt="Samsung Galaxy Tab 4" />

                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 31.20                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="casual-dresses/27-printed-dress.html"
                                                            data-id-product="27"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '27', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="27"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="casual-dresses/27-printed-dress.html" 
                                                            data-product-name="Samsung Galaxy Tab 4"
                                                            data-product-cover="front/128-cart_default/printed-dress.jpg"
                                                            data-id-product="27"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/26-blouse.html" title="Ipad 4 16Gb">Ipad 4 16Gb</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/26-blouse.html" title="Ipad 4 16Gb">
                                                        <img class="img-responsive img1" src="front/125-large_default/blouse.jpg" alt="Ipad 4 16Gb" />

                                                        <img  class="img-responsive img2" src="front/126-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 32.40                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="blouses/26-blouse.html"
                                                            data-id-product="26"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '26', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="26"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="blouses/26-blouse.html" 
                                                            data-product-name="Ipad 4 16Gb"
                                                            data-product-cover="front/125-cart_default/blouse.jpg"
                                                            data-id-product="26"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/25-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">Ipad 4 16Gb</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/25-faded-short-sleeves-tshirt.html" title="Ipad 4 16Gb">
                                                        <img class="img-responsive img1" src="front/121-large_default/faded-short-sleeves-tshirt.jpg" alt="Ipad 4 16Gb" />

                                                        <img  class="img-responsive img2" src="front/124-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="tshirts/25-faded-short-sleeves-tshirt.html"
                                                            data-id-product="25"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '25', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="25"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/25-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Ipad 4 16Gb"
                                                            data-product-cover="front/121-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="25"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="casual-dresses/24-printed-dress.html" title="Apple Iphone 7 – 64GB">BlackBerry Porsche  Design P’9983</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="casual-dresses/24-printed-dress.html" title="BlackBerry Porsche  Design P’9983">
                                                        <img class="img-responsive img1" src="front/117-large_default/printed-dress.jpg" alt="BlackBerry Porsche  Design P’9983" />

                                                        <img  class="img-responsive img2" src="front/118-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 31.20                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="casual-dresses/24-printed-dress.html"
                                                            data-id-product="24"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '24', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="24"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="casual-dresses/24-printed-dress.html" 
                                                            data-product-name="BlackBerry Porsche  Design P&rsquo;9983"
                                                            data-product-cover="front/117-cart_default/printed-dress.jpg"
                                                            data-id-product="24"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/23-blouse.html" title="HTC One M8">HTC One M8</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/23-blouse.html" title="HTC One M8">
                                                        <img class="img-responsive img1" src="front/113-large_default/blouse.jpg" alt="HTC One M8" />

                                                        <img  class="img-responsive img2" src="front/114-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 32.40                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="blouses/23-blouse.html"
                                                            data-id-product="23"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '23', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="23"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="blouses/23-blouse.html" 
                                                            data-product-name="HTC One M8"
                                                            data-product-cover="front/113-cart_default/blouse.jpg"
                                                            data-id-product="23"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/22-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">Samsung Galaxy S5 – 64gb</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/22-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">
                                                        <img class="img-responsive img1" src="front/108-large_default/faded-short-sleeves-tshirt.jpg" alt="Samsung Galaxy S5 – 64gb" />

                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="tshirts/22-faded-short-sleeves-tshirt.html"
                                                            data-id-product="22"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '22', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="22"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/22-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Samsung Galaxy S5 &ndash; 64gb"
                                                            data-product-cover="front/108-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="22"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </div> --}}
                            {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/21-printed-chiffon-dress.html" title="Airpods">Apple Iphone 5 – 64GB</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/21-printed-chiffon-dress.html" title="Apple Iphone 5 – 64GB">
                                                        <img class="img-responsive img1" src="front/104-large_default/printed-chiffon-dress.jpg" alt="Apple Iphone 5 – 64GB" />

                                                        <img  class="img-responsive img2" src="front/105-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                                <span class="sale-label">Sale</span>
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.68                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            <span class="old-price product-price">
                                                                $ 24.60
                                                            </span>
                                                                    <!--                                                            <span class="price-percent-reduction">-20%</span>
                                                                -->
                                                                
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/21-printed-chiffon-dress.html"
                                                    data-id-product="21"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '21', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="21"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/21-printed-chiffon-dress.html" 
                                                    data-product-name="Apple Iphone 5 &ndash; 64GB"
                                                    data-product-cover="front/104-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="21"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/20-printed-summer-dress.html" title="Thinkpad P50">Smartphones</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/20-printed-summer-dress.html" title="Smartphones">
                                                        <img class="img-responsive img1" src="front/96-large_default/printed-summer-dress.jpg" alt="Smartphones" />

                                                        <img  class="img-responsive img2" src="front/97-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 36.60                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="summer-dresses/20-printed-summer-dress.html"
                                                            data-id-product="20"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '20', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="20"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="summer-dresses/20-printed-summer-dress.html" 
                                                            data-product-name="Smartphones"
                                                            data-product-cover="front/96-cart_default/printed-summer-dress.jpg"
                                                            data-id-product="20"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                        {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/93-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/94-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                            </div>
                                            
                                        </div>
                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">
                                                        $ 35.14                                                 </span>
                                                        <meta itemprop="priceCurrency" content="USD" />
                                                        
                                                        <span class="old-price product-price">
                                                            $ 36.61
                                                        </span>
                                                                <!--                                                            <span class="price-percent-reduction">-4%</span>
                                                            -->
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="summer-dresses/19-printed-summer-dress.html"
                                                            data-id-product="19"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '19', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="19"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/19-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/93-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="19"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="evening-dresses/18-printed-dress.html" title="HP Probook 450">Apple Iphone 7 - 64GB</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="evening-dresses/18-printed-dress.html" title="Apple Iphone 7 - 64GB">
                                                        <img class="img-responsive img1" src="front/89-large_default/printed-dress.jpg" alt="Apple Iphone 7 - 64GB" />

                                                        <img  class="img-responsive img2" src="front/92-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 61.19                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="evening-dresses/18-printed-dress.html"
                                                            data-id-product="18"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '18', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="18"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="evening-dresses/18-printed-dress.html" 
                                                            data-product-name="Apple Iphone 7 - 64GB"
                                                            data-product-cover="front/89-cart_default/printed-dress.jpg"
                                                            data-id-product="18"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    <{{-- div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="casual-dresses/17-printed-dress.html" title="Macbook Air">Apple Iphone 7 – 64GB</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="casual-dresses/17-printed-dress.html" title="Apple Iphone 7 – 64GB">
                                                        <img class="img-responsive img1" src="front/85-large_default/printed-dress.jpg" alt="Apple Iphone 7 – 64GB" />

                                                        <img  class="img-responsive img2" src="front/86-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 31.20                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="casual-dresses/17-printed-dress.html"
                                                            data-id-product="17"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '17', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="17"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="casual-dresses/17-printed-dress.html" 
                                                            data-product-name="Apple Iphone 7 &ndash; 64GB"
                                                            data-product-cover="front/85-cart_default/printed-dress.jpg"
                                                            data-id-product="17"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                   
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/16-blouse.html" title="Iphone Case">HTC One M8</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/16-blouse.html" title="HTC One M8">
                                                        <img class="img-responsive img1" src="front/81-large_default/blouse.jpg" alt="HTC One M8" />

                                                        <img  class="img-responsive img2" src="front/82-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 32.40                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="blouses/16-blouse.html"
                                                            data-id-product="16"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '16', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="16"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="blouses/16-blouse.html" 
                                                            data-product-name="HTC One M8"
                                                            data-product-cover="front/81-cart_default/blouse.jpg"
                                                            data-id-product="16"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/15-faded-short-sleeves-tshirt.html" title="Beats Solo HD">Samsung Galaxy S5 – 64gb</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/15-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">
                                                        <img class="img-responsive img1" src="front/78-large_default/faded-short-sleeves-tshirt.jpg" alt="Samsung Galaxy S5 – 64gb" />

                                                        <img  class="img-responsive img2" src="front/79-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="tshirts/15-faded-short-sleeves-tshirt.html"
                                                            data-id-product="15"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '15', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="15"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/15-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Samsung Galaxy S5 &ndash; 64gb"
                                                            data-product-cover="front/78-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="15"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="lab_boxnp">
                                <a class="prev prevLab-new-prod1"><i class="icon icon-angle-left"></i></a>
                                <a class="next nextLab-new-prod1"><i class="icon icon-angle-right"></i></a>
                            </div> 
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var owl = $(".owlProducts-1-Lab-new-prod");
                                owl.owlCarousel({
                                    items : 5,
                                    itemsDesktop : [1199,4],
                                    itemsDesktopSmall : [991,3],
                                    itemsTablet: [767,2],
                                    itemsMobile : [360,1],
                                    autoPlay :  false,
                                    stopOnHover: false,
                                    pagination : false,
                                    addClassActive : true,
                                });
                                $(".nextLab-new-prod1").click(function(){
                                    owl.trigger('owl.next');
                                })
                                $(".prevLab-new-prod1").click(function(){
                                    owl.trigger('owl.prev');
                                })  
                            });
                        </script>
        {{-- <div id="Lab-feature-prod_tab" class="Lab-feature-prod tab-pane ">
                            <div class="labProducts row">
                                <div class="owlProducts-1-Lab-feature-prod ">
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/1-faded-short-sleeves-tshirt.html" title="Faded Short Sleeves T-shirt">Beats Solo HD</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/1-faded-short-sleeves-tshirt.html" title="Beats Solo HD">
                                                        <img class="img-responsive img1" src="front/24-large_default/faded-short-sleeves-tshirt.jpg" alt="Beats Solo HD" />

                                                        <img  class="img-responsive img2" src="front/25-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="{{ route('detail') }}"
                                                            data-id-product="1"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '1', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="1"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/1-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Beats Solo HD"
                                                            data-product-cover="front/24-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="1"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/2-blouse.html" title="Blouse">Iphone Case</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/2-blouse.html" title="Iphone Case">
                                                        <img class="img-responsive img1" src="front/32-large_default/blouse.jpg" alt="Iphone Case" />

                                                        <img  class="img-responsive img2" src="front/31-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 32.40                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="blouses/2-blouse.html"
                                                            data-id-product="2"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '2', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="2"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="blouses/2-blouse.html" 
                                                            data-product-name="Iphone Case"
                                                            data-product-cover="front/32-cart_default/blouse.jpg"
                                                            data-id-product="2"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="casual-dresses/3-printed-dress.html" title="Printed Dress">Olloclip Camera</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="casual-dresses/3-printed-dress.html" title="Olloclip Camera">
                                                        <img class="img-responsive img1" src="front/33-large_default/printed-dress.jpg" alt="Olloclip Camera" />

                                                        <img  class="img-responsive img2" src="front/34-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 31.20                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="casual-dresses/3-printed-dress.html"
                                                            data-id-product="3"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '3', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="3"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="casual-dresses/3-printed-dress.html" 
                                                            data-product-name="Olloclip Camera"
                                                            data-product-cover="front/33-cart_default/printed-dress.jpg"
                                                            data-id-product="3"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="evening-dresses/4-printed-dress.html" title="Printed Dress">Selfie stick</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="evening-dresses/4-printed-dress.html" title="Selfie stick">
                                                        <img class="img-responsive img1" src="front/37-large_default/printed-dress.jpg" alt="Selfie stick" />

                                                        <img  class="img-responsive img2" src="front/38-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 61.19                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="evening-dresses/4-printed-dress.html"
                                                            data-id-product="4"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '4', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="4"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="evening-dresses/4-printed-dress.html" 
                                                            data-product-name="Selfie stick"
                                                            data-product-cover="front/37-cart_default/printed-dress.jpg"
                                                            data-id-product="4"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/5-printed-summer-dress.html" title="Printed Summer Dress">Flying Camera</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/5-printed-summer-dress.html" title="Flying Camera">
                                                        <img class="img-responsive img1" src="front/40-large_default/printed-summer-dress.jpg" alt="Flying Camera" />

                                                        <img  class="img-responsive img2" src="front/41-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 34.78                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-5%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/5-printed-summer-dress.html"
                                                    data-id-product="5"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '5', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="5"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/5-printed-summer-dress.html" 
                                                    data-product-name="Flying Camera"
                                                    data-product-cover="front/40-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="5"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/6-printed-summer-dress.html" title="Printed Summer Dress">Gopro Camera</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/6-printed-summer-dress.html" title="Gopro Camera">
                                                        <img class="img-responsive img1" src="front/43-large_default/printed-summer-dress.jpg" alt="Gopro Camera" />

                                                        <img  class="img-responsive img2" src="front/44-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 36.60                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="summer-dresses/6-printed-summer-dress.html"
                                                            data-id-product="6"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '6', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="6"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="summer-dresses/6-printed-summer-dress.html" 
                                                            data-product-name="Gopro Camera"
                                                            data-product-cover="front/43-cart_default/printed-summer-dress.jpg"
                                                            data-id-product="6"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/7-printed-chiffon-dress.html" title="Printed Chiffon Dress">Airpods</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/7-printed-chiffon-dress.html" title="Airpods">
                                                        <img class="img-responsive img1" src="front/46-large_default/printed-chiffon-dress.jpg" alt="Airpods" />

                                                        <img  class="img-responsive img2" src="front/47-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 20.91                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 24.60
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-15%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/7-printed-chiffon-dress.html"
                                                    data-id-product="7"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '7', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="7"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/7-printed-chiffon-dress.html" 
                                                    data-product-name="Airpods"
                                                    data-product-cover="front/46-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="7"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="tshirts/8-faded-short-sleeves-tshirt.html" title="Beats Solo HD">Apple Watch Pink</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="tshirts/8-faded-short-sleeves-tshirt.html" title="Apple Watch Pink">
                                                        <img class="img-responsive img1" src="front/56-large_default/faded-short-sleeves-tshirt.jpg" alt="Apple Watch Pink" />

                                                        <img  class="img-responsive img2" src="front/55-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 19.81                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="tshirts/8-faded-short-sleeves-tshirt.html"
                                                            data-id-product="8"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '8', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="8"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="tshirts/8-faded-short-sleeves-tshirt.html" 
                                                            data-product-name="Apple Watch Pink"
                                                            data-product-cover="front/56-cart_default/faded-short-sleeves-tshirt.jpg"
                                                            data-id-product="8"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/9-blouse.html" title="Iphone Case">Macbook Pro 15 inch</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/9-blouse.html" title="Macbook Pro 15 inch">
                                                        <img class="img-responsive img1" src="front/57-large_default/blouse.jpg" alt="Macbook Pro 15 inch" />

                                                        <img  class="img-responsive img2" src="front/59-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 29.16                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 32.40
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-10%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="blouses/9-blouse.html"
                                                    data-id-product="9"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '9', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="9"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="blouses/9-blouse.html" 
                                                    data-product-name="Macbook Pro 15 inch"
                                                    data-product-cover="front/57-cart_default/blouse.jpg"
                                                    data-id-product="9"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="casual-dresses/10-printed-dress.html" title="Olloclip Camera">Macbook Air</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="casual-dresses/10-printed-dress.html" title="Macbook Air">
                                                        <img class="img-responsive img1" src="front/60-large_default/printed-dress.jpg" alt="Macbook Air" />

                                                        <img  class="img-responsive img2" src="front/61-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 31.20                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="casual-dresses/10-printed-dress.html"
                                                            data-id-product="10"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '10', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="10"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="casual-dresses/10-printed-dress.html" 
                                                            data-product-name="Macbook Air"
                                                            data-product-cover="front/60-cart_default/printed-dress.jpg"
                                                            data-id-product="10"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="evening-dresses/11-printed-dress.html" title="Selfie stick">HP Probook 450</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="evening-dresses/11-printed-dress.html" title="HP Probook 450">
                                                        <img class="img-responsive img1" src="front/65-large_default/printed-dress.jpg" alt="HP Probook 450" />

                                                        <img  class="img-responsive img2" src="front/66-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 61.19                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="evening-dresses/11-printed-dress.html"
                                                            data-id-product="11"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '11', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="11"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="evening-dresses/11-printed-dress.html" 
                                                            data-product-name="HP Probook 450"
                                                            data-product-cover="front/65-cart_default/printed-dress.jpg"
                                                            data-id-product="11"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/12-printed-summer-dress.html" title="Flying Camera">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/12-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/68-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/69-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 32.95                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-10%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/12-printed-summer-dress.html"
                                                    data-id-product="12"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '12', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="12"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/12-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/68-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="12"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/13-printed-summer-dress.html" title="Gopro Camera">Thinkpad P50</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/13-printed-summer-dress.html" title="Thinkpad P50">
                                                        <img class="img-responsive img1" src="front/73-large_default/printed-summer-dress.jpg" alt="Thinkpad P50" />

                                                        <img  class="img-responsive img2" src="front/72-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 36.60                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="summer-dresses/13-printed-summer-dress.html"
                                                            data-id-product="13"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '13', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="13"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="summer-dresses/13-printed-summer-dress.html" 
                                                            data-product-name="Thinkpad P50"
                                                            data-product-cover="front/73-cart_default/printed-summer-dress.jpg"
                                                            data-id-product="13"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/14-printed-chiffon-dress.html" title="Airpods">Airpods</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/14-printed-chiffon-dress.html" title="Airpods">
                                                        <img class="img-responsive img1" src="front/75-large_default/printed-chiffon-dress.jpg" alt="Airpods" />

                                                        <img  class="img-responsive img2" src="front/76-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 20.91                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 24.60
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-15%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/14-printed-chiffon-dress.html"
                                                    data-id-product="14"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '14', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="14"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/14-printed-chiffon-dress.html" 
                                                    data-product-name="Airpods"
                                                    data-product-cover="front/75-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="14"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/16-blouse.html" title="Iphone Case">HTC One M8</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/16-blouse.html" title="HTC One M8">
                                                        <img class="img-responsive img1" src="front/81-large_default/blouse.jpg" alt="HTC One M8" />

                                                        <img  class="img-responsive img2" src="front/82-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    ">New</span>
                                                    
                                                    
                                                    <!--  -->
                                                </div>
                                                
                                            </div>
                                            <div class="right-block">
                                                <div class="media-body">
                                                    <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <span itemprop="price" class="price product-price">
                                                            $ 32.40                                                 </span>
                                                            <meta itemprop="priceCurrency" content="USD" />
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="lab-quick-view pull-right">
                                                            <a class="quick-view" href="blouses/16-blouse.html"
                                                            data-id-product="16"
                                                            title="Quick view">
                                                            <i class="pe-icon pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <ul class="add-to-links ">  
                                                        <li class="lab-Wishlist pull-left">
                                                            <a onclick="WishlistCart('wishlist_block_list', 'add', '16', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                            data-id-product="16"
                                                            title="Add to Wishlist">
                                                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                            
                                                        </li>
                                                        <li class="lab-compare pull-left">  
                                                            <a class="add_to_compare" 
                                                            href="blouses/16-blouse.html" 
                                                            data-product-name="HTC One M8"
                                                            data-product-cover="front/81-cart_default/blouse.jpg"
                                                            data-id-product="16"
                                                            title="Add to Compare">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Compare
                                                        </a>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lab_boxnp">
                                <a class="prev prevLab-feature-prod1"><i class="icon icon-angle-left"></i></a>
                                <a class="next nextLab-feature-prod1"><i class="icon icon-angle-right"></i></a>
                            </div> 
                        </div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                var owl = $(".owlProducts-1-Lab-feature-prod");
                                owl.owlCarousel({
                                    items : 5,
                                    itemsDesktop : [1199,4],
                                    itemsDesktopSmall : [991,3],
                                    itemsTablet: [767,2],
                                    itemsMobile : [360,1],
                                    autoPlay :  false,
                                    stopOnHover: false,
                                    pagination : false,
                                    addClassActive : true,
                                });
                                $(".nextLab-feature-prod1").click(function(){
                                    owl.trigger('owl.next');
                                })
                                $(".prevLab-feature-prod1").click(function(){
                                    owl.trigger('owl.prev');
                                })  
                            });
                        </script>
        <div id="Lab-specail-prod_tab" class="Lab-specail-prod tab-pane ">
                            <div class="labProducts row">
                                <div class="owlProducts-1-Lab-specail-prod ">
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/93-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/94-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 35.14                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-4%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/19-printed-summer-dress.html"
                                                    data-id-product="19"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '19', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="19"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/19-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/93-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="19"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/5-printed-summer-dress.html" title="Printed Summer Dress">Flying Camera</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/5-printed-summer-dress.html" title="Flying Camera">
                                                        <img class="img-responsive img1" src="front/40-large_default/printed-summer-dress.jpg" alt="Flying Camera" />

                                                        <img  class="img-responsive img2" src="front/41-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 34.78                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                        <!--                                                            <span class="price-percent-reduction">-5%</span>
                                                    -->
                                                    
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/5-printed-summer-dress.html"
                                                    data-id-product="5"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '5', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="5"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/5-printed-summer-dress.html" 
                                                    data-product-name="Flying Camera"
                                                    data-product-cover="front/40-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="5"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/131-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/132-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 34.78                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/28-printed-summer-dress.html"
                                                    data-id-product="28"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '28', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="28"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/28-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/131-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="28"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/12-printed-summer-dress.html" title="Flying Camera">MSI for Gaming</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/12-printed-summer-dress.html" title="MSI for Gaming">
                                                        <img class="img-responsive img1" src="front/68-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                                        <img  class="img-responsive img2" src="front/69-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 32.95                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 36.61
                                                </span>
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/12-printed-summer-dress.html"
                                                    data-id-product="12"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '12', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="12"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/12-printed-summer-dress.html" 
                                                    data-product-name="MSI for Gaming"
                                                    data-product-cover="front/68-cart_default/printed-summer-dress.jpg"
                                                    data-id-product="12"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="blouses/9-blouse.html" title="Iphone Case">Macbook Pro 15 inch</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="blouses/9-blouse.html" title="Macbook Pro 15 inch">
                                                        <img class="img-responsive img1" src="front/57-large_default/blouse.jpg" alt="Macbook Pro 15 inch" />

                                                        <img  class="img-responsive img2" src="front/59-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 29.16                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 32.40
                                                </span>
                                                    
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="blouses/9-blouse.html"
                                                    data-id-product="9"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '9', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="9"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="blouses/9-blouse.html" 
                                                    data-product-name="Macbook Pro 15 inch"
                                                    data-product-cover="front/57-cart_default/blouse.jpg"
                                                    data-id-product="9"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/7-printed-chiffon-dress.html" title="Printed Chiffon Dress">Airpods</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/7-printed-chiffon-dress.html" title="Airpods">
                                                        <img class="img-responsive img1" src="front/46-large_default/printed-chiffon-dress.jpg" alt="Airpods" />

                                                        <img  class="img-responsive img2" src="front/47-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 20.91                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 24.60
                                                </span>
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/7-printed-chiffon-dress.html"
                                                    data-id-product="7"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '7', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="7"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/7-printed-chiffon-dress.html" 
                                                    data-product-name="Airpods"
                                                    data-product-cover="front/46-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="7"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/14-printed-chiffon-dress.html" title="Airpods">Airpods</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/14-printed-chiffon-dress.html" title="Airpods">
                                                        <img class="img-responsive img1" src="front/75-large_default/printed-chiffon-dress.jpg" alt="Airpods" />

                                                        <img  class="img-responsive img2" src="front/76-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 20.91                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 24.60
                                                </span>
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/14-printed-chiffon-dress.html"
                                                    data-id-product="14"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '14', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="14"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/14-printed-chiffon-dress.html" 
                                                    data-product-name="Airpods"
                                                    data-product-cover="front/75-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="14"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner  ajax_block_product">
                                        <div class="item">
                                            <div class="left-block">
                                                <h5 class="product-name"><a href="summer-dresses/21-printed-chiffon-dress.html" title="Airpods">Apple Iphone 5 – 64GB</a></h5>
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="summer-dresses/21-printed-chiffon-dress.html" title="Apple Iphone 5 – 64GB">
                                                        <img class="img-responsive img1" src="front/104-large_default/printed-chiffon-dress.jpg" alt="Apple Iphone 5 – 64GB" />

                                                        <img  class="img-responsive img2" src="front/105-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                                                    </a>
                                                    
                                                    <span class="new-label
                                                    sale-label
                                                    ">New</span>
                                                    <span class="sale-label">Sale</span>
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 19.68                                                 </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                <span class="old-price product-price">
                                                    $ 24.60
                                                </span>
                                                </div>
                                                
                                                <div class="lab-quick-view pull-right">
                                                    <a class="quick-view" href="summer-dresses/21-printed-chiffon-dress.html"
                                                    data-id-product="21"
                                                    title="Quick view">
                                                    <i class="pe-icon pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links ">  
                                                <li class="lab-Wishlist pull-left">
                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '21', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                    data-id-product="21"
                                                    title="Add to Wishlist">
                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                    
                                                </li>
                                                <li class="lab-compare pull-left">  
                                                    <a class="add_to_compare" 
                                                    href="summer-dresses/21-printed-chiffon-dress.html" 
                                                    data-product-name="Apple Iphone 5 &ndash; 64GB"
                                                    data-product-cover="front/104-cart_default/printed-chiffon-dress.jpg"
                                                    data-id-product="21"
                                                    title="Add to Compare">
                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lab_boxnp">
                                <a class="prev prevLab-specail-prod1"><i class="icon icon-angle-left"></i></a>
                                <a class="next nextLab-specail-prod1"><i class="icon icon-angle-right"></i></a>
                            </div> 
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var owl = $(".owlProducts-1-Lab-specail-prod");
                                owl.owlCarousel({
                                    items : 5,
                                    itemsDesktop : [1199,4],
                                    itemsDesktopSmall : [991,3],
                                    itemsTablet: [767,2],
                                    itemsMobile : [360,1],
                                    autoPlay :  false,
                                    stopOnHover: false,
                                    pagination : false,
                                    addClassActive : true,
                                });
                                $(".nextLab-specail-prod1").click(function(){
                                    owl.trigger('owl.next');
                                })
                                $(".prevLab-specail-prod1").click(function(){
                                    owl.trigger('owl.prev');
                                })  
                            });
                        </script> --}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="blockPosition3 blockPosition">
        <div class="container">
            <div class="row">
                
                <!-- Module Product From Category -->
                <div class="lab-prod-cat lablistproducts laberthemes accordion clearfix">
                    <div class="block-content">
                        <div id="labProdCat-12" class="row">
                            <div class="cat-bar">
                                <div class="out-lab-prod">
                                    <p class="title_block">
                                        <a href="#" title="Smartphones"><span>Sản phẩm nổi bật</span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="product_list">
                                <div class="productCate-accordion-1121">
                                <div class="item-inner number-one no-slider lab-col-4 col-sm-6 col-xs-12
                                    ">  
                                    <div class="item">
                                        <div class="number-one-box">
                                            <div class="number-one-left col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                
                                                <div class="product-image-container">
                                                    <a class= "product_image" href="{{ route('detail', $hotDeal->id) }}" title="{{ $hotDeal->name }}">
                                                        <img class="img-responsive img1" src="uploads/products/{{ $hotDeal->hinhanh }}" alt="{{ $hotDeal->name }}" />
                                                    </a>

                                                            <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                <span itemprop="price" class="price product-price">{{ $hotDeal->giamoi == 0 ? number_format($hotDeal->giacu) : number_format($hotDeal->giamoi)}}</span>
                                                                    <meta itemprop="priceCurrency" content="VNĐ" />
                                                                    
                                                                    @if ($hotDeal->giamoi == 0)
                                                    
                                                                    @else
                                                                        <span class="old-price product-price">{{number_format($hotDeal->giacu)}}</span>
                                                                    @endif
                                                                    <!--  -->
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                
                                                                
                                                                <div class="lab-quick-view">
                                                                    <a class="quick-view" href="{{ route('detail', $hotDeal->id) }}"
                                                                    data-id-product="{{ $hotDeal->id }}"
                                                                    title="Quick view">
                                                                    Quick view
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    @if ($hotDeal->giamoi)
                                                    <span class="sale-label">Sale</span>
                                                    @else
                                                        <span class="new-label">New</span>
                                                    @endif
                                                    <div class="number-one-right col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <h5 class="product-name"><a href="{{ route('detail', $hotDeal->id) }}" title="{{ $hotDeal->name }}">{{ $hotDeal->name }}</a></h5>
                                                        
                                                        <div class="description_short">
                                                            <ul>
                                                                <li>{{ $hotDeal->cpu }}</li>
                                                                <li>{{ $hotDeal->ram }}</li>
                                                                <li>{{ $hotDeal->camerasau }}</li>
                                                                <li>{{ $hotDeal->dungluong }}</li>
                                                            </ul>
                                                        </div>
                                                        
                                                        <div class="actions">
                                                            <ul class="add-to-links ">  
                                                                {{-- <li class="lab-Wishlist pull-left">
                                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', {{ $hotDeal->id }}, $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                                    data-id-product="{{ $hotDeal->id }}"
                                                                    title="Add to Wishlist">
                                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                                    
                                                                </li> --}}
                                                                <li class="lab-compare pull-left">  
                                                                    <a class="add_to_compare" 
                                                                    href="{{ route('addcart', $hotDeal->id) }}" 
                                                                    data-product-name="{{ $hotDeal->name }}"
                                                                    data-product-cover="uploads/products/{{ $hotDeal->hinhanh }}"
                                                                    data-id-product="{{ $hotDeal->id }}"
                                                                    title="Add to Cart">
                                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                                    Add to Cart
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        
                                                    </div>
                                                    {{-- <div class="countdown" >
                                                        
                                                        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $('.future_date_11_14').countdown({
                                                                    until: new Date(2021, 09-1, 02, 00, 00, 00),
                                                                    labels: ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs'],
                                                                    labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'],
                                                                });
                                                            });
                                                        </script>
                                                        
                                                        <span class="future_date_11_14 id_countdown">  </span>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($hotProducts as $hotProduct)
                                    <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                                    ">  
                                    <div class="item">
                                        <div class="left-block">
                                            <h5 class="product-name"><a href="{{ route('detail', $hotProduct->id) }}" title="{{ $hotProduct->name }}">{{ $hotProduct->name }}</a></h5>
                                            
                                            <div class="product-image-container">
                                                <a class= "product_image" href="{{ route('detail', $hotProduct->id) }}" title="{{ $hotProduct->name }}">
                                                    <img class="img-responsive img1" src="uploads/products/{{ $hotProduct->hinhanh }}" alt="{{ $hotProduct->name }}" />

                                                   {{--  <img  class="img-responsive img2" src="front/82-large_default/blouse.jpg" alt=""  itemprop="image"  /> --}}
                                                </a>
                                                
                                                @if ($hotProduct->giamoi)
                                                <span class="sale-label">Sale</span>
                                                @else
                                                    <span class="new-label">New</span>
                                                @endif
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">{{ $hotProduct->giamoi == 0 ? number_format($hotProduct->giacu) : number_format($hotProduct->giamoi)}}</span>
                                                    <meta itemprop="priceCurrency" content="VNĐ" />
                                                    
                                                    @if ($hotProduct->giamoi == 0)
                                    
                                                    @else
                                                        <span class="old-price product-price">{{number_format($hotProduct->giacu)}}</span>
                                                    @endif
                                                </div>
                                                    
                                                    <div class="lab-quick-view pull-right">
                                                        <a class="quick-view" href="{{ route('detail', $hotProduct->id) }}"
                                                        data-id-product="{{ $hotProduct->id }}"
                                                        title="Quick view">
                                                        <i class="pe-icon pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <ul class="add-to-links ">  
                                                    {{-- <li class="lab-Wishlist pull-left">
                                                        <a onclick="WishlistCart('wishlist_block_list', 'add', {{ $hotProduct->id }}, $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                        data-id-product="{{ $hotProduct->id }}"
                                                        title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                        
                                                    </li> --}}
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_compare" 
                                                        href="{{ route('addcart', $hotProduct->id) }}" 
                                                        data-product-name="{{ $hotProduct->name }}"
                                                        data-product-cover="uploads/products/{{ $hotProduct->hinhanh }}"
                                                        data-id-product="{{ $hotProduct->id }}"
                                                        title="Add to Cart">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Add to Cart
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                    {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                            ">  
                            <div class="item">
                                <div class="left-block">
                                    <h5 class="product-name"><a href="tshirts/15-faded-short-sleeves-tshirt.html" title="Beats Solo HD">Samsung Galaxy S5 – 64gb</a></h5>
                                    
                                    <div class="product-image-container">
                                        <a class= "product_image" href="tshirts/15-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">
                                            <img class="img-responsive img1" src="front/78-large_default/faded-short-sleeves-tshirt.jpg" alt="Samsung Galaxy S5 – 64gb" />

                                            <img  class="img-responsive img2" src="front/79-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                                        </a>
                                        
                                        <span class="new-label">New</span>
                                        
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 19.81                             </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                
                                            </div>
                                            
                                            <div class="lab-quick-view pull-right">
                                                <a class="quick-view" href="tshirts/15-faded-short-sleeves-tshirt.html"
                                                data-id-product="15"
                                                title="Quick view">
                                                <i class="pe-icon pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <ul class="add-to-links ">  
                                            <li class="lab-Wishlist pull-left">
                                                <a onclick="WishlistCart('wishlist_block_list', 'add', '15', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                data-id-product="15"
                                                title="Add to Wishlist">
                                                <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                
                                            </li>
                                            <li class="lab-compare pull-left">  
                                                <a class="add_to_compare" 
                                                href="tshirts/15-faded-short-sleeves-tshirt.html" 
                                                data-product-name="Samsung Galaxy S5 &ndash; 64gb"
                                                data-product-cover="front/78-cart_default/faded-short-sleeves-tshirt.jpg"
                                                data-id-product="15"
                                                title="Add to Compare">
                                                <i class="pe-icon pe-7s-repeat"></i>
                                                Compare
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
 --}}
                    
            {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                    ">  
                    <div class="item">
                        <div class="left-block">
                            <h5 class="product-name"><a href="casual-dresses/17-printed-dress.html" title="Macbook Air">Apple Iphone 7 – 64GB</a></h5>
                            
                            <div class="product-image-container">
                                <a class= "product_image" href="casual-dresses/17-printed-dress.html" title="Apple Iphone 7 – 64GB">
                                    <img class="img-responsive img1" src="front/85-large_default/printed-dress.jpg" alt="Apple Iphone 7 – 64GB" />

                                    <img  class="img-responsive img2" src="front/86-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                </a>
                                
                                <span class="new-label">New</span>
                                
                            </div>
                            
                        </div>
                        <div class="right-block">
                            <div class="media-body">
                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <span itemprop="price" class="price product-price">
                                        $ 31.20                             </span>
                                        <meta itemprop="priceCurrency" content="USD" />
                                        
                                        
                                    </div>
                                    
                                    <div class="lab-quick-view pull-right">
                                        <a class="quick-view" href="casual-dresses/17-printed-dress.html"
                                        data-id-product="17"
                                        title="Quick view">
                                        <i class="pe-icon pe-7s-look"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="actions">
                                <ul class="add-to-links ">  
                                    <li class="lab-Wishlist pull-left">
                                        <a onclick="WishlistCart('wishlist_block_list', 'add', '17', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                        data-id-product="17"
                                        title="Add to Wishlist">
                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                        
                                    </li>
                                    <li class="lab-compare pull-left">  
                                        <a class="add_to_compare" 
                                        href="casual-dresses/17-printed-dress.html" 
                                        data-product-name="Apple Iphone 7 &ndash; 64GB"
                                        data-product-cover="front/85-cart_default/printed-dress.jpg"
                                        data-id-product="17"
                                        title="Add to Compare">
                                        <i class="pe-icon pe-7s-repeat"></i>
                                        Compare
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div> --}}

            
            {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                ">  
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="summer-dresses/19-printed-summer-dress.html" title="MSI for Gaming">
                                <img class="img-responsive img1" src="front/93-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                <img  class="img-responsive img2" src="front/94-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            <span class="sale-label">Sale</span>
                            
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 35.14                             </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    <span class="old-price product-price">
                                        $ 36.61
                                    </span>
                                        <!--                                        <span class="price-percent-reduction">-4%</span>
                                    -->
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="summer-dresses/19-printed-summer-dress.html"
                                    data-id-product="19"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '19', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="19"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="summer-dresses/19-printed-summer-dress.html" 
                                    data-product-name="MSI for Gaming"
                                    data-product-cover="front/93-cart_default/printed-summer-dress.jpg"
                                    data-id-product="19"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
        </div> --}}

    
    {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
    ">  
    <div class="item">
        <div class="left-block">
            <h5 class="product-name"><a href="summer-dresses/20-printed-summer-dress.html" title="Thinkpad P50">Smartphones</a></h5>
            
            <div class="product-image-container">
                <a class= "product_image" href="summer-dresses/20-printed-summer-dress.html" title="Smartphones">
                    <img class="img-responsive img1" src="front/96-large_default/printed-summer-dress.jpg" alt="Smartphones" />

                    <img  class="img-responsive img2" src="front/97-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                </a>
                
                <span class="new-label">New</span>
                
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 36.60                             </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        
                    </div>
                    
                    <div class="lab-quick-view pull-right">
                        <a class="quick-view" href="summer-dresses/20-printed-summer-dress.html"
                        data-id-product="20"
                        title="Quick view">
                        <i class="pe-icon pe-7s-look"></i>
                    </a>
                </div>
            </div>
            <div class="actions">
                <ul class="add-to-links ">  
                    <li class="lab-Wishlist pull-left">
                        <a onclick="WishlistCart('wishlist_block_list', 'add', '20', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                        data-id-product="20"
                        title="Add to Wishlist">
                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                        
                    </li>
                    <li class="lab-compare pull-left">  
                        <a class="add_to_compare" 
                        href="summer-dresses/20-printed-summer-dress.html" 
                        data-product-name="Smartphones"
                        data-product-cover="front/96-cart_default/printed-summer-dress.jpg"
                        data-id-product="20"
                        title="Add to Compare">
                        <i class="pe-icon pe-7s-repeat"></i>
                        Compare
                    </a>
                </li>
            </ul>
            
        </div>
        
    </div>
</div>
</div> --}}


    {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
    ">  
    <div class="item">
        <div class="left-block">
            <h5 class="product-name"><a href="summer-dresses/21-printed-chiffon-dress.html" title="Airpods">Apple Iphone 5 – 64GB</a></h5>
            
            <div class="product-image-container">
                <a class= "product_image" href="summer-dresses/21-printed-chiffon-dress.html" title="Apple Iphone 5 – 64GB">
                    <img class="img-responsive img1" src="front/104-large_default/printed-chiffon-dress.jpg" alt="Apple Iphone 5 – 64GB" />

                    <img  class="img-responsive img2" src="front/105-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                </a>
                
                <span class="new-label">New</span>
                <span class="sale-label">Sale</span>
                
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 19.68                             </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        <span class="old-price product-price">
                            $ 24.60
                        </span>
                                    <!--                                        <span class="price-percent-reduction">-20%</span>
                                -->
                                
                                
                            </div>
                            
                            <div class="lab-quick-view pull-right">
                                <a class="quick-view" href="summer-dresses/21-printed-chiffon-dress.html"
                                data-id-product="21"
                                title="Quick view">
                                <i class="pe-icon pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="actions">
                        <ul class="add-to-links ">  
                            <li class="lab-Wishlist pull-left">
                                <a onclick="WishlistCart('wishlist_block_list', 'add', '21', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                data-id-product="21"
                                title="Add to Wishlist">
                                <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                
                            </li>
                            <li class="lab-compare pull-left">  
                                <a class="add_to_compare" 
                                href="summer-dresses/21-printed-chiffon-dress.html" 
                                data-product-name="Apple Iphone 5 &ndash; 64GB"
                                data-product-cover="front/104-cart_default/printed-chiffon-dress.jpg"
                                data-id-product="21"
                                title="Add to Compare">
                                <i class="pe-icon pe-7s-repeat"></i>
                                Compare
                            </a>
                        </li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
    </div> --}}

    
    {{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
    ">  
    <div class="item">
        <div class="left-block">
            <h5 class="product-name"><a href="tshirts/22-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">Samsung Galaxy S5 – 64gb</a></h5>
            
            <div class="product-image-container">
                <a class= "product_image" href="tshirts/22-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">
                    <img class="img-responsive img1" src="front/108-large_default/faded-short-sleeves-tshirt.jpg" alt="Samsung Galaxy S5 – 64gb" />

                </a>
                
                <span class="new-label">New</span>
                
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 19.81                             </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        
                    </div>
                    
                    <div class="lab-quick-view pull-right">
                        <a class="quick-view" href="tshirts/22-faded-short-sleeves-tshirt.html"
                        data-id-product="22"
                        title="Quick view">
                        <i class="pe-icon pe-7s-look"></i>
                    </a>
                </div>
            </div>
            <div class="actions">
                <ul class="add-to-links ">  
                    <li class="lab-Wishlist pull-left">
                        <a onclick="WishlistCart('wishlist_block_list', 'add', '22', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                        data-id-product="22"
                        title="Add to Wishlist">
                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                        
                    </li>
                    <li class="lab-compare pull-left">  
                        <a class="add_to_compare" 
                        href="tshirts/22-faded-short-sleeves-tshirt.html" 
                        data-product-name="Samsung Galaxy S5 &ndash; 64gb"
                        data-product-cover="front/108-cart_default/faded-short-sleeves-tshirt.jpg"
                        data-id-product="22"
                        title="Add to Compare">
                        <i class="pe-icon pe-7s-repeat"></i>
                        Compare
                    </a>
                </li>
            </ul>
            
        </div>
        
    </div>
</div>
</div> --}}


{{-- <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
">  
<div class="item">
    <div class="left-block">
        <h5 class="product-name"><a href="blouses/23-blouse.html" title="HTC One M8">HTC One M8</a></h5>
        
        <div class="product-image-container">
            <a class= "product_image" href="blouses/23-blouse.html" title="HTC One M8">
                <img class="img-responsive img1" src="front/113-large_default/blouse.jpg" alt="HTC One M8" />

                <img  class="img-responsive img2" src="front/114-large_default/blouse.jpg" alt=""  itemprop="image"  />
            </a>
            
            <span class="new-label">New</span>
            
        </div>
        
    </div>
    <div class="right-block">
        <div class="media-body">
            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <span itemprop="price" class="price product-price">
                    $ 32.40                             </span>
                    <meta itemprop="priceCurrency" content="USD" />
                    
                    
                </div>
                
                <div class="lab-quick-view pull-right">
                    <a class="quick-view" href="blouses/23-blouse.html"
                    data-id-product="23"
                    title="Quick view">
                    <i class="pe-icon pe-7s-look"></i>
                </a>
            </div>
        </div>
        <div class="actions">
            <ul class="add-to-links ">  
                <li class="lab-Wishlist pull-left">
                    <a onclick="WishlistCart('wishlist_block_list', 'add', '23', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                    data-id-product="23"
                    title="Add to Wishlist">
                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                    
                </li>
                <li class="lab-compare pull-left">  
                    <a class="add_to_compare" 
                    href="blouses/23-blouse.html" 
                    data-product-name="HTC One M8"
                    data-product-cover="front/113-cart_default/blouse.jpg"
                    data-id-product="23"
                    title="Add to Compare">
                    <i class="pe-icon pe-7s-repeat"></i>
                    Compare
                </a>
            </li>
        </ul>
        
    </div>
    
</div>
</div>
</div> --}}


</div>
<div class="manu-list">
    <ul>
    </ul>
</div>
</div>
</div>
</div>
</div>
<!-- /Module Product From Category -->

</div>
</div>
</div>
{{-- <div class="blockPosition4 blockPosition">
    <div class="container">
        <div class="row">
            
            <!-- Module Product From Category -->
            <div class="lab-prod-cat lablistproducts laberthemes accordion clearfix">
                <div class="block-content">
                    <div id="labProdCat-18" class="row">
                        <div class="cat-bar">
                            <div class="out-lab-prod">
                                <p class="title_block">
                                    <a href="18-laptops.html" title="Laptops"><span>Laptops</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="product_list">
                            <div class="productCate-accordion-2181">
                                <div class="item-inner number-one no-slider lab-col-4 col-sm-6 col-xs-12
                                ">  
                                <div class="item">
                                    <div class="number-one-box">
                                        <div class="number-one-left col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            
                                            <div class="product-image-container">
                                                <a class= "product_image" href="blouses/9-blouse.html" title="Macbook Pro 15 inch">
                                                    <img class="img-responsive img1" src="front/57-large_default/blouse.jpg" alt="Macbook Pro 15 inch" />

                                                    <img  class="img-responsive img2" src="front/59-large_default/blouse.jpg" alt=""  itemprop="image"  />
                                                </a>
                                                
                    <!--                        <span class="new-label">New</span>
                                                                <span class="sale-label">Sale</span>
                                                            -->
                                                            
                                                            
                                                            <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                <span itemprop="price" class="price product-price">
                                                                    $ 29.16                             </span>
                                                                    <meta itemprop="priceCurrency" content="USD" />
                                                                    
                                                                    <span class="old-price product-price">
                                                                        $ 32.40
                                                                    </span>
                                                                    <!--  -->
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                
                                                                
                                                                <div class="lab-quick-view">
                                                                    <a class="quick-view" href="blouses/9-blouse.html"
                                                                    data-id-product="9"
                                                                    title="Quick view">
                                                                    Quick view
                                                                </a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <span class="sale-label">-10%</span>
                                                    <div class="number-one-right col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <h5 class="product-name"><a href="blouses/9-blouse.html" title="Iphone Case">Macbook Pro 15 inch</a></h5>
                                                        
                                                        <div class="description_short">
                                                            <ul><li>Windows 10 Home</li>
                                                                <li>15.6″ HD LED-backlit Widescreen Display</li>
                                                                <li>4GB DDR3L 1600 MHz SDRAM Memory</li>
                                                                <li>802.11A/C high-speed wireless LAN</li>
                                                                <li>Windows 10 64-bit Home</li>
                                                                <li>4-cell Lithium-ion Battery (up to 8 hours)</li>
                                                                <li>Intel Core i3-5015U Dual-Core Processor</li>
                                                            </ul>
                                                        </div>
                                                        
                                                        <div class="actions">
                                                            <ul class="add-to-links ">  
                                                                <li class="lab-Wishlist pull-left">
                                                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '9', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                                    data-id-product="9"
                                                                    title="Add to Wishlist">
                                                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                                    
                                                                </li>
                                                                <li class="lab-compare pull-left">  
                                                                    <a class="add_to_compare" 
                                                                    href="blouses/9-blouse.html" 
                                                                    data-product-name="Macbook Pro 15 inch"
                                                                    data-product-cover="front/57-cart_default/blouse.jpg"
                                                                    data-id-product="9"
                                                                    title="Add to Compare">
                                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                                    Compare
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        
                                                    </div>
                                                    <div class="countdown" >
                                                        
                                                        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $('.future_date_7_9').countdown({
                                                                    until: new Date(2021, 08-1, 03, 00, 00, 00),
                                                                    labels: ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs'],
                                                                    labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'],
                                                                });
                                                            });
                                                        </script>
                                                        
                                                        <span class="future_date_7_9 id_countdown">  </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                                    ">  
                                    <div class="item">
                                        <div class="left-block">
                                            <h5 class="product-name"><a href="casual-dresses/10-printed-dress.html" title="Olloclip Camera">Macbook Air</a></h5>
                                            
                                            <div class="product-image-container">
                                                <a class= "product_image" href="casual-dresses/10-printed-dress.html" title="Macbook Air">
                                                    <img class="img-responsive img1" src="front/60-large_default/printed-dress.jpg" alt="Macbook Air" />

                                                    <img  class="img-responsive img2" src="front/61-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                                </a>
                                                
                                                <span class="new-label">New</span>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">
                                                        $ 31.20                             </span>
                                                        <meta itemprop="priceCurrency" content="USD" />
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="lab-quick-view pull-right">
                                                        <a class="quick-view" href="casual-dresses/10-printed-dress.html"
                                                        data-id-product="10"
                                                        title="Quick view">
                                                        <i class="pe-icon pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <ul class="add-to-links ">  
                                                    <li class="lab-Wishlist pull-left">
                                                        <a onclick="WishlistCart('wishlist_block_list', 'add', '10', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                        data-id-product="10"
                                                        title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                        
                                                    </li>
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_compare" 
                                                        href="casual-dresses/10-printed-dress.html" 
                                                        data-product-name="Macbook Air"
                                                        data-product-cover="front/60-cart_default/printed-dress.jpg"
                                                        data-id-product="10"
                                                        title="Add to Compare">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Compare
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            
                            <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                            ">  
                            <div class="item">
                                <div class="left-block">
                                    <h5 class="product-name"><a href="evening-dresses/11-printed-dress.html" title="Selfie stick">HP Probook 450</a></h5>
                                    
                                    <div class="product-image-container">
                                        <a class= "product_image" href="evening-dresses/11-printed-dress.html" title="HP Probook 450">
                                            <img class="img-responsive img1" src="front/65-large_default/printed-dress.jpg" alt="HP Probook 450" />

                                            <img  class="img-responsive img2" src="front/66-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                                        </a>
                                        
                                        <span class="new-label">New</span>
                                        
                                    </div>
                                    
                                </div>
                                <div class="right-block">
                                    <div class="media-body">
                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span itemprop="price" class="price product-price">
                                                $ 61.19                             </span>
                                                <meta itemprop="priceCurrency" content="USD" />
                                                
                                                
                                            </div>
                                            
                                            <div class="lab-quick-view pull-right">
                                                <a class="quick-view" href="evening-dresses/11-printed-dress.html"
                                                data-id-product="11"
                                                title="Quick view">
                                                <i class="pe-icon pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <ul class="add-to-links ">  
                                            <li class="lab-Wishlist pull-left">
                                                <a onclick="WishlistCart('wishlist_block_list', 'add', '11', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                data-id-product="11"
                                                title="Add to Wishlist">
                                                <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                
                                            </li>
                                            <li class="lab-compare pull-left">  
                                                <a class="add_to_compare" 
                                                href="evening-dresses/11-printed-dress.html" 
                                                data-product-name="HP Probook 450"
                                                data-product-cover="front/65-cart_default/printed-dress.jpg"
                                                data-id-product="11"
                                                title="Add to Compare">
                                                <i class="pe-icon pe-7s-repeat"></i>
                                                Compare
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    
                    <div class="item-inner no-slider lab-col-2  col-sm-3 col-xs-12
                    ">  
                    <div class="item">
                        <div class="left-block">
                            <h5 class="product-name"><a href="summer-dresses/12-printed-summer-dress.html" title="Flying Camera">MSI for Gaming</a></h5>
                            
                            <div class="product-image-container">
                                <a class= "product_image" href="summer-dresses/12-printed-summer-dress.html" title="MSI for Gaming">
                                    <img class="img-responsive img1" src="front/68-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                    <img  class="img-responsive img2" src="front/69-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                                </a>
                                
                                <span class="new-label">New</span>
                                <span class="sale-label">Sale</span>
                                
                            </div>
                            
                        </div>
                        <div class="right-block">
                            <div class="media-body">
                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <span itemprop="price" class="price product-price">
                                        $ 32.95                             </span>
                                        <meta itemprop="priceCurrency" content="USD" />
                                        
                                        <span class="old-price product-price">
                                            $ 36.61
                                        </span>
                            </div>
                            
                            <div class="lab-quick-view pull-right">
                                <a class="quick-view" href="summer-dresses/12-printed-summer-dress.html"
                                data-id-product="12"
                                title="Quick view">
                                <i class="pe-icon pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="actions">
                        <ul class="add-to-links ">  
                            <li class="lab-Wishlist pull-left">
                                <a onclick="WishlistCart('wishlist_block_list', 'add', '12', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                data-id-product="12"
                                title="Add to Wishlist">
                                <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                
                            </li>
                            <li class="lab-compare pull-left">  
                                <a class="add_to_compare" 
                                href="summer-dresses/12-printed-summer-dress.html" 
                                data-product-name="MSI for Gaming"
                                data-product-cover="front/68-cart_default/printed-summer-dress.jpg"
                                data-id-product="12"
                                title="Add to Compare">
                                <i class="pe-icon pe-7s-repeat"></i>
                                Compare
                            </a>
                        </li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
    </div>

    
</div>
<div class="manu-list">
    <ul>
    </ul>
</div>
</div>
</div>
</div>
</div>
<!-- /Module Product From Category -->

</div>
</div>
</div> --}}
<div class="blockPosition5 blockPosition">
    <div class="container">
        <div class="row">
            
            <!-- Module Product From Category -->
{{-- <div class="lab-prod-cat lablistproducts laberthemes accordion clearfix">
                <div class="block-content">
                    <div id="labProdCat-19" class="row">
                        <div class="cat-bar">
                            <div class="out-lab-prod">
                                <p class="title_block">
                                    <a href="19-tablet.html" title="Tablet"><span>Tablet</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="product_list">
                            <div class="productCate-accordion-3191">
                                <div class="item-inner   ajax_block_product">
                                    <div class="item">
                                        <div class="left-block">
                                            <h5 class="product-name"><a href="{{ route('detail') }}" title="Beats Solo HD">Apple Ipad 4 128Gb</a></h5>
                                            
                                            <div class="product-image-container">
                                                <a class= "product_image" href="tshirts/29-faded-short-sleeves-tshirt.html" title="Apple Ipad 4 128Gb">
                                                    <img class="img-responsive img1" src="front/134-large_default/faded-short-sleeves-tshirt.jpg" alt="Apple Ipad 4 128Gb" />

                                                </a>
                                                
                                                <span class="new-label">New</span>
                                                
                                                
                                                <!--  -->
                                            </div>
                                            
                                        </div>
                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">
                                                        $ 19.81                         </span>
                                                        <meta itemprop="priceCurrency" content="USD" />
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="lab-quick-view pull-right">
                                                        <a class="quick-view" href="tshirts/29-faded-short-sleeves-tshirt.html"
                                                        data-id-product="29"
                                                        title="Quick view">
                                                        <i class="pe-icon pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <ul class="add-to-links ">  
                                                    <li class="lab-Wishlist pull-left">
                                                        <a onclick="WishlistCart('wishlist_block_list', 'add', '29', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                        data-id-product="29"
                                                        title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                        
                                                    </li>
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_compare" 
                                                        href="tshirts/29-faded-short-sleeves-tshirt.html" 
                                                        data-product-name="Apple Ipad 4 128Gb"
                                                        data-product-cover="front/134-cart_default/faded-short-sleeves-tshirt.jpg"
                                                        data-id-product="29"
                                                        title="Add to Compare">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Compare
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                    </div>
                </div>
            </div>

            
            <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">MSI for Gaming</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="summer-dresses/28-printed-summer-dress.html" title="MSI for Gaming">
                                <img class="img-responsive img1" src="front/131-large_default/printed-summer-dress.jpg" alt="MSI for Gaming" />

                                <img  class="img-responsive img2" src="front/132-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            <span class="sale-label">Sale</span>
                            
                            
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 34.78                         </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        <span class="old-price product-price">
                            $ 36.61
                        </span>
                        </div>
                        
                        <div class="lab-quick-view pull-right">
                            <a class="quick-view" href="summer-dresses/28-printed-summer-dress.html"
                            data-id-product="28"
                            title="Quick view">
                            <i class="pe-icon pe-7s-look"></i>
                        </a>
                    </div>
                </div>
                <div class="actions">
                    <ul class="add-to-links ">  
                        <li class="lab-Wishlist pull-left">
                            <a onclick="WishlistCart('wishlist_block_list', 'add', '28', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                            data-id-product="28"
                            title="Add to Wishlist">
                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                            
                        </li>
                        <li class="lab-compare pull-left">  
                            <a class="add_to_compare" 
                            href="summer-dresses/28-printed-summer-dress.html" 
                            data-product-name="MSI for Gaming"
                            data-product-cover="front/131-cart_default/printed-summer-dress.jpg"
                            data-id-product="28"
                            title="Add to Compare">
                            <i class="pe-icon pe-7s-repeat"></i>
                            Compare
                        </a>
                    </li>
                </ul>
                
            </div>
                    </div>
                </div>
            </div>

            
            <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="casual-dresses/27-printed-dress.html" title="BlackBerry Porsche  Design P’9983">Samsung Galaxy Tab 4</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="casual-dresses/27-printed-dress.html" title="Samsung Galaxy Tab 4">
                                <img class="img-responsive img1" src="front/128-large_default/printed-dress.jpg" alt="Samsung Galaxy Tab 4" />

                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 31.20                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="casual-dresses/27-printed-dress.html"
                                    data-id-product="27"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '27', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="27"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="casual-dresses/27-printed-dress.html" 
                                    data-product-name="Samsung Galaxy Tab 4"
                                    data-product-cover="front/128-cart_default/printed-dress.jpg"
                                    data-id-product="27"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>

            
            <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="tshirts/25-faded-short-sleeves-tshirt.html" title="Samsung Galaxy S5 – 64gb">Ipad 4 16Gb</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="tshirts/25-faded-short-sleeves-tshirt.html" title="Ipad 4 16Gb">
                                <img class="img-responsive img1" src="front/121-large_default/faded-short-sleeves-tshirt.jpg" alt="Ipad 4 16Gb" />

                                <img  class="img-responsive img2" src="front/124-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 19.81                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="tshirts/25-faded-short-sleeves-tshirt.html"
                                    data-id-product="25"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '25', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="25"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="tshirts/25-faded-short-sleeves-tshirt.html" 
                                    data-product-name="Ipad 4 16Gb"
                                    data-product-cover="front/121-cart_default/faded-short-sleeves-tshirt.jpg"
                                    data-id-product="25"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>

            
            <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="blouses/26-blouse.html" title="Ipad 4 16Gb">Ipad 4 16Gb</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="blouses/26-blouse.html" title="Ipad 4 16Gb">
                                <img class="img-responsive img1" src="front/125-large_default/blouse.jpg" alt="Ipad 4 16Gb" />

                                <img  class="img-responsive img2" src="front/126-large_default/blouse.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 32.40                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="blouses/26-blouse.html"
                                    data-id-product="26"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '26', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="26"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="blouses/26-blouse.html" 
                                    data-product-name="Ipad 4 16Gb"
                                    data-product-cover="front/125-cart_default/blouse.jpg"
                                    data-id-product="26"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>

            
            <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="{{ route('detail') }}" title="Ipad 4 16Gb">Apple Ipad 4 128Gb</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="{{ route('detail') }}" title="Apple Ipad 4 128Gb">
                                <img class="img-responsive img1" src="front/136-large_default/faded-short-sleeves-tshirt.jpg" alt="Apple Ipad 4 128Gb" />

                                <img  class="img-responsive img2" src="front/137-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 19.81                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="{{ route('detail') }}"
                                    data-id-product="30"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '30', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="30"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="{{ route('detail') }}" 
                                    data-product-name="Apple Ipad 4 128Gb"
                                    data-product-cover="front/136-cart_default/faded-short-sleeves-tshirt.jpg"
                                    data-id-product="30"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="manu-list">
            <ul>
            </ul>
        </div>
        <div class="lab_boxnp">
            <a class="prev prevaccordion3191"><i class="icon icon-angle-left"></i></a>
            <a class="next nextaccordion3191"><i class="icon icon-angle-right"></i></a>
        </div> 
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var owl = $(".productCate-accordion-3191");
            owl.owlCarousel({
                items : 5,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [991,4],
                itemsTablet: [767,2],
                itemsMobile : [360,1],
                autoPlay :  false,
                stopOnHover: false,
                pagination : false,
                addClassActive : true,
            });
            $(".nextaccordion3191").click(function(){
                owl.trigger('owl.next');
            })
            $(".prevaccordion3191").click(function(){
                owl.trigger('owl.prev');
            })  
        });
    </script>
</div>
</div>
</div> --}}
<!-- /Module Product From Category -->

<div class="lab_static">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="img"><a title="" href="#"> <img src="front/img/cms/img_1_3.jpg" alt="images" /> </a></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="img"><a title="" href="#"> <img src="front/img/cms/img_1_4.jpg" alt="images" /> </a></div>
    </div>
</div>

</div>
</div>
</div>

<div class="blockPosition6 blockPosition">
    <div class="container">
        <div class="row">
            
            <!-- Module Product From Category -->
            <div class="lab-prod-cat lablistproducts laberthemes accordion clearfix">
                <div class="block-content">
                    <div id="labProdCat-13" class="row">
                        <div class="cat-bar">
                            <div class="out-lab-prod">
                                <p class="title_block">
                                    <a href="#" title="Sản phẩm khuyển mại"><span>Sản phẩm khuyển mại</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="sub-cat lab-col-md-2">
                            <ul class="sub-cat-ul">
                            </ul>
                        </div>
                        <div class="product_list">
                            <div class="productCate-accordion-4131">
                            @foreach ($saleProducts as $slProduct)
                                <div class="item-inner ajax_block_product">
                                    <div class="item">
                                        <div class="left-block">
                                            <h5 class="product-name"><a href="{{ route('detail', $slProduct->id) }}" title="{{ $slProduct->name }}">{{ $slProduct->name }}</a></h5>
                                            
                                            <div class="product-image-container">
                                                <a class= "product_image" href="{{ route('detail', $slProduct->id) }}" title="{{ $slProduct->name }}">
                                                    <img class="img-responsive img1" src="uploads/products/{{ $slProduct->hinhanh }}" alt="{{ $slProduct->name }}" />

                                                    {{-- <img  class="img-responsive img2" src="front/31-large_default/blouse.jpg" alt=""  itemprop="image"  /> --}}
                                                </a>
                                                
                                                <span class="sale-label">Sale</span>
                                                
                                                
                                                <!--  -->
                                            </div>
                                            
                                        </div>
                                        <div class="right-block">
                                            <div class="media-body">
                                                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <span itemprop="price" class="price product-price">{{ $slProduct->giamoi == 0 ? number_format($slProduct->giacu) : number_format($slProduct->giamoi)}}</span>
                                                    <meta itemprop="priceCurrency" content="VNĐ" />
                                                    
                                                    @if ($slProduct->giamoi == 0)
                                    
                                                    @else
                                                        <span class="old-price product-price">{{number_format($slProduct->giacu)}}</span>
                                                    @endif
                                                        
                                                        
                                                </div>
                                                    
                                                    <div class="lab-quick-view pull-right">
                                                        <a class="quick-view" href="{{ route('detail', $slProduct->id) }}"
                                                        data-id-product="2"
                                                        title="Quick view">
                                                        <i class="pe-icon pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <ul class="add-to-links ">  
                                                    {{-- <li class="lab-Wishlist pull-left">
                                                        <a onclick="WishlistCart('wishlist_block_list', 'add', {{ $slProduct->id }}, $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                        data-id-product="{{ $slProduct->id }}"
                                                        title="Add to Wishlist">
                                                        <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                                        
                                                    </li> --}}
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_compare" 
                                                        href="{{ route('addcart', $slProduct->id) }}" 
                                                        data-product-name="{{ $slProduct->name }}"
                                                        data-product-cover="uploads/products/{{ $slProduct->hinhanh }}"
                                                        data-id-product="{{ $slProduct->id }}"
                                                        title="Add to Cart">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Add to Cart
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

            
            {{-- <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="casual-dresses/3-printed-dress.html" title="Printed Dress">Olloclip Camera</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="casual-dresses/3-printed-dress.html" title="Olloclip Camera">
                                <img class="img-responsive img1" src="front/33-large_default/printed-dress.jpg" alt="Olloclip Camera" />

                                <img  class="img-responsive img2" src="front/34-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 31.20                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="casual-dresses/3-printed-dress.html"
                                    data-id-product="3"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '3', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="3"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="casual-dresses/3-printed-dress.html" 
                                    data-product-name="Olloclip Camera"
                                    data-product-cover="front/33-cart_default/printed-dress.jpg"
                                    data-id-product="3"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div> --}}

            
{{--  <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="evening-dresses/4-printed-dress.html" title="Printed Dress">Selfie stick</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="evening-dresses/4-printed-dress.html" title="Selfie stick">
                                <img class="img-responsive img1" src="front/37-large_default/printed-dress.jpg" alt="Selfie stick" />

                                <img  class="img-responsive img2" src="front/38-large_default/printed-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 61.19                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="evening-dresses/4-printed-dress.html"
                                    data-id-product="4"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '4', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="4"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="evening-dresses/4-printed-dress.html" 
                                    data-product-name="Selfie stick"
                                    data-product-cover="front/37-cart_default/printed-dress.jpg"
                                    data-id-product="4"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div> --}}

            
{{-- <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="summer-dresses/5-printed-summer-dress.html" title="Printed Summer Dress">Flying Camera</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="summer-dresses/5-printed-summer-dress.html" title="Flying Camera">
                                <img class="img-responsive img1" src="front/40-large_default/printed-summer-dress.jpg" alt="Flying Camera" />

                                <img  class="img-responsive img2" src="front/41-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            <span class="sale-label">Sale</span>
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 34.78                         </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        <span class="old-price product-price">
                            $ 36.61
                        </span>
                        </div>
                        
                        <div class="lab-quick-view pull-right">
                            <a class="quick-view" href="summer-dresses/5-printed-summer-dress.html"
                            data-id-product="5"
                            title="Quick view">
                            <i class="pe-icon pe-7s-look"></i>
                        </a>
                    </div>
                </div>
                <div class="actions">
                    <ul class="add-to-links ">  
                        <li class="lab-Wishlist pull-left">
                            <a onclick="WishlistCart('wishlist_block_list', 'add', '5', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                            data-id-product="5"
                            title="Add to Wishlist">
                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                            
                        </li>
                        <li class="lab-compare pull-left">  
                            <a class="add_to_compare" 
                            href="summer-dresses/5-printed-summer-dress.html" 
                            data-product-name="Flying Camera"
                            data-product-cover="front/40-cart_default/printed-summer-dress.jpg"
                            data-id-product="5"
                            title="Add to Compare">
                            <i class="pe-icon pe-7s-repeat"></i>
                            Compare
                        </a>
                    </li>
                </ul>
                
            </div>
                    </div>
                </div>
            </div> --}}

            
            {{-- <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="summer-dresses/6-printed-summer-dress.html" title="Printed Summer Dress">Gopro Camera</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="summer-dresses/6-printed-summer-dress.html" title="Gopro Camera">
                                <img class="img-responsive img1" src="front/43-large_default/printed-summer-dress.jpg" alt="Gopro Camera" />

                                <img  class="img-responsive img2" src="front/44-large_default/printed-summer-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 36.60                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="summer-dresses/6-printed-summer-dress.html"
                                    data-id-product="6"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '6', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="6"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="summer-dresses/6-printed-summer-dress.html" 
                                    data-product-name="Gopro Camera"
                                    data-product-cover="front/43-cart_default/printed-summer-dress.jpg"
                                    data-id-product="6"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div> --}}

            
{{-- <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="summer-dresses/7-printed-chiffon-dress.html" title="Printed Chiffon Dress">Airpods</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="summer-dresses/7-printed-chiffon-dress.html" title="Airpods">
                                <img class="img-responsive img1" src="front/46-large_default/printed-chiffon-dress.jpg" alt="Airpods" />

                                <img  class="img-responsive img2" src="front/47-large_default/printed-chiffon-dress.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            <span class="sale-label">Sale</span>
            </div>
            
        </div>
        <div class="right-block">
            <div class="media-body">
                <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price" class="price product-price">
                        $ 20.91                         </span>
                        <meta itemprop="priceCurrency" content="USD" />
                        
                        <span class="old-price product-price">
                            $ 24.60
                        </span>
                                <!--                                    <span class="price-percent-reduction">-15%</span>
                            -->
                            
                            
                        </div>
                        
                        <div class="lab-quick-view pull-right">
                            <a class="quick-view" href="summer-dresses/7-printed-chiffon-dress.html"
                            data-id-product="7"
                            title="Quick view">
                            <i class="pe-icon pe-7s-look"></i>
                        </a>
                    </div>
                </div>
                <div class="actions">
                    <ul class="add-to-links ">  
                        <li class="lab-Wishlist pull-left">
                            <a onclick="WishlistCart('wishlist_block_list', 'add', '7', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                            data-id-product="7"
                            title="Add to Wishlist">
                            <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                            
                        </li>
                        <li class="lab-compare pull-left">  
                            <a class="add_to_compare" 
                            href="summer-dresses/7-printed-chiffon-dress.html" 
                            data-product-name="Airpods"
                            data-product-cover="front/46-cart_default/printed-chiffon-dress.jpg"
                            data-id-product="7"
                            title="Add to Compare">
                            <i class="pe-icon pe-7s-repeat"></i>
                            Compare
                        </a>
                    </li>
                </ul>
                
            </div>
                    </div>
                </div>
            </div> --}}

            
{{-- <div class="item-inner   ajax_block_product">
                <div class="item">
                    <div class="left-block">
                        <h5 class="product-name"><a href="tshirts/1-faded-short-sleeves-tshirt.html" title="Faded Short Sleeves T-shirt">Beats Solo HD</a></h5>
                        
                        <div class="product-image-container">
                            <a class= "product_image" href="tshirts/1-faded-short-sleeves-tshirt.html" title="Beats Solo HD">
                                <img class="img-responsive img1" src="front/24-large_default/faded-short-sleeves-tshirt.jpg" alt="Beats Solo HD" />

                                <img  class="img-responsive img2" src="front/25-large_default/faded-short-sleeves-tshirt.jpg" alt=""  itemprop="image"  />
                            </a>
                            
                            <span class="new-label">New</span>
                            
                            
                            <!--  -->
                        </div>
                        
                    </div>
                    <div class="right-block">
                        <div class="media-body">
                            <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price">
                                    $ 19.81                         </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    
                                    
                                </div>
                                
                                <div class="lab-quick-view pull-right">
                                    <a class="quick-view" href="tshirts/1-faded-short-sleeves-tshirt.html"
                                    data-id-product="1"
                                    title="Quick view">
                                    <i class="pe-icon pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="actions">
                            <ul class="add-to-links ">  
                                <li class="lab-Wishlist pull-left">
                                    <a onclick="WishlistCart('wishlist_block_list', 'add', '1', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                    data-id-product="1"
                                    title="Add to Wishlist">
                                    <i class="pe-icon pe-7s-like"></i>Wishlist</a>
                                    
                                </li>
                                <li class="lab-compare pull-left">  
                                    <a class="add_to_compare" 
                                    href="tshirts/1-faded-short-sleeves-tshirt.html" 
                                    data-product-name="Beats Solo HD"
                                    data-product-cover="front/24-cart_default/faded-short-sleeves-tshirt.jpg"
                                    data-id-product="1"
                                    title="Add to Compare">
                                    <i class="pe-icon pe-7s-repeat"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div> --}}

            
        </div>
        <div class="manu-list">
            <ul>
            </ul>
        </div>
        <div class="lab_boxnp">
            <a class="prev prevaccordion4131"><i class="icon icon-angle-left"></i></a>
            <a class="next nextaccordion4131"><i class="icon icon-angle-right"></i></a>
        </div> 
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var owl = $(".productCate-accordion-4131");
            owl.owlCarousel({
                items : 5,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [991,4],
                itemsTablet: [767,2],
                itemsMobile : [360,1],
                autoPlay :  false,
                stopOnHover: false,
                pagination : false,
                addClassActive : true,
            });
            $(".nextaccordion4131").click(function(){
                owl.trigger('owl.next');
            })
            $(".prevaccordion4131").click(function(){
                owl.trigger('owl.prev');
            })  
        });
    </script>
</div>
</div>
</div>
<!-- /Module Product From Category -->

</div>
</div>
</div>

<div class="manufacturer">
    <div class="container">
        <div class="row">
            <!-- Block manufacturers module -->
            <div id="lablogo" class="manufacturer-logo">
    <!-- <div class="title_block">
        <h4>
            <span>Manufacturers</span>
        </h4>
    </div> -->
    <div class="listmanufacturer">
        <div class="lab-manufacturer-logo">
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="2_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/2.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="3_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/3.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="4_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/4.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="5_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/5.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="6_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/6.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="7_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/7.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
            
            <div class="item-inner">
                <div class="item-i ">
                    <a href="8_manufacturers.html" title="More about Manufacturers">
                        <img src="front/img/m/8.jpg" alt="Manufacturers" />
                    </a>
                </div>
            </div>
        </div>
    <!-- <div class="labnextprev">
        <a class="prevmanu"><i class="icon-angle-left"></i></a>
        <a class="nextmanu"><i class="icon-angle-right"></i></a>
        
    </div> -->
</div>
</div>

<script>
    $(document).ready(function() {
        var owl = $(".lab-manufacturer-logo");
        owl.owlCarousel({
            autoPlay : true,
            slideSpeed : 2000,
            paginationSpeed : 2000,
            rewindSpeed : 2000,
            items :5,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [991,4],
            itemsTablet: [767,3],
            itemsMobile : [480,2],
        });
        $(".nextmanu").click(function(){
            owl.trigger('owl.next');
        })
        $(".prevmanu").click(function(){
            owl.trigger('owl.prev');
        })   
    });
</script>
<!-- /Block manufacturers module -->

</div>
</div>
</div>
<div class="columns-container">
    <div id="columns" class="container">
        
        
        
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
@endsection
