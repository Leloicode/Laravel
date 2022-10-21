@extends('layout.index')
@section('css')

@endsection
@section('content')
	<div class="rev-slider">
	<div class="fullwidthbanner-container">
		@if(Session::has('flag'))

	
	<div class="tbpopup" id="tbpopup-1">
		<div class="tboverlay"></div>
		<div class="tbcontent">
		<div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
		<div style="font-size:30px;font-weight:bold; height: 80px; margin-top: 40px">{{ Session::get('message') }}</div>
		
		</div>
		</div>


	@endif
	
					<div class="fullwidthbanner" style="z-index: 1">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
                                    @foreach ($slides as $slide)
                                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/image/slide/{{$slide->image}}" data-src="/image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                                    </div>
                                                </div>
    
                                    </li>
                                    @endforeach
									<!-- THE FIRST SLIDE -->
									
								
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $count_list}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">

								
								@foreach ($products_listhome as $product)
									
								
								<div class="col-sm-3">
									<div class="single-item">
										@if ($product->promotion_price != 0)
										<div class="ribbon-wrapper" style="z-index: 2;"><div class="ribbon sale">Sale</div></div>
										@endif
									
										<div class="single-item-header">
											<a href="{{ route('Products.show', $product->id) }}"><img src="/image/product/{{$product->image}}" alt="" style="width:300px; height:255px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
											@if ($product->promotion_price == 0)
												<span class="flash-sale">{{$product->promotion_price}}.vnđ</span>
											@else
											<span class="flash-del">{{$product->unit_price}}</span>
											<span class="flash-sale">{{$product->promotion_price}}.vnđ</span>
											
											@endif
												
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$product->id ) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('Products.show', $product->id) }}">Xem chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
                            <div class="pager"> {{$products_listhome->links("pagination::bootstrap-4")}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{$count_list_km}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($products_list_kmhome as $product_km)
								<div class="col-sm-3">
									<div class="single-item">
										@if ($product_km->promotion_price != 0)
										<div class="ribbon-wrapper" style="z-index: 2;"><div class="ribbon sale">Sale</div></div>
										@endif
									
										<div class="single-item-header">
											<a href="{{ route('Products.show', $product_km->id) }}"><img src="/image/product/{{$product_km->image}}" alt="" style="width:300px; height:255px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product_km->name}}</p>
											<p class="single-item-price">
											@if ($product_km->promotion_price == 0)
												<span class="flash-sale">{{$product_km->promotion_price}}.vnđ</span>
											@else
											<span class="flash-del">{{$product_km->unit_price}}</span>
											<span class="flash-sale">{{$product_km->promotion_price}}.vnđ</span>
											
											@endif
												
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('Products.show', $product_km->id) }}">Xem chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
								</div>
								</div>
								@endforeach
							</div>
                            <div class="pager"> {{$products_list_kmhome->links("pagination::bootstrap-4")}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('js')

@endsection