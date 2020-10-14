@extends('layouts.app')
@section('content')
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			{{$data['source']}}
		</h2>
	</div>

	<section class="bg0 p-t-110 p-b-25">
		<div class="container">
			@if(session()->has('success'))
				<div class="alert alert-success">
					{{session()->get('success')}}
				</div>
			@elseif(session()->has('error'))
				<div class="alert alert-success">
					{{session()->get('error')}}
				</div>
			
			@endif
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="infinite-scroll">
					<div class="row">

						@foreach($data['result'] as $article)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item -->
							<div class="p-b-53">
								<a href="{{$article->article_url}}" target='_blank' class="wrap-pic-w hov1 trans-03">
									<img src="{{$article->top_image}}" alt="IMG">
								</a>

								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="{{$article->article_url}}" target='_blank' class="f1-m-3 cl2 hov-cl10 trans-03">
											{{$article->title}}
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a href="{{$article->article_url}}" target='_blank' class="f1-s-4 cl8 hov-cl10 trans-03">
											@if( $article->authors != "NULL")
	                                        	{{$article->authors}}
	                                        @endif
										</a>

										<span class="f1-s-3 m-rl-3">
											
										</span>

										<span class="f1-s-3">
											
										</span>
									</div>
									@php
										if(strlen($article->article_text) >= 100)
										{
											$text = substr($article->article_text,0,100).' ...';
										}
										else
										{
											$text = $article->article_text;
										}
									@endphp

									<p class="f1-s-11 cl6 txt-center p-b-16">
										{{$text}}
									</p>

									<a href="{{$article->article_url}}" target='_blank' class="f1-s-1 cl9 hov-cl10 trans-03">
										Read More
										<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>

							<!-- Item -->
							
						</div>
						@endforeach

						
						</div>
						<center>{{$data['result']->appends(request()->query())->links()}}</center>
					</div>
					</div>

				</div>

			
			</div>
		</div>
	</section>
@endsection