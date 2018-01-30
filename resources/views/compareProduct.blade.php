@extends('layouts.master')
@section('content')
<div class="lab-breadcrumb">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb clearfix">
            <div class="breadcrumb-i">
                <a class="home" href="{{route('home')}}" title="Trở lại trang chủ">Trang chủ</a>
                <span class="navigation-pipe">&gt;</span>
                <span class="navigation_page">
                    <span>
                        <a itemprop="url" href="" title="Smartphones" >
                            <span itemprop="title">So sánh</span>
                        </a>
                    </span>
                    <span class="navigation-pipe">&gt;</span>
                    <span><b>{{ $mainProduct->name.' và '.$compareProduct->name }}</b></span>
                </span>
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
                    {{-- <meta itemprop="url" content="{{ route('detail', $mainProduct->id) }}"> --}}
                    <div class="more-info">
                        <div class="more-info-ii">
                            <ul id="more_info_tabs" class="idTabs idTabsShort">
                                <li class="first"><a id="more_info_tab_data_sheet" href="#idTab2">Chi tiết sản phẩm</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            {{-- <section id="idTab1" class="page-product-box">
                                <!-- full description -->
                                <div  class="rte"><p>{!! $mainProduct->mota !!}</p></div>
                                <!--end  More info -->
                            </section> --}}

                            <section id="idTab2" class="page-product-box">

                                <!-- Data sheet -->
                                <table class="table-data-sheet" border="1">
                                    <tr class="odd">
                                        <td>Tên sản phẩm</td>
                                        <td>
                                            <span id="view_full_size">
                                                <img id="bigpic" itemprop="image" src="uploads/products/{{ $mainProduct->hinhanh }}" title="{{ $mainProduct->name }}" alt="{{ $mainProduct->name }}" width="258" height="300"/>
                                                
                                            </span><br>
                                            <h3>{{ $mainProduct->name }}</h3>
                                        </td>
                                        <td>
                                            <span id="view_full_size">
                                                <img id="bigpic" itemprop="image" src="uploads/products/{{ $compareProduct->hinhanh }}" title="{{ $compareProduct->name }}" alt="{{ $compareProduct->name }}" width="258" height="300"/>
                                                
                                            </span><br>
                                            <h3>{{ $compareProduct->name }}</h3>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Dung lượng</td>
                                        <td>{{ $mainProduct->dungluong }}</td>
                                        <td>{{ $compareProduct->dungluong }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Camera trước</td>
                                        <td>{{ $mainProduct->cameratruoc }}</td>
                                        <td>{{ $compareProduct->cameratruoc }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Camera sau</td>
                                        <td>{{ $mainProduct->camerasau }}</td>
                                        <td>{{ $compareProduct->camerasau }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>CPU</td>
                                        <td>{{ $mainProduct->cpu }}</td>
                                        <td>{{ $compareProduct->cpu }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Ram</td>
                                        <td>{{ $mainProduct->ram }}</td>
                                        <td>{{ $compareProduct->ram }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Hệ điều hành</td>
                                        <td>{{ $mainProduct->hedieuhanh }}</td>
                                        <td>{{ $compareProduct->hedieuhanh }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Pin</td>
                                        <td>{{ $mainProduct->pin }}</td>
                                        <td>{{ $compareProduct->pin }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Đánh giá</td>
                                        <td>{{ $mainProduct->danhgia }}</td>
                                        <td>{{ $compareProduct->danhgia }}</td>
                                    </tr>
                                </table>

                                <!--end Data sheet -->

                            </section>

                            <!-- description & features -->
                            <!--end Download -->


                            

                            <!-- Fancybox -->
                            <div style="display: none;">
                                <div id="new_comment_form">
                                    <form id="id_new_comment_form" action="#">
                                        <h2 class="page-subheading">
                                            Write a review
                                        </h2>
                                        <div class="row">
                                            <div class="product clearfix  col-xs-12 col-sm-6">
                                                <img src="uploads/products/{{ $mainProduct->hinhanh }}" height="160" width="125" alt="{{ $mainProduct->product_name }}" />
                                                <div class="product_desc">
                                                    <p class="product_name">
                                                        <strong>{{ $mainProduct->product_name }}</strong>
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

                </div> <!-- itemscope product wrapper -->
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
@endsection