<?php echo $javascript->link('s3Slider'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 2000
        });
    });
</script>
<style type="text/css" media="screen">
  #yourdiv {
  
  box-shadow: 5px 5px 5px #666;
  -moz-box-shadow: 5px 5px 5px #666;
  -webkit-box-shadow: 5px 5px 5px #666;
   margin-right: 5px;
   padding: 20px;
}
#slider {
    width: 754px; /* important to be same as image width */
    height: 320px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; /* important */
	margin:11px auto auto;
         box-shadow: 5px 5px 5px #666;
  -moz-box-shadow: 5px 5px 5px #666;
  -webkit-box-shadow: 5px 5px 5px #666;
        
}

#sliderContent {
    width: 754px; /* important to be same as image width or wider */
    position: absolute;
	top: 0;
	margin-left: 0;
}
#sliderContent img{
	width: 754px; /* important to be same as image width */
    height: 320px; /* important to be same as image height */
	}
.sliderImage {
    float: left;
    position: relative;
	display: none;
	width: 970px; 
    height: 320px;
}
.sliderImage span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 754px;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}
.clear {
	clear: both;
}
.sliderImage span strong {
    font-size: 14px;
}
.top {
	top: 0;
	left: 0;
}
.bottom {
	bottom: 0;
    left: 0;
}
ul { list-style-type: none;}
.slider-wrapper img {height: 320px !important; width: 754px !important; }

</style>
<div>
<div class="slideshow">
   <div id="slider">
        <ul id="sliderContent">
          <?php $slideshow = $this->requestAction('/plugin/slideshow');?>
				   <?php foreach($slideshow as $slideshows){?>
                <li class="sliderImage">
                    <a href=""><img src="<?php echo $slideshows['Slideshow']['images']?>/></a>
                    <span class="top"><a style="color:#fff;" href=""></a></span>
                </li>
            <?php }?>
            <div class="clear sliderImage"></div>
        </ul>
    </div>
 </div>
</div>
 