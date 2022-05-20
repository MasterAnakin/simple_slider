if( have_rows('slide_images', 999) ): ?>
<script>
$(function() {
  
  var slideCount =  jQuery(".slider-home ul li").length;
  var slideWidth =  jQuery(".slider-home ul li").width();
  var slideHeight =  jQuery(".slider-home ul li").height();
  var slideUlWidth =  slideCount * slideWidth;
  
  jQuery(".slider-home").css({"max-width":slideWidth, "height": slideHeight});
  jQuery(".slider-home ul").css({"width":slideUlWidth, "margin-left": - slideWidth });
  jQuery(".slider-home ul li").css({"width":slideWidth, "margin-left": slideWidth });	
  jQuery(".slider ul li:last-child").prependTo(jQuery(".slider ul"));
  
  function moveLeft() {
    jQuery(".slider-home ul").stop().animate({
    },200, function() {
      jQuery(".slider-home ul li:last-child").prependTo(jQuery(".slider-home ul"));
      jQuery(".slider-home ul").css("left","");
    });
  }
  
	
  function moveRight() {
    jQuery(".slider-home ul").stop().animate({
    },200, function() {
      jQuery(".slider-home ul li:first-child").appendTo(jQuery(".slider-home ul"));
      jQuery(".slider-home ul").css("left","");
    });
  }

    setInterval(function () {
        moveRight();
    }, 5000);	
  

  jQuery(".next").on("click",function(){
    moveRight();
  });
  
  jQuery(".prev").on("click",function(){
    moveLeft();
  });
  
});

</script>
<style>
	@media screen and (max-width: 768px){
	.slider-text-holder {
		padding-right: 0 !important;
		}
	}
.home-single-slide {
	height: 900px; background-position: top; display: table; width: 100%; 	
	}	
@media screen and (max-width: 768px){	
	.home-single-slide{
	height: 300px !important;
		}
	}
.home section#who-we-are {
	margin-top: 0;
}	
a.car-home-button:hover {
    background-color: unset !important;
    border: 2px solid #F07021;
}
	
.slider-home{
  position:relative;
  width:100%;
  overflow:hidden;
  margin: 0 auto;

}

.slider-home ul{
  position:relative;
  width:100%;
  margin:0;
  padding:0;
  display:inline-block;
  list-style:none;	
}
	
@media screen and (min-width: 1280px){
.slider-home ul{
  min-height:900px;	
	}
}
	


.slider-home ul li{
  position:relative;
  background:#fff;
  text-align:center;
  color:#333;
	min-height: 350px;	
}


.control{
  position: absolute;
  top: 40%;
  z-index: 999;
  display: block;
  padding: 2% 1%;
  width: auto;
  height: auto;
  background: #2a2a2a;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  font-size: 18px;
  opacity: 0.8;
  cursor: pointer;
}

.prev{
  left:0px;
}

.next{
  right:0px;
}

.slider-text-holder	{
	color: white; 
	height: auto; 
	display: table-cell; 
	vertical-align: middle; 
	padding-right: 50%;		
}


</style>
<div class="slider-home">

  <div class="next control"><i class="fas fa-arrow-right"></i></div>
  <div href="" class="prev control"><i class="fas fa-arrow-left"></i></div>

  
 <ul>
	 <?php
    // Loop through rows.
    while( have_rows('slide_images', 999) ) : the_row();

        // Load sub field value.
        $img_url = get_sub_field('home_slider_image', 999);
	 	$slide_text = get_sub_field('home_slider_text', 999);
	 ?>

	 <li class="home-single-slide" style="background: url('<?php echo $img_url;?>') no-repeat center; background-size: cover;"><div class="slider-text-holder">	<?php echo $slide_text; ?>
		 </div></li>
<?php
    // End loop.
    endwhile;?>
  </ul>

</div>
<?php
endif;
?>	 

