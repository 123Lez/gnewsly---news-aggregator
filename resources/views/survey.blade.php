@extends('layouts.app')
@section('content')


<div id="less_than_one" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="moda-title"><i class="fa fa-exclamation-triangle" style="color:red;"></i>&nbsp;Error</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <p>Please select between 1 and 7 answers</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
    
</div>


	<div class="survey-body">
		<div class="container">
			<div class="card col-md-10">
				<div class="card-body">
					<div class="question-title">
			            <h4>
			            	<b><span class="question-number">1.</span> 
			            	What type of videos do you mostly watch?
			            	</b>
			            </h4>
	            	</div>

	            	<form method="GET" action="{{url('send_survey')}}">
	            		<input type="hidden" name="user_survey_id" value="{{$userID}}">

	            		<ul class="option-list checkbox-group required" >
	            			<li class="list-item checkbox">
	            				<label>
						            <input  name="watched_video[]" value="Funny" style="display: inline-flex;" type="checkbox">
						            Funny	
					        	</label>
	            			</li>
	            			<li class="list-item checkbox">
	            				<label>
						            <input name="watched_video[]" value="Dancing" style="display: inline-flex;" type="checkbox">
						            Dancing	
					        	</label>
	            			</li>

	            			<li class="list-item checkbox">
	            				<label>
						            <input name="watched_video[]" value="Music videos" style="display: inline-flex;" type="checkbox">
						            Music Videos 	
					        	</label>
	            			</li>

	            			<li class="list-item checkbox">
	            				<label>
						            <input name="watched_video[]" value="Singing" style="display: inline-flex;" type="checkbox">
						            Singing	
					        	</label>
	            			</li>

	            			<li class="list-item checkbox">
	            				<label>
						            <input name="watched_video[]" value="Movie Trailers" style="display: inline-flex;" type="checkbox">
						            Movie Trailers	
					        	</label>
	            			</li>

	            			<li class="list-item checkbox">
	            				<label>
						            <input name="watched_video[]" value="Animation" style="display: inline-flex;" type="checkbox">
						            Animation	
					        	</label>
	            			</li>
	            		</ul>
	            	
		            	<hr>
		            	<div class="question-title">
				            <h4>
				            	<b><span class="question-number">2.</span> 
				            	Which of these do you use the most?
				            	</b>
				            </h4>
		            	</div>
		            		

	            		<input type="radio" style="display: inline-flex;" value="Twitter" required name="used_platform">&nbsp;Twitter
	            		<br>
						<input type="radio" style="display: inline-flex;" value="Facebook" name="used_platform">&nbsp;Facebook
						<br>
						<input type="radio" style="display: inline-flex;" value="Instagram" name="used_platform" >&nbsp;Instagram
						<br>
						<input type="radio" style="display: inline-flex;" value="Snapchat" name="used_platform">&nbsp;Snapchat
	            		<br>
						<input type="radio" style="display: inline-flex;" value="Pinterest" name="used_platform">&nbsp;Pinterest
						<br>
						<input type="radio" style="display: inline-flex;" value="WhatsApp" name="used_platform" >&nbsp;WhatsApp
						
						<hr>
		            	<div class="question-title">
				            <h4>
				            	<b><span class="question-number">3.</span> 
				            	How much data do you use on an average?
				            	</b>
				            </h4>
		            	</div>

		            	<input type="radio" style="display: inline-flex;" value="0 - 1.5GB" required name="used_data" >&nbsp;0 - 1.5GB
	            		<br>
						<input type="radio" style="display: inline-flex;" value="1.5GB - 3GB" name="used_data" >&nbsp;1.5GB - 3GB
						<br>
						<input type="radio" style="display: inline-flex;" value="3GB - 5GB" name="used_data">&nbsp;3GB - 5GB
						<br>
						<input type="radio" style="display: inline-flex;" value="5GB - 10GB" name="used_data">&nbsp;5GB - 10GB
	            		<br>
						<input type="radio" id="data_other" onchange="other_click()" value="other" style="display: inline-flex;" name="used_data">&nbsp;other

						<div id="average_data_other" class="probe-div other-textbox" style="display: none;">
                        :Please specify
                            <textarea class="probe form-control" name="data_other_comment"></textarea>
                        </div>


						<hr>
		            	<div class="question-title">
				            <h4>
				            	<b><span class="question-number">4.</span> 
				            	Do you like memes?
				            	</b>
				            </h4>
		            	</div>
						
						<input type="radio" style="display: inline-flex;" value="Yes, I do" required name="memes" >&nbsp;Yes, I do
	            		<br>
						<input type="radio" style="display: inline-flex;" value="No, I don't" name="memes" >&nbsp;No, I don't

						<hr>
					<div class="question-title">
			            <h4>
			            	<b><span class="question-number">5.</span> 
			            	What type of content grabs your attention?
			            	</b>
			            </h4>
	            	</div>


	            	<ul class="option-list checkbox-group content_attention">
	        			<li>
	        				<label>
					            <input class="input-radio" value="Fashion" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Fashion	
				        	</label>
	        			</li>
	        			<li>
	        				<label>
					            <input class="input-radio" value="Music" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Music	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Gaming" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Gaming 	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Technology" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Technology	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Beauty" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Beauty	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Cars" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Cars	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Houses" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Houses	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Celebs News" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Celebs News	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Education" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Education	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Schools" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Schools	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Sports" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Sports	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Health" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Health	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Gym" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Gym	
				        	</label>
	        			</li>

	        			<li>
	        				<label>
					            <input class="input-radio" value="Current Affairs" name="attent_grab[]" style="display: inline-flex;" type="checkbox">
					            Current Affairs	
				        	</label>
	        			</li>
	        		</ul>
	        		<hr>

	        		<div class="question-title">
			            <h4>
			            	<b><span class="question-number">6.</span> 
			            	Do you read blogs on the internet?
			            	</b>
			            </h4>
	            	</div>

	            	<input type="radio" style="display: inline-flex;" value="Yes, I do" required name="blogs" >&nbsp;Yes, I do
	        		<br>
					<input type="radio" id="blogs_No" onchange="other_click()" value="No, I don't" style="display: inline-flex;" name="blogs" >&nbsp;No, I don't

					<div id="specify_blogs_No" class="probe-div other-textbox"  style="display: none;" >
                    :Please specify
                        <textarea class="probe form-control" name="blogs_comment"></textarea>
                    </div>

					<hr>
	        		<div class="question-title">
			            <h4>
			            	<b><span class="question-number">7.</span> 
			            	Do you watch the news?
			            	</b>
			            </h4>
	            	</div>

	            	<input type="radio" style="display: inline-flex;" value="Yes, I do" required name="news" >&nbsp;Yes, I do
	        		<br>
					<input type="radio" id="news_no" onchange="other_click()" value="No, I don't" style="display: inline-flex;" name="news" >&nbsp;No, I don't
					<!--	If no please specify	-->


					<div id="specify_news_no" class="probe-div other-textbox" style="display: none;">
                    :Please specify
                        <textarea class="probe form-control" name="news_comment"></textarea>
                    </div>

					<hr>
	        		<div class="question-title">
			            <h4>
			            	<b><span class="question-number">8.</span> 
			            	Would you visit a website that keeps up with your interests/likes/taste/style?
			            	</b>
			            </h4>
	            	</div>

	            	<input type="radio" style="display: inline-flex;" value="Yes" required name="keep_up_interest" >&nbsp;Yes
	        		<br>
					<input type="radio" style="display: inline-flex;" value="No" name="keep_up_interest" >&nbsp;No


		            	<button type="submit" id="submitSurvey" class="btn btn-success float-right"><i class="fa fa-arrow-right"></i></button>	
	            </form>
				</div>

				


			</div>

			<!-- <div class="card-footer-progress-bar col-md-10">
				<div class="progress">
				  <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
				</div>
			</div> -->

		</div>
		
	</div>
	
	
	<div class="footer-space">
		
	</div>
@endsection