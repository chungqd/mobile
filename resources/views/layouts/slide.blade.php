<div class="labbannerSlide">
    <div class="container">
        <div class="row">

            <!-- Module labslideshow -->
            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="lab-nivoSlideshow">
                    <div class="lab-loading"></div>
                    <div id="lab-slideshow" class="slides">
                        <img
                                data-thumb="http://labbluesky.com/prestashop/lab_techstore16/modules/labslideshow/images/7e643859d8f9053a76e65947c5cd5829066e199d_slider1_home1.jpg"
                                src="front/modules/labslideshow/images/7e643859d8f9053a76e65947c5cd5829066e199d_slider1_home1.jpg"
                                alt="3D Touch. 12MP photos.  4K video."
                                title="#htmlcaption7" />
                        <img
                                data-thumb="http://labbluesky.com/prestashop/lab_techstore16/modules/labslideshow/images/21b3a89b4b3aa5f886d6078008e9d5fbd9383cfa_slider1_home2.jpg"
                                src="front/modules/labslideshow/images/21b3a89b4b3aa5f886d6078008e9d5fbd9383cfa_slider1_home2.jpg"
                                alt="3D Touch. 12MP photos.  4K video."
                                title="#htmlcaption8" />
                    </div>

                    <div id="htmlcaption7" class=" nivo-html-caption nivo-caption">
                        <div class="lab_description active right style2">


                            <div class="title">
                                <h4>Samsung</h4>
                            </div>
                            <!-- 					<div class="lab_caption">
                                3D Touch. 12MP photos.  4K video.
                            </div>
                        -->
                            <div class="description">
                                <p>3D Touch. 12MP photos. <br />4K video.<br />One powerful phone.</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Show Now</a>
                            </div>
                        </div>
                    </div>
                    <div id="htmlcaption8" class=" nivo-html-caption nivo-caption">
                        <div class="lab_description active left style2">


                            <div class="title">
                                <h4>iPhone 6</h4>
                            </div>
                            <!-- 					<div class="lab_caption">
                                3D Touch. 12MP photos.  4K video.
                            </div>
                        -->
                            <div class="description">
                                <p>3D Touch. 12MP photos. <br />4K video.<br />One powerful phone.</p>
                            </div>
                            <div class="readmore">
                                <a href="#">Show Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(window).load(function() {
                    $(document).off('mouseenter').on('mouseenter', '.lab-nivoSlideshow', function(e){
                        $('.lab-nivoSlideshow .timeline').addClass('lab_hover');
                    });

                    $(document).off('mouseleave').on('mouseleave', '.lab-nivoSlideshow', function(e){
                        $('.lab-nivoSlideshow .timeline').removeClass('lab_hover');
                    });
                    $('#lab-slideshow').nivoSlider({
                        effect: 'random',
                        slices: 15,
                        boxCols: 8,
                        boxRows: 4,
                        animSpeed: '500',
                        pauseTime: '6000',
                        startSlide: 0,
                        directionNav: true,
                        controlNav:  true ,
                        controlNavThumbs: false,
                        pauseOnHover: true,
                        manualAdvance: false,
                        prevText: '<i class="icon-angle-left"></i>',
                        nextText: '<i class="icon-angle-right"></i>',
                        afterLoad: function(){
                            $('.lab-loading').css("display","none");
                        },
                        beforeChange: function(){
                            $('.nivo-caption .lab_description').removeClass("active").css("opacity","0");
                        },
                        afterChange: function(){
                            $('.nivo-caption .lab_description').addClass("active" ).css("opacity","1");
                        }
                    });
                    //$(document).ready(function() {
                    //	$(".nivo-caption .title h4").lettering('words');
                    //});

                });
            </script>

            <!-- /Module labslideshow -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="lab_static">
                    <div class="img"><a title="" href="#"> <img src="front/img/cms/img_1_1.jpg" alt="images" /> </a></div>
                    <div class="img"><a title="" href="#"> <img src="front/img/cms/slide.jpg" alt="images" /> </a></div>
                </div>
            </div>

        </div>
    </div>
</div>