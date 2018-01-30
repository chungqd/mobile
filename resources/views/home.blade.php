@extends('layouts.master')
@section('slide')
    @include('layouts.slide')
@endsection
@section('content')
<div class="blockPosition2 blockPosition">
    <div class="container">
        <div class="row">
            
            <div class="type-tab lablistproducts laberthemes clearfix ">
                <div class="lab_tab">
                    <ul id="LabProducts" class="nav nav-tabs clearfix">
                        <li class=" active"><a data-toggle="tab" href="#Lab-new-prod_tab" class="tab_li">Sản phẩm mới</a></li>
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
                                                    
                                                    <li class="lab-compare pull-left">  
                                                        <a class="add_to_cart" 
                                                        href="{{ route('addcart', $productNew->id) }}"
                                                        data-product-name="{{ $productNew->name }}"
                                                        data-product-cover="uploads/products/{{ $productNew->hinhanh }}"
                                                        data-id-product="{{ $productNew->id }}"
                                                        title="Thêm vào giỏ hàng">
                                                            <i class="pe-icon pe-7s-repeat"></i>
                                                            Giỏ hàng
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                                    
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
                                                                    title="Chi tiết">
                                                                    Chi tiết
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
                                                                <li class="lab-compare pull-left">  
                                                                    <a class="" 
                                                                    href="{{ route('addcart', $hotDeal->id) }}" 
                                                                    data-product-name="{{ $hotDeal->name }}"
                                                                    data-product-cover="uploads/products/{{ $hotDeal->hinhanh }}"
                                                                    data-id-product="{{ $hotDeal->id }}"
                                                                    title="Thêm vào giỏ hàng">
                                                                    <i class="pe-icon pe-7s-repeat"></i>
                                                                    Giỏ hàng
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        
                                                    </div>
                                                    
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
                                                    
                                                    <li class="lab-compare pull-left">  
                                                        <a class="" 
                                                        href="{{ route('addcart', $hotProduct->id) }}" 
                                                        data-product-name="{{ $hotProduct->name }}"
                                                        data-product-cover="uploads/products/{{ $hotProduct->hinhanh }}"
                                                        data-id-product="{{ $hotProduct->id }}"
                                                        title="Thêm vào giỏ hàng">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Giỏ hàng
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                    


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

<div class="blockPosition5 blockPosition">
    <div class="container">
        <div class="row">
            
            
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
                                                    
                                                    <li class="lab-compare pull-left">  
                                                        <a class="" 
                                                        href="{{ route('addcart', $slProduct->id) }}" 
                                                        data-product-name="{{ $slProduct->name }}"
                                                        data-product-cover="uploads/products/{{ $slProduct->hinhanh }}"
                                                        data-id-product="{{ $slProduct->id }}"
                                                        title="Thêm vào giỏ hàng">
                                                        <i class="pe-icon pe-7s-repeat"></i>
                                                        Giỏ hàng
                                                    </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

            
            

            
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
