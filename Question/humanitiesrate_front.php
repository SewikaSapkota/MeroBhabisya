
<?php
//index.php
include_once("../includes/header.php");
include_once("../includes/navigation.php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Management Questions</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"  href="../css/style.css">
  <style type="text/css">
    .sidenav {
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 420px;
  right: 10px;
  background: white;
  border: 2px solid black;
  overflow-x: hidden;
  padding: 8px 0;
}

.sidenav a {
  padding: 20px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
}

.sidenav a:hover {
  color: #064579;
}

.main {
  margin-left: 10px; /* Same width as the sidebar + left position in px */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;

}

.rating
{
  height: 20px;
}


  </style>
 </head>
 <body>
  
        



        <br>
        <br>

<div class="sidenav">
  <ul type="square">
    <li style="font-size: 20px;"><i class="fa fa-star-o"></i>- highly disagree</li>
  <li style="font-size: 20px;"><i class="fa fa-star-o"></i><i class="fa fa-star-o"> </i>-disagree</li>
  <li style="font-size: 20px;"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>- average</li>
  <li style="font-size: 20px;"><i class="fa fa-star-o"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i>- agree</li>
  <li style="font-size: 20px;"><i class="fa fa-star-o"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i>- highly agree</li>
  
</div>
  <div class="main"  style="float: left;">
    
<p style="color:black; font-size: 20px; text-align: left; text-align: justify;
    border-width:1px;  
    border-style:dashed;
    border-color: gray; margin-right: 150px; font-style: italic;"> This is your few steps towards finding a matching course that compliments your interest. Through the series of questions, we dig information about your likes and interest. If you focus and spend time while giving accurate /true information we will be able to provide you with the course that best fits you choosing career. </p>

  <br> 
  <h4 style="border-bottom-style: ridge;
    font-weight: bold;
    border-bottom-color: #82c434;">PLEASE RATE OUT THE FORM SERIOUSLY!!</h4>
  
 
   
   <br />
   <span id="business_list"></span>
   <br />
   <br />
  
 </body>
</html>

<script>
$(document).ready(function(){
 
 load_business_data();
 
 function load_business_data()
 {
  $.ajax({
   url:"fetching_h.php",
   method:"POST",
   success:function(data)
   {
    $('#business_list').html(data);
   }
  });
 }
 
 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data("index");
  var question_id = $(this).data('question_id');
  remove_background(question_id);
  for(var count = 1; count <=index; count++)
  {
   $('#'+question_id+'-'+count).css('color', 'yellow');

  }
 });
 
 function remove_background(question_id)
 {
  for(var count = 1; count <= 5; count++)
  {
   $('#'+question_id+'-'+count).css('color', '#ccc');
  }
 }

 
 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data("index");
  var question_id = $(this).data('question_id');
  var rating = $(this).data("rating");
  remove_background(question_id);
  //alert(rating);
  for(var count = 1; count<=rating; count++)
  {
   $('#'+question_id+'-'+count).css('color', 'yellow');
  }
 });
 
 $(document).on('click', '.rating', function(){
  var index = $(this).data("index");
  var question_id = $(this).data('question_id');
  $.ajax({
   url:"insertrate.php",
   method:"POST",
   data:{index:index, question_id:question_id},
   success:function(data)
   {
    if(data == 'done')
    {
     load_business_data();
     alert("You have rate "+index +" out of 5");
    }
    else
    {
     alert("There is some problem in System");
    }
   }
  });
  
 });

});
</script>