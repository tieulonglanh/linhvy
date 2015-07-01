
        <?php 
    $settings = $this -> requestAction('/plugin/setting');
    
    foreach($settings as $setting)
    {
	    echo '<br/>';
        echo '<h4 style="padding-bottom: 5px;">' . $setting['Setting']['name'] . '</h4>'; 
        echo 'Địa chỉ: ' . $setting['Setting']['address'] . '<br />'; 
        echo 'Điện thoại: ' . $setting['Setting']['phone'] . ' - Fax: '. $setting['Setting']['mobile'] .' - Email: ' .$setting['Setting']['email'] . '<br />'; 
        
    }
    
?>

