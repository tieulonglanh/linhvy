<?php echo $javascript->link('floater_xlib'); ?>
<SCRIPT type=text/javascript>



var slideTime = 700;

var floatAtBottom = false;



function pepsi_floating_init()

{

	xMoveTo('floating_banner_right', 900 - (1024-screen.width), 0);



	winOnResize(); // set initial position

	xAddEventListener(window, 'resize', winOnResize, false);

	xAddEventListener(window, 'scroll', winOnScroll, false);

}

function winOnResize() {

	checkScreenWidth();

	winOnScroll(); // initial slide

}

function winOnScroll() {

  var y = xScrollTop();

  if (floatAtBottom) {

    y += xClientHeight() - xHeight('floating_banner_left');

  }

  

  xSlideTo('floating_banner_left', (screen.width - (1115-765) - 760)/2-115 , y, slideTime);  // Chỉnh khoảng cách bên trái

  xSlideTo('floating_banner_right', (screen.width - (350-740) +585)/2, y, slideTime); // // Chỉnh khoảng cách bên Phải

}

	

function checkScreenWidth()

{

	if( document.body.clientWidth < 926 )

	{	

		document.getElementById('floating_banner_left').style.display = 'none';

		document.getElementById('floating_banner_right').style.display = 'none';

	}

	else

	{

		document.getElementById('floating_banner_left').style.display = '';

		document.getElementById('floating_banner_right').style.display = '';	

	}

}



</SCRIPT>

<div id="floating_banner_left" style="text-align:right; position:absolute; overflow:hidden; margin-top:130px !important; left: 0px; width: 168px !important; border: 0px solid #000;">
      
       <?php $advleft = $this->requestAction('/plugin/advleft');?>

       <?php if($advleft){?>

       <?php foreach($advleft as $adv_right_qc){?>

        <a href="<?php echo $adv_right_qc['Advertisement']['name'];?>" target="_blank" ><img style="border:1px solid #7C6036;" src="<?php echo DOMAINAD;?><?php echo $adv_right_qc['Advertisement']['images'];?>" border="0" width="141px" height="399px" alt="" /></a>

     <?php }}?>


    </div>
<div id="floating_banner_right" style="text-align:left; position:absolute; overflow:hidden; margin-top:130px !important; right: 0px; width: 143px; border: 0px solid #000;">
	<div id="floating_banner_right_content"  >
    <div class="hotro-phai">
        <h2>TƯ VẤN ONLINE</h2>
      <?php $helpsonline = $this->requestAction('/comment/helpsonline');?>
       <?php foreach($helpsonline as $helpsonline){?>
   		<div class="item">
			<h3><?php echo $helpsonline['Helps']['name'];?></h3>
			<div>
           
			<a href="ymsgr:sendim?<?php echo $helpsonline['Helps']['yahoo'];?>">
            <img src="http://opi.yahoo.com/online?u=<?php echo $helpsonline['Helps']['yahoo'];?>&amp;m=g&amp;t=1">
            <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<a href="skype:caohoangnamvn?call"><img src="http://mystatus.skype.com/bigclassic/caohoangnamvn" style="border: none;"  /></a>
            </a>
            </div>
            <p> <?php echo $helpsonline['Helps']['sdt'];?></p>
			<p class="clr"></p>
        </div>
          <?php }?>   	
       

</div>
</div>
<script>
    runQuery();
</script>
<script>
    pepsi_floating_init();
</script>