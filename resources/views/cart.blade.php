@extends('layouts.master')
@section('content')
<div class="lab-breadcrumb">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb clearfix">
            <div class="breadcrumb-i">
                <a class="home" href="{{route('home')}}" title="Trở lại trang chủ">Trang chủ</a>
                <span class="navigation-pipe">&gt;</span>
                Giỏ hàng của bạn
            </div>
        </div>
        <!-- /Breadcrumb -->
    </div>
</div>

<div class="columns-container">
	<div id="columns" class="container">
		<div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 id="cart_title" class="page-heading">Giỏ Hàng
						<span class="heading-counter">Giỏ hàng của bạn chứa:
						<span id="summary_products_quantity">{{ Cart::count() }} sản phẩm</span>
					</span>
				</h1>




			<p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>
            <div class="cart_last_product">
            <div class="cart_last_product_header">
                <div class="left">Last product added</div>
            </div>
            <a class="cart_last_product_img" href="evening-dresses/4-printed-dress.html">
                <img src="../37-small_default/printed-dress.jpg" alt="Selfie stick">
            </a>
            <div class="cart_last_product_content">
                <p class="product-name">
                    <a href="evening-dresses/4-printed-dress.html#/size-s/color-beige">
                        Selfie stick
                    </a>
                </p>
                                    <small>
                        <a href="evening-dresses/4-printed-dress.html#/size-s/color-beige">
                            Size : S, Color : Beige
                        </a>
                    </small>
                            </div>
        </div>
                    
    
    <div id="order-detail-content" class="table_block table-responsive">
        <table id="cart_summary" class="table table-bordered stock-management-on">
            <thead>
                <tr>
                    <th class="cart_product first_item">Hình ảnh</th>
                    <th class="cart_description item">Tên sản phẩm</th>
                    {{-- <th class="cart_avail item text-center">Tình trạng</th> --}}
                    <th class="cart_unit item text-right">Giá</th>
                    <th class="cart_quantity item text-center">Số lượng</th>
                    <th class="cart_delete last_item">&nbsp;</th>
                    <th class="cart_total item text-right">Thành tiền</th>
                </tr>
            </thead>
            <tfoot>
				{{-- <tr class="cart_total_price">
					<td rowspan="3" colspan="2" id="cart_voucher" class="cart_voucher"></td>
					<td colspan="3" class="text-right">Total products (tax incl.)</td>
					<td colspan="2" class="price" id="total_product">$ 144.60</td>
				</tr> --}}
                <tr class="cart_total_delivery unvisible">
					<td colspan="3" class="text-right">Total shipping</td>
					<td colspan="2" class="price" id="total_shipping">Free shipping!</td>
				</tr>
                <tr class="cart_total_voucher unvisible">
                    <td colspan="3" class="text-right">Total vouchers (tax incl.)</td>
                    <td colspan="2" class="price-discount price" id="total_discount">$ 0.00</td>
                </tr>
				<tr class="cart_total_price">
                    <td colspan="3" class="total_price_container text-right">
                        <span>Total</span>
                        <div class="hookDisplayProductPriceBlock-price">
                            
                        </div>
                    </td>
                    {{-- <td colspan="" rowspan="" headers=""></td> --}}
                    <td colspan="3" class="price" id="total_price_container">
						<span id="total_price">{{ Cart::subtotal() }}</span>
					</td>
				</tr>
            </tfoot>
			
            <tbody>
            
            @foreach (Cart::content() as $item)
            <form action="{{ route('capnhap', $item->rowId) }}" method="post" accept-charset="utf-8">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
				<tr id="product_2_7_0_0" class="cart_item address_0 even">
					<td class="cart_product">
						<a href="{{ route('detail', $item->id) }}"><img src="uploads/products/{{ ($item->options->has('img') ? $item->options->img : '') }}" alt="Iphone Case" width="98" height="125"></a>
					</td>
				<td class="cart_description">
					<p class="product-name"><a href="{{ route('detail', $item->id) }}">{{ $item->name }}</a></p>
				</td>
				{{-- <td class="cart_avail">
                    <span class="label label-success">In stock</span>
                </td> --}}
				<td class="cart_unit" data-title="Unit price">
					<ul class="price text-right" id="product_price_2_7_0">
						<li class="price">{{ number_format($item->price, 0, ",", ".") }}</li>
					</ul>
				</td>

				<td class="cart_quantity text-center" data-title="Quantity">
                    <input type="hidden" value="{{ $item->qty }}" name="quantity_2_7_0_0_hidden">
					<input size="2" type="text" autocomplete="off" class="qty cart_quantity_input form-control grey"  value="{{ $item->qty }}" name="quantity">
					<div class="cart_quantity_button clearfix">
						<a rel="nofollow" class="updateCart" href="#" id="{{ $item->rowId }}" title="Update">
					   {{-- <span><i class="icon-refresh"></i></span> --}}
                       <button type="submit" class="btn btn-success"><i class="icon-refresh"></i></button>
					</a>
					{{-- <a rel="nofollow" class="cart_quantity_up btn btn-default button-plus" id="cart_quantity_up_2_7_0_0" href="ordera9c3.html?add=1&amp;id_product=2&amp;ipa=7&amp;id_address_delivery=0&amp;token=8094a5532f541448c6101a27e0f8d489" title="Add"><span><i class="icon-plus"></i></span></a> --}}
					</div>
				</td>

				<td class="cart_delete text-center" data-title="Delete">
					<div>
						<a rel="nofollow" title="Delete" class="cart_quantity_delete" id="2_7_0_0" href="{{ route('xoa-san-pham', $item->rowId) }}"><i class="icon-trash"></i></a>
					</div>
                </td>
				<td class="cart_total" data-title="Total">
				<span class="price" id="total_product_price_2_7_0">{{ number_format(($item->price)*($item->qty), 0, ",", ".")  }}</span>
				</td>
                </form>
            </tr>
            @endforeach
            


 </tbody>

</table>
    </div> <!-- end order-detail-content -->
<div id="HOOK_SHOPPING_CART"></div>
    <p class="cart_navigation clearfix">
                    <a href="{{ route('order') }}" class="button btn btn-default standard-checkout button-medium" title="Đặt hàng" style="">
                <span id="order">Đặt hàng<i class="icon-chevron-right right"></i></span>
            </a>
                <a href="{{ route('home') }}" class="button-exclusive btn btn-default" title="tiếp tục mua hàng">
            <i class="icon-chevron-left"></i>tiếp tục mua hàng
        </a>
    </p>
    <div class="clear"></div>
    <div class="cart_navigation_extra">
        <div id="HOOK_SHOPPING_CART_EXTRA"></div>
    </div>

                    </div><!-- #center_column -->
                                        </div><!-- .row -->
                </div><!-- #columns -->
            </div>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.updateCart').click(function() {
                var id = $(this).attr('id');
                var qty = $(this).parent().parent().find('.qty').val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url:"capnhap/"+id+"/"+qty,
                    type: 'GET',
                    cache: false,
                    data:{"_token":token, "id":id, "qty":qty},
                    success:function (data) {
                        if (data == 'oke') {
                            alert('sdd');
                        }
                    }
                });
            });
        });
    </script> --}}
@endsection