// var slideIndex = 1;
// showSlides(slideIndex);
// automatic_slide();

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) 
//   {
//   	slideIndex = 1
//   } 
//   if (n < 1)
//   {
//   	slideIndex = slides.length
//   }
//   
//   for (i = 0; i < slides.length; i++) 
//   {
//       slides[i].style.display = "none"; 
//   }
//   for (i = 0; i < dots.length; i++) 
//   {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }

//   slides[slideIndex-1].style.display = "block"; 
//   dots[slideIndex-1].className += " active";
// }

// /* Automatic SlideShow*/ 
// function automatic_slide() 
// {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) 
//   {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) 
//   {
//   		slideIndex = 1
//   }
//   slides[slideIndex-1].style.display = "block";
//   setTimeout(automatic_slide, 8000); // Change image every 2 seconds
// }


//Sign up close alert
// $('.alert').delay(4000).slideUp(200, function(){
//   $(this).alert('close');
// });

// window.setTimeout(function(){
//   $('.alert').fadeTo(500, 0).slideUp(500, function(){
//     $(this).remove();
//   })
// },2000);

/*** Survey Effects ****/

$('#submitSurvey').click(function(){
  if($('ul.checkbox-group.required :checkbox:checked').length < 1)
  {
    $('#less_than_one').modal('show');
    return false;
  }
  if($('ul.checkbox-group.content_attention :checkbox:checked').length < 1)
  {
    $('#less_than_one').modal('show');
    return false;
  }
  else
  {
    return true;
  }
});

function other_click()
{
  if($('#data_other').is(':checked'))
  {
    $('#average_data_other').css('display','block');
  }

  if($('#blogs_No').is(':checked'))
  {
    $('#specify_blogs_No').css('display','block');
  }

  if($('#news_no').is(':checked'))
  {
    $('#specify_news_no').css('display','block');
  }

}

if(document.referrer.indexOf("http://localhost/social_news/public/survey") == -1)
{
    $(document).ready( function(){

          $('#take_survey').modal('show');
    });
}
