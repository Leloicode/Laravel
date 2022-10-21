@section('css')
    
@endsection
@extends('layout.index')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="/">Home</a> / <span>Sản phẩm / {{$name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ( $type_products as $type_product)
                        <li><a href="{{ route('Products.type_product', [ 'id' =>$type_product ->id , 'name' =>$type_product ->name] ) }}">{{$type_product->name}}</a></li>
                        
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($count_product_fiter_new)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($product_fiter_new as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('Products.show',$product->id) }}"><img src="/image/product/{{$product->image}}" alt="" style="width:300px; height:255px;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                           <span class="flash-del">{{$product->unit_price}} đ</span>
                                           <span class="flash-sale">{{$product->promotion_price}}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$product->id ) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('Products.show',$product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="pager">
                        {{$product_fiter_new->links()}}
                    </div>
                   
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($count_product_fiter_top)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($product_fiter_top as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('Products.show',$product->id) }}"><img src="/image/product/{{$product->image}}" alt="" style="width:300px; height:255px;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                           <span class="flash-del">{{$product->unit_price}} đ</span>
                                           <span class="flash-sale">{{$product->promotion_price}} đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('Products.show',$product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="pager">
                        {{$product_fiter_top->links()}}
                    </div>
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('js')
    
@endsection

