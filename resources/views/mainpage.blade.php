@extends('layouts.app')
@section('content')



<div id="take_survey" class="modal fade" role="dialog" style="display: block;">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="moda-title"><img src="img/Gnewsly2-02.png" style="height: 120px;width: 140px; " alt="IMG-LOGO"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <p>Would you like to take a quick survey?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="take_survey()" class="btn btn-primary" data-dismiss="modal">Take survey</button>
            </div>
        </div>
        
    </div>
    
</div>


	<div class="container">
		@if(session()->has('success'))
			<div class="alert alert-success">
				{{session()->get('success')}}
			</div>
		@elseif(session()->has('error'))
			<div class="alert alert-danger">
				{{session()->get('error')}}
			</div>
		@elseif(session()->has('warning'))
			<div class="alert alert-warning">
				{{session()->get('warning')}}
			</div>
		@endif

        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            	<span class="text-uppercase cl2 p-r-8">
                    Trending Now:
                </span>
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
            	@php
					$slide_counter = 0;
					foreach($data as $article)
					{
						$slide_counter++;
						if($slide_counter <= 4)
						{
							if(strlen($article->title) >= 50)
							{
								$article_title = substr($article->title,0,50).' ...';
							}
							else
							{
								$article_title = $article->title;
							}
							echo "<span class='dis-inline-block slide100-txt-item animated visible-false'>".
                        		 "$article_title".
                    			 "</span>";
						}
						else
						{
							break;
						}
					}
				@endphp
                
                </span>
            </div>
            <form method = "GET" action="fetchArticle">
            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" required name="search-text" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        	</form>
        </div>
    </div>
        
    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">

            	@php
					$slide_counter = 0;
					foreach($data as $article)
					{
						$slide_counter++;
						if($slide_counter <= 4)
						{
							if($slide_counter == 1)
							{
								echo "<div class='col-md-6 p-rl-1 p-b-2'>".
									 "	<div class='bg-img1 size-a-3 how1 pos-relative' style='background-image: url($article->top_image);'>".
									 "		<a href='$article->article_url' target='_blank' class='dis-block how1-child1 trans-03'></a>".

									 "		<div class='flex-col-e-s s-full p-rl-25 p-tb-20'>".
								 	 "			<h3 class='how1-child2 m-t-14 m-b-10'>".

								 	 "<a href='$article->article_url' target='_blank' class='how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03'>".
								 	 "$article->title".
								 	 "</a>".
								 	 "</h3>".

								 	 "<span class='how1-child2'>".
	                                 "<span class='f1-s-4 cl11'>";
                                 	if($article->authors != "NULL")
                                 	{
                                 		echo "$article->authors";
                                 	}
	                                 
	                                echo "</span>".

	                                 "<span class='f1-s-3 cl11 m-rl-3'>".
	                                  
	                                 "</span>".

	                                 "<span class='f1-s-3 cl11'>".
	                                 
	                                 "</span>".
	                                 "</span>".
	                                 "</div>".
	                                 "</div>".
	                                 "</div>";

							}
							elseif($slide_counter == 2)
							{
								echo "<div class='col-md-6 p-rl-1'>".
				                    "<div class='row m-rl--1'>".
				                        "<div class='col-12 p-rl-1 p-b-2'>".
				                            "<div class='bg-img1 size-a-4 how1 pos-relative' style='background-image: url($article->top_image);'>".
				                                "<a href='$article->article_url' target='_blank' class='dis-block how1-child1 trans-03'></a>".

				                                "<div class='flex-col-e-s s-full p-rl-25 p-tb-24'>".
				                                
				                                    "<h3 class='how1-child2 m-t-14'>".
				                                        "<a href='$article->article_url' target='_blank' class='how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03'>".
				                                            "$article->title".
				                                        "</a>".
				                                    "</h3>".
				                                "</div>".
				                            "</div>".
				                        "</div>";

				                        

				                    

							}
							elseif($slide_counter == 3)
							{
								echo "<div class='col-sm-6 p-rl-1 p-b-2'>".
				                            "<div class='bg-img1 size-a-5 how1 pos-relative' style='background-image: url($article->top_image);'>".
				                                "<a href='$article->article_url' target='_blank' class='dis-block how1-child1 trans-03'></a>".

				                                "<div class='flex-col-e-s s-full p-rl-25 p-tb-20'>".
				                                   
				                                    "<h3 class='how1-child2 m-t-14'>".
				                                        "<a href='$article->article_url' target='_blank' class='how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03'>".
				                                            "$article->title".
				                                        "</a>".
				                                    "</h3>".
				                               "</div>".
				                            "</div>".
				                        "</div>";
							}
							elseif($slide_counter == 4)
							{

		                        echo "<div class='col-sm-6 p-rl-1 p-b-2'>".
		                            "<div class='bg-img1 size-a-5 how1 pos-relative' style='background-image: url($article->top_image);'>".
		                                "<a href='$article->article_url' target='_blank' class='dis-block how1-child1 trans-03'></a>".

		                                "<div class='flex-col-e-s s-full p-rl-25 p-tb-20'>".
		                                    
		                                    "<h3 class='how1-child2 m-t-14'>".
		                                        "<a href='$article->article_url' target='_blank' class='how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03'>".
		                                            "$article->title".
		                                        "</a>".
		                                    "</h3>".
		                                "</div>".
		                            "</div>".
		                        "</div>";
							}
							
						}	
						else
						{
							echo "</div>".
				                "</div>";
							break;
						}
						
					}
							
				@endphp
                

                
            </div>
        </div>
    </section>

    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        <!-- Entertainment -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Entertainment
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">All</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Celebrity</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Movies</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab1-4" role="tab">Music</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab1-5" role="tab">Games</a>
                                    </li>

                                    <li class="nav-item-more dropdown dis-none">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            
                                        </ul>
                                    </li>
                                </ul>

                                <!--  -->
                                <a href="{{url('/category?source=Entertainment')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                                

                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab1-1" role="tabpanel" style="background-color: #ffffff">
                                    <div class="row">
                                    {{--@php
                                    	$category_counter = 0;
										foreach($data as $article)
										{
											if($article->category == 1)
											{
												$category_counter++;
												if($category_counter <= 4)
												{
													if(strlen($article->title) >= 70)
													{
														$article_title = substr($article->title,0,70).' ...';
													}
													else
													{
														$article_title = $article->title;
													}

													if($category_counter ==1 )
													{

							
			                                        	echo "<div class='col-sm-6 p-r-25 p-r-15-sr991'>".
			                                            	 "<div class='m-b-30'>".
			                                                 "<a href='$article->article_url' target='_blank' class='wrap-pic-w hov1 trans-03'>".
			                                                    "<img src='$article->top_image' alt='IMG'>".
			                                                "</a>".

			                                                "<div class='p-t-20'>".
			                                                   "<h5 class='p-b-5'>".
			                                                        "<a href='$article->article_url' target='_blank' class='f1-m-3 cl2 hov-cl10 trans-03'>".
			                                                            "$article_title". 
			                                                        "</a>".
			                                                    "</h5>".

			                                                    "<span class='cl8'>".
			                                                        "<a href='$article->article_url' target='_blank' class='f1-s-4 cl8 hov-cl10 trans-03'>".
			                                                            "Music".
			                                                        "</a>".

			                                                        "<span class='f1-s-3 m-rl-3'>".
			                                                            "-".
			                                                        "</span>".

			                                                        "<span class='f1-s-3'>".
			                                                            "Feb 18".
			                                                        "</span>".
			                                                    "</span>".
			                                                "</div>".
			                                            "</div>".
			                                        "</div>";
			                                        }
			                                    }
			                               
			                                    if($category_counter == 2 )
			                                    {
			                                    	echo "<div class='col-sm-6 p-r-25 p-r-15-sr991'>".
			                                    		"<div class='flex-wr-sb-s m-b-30'>".
				                                            "<a href='$article->article_url' target='_blank' class='size-w-1 wrap-pic-w hov1 trans-03'>".
				                                                "<img src='$article->top_image' alt='IMG'>".
				                                            "</a>".

				                                            "<div class='size-w-2'>".
				                                                "<h5 class='p-b-5'>".
				                                                    "<a href='$article->article_url' target='_blank' class='f1-s-5 cl3 hov-cl10 trans-03'>".
				                                                        "$article_title".
				                                                    "</a>".
				                                                "</h5>".

				                                                "<span class='cl8'>".
				                                                    "<a href='$article->article_url' target='_blank' class='f1-s-6 cl8 hov-cl10 trans-03'>".
				                                                       "Music".
				                                                    "</a>".

				                                                    "<span class='f1-s-3 m-rl-3'>".
				                                                        "-". 
				                                                    "</span>".

				                                                    "<span class='f1-s-3'>".
				                                                        "Feb 17".
				                                                    "</span>".
				                                                "</span>".
				                                            "</div>".
				                                        "</div>";
			                                    }
			                                    if($category_counter == 3)
			                                    {
			                                    	echo "<div class='flex-wr-sb-s m-b-30'>".
				                                            "<a href='$article->article_url' target='_blank' class='size-w-1 wrap-pic-w hov1 trans-03'>".
				                                                "<img src='$article->top_image' alt='IMG'>".
				                                            "</a>".

				                                            "<div class='size-w-2'>".
				                                                "<h5 class='p-b-5'>".
				                                                    "<a href='$article->article_url' target='_blank' class='f1-s-5 cl3 hov-cl10 trans-03'>".
				                                                        "$article_title".
				                                                    "</a>".
				                                                "</h5>".

				                                                "<span class='cl8'>".
				                                                    "<a href='$article->article_url' target='_blank' class='f1-s-6 cl8 hov-cl10 trans-03'>".
				                                                       "Music".
				                                                    "</a>".

				                                                    "<span class='f1-s-3 m-rl-3'>".
				                                                        "-". 
				                                                    "</span>".

				                                                    "<span class='f1-s-3'>".
				                                                        "Feb 17".
				                                                    "</span>".
				                                                "</span>".
				                                            "</div>".
				                                        "</div>";
			                                    }
			                                    if($category_counter == 4)
			                                    {
			                                    	echo "<div class='flex-wr-sb-s m-b-30'>".
				                                            "<a href='$article->article_url' target='_blank' class='size-w-1 wrap-pic-w hov1 trans-03'>".
				                                                "<img src='$article->top_image' target='_blank' alt='IMG'>".
				                                            "</a>".

				                                            "<div class='size-w-2'>".
				                                                "<h5 class='p-b-5'>".
				                                                    "<a href='$article->article_url' target='_blank'  class='f1-s-5 cl3 hov-cl10 trans-03'>".
				                                                        "$article_title".
				                                                    "</a>".
				                                                "</h5>".

				                                                "<span class='cl8'>".
				                                                    "<a href='$article->article_url' target='_blank' class='f1-s-6 cl8 hov-cl10 trans-03'>".
				                                                       "Music".
				                                                    "</a>".

				                                                    "<span class='f1-s-3 m-rl-3'>".
				                                                        "-". 
				                                                    "</span>".

				                                                    "<span class='f1-s-3'>".
				                                                        "Feb 17".
				                                                    "</span>".
				                                                "</span>".
				                                            "</div>".
				                                        "</div></div>";
			                                    }
			                                   
			                                }
		                                }

		                                        
                                    @endphp--}}

                                    @foreach($entertainment as $article)
		                            
                                    			@if($loop->iteration == 1)
			                                    	<div class="col-sm-6 p-r-25 p-r-15-sr991">
						                                <div class="m-b-30">
						                                    <a href="{{$article->article_url}}" target="_blank" class="wrap-pic-w hov1 trans-03">
						                                        <img src="{{$article->top_image}}" alt="IMG">
						                                    </a>

						                                    <div class="p-t-20">
							                                    <h5 class="p-b-5">
								                                    <a href="{{$article->article_url}}" target="_blank" class="f1-m-3 cl2 hov-cl10 trans-03">
								                                    @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
								                                    </a>
							                                    </h5>

							                                    <span class="cl8">
							                                        <a href="{{$article->article_url}}" target="_blank" class="f1-s-4 cl8 hov-cl10 trans-03">
						                                        	@if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
							                                        </a>

							                                        <span class="f1-s-3 m-rl-3">
							                                            
							                                        </span>

							                                        <span class="f1-s-3">
							                                        
							                                        </span>
							                                    </span>
						                                    </div>
						                                </div>
						                            </div>
						                        @elseif($loop->iteration == 2)
							                       	<div class="col-sm-6 p-r-25 p-r-15-sr991">
			                                    		<div class="flex-wr-sb-s m-b-30">
				                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                                <img src="{{$article->top_image}}" alt="IMG">
				                                            </a>

				                                            <div class="size-w-2">
				                                                <h5 class="p-b-5">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                    </a>
				                                                </h5>

				                                                <span class="cl8">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                       @if( $article->authors != "NULL")
								                                        	{{$article->authors}}
								                                       @endif
				                                                    </a>

				                                                    <span class="f1-s-3 m-rl-3">
				                                                         
				                                                    </span>

				                                                    <span class="f1-s-3">
				                                                        
				                                                    </span>
				                                                </span>
				                                            </div>
				                                        </div>
					                      
					                            @elseif($loop->iteration == 3)
							                        <div class="flex-wr-sb-s m-b-30">
			                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
			                                                <img src="{{$article->top_image}}" alt="IMG">
			                                            </a>

			                                            <div class="size-w-2">
			                                                <h5 class="p-b-5">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
			                                                        @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
			                                                    </a>
			                                                </h5>

			                                                <span class="cl8">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
			                                                       @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                       @endif
			                                                    </a>

			                                                    <span class="f1-s-3 m-rl-3">
			                                                        
			                                                    </span>

			                                                    <span class="f1-s-3">
			                                                        
			                                                    </span>
			                                                </span>
			                                            </div>
			                                        </div>
			                                    @elseif($loop->iteration == 4)
			                                    	<div class="flex-wr-sb-s m-b-30">
				                                        <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                            <img src='{{$article->top_image}}' target="_blank" alt='IMG'>".
				                                        </a>

				                                        <div class="size-w-2">
				                                            <h5 class="p-b-5">
				                                               	<a href="{{$article->article_url}}" target="_blank"  class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                </a>
				                                            </h5>

				                                            <span class="cl8">
				                                                <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                    @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
				                                                </a>

				                                                <span class="f1-s-3 m-rl-3">
				                                                    
				                                                </span>

				                                                <span class="f1-s-3">
				                                                    
				                                                </span>
				                                            </span>
				                                        </div>
				                                    </div>
				                                    </div>

					                            @endif
					                          
                                    @endforeach
                                    
	                                </div>
                                </div>

                                <!-- - -->
                                
                            </div>
                        </div>

                        <!-- Business -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl13 tab01-title">
                                    Business
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab2-1" role="tab">All</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab2-2" role="tab">Finance</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab2-3" role="tab">Money & Markets</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">Small Business</a>
                                    </li>

                                    <li class="nav-item-more dropdown dis-none">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            
                                        </ul>
                                    </li>
                                </ul>

                                <!--  -->
                                <a href="{{url('/category?source=Business')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                                

                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab2-1" role="tabpanel" style="background-color: #ffffff">
                                    <div class="row">
                                        @foreach($business as $article)
		                            
                                    			@if($loop->iteration == 1)
			                                    	<div class="col-sm-6 p-r-25 p-r-15-sr991">
						                                <div class="m-b-30">
						                                    <a href="{{$article->article_url}}" target="_blank" class="wrap-pic-w hov1 trans-03">
						                                        <img src="{{$article->top_image}}" alt="IMG">
						                                    </a>

						                                    <div class="p-t-20">
							                                    <h5 class="p-b-5">
								                                    <a href="{{$article->article_url}}" target="_blank" class="f1-m-3 cl2 hov-cl10 trans-03">
								                                    @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
								                                    </a>
							                                    </h5>

							                                    <span class="cl8">
							                                        <a href="{{$article->article_url}}" target="_blank" class="f1-s-4 cl8 hov-cl10 trans-03">
							                                        @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
							                                        </a>

							                                        <span class="f1-s-3 m-rl-3">
							                                           
							                                        </span>

							                                        <span class="f1-s-3">
							                                       
							                                        </span>
							                                    </span>
						                                    </div>
						                                </div>
						                            </div>
						                        @elseif($loop->iteration == 2)
							                       	<div class="col-sm-6 p-r-25 p-r-15-sr991">
			                                    		<div class="flex-wr-sb-s m-b-30">
				                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                                <img src="{{$article->top_image}}" alt="IMG">
				                                            </a>

				                                            <div class="size-w-2">
				                                                <h5 class="p-b-5">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                    </a>
				                                                </h5>

				                                                <span class="cl8">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                       @if( $article->authors != "NULL")
								                                        	{{$article->authors}}
								                                       @endif
				                                                    </a>

				                                                    <span class="f1-s-3 m-rl-3">
				                                                       
				                                                    </span>

				                                                    <span class="f1-s-3">
				                                                       
				                                                    </span>
				                                                </span>
				                                            </div>
				                                        </div>
					                      
					                            @elseif($loop->iteration == 3)
							                        <div class="flex-wr-sb-s m-b-30">
			                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
			                                                <img src="{{$article->top_image}}" alt="IMG">
			                                            </a>

			                                            <div class="size-w-2">
			                                                <h5 class="p-b-5">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
			                                                        @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
			                                                    </a>
			                                                </h5>

			                                                <span class="cl8">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
			                                                       @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                       @endif
			                                                    </a>

			                                                    <span class="f1-s-3 m-rl-3">
			                                                       
			                                                    </span>

			                                                    <span class="f1-s-3">
			                                                        
			                                                    </span>
			                                                </span>
			                                            </div>
			                                        </div>
			                                    @elseif($loop->iteration == 4)
			                                    	<div class="flex-wr-sb-s m-b-30">
				                                        <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                            <img src='{{$article->top_image}}' target="_blank" alt='IMG'>".
				                                        </a>

				                                        <div class="size-w-2">
				                                            <h5 class="p-b-5">
				                                               	<a href="{{$article->article_url}}" target="_blank"  class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                </a>
				                                            </h5>

				                                            <span class="cl8">
				                                                <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                    @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
				                                                </a>

				                                                <span class="f1-s-3 m-rl-3">
				                                                    
				                                                </span>

				                                                <span class="f1-s-3">
				                                                    
				                                                </span>
				                                            </span>
				                                        </div>
				                                    </div>
				                                    </div>

					                            @endif
					                          
                                    @endforeach
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab2-2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-13.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            Bitcoin lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Finance
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-12.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Small Business
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-11.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Economy
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-10.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Money & Markets
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab2-3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-11.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            Bitcoin lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Finance
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-12.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Small Business
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-13.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Economy
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-10.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Money & Markets
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab2-4" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-12.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            Bitcoin lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Finance
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-13.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Small Business
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-10.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Economy
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-11.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Money & Markets
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Travel -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl14 tab01-title">
                                    Travel
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab3-1" role="tab">All</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" role="tab">Hotels</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" role="tab">Flight</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" role="tab">Beachs</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" role="tab">Culture</a>
                                    </li>

                                    <li class="nav-item-more dropdown dis-none">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            
                                        </ul>
                                    </li>
                                </ul>

                                <!--  -->
                                <a href="{{url('/category?source=Travel')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>
                                

                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab3-1" role="tabpanel" style="background-color: #ffffff">
                                    <div class="row">
                                        @foreach($travel as $article)
		                            
                                    			@if($loop->iteration == 1)
			                                    	<div class="col-sm-6 p-r-25 p-r-15-sr991">
						                                <div class="m-b-30">
						                                    <a href="{{$article->article_url}}" target="_blank" class="wrap-pic-w hov1 trans-03">
						                                        <img src="{{$article->top_image}}" alt="IMG">
						                                    </a>

						                                    <div class="p-t-20">
							                                    <h5 class="p-b-5">
								                                    <a href="{{$article->article_url}}" target="_blank" class="f1-m-3 cl2 hov-cl10 trans-03">
								                                    @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
								                                    </a>
							                                    </h5>

							                                    <span class="cl8">
							                                        <a href="{{$article->article_url}}" target="_blank" class="f1-s-4 cl8 hov-cl10 trans-03">
							                                        @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
							                                        </a>

							                                        <span class="f1-s-3 m-rl-3">
							                                            
							                                        </span>

							                                        <span class="f1-s-3">
							                                        
							                                        </span>
							                                    </span>
						                                    </div>
						                                </div>
						                            </div>
						                        @elseif($loop->iteration == 2)
							                       	<div class="col-sm-6 p-r-25 p-r-15-sr991">
			                                    		<div class="flex-wr-sb-s m-b-30">
				                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                                <img src="{{$article->top_image}}" alt="IMG">
				                                            </a>

				                                            <div class="size-w-2">
				                                                <h5 class="p-b-5">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                    </a>
				                                                </h5>

				                                                <span class="cl8">
				                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                       @if( $article->authors != "NULL")
								                                        	{{$article->authors}}
								                                       @endif
				                                                    </a>

				                                                    <span class="f1-s-3 m-rl-3">
				                                                        
				                                                    </span>

				                                                    <span class="f1-s-3">
				                                                        
				                                                    </span>
				                                                </span>
				                                            </div>
				                                        </div>
					                      
					                            @elseif($loop->iteration == 3)
							                        <div class="flex-wr-sb-s m-b-30">
			                                            <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
			                                                <img src="{{$article->top_image}}" alt="IMG">
			                                            </a>

			                                            <div class="size-w-2">
			                                                <h5 class="p-b-5">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-5 cl3 hov-cl10 trans-03">
			                                                        @if(strlen($article->title) >= 70)
								                                    	{{substr($article->title,0,70).' ...'}}
								                                    @else
								                                    	{{$article->title}}
								                                    @endif
			                                                    </a>
			                                                </h5>

			                                                <span class="cl8">
			                                                    <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
			                                                       @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                       @endif
			                                                    </a>

			                                                    <span class="f1-s-3 m-rl-3">
			                                                         
			                                                    </span>

			                                                    <span class="f1-s-3">
			                                                        
			                                                    </span>
			                                                </span>
			                                            </div>
			                                        </div>
			                                    @elseif($loop->iteration == 4)
			                                    	<div class="flex-wr-sb-s m-b-30">
				                                        <a href="{{$article->article_url}}" target="_blank" class="size-w-1 wrap-pic-w hov1 trans-03">
				                                            <img src='{{$article->top_image}}' target='_blank' alt='IMG'>".
				                                        </a>

				                                        <div class="size-w-2">
				                                            <h5 class="p-b-5">
				                                               	<a href="{{$article->article_url}}" target="_blank"  class="f1-s-5 cl3 hov-cl10 trans-03">
				                                                        @if(strlen($article->title) >= 70)
									                                    	{{substr($article->title,0,70).' ...'}}
									                                    @else
									                                    	{{$article->title}}
									                                    @endif
				                                                </a>
				                                            </h5>

				                                            <span class="cl8">
				                                                <a href="{{$article->article_url}}" target="_blank" class="f1-s-6 cl8 hov-cl10 trans-03">
				                                                    @if( $article->authors != "NULL")
							                                        	{{$article->authors}}
							                                        @endif
				                                                </a>

				                                                <span class="f1-s-3 m-rl-3">
				                                                    
				                                                </span>

				                                                <span class="f1-s-3">
				                                                    
				                                                </span>
				                                            </span>
				                                        </div>
				                                    </div>
				                                    </div>

					                            @endif
					                          
                                    @endforeach
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab3-2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-15.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            You wish lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Hotels
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-16.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Beachs
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-17.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Flight
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-18.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Culture
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab3-3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-16.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            You wish lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Hotels
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-17.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Beachs
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-18.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Flight
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-14.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Culture
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab3-4" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-17.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            You wish lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Hotels
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-18.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Beachs
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-14.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Flight
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-15.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Culture
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- - -->
                                <div class="tab-pane fade" id="tab3-5" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="m-b-30">
                                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-18.jpg" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            You wish lorem ipsum dolor sit amet consectetur 
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            Hotels
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 18
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->  
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-17.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Beachs
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 17
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-16.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Flight
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 16
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Item post -->
                                            <div class="flex-wr-sb-s m-b-30">
                                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                    <img src="images/post-15.jpg" alt="IMG">
                                                </a>

                                                <div class="size-w-2">
                                                    <h5 class="p-b-5">
                                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                            Donec metus orci, malesuada et lectus vitae
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                            Culture
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            Feb 12
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									News outlets
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="{{url('/SourceArticles?source=eNCA')}}" class="size-a-8 flex-c-c borad-3 size-a-8 fs-16 cl0 hov-cl0">
										  
										<img src="img/sources/eNCA_logo.svg" style="height: 25px;width: 25px;">
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<a href="{{url('/SourceArticles?source=eNCA')}}">
											<span class="f1-s-8 cl3 p-r-20 cl2 hov-cl10 trans-03">
												eNCA
											</span>
										</a>		
										
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="{{url('/SourceArticles?source=TheSouthAfrican')}}" class="size-a-8 flex-c-c borad-3 size-a-8  fs-16 cl0 hov-cl0" style="background-color: black;">
										
										<img src="img/sources/south_african_news_online.png" style="height: 25px;width: 25px;">
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<a href="{{url('/SourceArticles?source=TheSouthAfrican')}}">
											<span class="f1-s-8 cl3 p-r-20 cl2 hov-cl10 trans-03">
												TheSouthSfrican
											</span>
										</a>

										
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="{{url('/SourceArticles?source=Zalebs')}}" class="size-a-8 flex-c-c borad-3 size-a-8 fs-16 cl0 hov-cl0" style="background-color: purple;">
										<img src="img/sources/Zalebs_logo-white.svg" style="height: 25px;width: 25px;">
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<a href="{{url('/SourceArticles?source=Zalebs')}}">
											<span class="f1-s-8 cl3 p-r-20 cl2 hov-cl10 trans-03">
												ZAlebs
											</span>
										</a>
										
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="{{url('/SourceArticles?source=sowetan')}}" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<img src="img/sources/sowetanlive.logo.png" style="height: 25px;width: 25px;">
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<a href="{{url('/SourceArticles?source=sowetan')}}">
											<span class="f1-s-8 cl3 p-r-20 cl2 hov-cl10 trans-03">
												Sowetan
											</span>
										</a>	
										
									</div>
								</li>

							</ul>
						
					</div>
				</div>
                
            </div>
        </div>
  	</section>


  	    <!-- Latest -->
    <section class="bg0 p-t-60 p-b-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Latest Articles
                        </h3>
                    </div>

                    <div class="row p-t-35">

                    	@php
                            	$slide_counter = 0;
								foreach($data as $article)
								{
									$slide_counter++;
									if($slide_counter <= 6)
									{
										echo "<div class='col-sm-6 p-r-25 p-r-15-sr991'>".
											 "<div class='m-b-45'>".
											 "<a href='$article->article_url' target='_blank' class='wrap-pic-w hov1 trans-03'>".
											 "<img src='$article->top_image' alt='IMG'>".
											 "</a>".
											 "<div class='p-t-16'>".
		                                     "<h5 class='p-b-5'>".
		                                     "<a href='$article->article_url' target='_blank' class='f1-m-3 cl2 hov-cl10 trans-03'>".
		                                     "$article->title".
		                                     "</a>".
		                                     "</h5>".

		                                     "<span class='cl8'>".
		                                     "<a href='$article->article_url' target='_blank' class='f1-s-4 cl8 hov-cl10 trans-03'>";
		                                     if($article->authors != "NULL")
		                                 	 {
		                                 		echo "$article->authors";
		                                 	 }
		                                     echo "</a>".

		                                     "<span class='f1-s-3 m-rl-3'>".
		                                          
		                                     "</span>".

		                                     "<span class='f1-s-3'>".
		                                    
		                                     "</span>".
		                                     "</span>".
		                                	 "</div>".
		                            		 "</div>".
		                        			 "</div>";
									}
									else
									{
										break;
									}
								}

                            @endphp
                        
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                	<div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Stay Connected
                                </h3>
                            </div>

                            <div>
                            
	                            <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55" style="background-color:#e3724a; ">
		                            <h5 class="f1-m-5 cl0 p-b-10">
		                                Subscribe
		                            </h5>

		                            <p class="f1-s-1 cl0 p-b-25">
		                               Get the latest content delivered to your email.
		                            </p>

	                            	<form class="size-a-9 pos-relative" method="POST" action="sign_up">
	                            		@csrf
		                                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email_sign_up" placeholder="Email">

		                                <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
		                                    <i class="fa fa-arrow-right"></i>
		                                </button>
		                            </form>

	                        	</div>

                            </div>
                        </div>
                    </div>


                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Featured
                                </h3>
                            </div>

                            <div>
                                
                        </div>
                            
                        <!-- Subscribe -->
                        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                            <h5 class="f1-m-5 cl0 p-b-10">
                                Latest News
                            </h5>

                            <p class="f1-s-1 cl0 p-b-25">
                                Get all the latest news from your favourite news outlets delivered to you all in one place.
                            </p>

                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    	window.setTimeout(function(){
		  $('.alert').fadeTo(500, 0).slideUp(500, function(){
		    $(this).remove();
		  })
		},3000);
    </script>
@endsection