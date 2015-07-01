<?php 
$setting = $this -> requestAction('/plugin/setting');

foreach($setting as $settings)
{
    echo $settings['Setting']['address']; 
}

?>
