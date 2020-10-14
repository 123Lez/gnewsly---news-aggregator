@extends('layouts.app')
@section('content')

<section class="bg0 p-t-50 p-b-90">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-50">
					<div class="p-r-10 p-r-0-sr991">
						<div class="how2 how2-cl4 flex-s-c">
							<h3 class="f1-m-2 cl3 tab01-title">
								<i class="fa fa-search"></i>&nbsp;Search result
							</h3>
						</div>

						<div class="infinite-scroll">
							<div class="p-b-40">
						@if(count($search_result) > 0)
							@foreach($search_result as $result)

								
									<!-- Item post -->
									<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
										<a href="blog-detail-01.html" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
											<img src="{{$result->top_image}}" alt="IMG">
										</a>

										<div class="size-w-9 w-full-sr575 m-b-25">
											<h5 class="p-b-12">
												<a href="{{$result->article_url}}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
													{{$result->title}}
												</a>
											</h5>

											<div class="cl8 p-b-18">
												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													{{$result->authors}}
												</a>

												<span class="f1-s-3 m-rl-3">
													
												</span>

												<span class="f1-s-3">
													
												</span>
											</div>

											<p class="f1-s-1 cl6 p-b-24">
												@php
													if(strlen($result->article_text) >= 100)
													{
														$text = substr($result->article_text,0,100).' ...';
													}
													else
													{
														$text = $result->article_text;
													}
												@endphp
									<span class="article-title">{{$text}}</span>
											</p>

											<a href="{{$result->article_url}}" class="f1-s-1 cl9 hov-cl10 trans-03">
												Read More
												<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
											</a>
										</div>
									</div>

									
								
								@endforeach
						@else
						<div class="p-2 bd-highlight holder">
							
								 No data found
							
						</div>
				
						@endif
						<center>{{$search_result->appends(request()->query())->links()}}</center>
						</div>
						</div>
		

						<!-- <a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							Load More
						</a> -->
						
					</div>
				</div>

				<!-- <div class="col-md-10 col-lg-4 p-b-50">
					<div class="p-l-10 p-rl-0-sr991"> -->
						<!-- Banner -->
						<!-- <div class="flex-c-s">
							<a href="#">
								<img class="max-w-full" src="images/banner-03.jpg" alt="IMG">
							</a>

						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>

@endsection