<div class="list_support">
	<ul>
<?php $helpsonline = $this->requestAction('/plugin/helpsonline');?>
<?php 
  foreach($helpsonline as $helpsonline){
  ?>
	<li><a href="ymsgr:sendim?<?php echo $helpsonline['Helps']['yahoo']; ?>"><?php echo $helpsonline['Helps']['name']; ?>: <img src="http://opi.yahoo.com/online?u=<?php echo $helpsonline['Helps']['yahoo']; ?>&t=1" mce_src="http://opi.yahoo.com/online?u=<?php echo $helpsonline['Helps']['yahoo']; ?>&t=1" width="126" height="24"></a></li>
<?php } ?>
	</ul>
</div><!--end #list_suppport-->
