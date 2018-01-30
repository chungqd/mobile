@extends('layouts.master')
@section('content')
<div class="lab-breadcrumb">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb clearfix">
            <div class="breadcrumb-i">
                <a class="home" href="{{route('home')}}" title="Trở lại trang chủ">Trang chủ</a>
                <span class="navigation-pipe">&gt;</span>
                <span class="navigation_page"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="" title="Smartphones" ><span itemprop="title">{{ $productDetail->brand_name }}</span></a></span><span class="navigation-pipe">></span>{{ $productDetail->product_name }}</span>
            </div>
        </div>
        <!-- /Breadcrumb -->
    </div>
</div>

<div class="columns-container">
    <div id="columns" class="container">
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <div itemscope itemtype="https://schema.org/Product">
                    <meta itemprop="url" content="{{ route('detail', $productDetail->id) }}">
                    <div class="primary_block row">
                        <!-- left infos-->
                        <div class="pb-left-column col-xs-12 col-sm-6 col-md-4">
                            <!-- product img-->
                            <div class="pb-left-column-i">
                                <div id="image-block" class="clearfix">
                                    <span class="new-box">
                                        @if ($productDetail->giamoi)
                                            <span class="sale-label">Sale</span>
                                        @else
                                            <span class="new-label">New</span>
                                        @endif
                                    </span>
                                    <span id="view_full_size">
                                        <img id="bigpic" itemprop="image" src="uploads/products/{{ $productDetail->hinhanh }}" title="{{ $productDetail->product_name }}" alt="{{ $productDetail->product_name }}" width="458" height="586"/>
                                        <span class="span_link no-print"><span>+</span></span>
                                    </span>
                                </div> <!-- end image-block -->
                                <div id="views_block" class="clearfix ">
                                <div id="thumbs_list">
                                    <ul id="thumbs_list_frame" style="width: 344px;"> 
                                    @foreach ($imgDetail as $element)
                                        <li id="thumbnail_104">
                                            <a href="uploads/products/{{ $element->img_path }}" data-fancybox-group="other-views" class="fancybox shown" title="Airpods">
                                                <img class="img-responsive" id="thumb_104" src="uploads/products/{{ $element->img_path }}" alt="{{ $productDetail->product_name }}" title="{{ $productDetail->product_name }}" itemprop="image">
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div> <!-- end thumbs_list -->

                    <div class="NextPre">
                                            <span class="view_scroll_spacer">
                            <a id="view_scroll_left" class="" title="Other views" href="javascript:{}" style="cursor: default; display: none; opacity: 0;">
                                Previous
                            </a>
                        </span>
                            <a id="view_scroll_right" title="Other views" href="javascript:{}" style="cursor: pointer; opacity: 1; display: block;">
                            Next
                        </a>
                                        </div>
                </div>

        <p class="resetimg clear no-print">
            <span id="wrapResetImages" style="display: none;">
                <a href="17-printed-dress.html" data-id="resetImages">
                    <i class="icon-repeat"></i>
                    Display all pictures
                </a>
            </span>
        </p>
    </div>
