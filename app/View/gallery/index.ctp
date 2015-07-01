
<head>
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
</head>

<div class="content_box">
    <div class="content_box_title">
         <p><?php echo $_SESSION['lang']=='en' ? 'Gallery' : 'Bộ sưu tập'; ?></p>
   </div>
 <div class="content_box_detail">
  <ul>   
<?php foreach($images as $value){?>
<a href="<?php echo DOMAINAD.$value['Gallery']['images'];?>" rel="lightbox" style="width: 168px;height: 135px;"><img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['Gallery']['images'];?>&amp;h=250&amp;w=270&amp;zc=1" alt="<?php echo $value['Gallery']['name']?>" /></a>
 <?php }?> 
 </ul>	
</div>
</div>

</html>
