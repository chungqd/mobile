@include('layouts.header')
@yield('slide')
@yield('content')
@include('layouts.footer')
</div><!-- #page -->
<a href= "#" class="mypresta_scrollup hidden-phone">
    <span><i class="icon-angle-double-up"></i></span>
</a>

<!-- MODULE st compare -->
<div id="rightbar_compare" class="rightbar_wrap">
    <a id="rightbar-product_compare" class="rightbar_tri icon_wrap" href="products-comparison.html" title="Compare Products">
        <i class="icon-ajust icon-0x"></i>
        <span class="icon_text">Compare</span>
        <span class="compare_quantity amount_circle  hidden "></span>
    </a>
</div>
<!-- /MODULE st compare -->
<div id="compare_message" class="dialog_message" style="display:none;">
    <div class="clearfix mar_b10">
        <div id="compare_pro_img" class="fl dialog_pro_img">
        </div>
        <div id="compare_pro_info" class="dialog_pro_info">
            <div id="compare_pro_title" class="dialog_pro_title"></div>
        </div>
    </div>
    <p id="compare_add_success" class="success hidden">has been added to compare.</p>
    <p id="compare_remove_success" class="success hidden">has been removed from compare.</p>
    <p id="compare_error" class="warning hidden"></p>
    <div class="dialog_action clearfix">
        <a id="compare_continue" class="fl button" href="javascript:;" rel="nofollow">Continue shopping</a>
        <a class="fr button" href="products-comparison.html" title="Compare" rel="nofollow">Compare</a>
    </div>
</div>
<script type="text/javascript">
    // <![CDATA[
    var st_compare_min_item = 'Please select at least one product';
    var st_compare_max_item = "You cannot add more than 3 product(s) to the product comparison";
    //]]>
</script>








<script type="text/javascript">
    $(document).ready(function(){
        $(window).scroll(function() {
            var _height =$(".header-container").height();
            var scroll = $(window).scrollTop();
            if (scroll < _height) {
                $(".header-container").removeClass("labfixed");
            }else{
                $(".header-container").addClass("labfixed");
            }
        });
    });
</script>
</body>
<!-- Mirrored from labbluesky.com/prestashop/lab_techstore16/en/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Oct 2017 04:24:52 GMT -->
</html>