</div> <!-- end pb-left-column -->
<!-- end left infos-->
<!-- center infos -->
<div class="pb-center-column  col-xs-12 col-sm-6 col-md-8">
    <p id="product_reference">
        {{-- <label>Reference: </label> --}}
        <span class="editable" itemprop="sku" content="demo_3"></span>
    </p>
    <h1 itemprop="name">{{ $productDetail->product_name }}</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <p id="product_condition">
                <label>Bảo hành: </label>
                <link itemprop="itemCondition" href="https://schema.org/NewCondition"/>
                <span class="editable">{{ $productDetail->baohanh }}</span>
            </p>
        </div>
        <div class="text-right col-xs-12 col-sm-6 col-md-6" >
            <!-- number of item in stock -->
            <p id="pQuantityAvailable">
                <span id="quantityAvailable">{{ $productDetail->soluong }}</span>
                <span  style="display: none;" id="quantityAvailableTxt">Sản phẩm</span>
                <span  id="quantityAvailableTxtMultiple">Sản phẩm</span>
            </p>
            <!-- availability or doesntExist -->
            <p id="availability_statut">

                <span id="availability_value" class="label label-success">trong kho</span>
            </p>
        </div>
    </div>
    <div class="content_prices clearfix">
        <!-- prices -->
                    <div>
                        <p class="our_price_display" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><link itemprop="availability" href="https://schema.org/InStock"/>
                            <span id="our_price_display" class="price" itemprop="price" content="{{ $productDetail->giamoi == 0 ? number_format($productDetail->giacu) : number_format($productDetail->giamoi)}}">{{ $productDetail->giamoi == 0 ? number_format($productDetail->giacu) : number_format($productDetail->giamoi)}}</span> vnđ.
                            <meta itemprop="priceCurrency" content="VND" />
                        </p>
                        {{-- <p id="reduction_percent" ><span id="reduction_percent_display">-20%</span></p> --}}
                        <p id="reduction_amount"  style="display:none"><span id="reduction_amount_display"></span></p>
                        @if ($productDetail->giamoi == 0)
                            
                        @else
                            <p id="old_price"><span id="old_price_display"><span class="price">{{ number_format($productDetail->giacu) }}</span> vnđ.</span></p>
                        @endif
                        
                    </div> <!-- end prices -->



        <div class="clear"></div>
    </div> <!-- end content_prices -->
    <p class="warning_inline" id="last_quantities" style="display: none" >Warning: Last items in stock!</p>
    <p id="availability_date" style="display: none;">
        <span id="availability_date_label">Availability date:</span>
        <span id="availability_date_value"></span>
    </p>
    <!-- Out of stock hook -->
    <div id="oosHook" style="display: none;">

    </div>

    {{-- <div id="short_description_block">
        <div id="short_description_content" class="rte align_justify" itemprop="description"><p>Mô tả ngắn</p></div>
        <p class="buttons_bottom_block">
            <a href="javascript:{}" class="button">
                More details<i class="icon icon-angle-double-right"></i>
            </a>
        </p>
        <!---->
    </div> --}} <!-- end short_description_block -->

    <!-- add to cart form-->
    <form id="buy_block" action="{{ route('addCartDetail', $productDetail->id) }}" method="post">
        <!-- hidden datas -->
        <p class="hidden">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" name="id_product" value="17" id="product_page_product_id" />
            <input type="hidden" name="add" value="1" />
            <input type="hidden" name="id_product_attribute" id="idCombination" value="" />
        </p>
        <div class="box-info-product">

            <div class="product_attributes clearfix">

                <!-- minimal quantity wanted -->
                <p id="minimal_quantity_wanted_p" style="display: none;">
                    The minimum purchase order quantity for the product is <b id="minimal_quantity_label">1</b>
                </p>
                <!-- attributes -->
                {{-- <div id="attributes-ii">
                    <div id="attributes">
                        <div class="row">

                            <fieldset class="attribute_fieldset col-xs-12 col-sm-6 col-md-6">
                                <label class="attribute_label" for="group_1">Size&nbsp;</label>
                                <div class="attribute_list">
                                    <select name="group_1" id="group_1" class="form-control attribute_select no-print">
                                        <option value="1" selected="selected" title="S">S</option>
                                        <option value="2" title="M">M</option>
                                        <option value="3" title="L">L</option>
                                    </select>
                                </div> <!-- end attribute_list -->
                            </fieldset>

                            <fieldset class="attribute_fieldset col-xs-12 col-sm-6 col-md-6">
                                <label class="attribute_label" for="group_3">Color&nbsp;</label>
                                <div class="attribute_list">
                                    <select name="group_3" id="group_3" class="form-control attribute_select no-print">
                                        <option value="13" selected="selected" title="Orange">Orange</option>
                                    </select>
                                </div> <!-- end attribute_list -->
                            </fieldset>
                        </div>
                    </div>
                </div> <!-- end attributes --> --}}
            </div> <!-- end product_attributes -->
            <div class="box-cart-bottom ">
                <!-- quantity wanted -->
                
                        <p id="quantity_wanted_p">
                        <label for="quantity_wanted">Số lượng:</label>
                        <span class="qty-ii">
                            {{-- <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
                                <span><i class="pe-7s-less"></i></span>
                            </a> --}}
                            <input  min="1" max="10" name="qty" id="quantity_wanted" class="text" value="1" />

                            {{-- <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up">
                                <span><i class="pe-7s-plus"></i></span>
                            </a> --}}
                        </span>
                        <span class="clearfix"></span>
                    </p>


                    <div id="" >
                        <a href="{{ route('addCartDetail', $productDetail->id) }}" id="" class="buttons_bottom_block no-print">
                            <button type="submit" name="Submit" class="exclusive">
                                <span>Thêm vào giỏ hàng</span>
                            </button>
                        </a>

                </div>
                    
                
                <!-- usefull links-->
                {{-- <ul id="usefull_link_block" class="no-print">
                    <li class="sendtofriend">
                        <a id="send_friend_button" href="#send_friend_form">
                            Send to a friend
                        </a>
                        <div style="display: none;">
                            <div id="send_friend_form">
                                <h2  class="page-subheading">
                                    Send to a friend
                                </h2>
                                <div class="row">
                                    <div class="product clearfix col-xs-12 col-sm-6">
                                        <img src="../../85-home_default/printed-dress.jpg" height="320" width="250" alt="Apple Iphone 7 – 64GB" />
                                        <div class="product_desc">
                                            <p class="product_name">
                                                <strong>Apple Iphone 7 – 64GB</strong>
                                            </p>
                                            <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p>
                                        </div>
                                    </div><!-- .product -->
                                    <div class="send_friend_form_content col-xs-12 col-sm-6" id="send_friend_form_content">
                                        <div id="send_friend_form_error"></div>
                                        <div id="send_friend_form_success"></div>
                                        <div class="form_container">
                                            <p class="intro_form">
                                                Recipient :
                                            </p>
                                            <p class="text">
                                                <label for="friend_name">
                                                    Name of your friend <sup class="required">*</sup> :
                                                </label>
                                                <input id="friend_name" name="friend_name" type="text" value=""/>
                                            </p>
                                            <p class="text">
                                                <label for="friend_email">
                                                    E-mail address of your friend <sup class="required">*</sup> :
                                                </label>
                                                <input id="friend_email" name="friend_email" type="text" value=""/>
                                            </p>
                                            <p class="txt_required">
                                                <sup class="required">*</sup> Required fields
                                            </p>
                                        </div>
                                        <p class="submit">
                                            <button id="sendEmail" class="btn button button-small" name="sendEmail" type="submit">
                                                <span>Send</span>
                                            </button>&nbsp;
                                            or&nbsp;
                                            <a class="closefb" href="#">
                                                Cancel
                                            </a>
                                        </p>
                                    </div> <!-- .send_friend_form_content -->
                                </div>
                            </div>
                        </div>
                    </li>





                    <li class="print">
                        <a href="javascript:print();">
                            <span>Print</span>
                        </a>
                    </li>
                </ul> --}}

                                            <!--     <div class="buttons_bottom_block">
                                                    <a href="javascript:;" class="add_to_compare compare_button " rel="nofollow" title="Add to compare" data-product-id="17" data-product-name="Apple Iphone 7 &ndash; 64GB" data-product-cover="http://labbluesky.com/prestashop/lab_techstore16/85-medium_default/printed-dress.jpg"  data-product-link="http://labbluesky.com/prestashop/lab_techstore16/en/casual-dresses/17-printed-dress.html" ><i class="icon-retweet"></i><span>Add to compare</span></a>
                                                </div>
                                            --><p class="buttons_bottom_block no-print">
                                            <a id="wishlist_button_nopop" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '17', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="Add to my wishlist">
                                                Add to wishlist
                                            </a>
                                        </p>

                                    </div> <!-- end box-cart-bottom -->
                                </div> <!-- end box-info-product -->
                            </form>
                            <p class="socialsharing_product list-inline no-print">
                                <a href="{!! url()->current() !!}#sectioncompare"><button data-type="twitter" type="button" class="btn btn-default btn-twitter social-sharing">
                                    <i class="pe-icon pe-7s-repeat"></i> So sánh
                                    <!-- <img src="http://labbluesky.com/prestashop/lab_techstore16/modules/socialsharing/img/twitter.gif" alt="Tweet" /> -->
                                </button></a>

                                {{-- <button data-type="facebook" type="button" class="btn btn-default btn-facebook social-sharing">
                                    <i class="icon-facebook"></i> Share
                                    <!-- <img src="http://labbluesky.com/prestashop/lab_techstore16/modules/socialsharing/img/facebook.gif" alt="Facebook Like" /> -->
                                </button>
                                <button data-type="google-plus" type="button" class="btn btn-default btn-google-plus social-sharing">
                                    <i class="icon-google-plus"></i> Google+
                                    <!-- <img src="http://labbluesky.com/prestashop/lab_techstore16/modules/socialsharing/img/google.gif" alt="Google Plus" /> -->
                                </button>
                                <button data-type="pinterest" type="button" class="btn btn-default btn-pinterest social-sharing">
                                    <i class="icon-pinterest"></i> Pinterest
                                    <!-- <img src="http://labbluesky.com/prestashop/lab_techstore16/modules/socialsharing/img/pinterest.gif" alt="Pinterest" /> -->
                                </button> --}}
                            </p>

                            <!--  /Module ProductComments -->

                        </div>

                        <!-- end center infos-->
                        <!-- pb-right-column-->
                            <!-- <div class="pb-right-column col-xs-12 col-sm-4 col-md-3">

                        </div> --> <!-- end pb-right-column-->
                    </div> <!-- end primary_block -->
                    <div class="more-info">
                        <div class="more-info-ii">
                            <ul id="more_info_tabs" class="idTabs idTabsShort">
                                <li class="first"><a id="more_info_tab_data_sheet" href="#idTab2">Chi tiết sản phẩm</a></li>

                                <li><a id="more_info_tab_more_info" href="#idTab1">Mô tả</a></li>			


                                <li class="last"><a href="#idTab5" class="idTabHrefShort page-product-heading">Đánh giá</a> </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <section id="idTab1" class="page-product-box">
                                <!-- full description -->
                                <div  class="rte"><p>{!! $productDetail->mota !!}</p></div>
                                <!--end  More info -->
                            </section>

                            <section id="idTab2" class="page-product-box">

                                <!-- Data sheet -->
                                <table class="table-data-sheet">
                                    <tr class="odd">
                                        <td>Tên sản phẩm</td>
                                        <td>{{ $productDetail->product_name }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Dung lượng</td>
                                        <td>{{ $productDetail->dungluong }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Camera trước</td>
                                        <td>{{ $productDetail->cameratruoc }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Camera sau</td>
                                        <td>{{ $productDetail->camerasau }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>CPU</td>
                                        <td>{{ $productDetail->cpu }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Ram</td>
                                        <td>{{ $productDetail->ram }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Hệ điều hành</td>
                                        <td>{{ $productDetail->hedieuhanh }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Pin</td>
                                        <td>{{ $productDetail->pin }}</td>
                                    </tr>
                                </table>

                                <!--end Data sheet -->

                            </section>

                            <!-- description & features -->
                            <!--end Download -->


                            <div id="idTab5">
                                <div id="product_comments_block_tab">
                                    <p class="align_center">{{ $productDetail->danhgia }}</p>
                                </div> <!-- #product_comments_block_tab -->
                            </div>

                            <!-- Fancybox -->
                            <div style="display: none;">
                                <div id="new_comment_form">
                                    <form id="id_new_comment_form" action="#">
                                        <h2 class="page-subheading">
                                            Write a review
                                        </h2>
                                        <div class="row">
                                            <div class="product clearfix  col-xs-12 col-sm-6">
                                                <img src="uploads/products/{{ $productDetail->hinhanh }}" height="160" width="125" alt="{{ $productDetail->product_name }}" />
                                                <div class="product_desc">
                                                    <p class="product_name">
                                                        <strong>{{ $productDetail->product_name }}</strong>
                                                    </p>
                                                    {{-- <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p> --}}
                                                </div>
                                            </div>
                                            <div class="new_comment_form_content col-xs-12 col-sm-6">
                                                <div id="new_comment_form_error" class="error" style="display: none; padding: 15px 25px">
                                                    <ul></ul>
                                                </div>
                                                <ul id="criterions_list">
                                                    <li>
                                                        <label>Số lượng:</label>
                                                        <div class="star_content">
                                                            <input class="star not_uniform" type="radio" name="criterion[1]" value="1" />
                                                            <input class="star not_uniform" type="radio" name="criterion[1]" value="2" />
                                                            <input class="star not_uniform" type="radio" name="criterion[1]" value="3" />
                                                            <input class="star not_uniform" type="radio" name="criterion[1]" value="4" checked="checked" />
                                                            <input class="star not_uniform" type="radio" name="criterion[1]" value="5" />
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>
                                                <label for="comment_title">
                                                    Title: <sup class="required">*</sup>
                                                </label>
                                                <input id="comment_title" name="title" type="text" value=""/>
                                                <label for="content">
                                                    Comment: <sup class="required">*</sup>
                                                </label>
                                                <textarea id="content" name="content"></textarea>
                                                <div id="new_comment_form_footer">
                                                    <input id="id_product_comment_send" name="id_product" type="hidden" value='17' />
                                                    <p class="fl required"><sup>*</sup> Required fields</p>
                                                    <p class="fr">
                                                        <button id="submitNewMessage" name="submitMessage" type="submit" class="btn button button-small">
                                                            <span>Submit</span>
                                                        </button>&nbsp;
                                                        or&nbsp;
                                                        <a class="closefb" href="#">
                                                            Cancel
                                                        </a>
                                                    </p>
                                                    <div class="clearfix"></div>
                                                </div> <!-- #new_comment_form_footer -->
                                            </div>
                                        </div>
                                    </form><!-- /end new_comment_form_content -->
                                </div>
                            </div>
                            <!-- End fancybox -->

                        </div>
                    </div>
                    <!--HOOK_PRODUCT_TAB -->



                    <!--end HOOK_PRODUCT_TAB -->

                    <div id="sectioncompare" class="row">
                        <div class="page-product-box blockproductscategory lablistproducts laberthemes">
                            <div class="row">
                                <p class="title_block">
                                    <span>
                                        {{ count($productBrands) }} sản phẩm cùng hãng:
                                    </span>
                                </p>
                                <div id="productscategory_list" class="clearfix">
                                    <div class="pos-productscategory">
                                    @foreach ($productBrands as $element)
                                        <div class="item-inner wow fadeInUp " data-wow-delay="{{ $element->id.'00ms' }}" >

                                            <div class="item">
                                                <div class="left-block">
                                                    <h5 class="product-name"><a href="{{ route('detail', $element->id) }}" title="{{ $element->name }}">{{ $element->name }}</a></h5>

                                                    <div class="product-image-container">
                                                        <a class= "product_image" href="{{ route('detail', $element->id) }}" title="{{ $element->name }}">
                                                            <img class="img-responsive img1" src="uploads/products/{{ $element->hinhanh }}" alt="{{ $element->name }}" />

                                                            {{-- <img  class="img-responsive img2" src="../../34-large_default/printed-dress.jpg" alt=""  itemprop="image"  /> --}}
                                                        </a>

                                                        @if ($element->giamoi)
                                                            <span class="sale-label">Sale</span>
                                                        @else
                                                            <span class="new-label">New</span>
                                                        @endif


                                                        <!--  -->
                                                    </div>

                                                </div>
                                                <div class="right-block">
                                                    <div class="media-body">
                                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                            <span itemprop="price" class="price product-price">{{ $element->giamoi == 0 ? number_format($element->giacu) : number_format($element->giamoi)}}</span>
                                                            <meta itemprop="priceCurrency" content="VND" />
                                                            @if ($element->giamoi == 0)
                                                    
                                                            @else
                                                                <span class="old-price product-price">{{number_format($element->giacu)}}</span>
                                                            @endif

                                                        </div>

                                                            <div class="lab-quick-view pull-right">
                                                                <a class="quick-view" href="{{ route('detail', $element->id) }}"
                                                                data-id-product="{{ $element->id }}"
                                                                title="Quick view">
                                                                <i class="pe-icon pe-7s-look"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links ">
                                                            <li class="lab-Wishlist pull-left">
                                                                <a onclick="WishlistCart('wishlist_block_list', 'add', '{{ $element->id }}', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                                data-id-product="{{ $element->id }}"
                                                                title="Add to Cart">
                                                                <i class="pe-icon pe-7s-cart"></i>Giỏ hàng</a>

                                                            </li>
                                                            <li class="lab-compare pull-left">
                                                                <a class=""
                                                                href="{{ route('compareprd', [$productDetail->id, $element->id]) }}"
                                                                data-product-name="{{ $element->name }}"
                                                                data-product-cover="uploads/products/{{ $element->hinhanh }}" alt="{{ $element->name }}"
                                                                data-id-product="{{ $element->id }}"
                                                                title="So sánh">
                                                                <i class="pe-icon pe-7s-repeat"></i>
                                                                So sánh
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                                    </div>
                                                    <div class="lab_boxnp">
                                                        <a class="prev prevproductscategory"><i class="icon icon-angle-left"></i></a>
                                                        <a class="next nextproductscategory"><i class="icon icon-angle-right"></i></a>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {

                                                            var owl = $(".pos-productscategory");

                                                            owl.owlCarousel({
                                                                addClassActive : true,
                                                                items :5,
                                                                itemsDesktop : [1199,4],
                                                                itemsDesktopSmall : [991,3],
                                                                itemsTablet: [767,2],
                                                                itemsMobile : [480,1]
                                                            });

                                                // Custom Navigation Events
                                                $(".nextproductscategory").click(function(){
                                                    owl.trigger('owl.next');
                                                })
                                                $(".prevproductscategory").click(function(){
                                                    owl.trigger('owl.prev');
                                                })
                                            });

                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                        

                        {{-- so sanh --}}
                        <div  class="row">
                        <div  class="page-product-box blockproductscategory lablistproducts laberthemes">
                            <div  class="row">
                                <p class="title_block">
                                    <span>
                                        So sánh
                                    </span>
                                </p>
                                <div id="productscategory_list" class="clearfix">
                                    <div class="pos-productscategory">
                                    @foreach ($samePriceProducts as $samePriceProduct)
                                        <div class="item-inner wow fadeInUp " data-wow-delay="{{ $samePriceProduct->id.'00ms' }}" >

                                            <div class="item">
                                                <div class="left-block">
                                                    <h5 class="product-name"><a href="{{ route('detail', $samePriceProduct->id) }}" title="{{ $samePriceProduct->name }}">{{ $samePriceProduct->name }}</a></h5>

                                                    <div class="product-image-container">
                                                        <a class= "product_image" href="{{ route('detail', $samePriceProduct->id) }}" title="{{ $samePriceProduct->name }}">
                                                            <img class="img-responsive img1" src="uploads/products/{{ $samePriceProduct->hinhanh }}" alt="{{ $samePriceProduct->name }}" />

                                                            {{-- <img  class="img-responsive img2" src="../../34-large_default/printed-dress.jpg" alt=""  itemprop="image"  /> --}}
                                                        </a>

                                                        @if ($samePriceProduct->giamoi)
                                                            <span class="sale-label">Sale</span>
                                                        @else
                                                            <span class="new-label">New</span>
                                                        @endif


                                                        <!--  -->
                                                    </div>

                                                </div>
                                                <div class="right-block">
                                                    <div class="media-body">
                                                        <div class="content_price pull-left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                            <span itemprop="price" class="price product-price">{{ $samePriceProduct->giamoi == 0 ? number_format($samePriceProduct->giacu) : number_format($samePriceProduct->giamoi)}}</span>
                                                            <meta itemprop="priceCurrency" content="VND" />
                                                            @if ($samePriceProduct->giamoi == 0)
                                                    
                                                            @else
                                                                <span class="old-price product-price">{{number_format($samePriceProduct->giacu)}}</span>
                                                            @endif

                                                        </div>

                                                            <div class="lab-quick-view pull-right">
                                                                <a class="quick-view" href="{{ route('detail', $samePriceProduct->id) }}"
                                                                data-id-product="{{ $samePriceProduct->id }}"
                                                                title="Quick view">
                                                                <i class="pe-icon pe-7s-look"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <ul class="add-to-links ">
                                                            <li class="lab-Wishlist pull-left">
                                                                <a onclick="WishlistCart('wishlist_block_list', 'add', '{{ $samePriceProduct->id }}', $('#idCombination').val(), 1,'tabproduct'); return false;" class="add-wishlist wishlist_button" href="#"
                                                                data-id-product="{{ $samePriceProduct->id }}"
                                                                title="Add to Cart">
                                                                <i class="pe-icon pe-7s-cart"></i>Giỏ hàng</a>

                                                            </li>
                                                            <li class="lab-compare pull-left">
                                                                <a class=""
                                                                href="{{ route('compareprd', [$productDetail->id, $samePriceProduct->id]) }}"
                                                                data-product-name="{{ $samePriceProduct->name }}"
                                                                data-product-cover="uploads/products/{{ $samePriceProduct->hinhanh }}" alt="{{ $samePriceProduct->name }}"
                                                                data-id-product="{{ $samePriceProduct->id }}"
                                                                title="So sánh">
                                                                <i class="pe-icon pe-7s-repeat"></i>
                                                                So sánh
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- search --}}
                                    <div class="item-inner wow fadeInUp " data-wow-delay="1000ms" >
                                            <div class="item labSearch">
                                                <div class="left-block" id="search_block_top" class="clearfix">
                                                   <form id="searchbox" accept-charset="utf-8">
                                                        <input id="target" class="search_query form-control" type="text" name="" value="" placeholder="Nhập để tìm kiếm">
                                                        <div id="result-compare" style="display: none">
                                                            
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $( "#target" ).keyup(function() {
                                                                        var keyword = $(this).val();
                                                                        var idProduct = "<?php echo $productDetail->id; ?>";
                                                                        if (keyword.length > 0) {
                                                                            $.ajax({
                                                                                url: 'compare',
                                                                                dataType : 'text',
                                                                                type: 'GET',
                                                                                data: {id: idProduct, keyword: keyword},
                                                                                success: function(data) {
                                                                                    $("div#result-compare").css({'display':'block'});
                                                                                    $("#result-compare").html(data);
                                                                                }

                                                                            });
                                                                        } else {
                                                                            $("div#result-compare").css({'display': 'none'});
                                                                        }
                                                                });
                                                            });
                                                        </script>
                                                    </form> 
            
                                                </div>
                                            </div>
                                    </div>
                                    {{-- end search --}}

                                </div>                                                    
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- end so sanh --}}

                    </div> <!-- itemscope product wrapper -->

                    

                </div><!-- #center_column -->
            </div><!-- .row -->
        </div><!-- #columns -->
    </div><!-- .columns-container -->
@endsection