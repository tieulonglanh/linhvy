<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index,follow" />
	<meta name="googlebot" content="index, follow" />
	<meta name="msnbot" content="index, follow" />
	<meta name="revisit-after" content="1 days" />
    <meta name="description" content="<?php echo !empty($layout_description) ? $layout_description : 'Linh Vy Shop, chuyên bán buôn, bán lẻ các loại mỹ phẩm'; ?>" />
    <meta name="keywords" content="Bơm dầul, bơm mỡ, đồng hồ xăng dầu, máy xay nhựa, máy băm nhựa, hóa chất bảo dưỡng, dầu chống dính khuôn, dầu chống gỉ khuôn, chất bôi trơn," />
    <title>
        <?php
        $setting = $this->requestAction('Component/get_setting');
        echo !empty($layout_title) ? $layout_title : $setting['Setting']['title'];
        ?>
    </title>
    <link type="image/x-icon" href="http://gianhangvn.com/Template/GianHang/gianhangvn.ico" rel="shortcut icon">
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/slider.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/tooltip_image.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/wt-rotator.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery_002.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery.adv.scrolls.js"></script>

    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/CommonFunction.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/GianHang.js"></script>

    <link href="<?php echo DOMAIN; ?>css/Style.css" type="text/css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function () {
            $('.infiniteCarousel').infiniteCarousel();
            try
            {
                //InitRotatorBanner('div_content_center_heart', 1);
            }
            catch(ex){}

            //On Click Event
            $("ul.tabs li").click(function() {
                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content
                var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active content
                return false;
            });
        });

        function expand_description(obj)
        {
            var itemA = document.getElementById('a_morong');
            var itemDiv = document.getElementById('div_motasanpham');
            if(itemDiv.style.maxHeight == 'none')
            {
                itemDiv.style.maxHeight = '50px';
                itemA.innerHTML = 'Mở rộng';
                itemA.className = 'expand';
            }
            else
            {
                itemDiv.style.maxHeight = 'none';
                itemA.innerHTML = 'Thu gọn';
                itemA.className = 'collapse';
            }
        }
    </script>

    <script type="text/javascript" src="<?php echo DOMAIN; ?>js/plusone.js" gapi_processed="true">
        {lang: 'vi'}
    </script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-49982819-3', 'goha.com.vn');
	  ga('send', 'pageview');

	</script>
</head>
<body>
<div id="page_website">
<div id="page_content">
<div class="div_banner">
    <embed src="<?php echo DOMAIN; ?>images/banner.swf" alt="banner" width="100%" height="387px;" />
	<?php if(!empty($layout_title)){ ?>
		<h1 style="text-indent: -9999px; display: none;"><?php echo $layout_title; ?></h1>
	<?php }else{ ?>
		<h1 style="text-indent: -9999px; display: none;"><?php echo $setting['Setting']['title']; ?></h1>
	<?php } ?>
</div>
<!--=============================================Menu Top=============================================-->
<div class="div_menu">
    <div class="div_menu_left">
        <ul id="nav">
            <li class="top">
                <a title="Trang chủ" href="<?php echo DOMAIN; ?>" target="" class="top_link selected">Trang chủ</a>
            </li>
            <li class="top">
                <a title="Giới thiệu" href="<?php echo DOMAIN; ?>gioi-thieu" target="" class="top_link">Giới thiệu</a>
            </li>
            <li class="top">
                <a title="Hướng dẫn mua hàng" href="<?php echo DOMAIN; ?>chi-tiet-tin/huong-dan-mua-hang" target="" class="top_link">Hướng dẫn mua hàng</a>
            </li>
            <li class="top">
                <a title="Tin tức" href="<?php echo DOMAIN; ?>tin-tuc" target="" class="top_link">Tin tức</a>
            </li>
            <li class="top">
                <a title="Liên hệ" href="<?php echo DOMAIN; ?>lien-he" target="" class="top_link">Liên hệ</a>
            </li>
        </ul>
    </div>

    <div class="div_menu_right">
        <span class="span_giohang"><a href="<?php echo DOMAIN; ?>gio-hang">Giỏ hàng (<?php echo count($this->Session->read('shopping_cart')); ?>)</a></span>
    </div>
</div>
<div class="div_content">
<!--=============================================Left=============================================-->
<div id="ctl00_divLeftModule" class="div_content_left">


    <?php
    $category = $this->requestAction('Component/get_product_category');
    if(!empty($category)){
        foreach($category as $key => $value){
        if($value['ProductCategory']['parent_id'] == 0){
    ?>
    <div class="div_box">
        <div class="div_box_header">
            <h3><?php echo $value['ProductCategory']['name']; ?></h3>
        </div>
        <div class="div_box_content div_box_content_bg">
            <ul class="ul_menu2">
            <?php foreach($category as $child_key => $child_value){
                if($child_value['ProductCategory']['parent_id'] == $value['ProductCategory']['id']){
                    ?>
                    <li <?php if($child_key == 0) echo 'class=""'; ?>>
                        <h2 style="font-size: 12px;"><a title="<?php echo $child_value['ProductCategory']['name']; ?>" href="<?php echo DOMAIN.'danh-muc-san-pham/'.$child_value['ProductCategory']['id'].'/'.$child_value['ProductCategory']['alias']; ?>" target="" name="submenu" class="submenu"><?php echo $child_value['ProductCategory']['name']; ?></a></h2>
                        <ul>
                            <?php foreach($category as $c_key => $c_value){
                                if($c_value['ProductCategory']['parent_id'] == $child_value['ProductCategory']['id']){
                                    ?>
                                    <li <?php if($c_key == 0) echo 'class=""'; ?>>
                                        <h3 style="font-size: 12px;"><a title="<?php echo $c_value['ProductCategory']['name']; ?>" href="<?php echo DOMAIN.'danh-muc-san-pham/'.$c_value['ProductCategory']['id'].'/'.$c_value['ProductCategory']['alias']; ?>" target="" class="submenu"><?php echo $c_value['ProductCategory']['name']; ?></a></h3>
                                        <ul>
                                            <?php foreach($category as $cc_key => $cc_value){
                                                if($cc_value['ProductCategory']['parent_id'] == $c_value['ProductCategory']['id']){
                                            ?>
                                            <li <?php if($cc_key == 0) echo 'class=""'; ?>>
                                                <a title="<?php echo $cc_value['ProductCategory']['name']; ?>" href="<?php echo DOMAIN.'danh-muc-san-pham/'.$cc_value['ProductCategory']['id'].'/'.$cc_value['ProductCategory']['alias']; ?>" target=""><?php echo $cc_value['ProductCategory']['name']; ?></a>
                                            </li>
                                            <?php
                                                }
                                            }?>
                                        </ul>
                                    </li>
                                <?php } } ?>
                        </ul>
                    </li>
            <?php } } ?>
            </ul>
        </div>
    </div>
    <?php
        }
        }
    }
    ?>
    <div class="div_box">
        <div class="div_box_header">
            <h3>Hỗ trợ trực tuyến</h3>
        </div>
		<style type="text/css">
			.div_onethongke img{
				margin: 0px !important;
			}
		</style>
        <div class="div_box_content" style="padding-bottom:10px;">
		<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
            <?php $support = $this->requestAction('Component/get_support'); 
            if(!empty($support)){ foreach($support as $key => $value){?>
                <div style="border-bottom: dotted 1px #ddd; clear: both; overflow: hidden; padding-bottom: 10px;">
                    <div class="div_onethongke" style="margin-top:10px;">
                        <a href="ymsgr:sendim?<?php echo $value['Support']['yahoo']; ?>" style="text-decoration:none;">
                            <img alt="CÔNG TY CỔ PHẦN ĐẦU TƯ INVESCO VIỆT NAM" title="<?php echo $value['Support']['name']; ?>" src="<?php echo DOMAIN; ?>images/online">
                            <b><?php echo $value['Support']['name']; ?></b>
                        </a>
                    </div>
                    <div class="div_onethongke">
                        <img alt="CÔNG TY CỔ PHẦN ĐẦU TƯ INVESCO VIỆT NAM" title="<?php echo $value['Support']['telephone']; ?>" src="<?php echo DOMAIN; ?>images/icon_phone.png">
                        <b><?php echo $value['Support']['telephone']; ?></b>
                    </div>
                    <div class="div_onethongke">
                        <div id="SkypeButton_Call_<?php echo $value['Support']['skype']; ?>_1" style="float: left; margin-right: 5px;">
                            <script type="text/javascript">
                                Skype.ui({
                                    "name": "chat",
                                    "element": "SkypeButton_Call_<?php echo $value['Support']['skype']; ?>_1",
                                    "participants": ["<?php echo $value['Support']['skype']; ?>"],
                                    "imageSize": 10
                                });
                            </script>
                        </div>
                        <b><?php echo $value['Support']['skype']; ?></b>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>  
	
	
    <div class="div_box">
        <div class="div_box_header">
            <h3>Tin tức mới</h3>
        </div>

        <div class="div_box_content">
            <ul class="ul_menu">
                <?php $news = $this->requestAction('Component/get_news');
                if(!empty($news)){ foreach($news as $key => $value){?>
                    <li>
                        <a class="a_weblink first" href="<?php echo DOMAIN.'chi-tiet-tin/'.$value['News']['alias']; ?>" title="<?php echo $value['News']['name']; ?>" style="font-weight:normal;"><?php echo $value['News']['name']; ?></a>
                    </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
    <div class="div_box">
        <div class="div_box_header">
            <h3>Liên kết website</h3>
        </div>
        <div class="div_box_content">
            <ul class="ul_menu">
                <?php $links = $this->requestAction('Component/get_link');
                if(!empty($links)){ foreach($links as $key => $value){?>
                <li>
                    <a class="a_weblink first" href="<?php echo $value['Link']['link']; ?>" title="<?php echo $value['Link']['name']; ?>" target="_blank" style="font-weight:normal;"><?php echo $value['Link']['name']; ?></a>
                </li>
                <?php } } ?>
            </ul>
        </div>
    </div>

    <div class="div_box">
        <div class="div_box_header">
            <h3>Phản hồi khách hàng</h3>
        </div>
        <div class="div_box_content" style="padding-bottom:10px;">
            <?php $adv = $this->requestAction('Component/get_adv');
            if(!empty($adv)){foreach($adv as $key => $value){?>
            <div style="margin:10px 0 0 9px;"><a href="<?php echo $value['Advertisement']['link']; ?>" target="_blank">
                    <img alt="quang cao" width="180px" border="0" src="<?php echo DOMAIN.$value['Advertisement']['images']; ?>">
                </a>
            </div>
            <?php }} ?>
        </div>
    </div>
    <div class="div_box">
        <div class="div_box_header">
            <h3>Thống kê</h3>
        </div>
        <div class="div_box_content" style="padding-bottom:10px;">
            <!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="free stats" ><script  type="text/javascript" >
try {Histats.start(1,2993454,4,430,112,75,"00010000");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2993454&101" alt="free stats" border="0"></a></noscript>
<!-- Histats.com  END  -->
            </center>
        </div>
    </div></div>
<!--=============================================Center=============================================-->
<div class="div_content_center">
    <?php echo $content_for_layout; ?>
</div>
<!--=============================================Right=============================================-->
<div id="ctl00_divRightModule" class="div_content_right">
<!--form id="frmLogin" action="<?php echo DOMAIN; ?>user/login" method="post">
    <?php if($user = $this->Session->read('user')){
    ?>
        <div class="div_box">
            <div class="div_box_header">
                <h3>Thông tin tài khoản</h3>
            </div>
            <div class="div_box_content" style="padding:10px 0px;">
                <p class="p_text">Tên đăng nhập / Email</p>
                    <?php echo $user['User']['username']; ?>
                </div>
            </div>
        </div>
    <?php }else{ ?>
    <div class="div_box">
        <div class="div_box_header">
            <h3>Đăng nhập</h3>
        </div>
        <div class="div_box_content" style="padding:10px 0px;">
            <p class="p_text">Tên đăng nhập / Email</p>
            <input name="username" type="text" id="ctl00_uc141062_txtTenDangNhap" maxlength="50" class="textbox" style="margin-left:10px;width:174px;">
            <p class="p_text" style="margin-top:10px;">Mật khẩu</p>
            <input name="password" type="password" id="ctl00_uc141062_txtMatKhau" maxlength="50" onkeypress="txtMatKhau_OnKeyPress(event)" class="textbox" style="margin-left:10px;width:174px;">

            <div class="buttons" style="margin-left:10px;">
                <a class="a_link btn_black" href="javascript:btnDangNhap_OnClick()">
                    <img class="img_icon" src="<?php echo DOMAIN; ?>images/icon_login.png" alt="CÔNG TY CỔ PHẦN ĐẦU TƯ INVESCO VIỆT NAM">
                    Đăng nhập
                </a>
            </div>

        </div>
    </div>
    <?php } ?>
    <script type="text/javascript">
        function CheckDangNhap()
        {
            var valid = true;
            var objTxtTenDangNhap = document.getElementById("ctl00_uc141062_txtTenDangNhap");
            var objTxtMatKhau = document.getElementById("ctl00_uc141062_txtMatKhau");
            var objTxtMaXacNhan = document.getElementById("ctl00_uc141062_txtMaXacNhan");
            if(objTxtTenDangNhap.value.Trim().length == 0)
            {
                valid = false;
                alert("Tên đăng nhập / email chưa nhập");
                objTxtTenDangNhap.focus();
            }
            else if(objTxtMatKhau.value.Trim().length == 0)
            {
                valid = false;
                alert("Mật khẩu chưa nhập");
                objTxtTenDangNhap.focus();
            }
            else if(objTxtMaXacNhan != null && objTxtMaXacNhan.value.Trim().length == 0)
            {
                valid = false;
                alert("Mã xác nhận chưa nhập");
                objTxtMaXacNhan.focus();
            }
            else if(objTxtMaXacNhan != null && objTxtMaXacNhan.value.Trim().length != 4)
            {
                valid = false;
                alert("Mã xác nhận phải đủ 4 ký tự");
                objTxtMaXacNhan.focus();
            }
            return valid;
        }

        function txtMatKhau_OnKeyPress(e)
        {
            if(e.keyCode == 13)
            {
                btnDangNhap_OnClick();
            }
        }

        function btnDangNhap_OnClick()
        {
            if(CheckDangNhap())
            {
                document.getElementById("frmLogin").submit();
            }
        }

        if("".length > 0)
        {
            alert("");
        }

    </script>
</form-->


<form id="frmTimSanPham" action="<?php echo DOMAIN; ?>search" method="get">

    <div class="div_box">
        <div class="div_box_header">
            <h3>Tìm kiếm sản phẩm</h3>
        </div>
        <div class="div_box_content" style="padding:10px 0px;">
            <p class="p_text">Từ khóa tìm</p>
            <input type="text" id="txtTuKhoaTimKiem" name="keyword" value="" class="textbox" maxlength="50" onkeypress="txtGiaBan_OnKeyPress(event,1)" style="margin-left:10px;width:174px;">
            <p class="p_text" style="margin-top:10px;">Giá sản phẩm</p>
            <input type="text" id="txtTuGia" name="price_from" value="" class="textbox" maxlength="11" onkeypress="txtGiaBan_OnKeyPress(event,1)" onkeyup="FormatNumber(this)" style="width:80px;float:left;margin-left:10px;text-align:right;">
            <input type="text" id="txtDenGia" name="price_to" value="" class="textbox" maxlength="11" onkeypress="txtGiaBan_OnKeyPress(event,1)" onkeyup="FormatNumber(this)" style="width:80px;float:left;margin-left:8px;text-align:right;">
            <div class="buttons" style="margin-left:10px;">
                <a class="a_link btn_black" href="javascript:btnSearch_OnClick()">
                    <img class="img_icon" src="<?php echo DOMAIN; ?>images/icon_search.png" alt="CÔNG TY CỔ PHẦN ĐẦU TƯ INVESCO VIỆT NAM">
                    Tìm kiếm
                </a> 
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function FormatNumber(obj)
        {
            /*var strvalue;
            if (eval(obj))
                strvalue = eval(obj).value;
            else
                strvalue = obj;
            var num;
            num = strvalue.toString().replace(/\$|\,/g,'');
            var sign = true;
            if(isNaN(num))
            {
                num = "";
            }

            if(num.length > 0)
            {
                sign = (num == (num = Math.abs(num)));
                num = Math.floor(num*100+0.50000000001);
                num = Math.floor(num/100).toString();
                for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                {
                    num = num.substring(0,num.length-(4*i+3))+',' + num.substring(num.length-(4*i+3));
                }
            }
            eval(obj).value = (((sign)?'':'-') + num);*/
        }

        function CheckValidSearchData()
        {
            var valid = true;
            var objTxtTuKhoaTimKiem = document.getElementById("txtTuKhoaTimKiem");
            var objTxtTuGia = document.getElementById("txtTuGia");
            var objTxtDenGia = document.getElementById("txtDenGia");
            var TuGia = objTxtTuGia.value.replace(/,/g, "");
            var DenGia = objTxtDenGia.value.replace(/,/g, "");
            if(TuGia.length > 0 && (isNaN(TuGia) || TuGia < 0))
            {
                valid = false;
                alert("Giá sản phẩm không hợp lệ");
                objTxtTuGia.focus();
            }
            else if(DenGia.length > 0 && (isNaN(DenGia) || DenGia < 0))
            {
                valid = false;
                alert("Giá sản phẩm không hợp lệ");
                objTxtDenGia.focus();
            }
            else if(TuGia.length > 0 && DenGia.length > 0 && DenGia < TuGia)
            {
                valid = false;
                alert("Giá sản phẩm không hợp lệ");
                objTxtDenGia.focus();
            }
            else if(objTxtTuKhoaTimKiem.value.Trim().length == 0 && TuGia.length == 0 && DenGia.length == 0)
            {
                valid = false;
                alert("Điều kiện tìm dữ liệu chưa nhập");
                objTxtTuKhoaTimKiem.focus();
            }
            return valid;
        }

        function btnSearch_OnClick()
        {
            if(CheckValidSearchData())
            {
                document.getElementById("frmTimSanPham").submit();
            }
        }

        function txtGiaBan_OnKeyPress(e)
        {
            if(e.keyCode == 13)
            {
                btnSearch_OnClick();
            }
        }

        function TimKiemInitial()
        {
            FormatNumber(document.getElementById("txtTuGia"));
            FormatNumber(document.getElementById("txtDenGia"));
        }
        TimKiemInitial();

    </script>
</form>
<div class="div_box">
    <div class="div_box_header">
        <h3>Sản phẩm mới</h3>
    </div>

    <div id="slider141055" class="div_box_content" style="position:relative;height:540px;">
        <div style="overflow: hidden;" class="wrapper">
            <ul>
                <?php $new_product = $this->requestAction('Component/get_new_product');
                if(!empty($new_product)){ foreach($new_product as $key => $value){?>
                <li>
                    <div class="div_oneproduct">
                        <div class="div_oneproduct_img">
                            <a href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>" title="<?php echo $value['Product']['name']; ?>"><img alt="<?php echo $value['Product']['name']; ?>" title="name" src="<?php echo DOMAIN.$value['Product']['images']; ?>"></a>
                        </div>
                        <span class="span_title_product"><a title="<?php echo $value['Product']['name']; ?>" href="<?php echo DOMAIN.'chi-tiet-san-pham/'.$value['Product']['id'].'/'.$value['Product']['alias']; ?>"><?php echo $value['Product']['name']; ?></a></span>
                        <span class="span_price"><?php echo number_format($value['Product']['price']); ?> VND</span>
                    </div>
                </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#slider141055').initSlider({delay:2000});
</script>

<div class="div_box">
    <div class="div_box_header">
        <h3>Đối tác</h3>
    </div>
    <div class="div_box_content" style="padding-bottom:10px;">
        <?php $partner = $this->requestAction('Component/get_partner');
            if(!empty($partner)){ foreach($partner as $key => $value){
        ?>
        <div style="margin:10px 0 0 9px;"><img alt="<?php $value['Partner']['name']; ?>" title="<?php $value['Partner']['name']; ?>" width="180px" border="0" src="<?php echo DOMAIN.$value['Partner']['images']; ?>" /></div>
        <?php } } ?>
    </div>
</div>
</div>
</div>
<div class="div_footer">
    <div class="div_footer_linkmenu">
    </div>
    <div class="div_footer_content">
        <?php echo $setting['Setting']['contactinfo']; ?>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    document.write("<script type='text/javascript' language='javascript'>MainContentW = 980;LeftBannerW = 140;RightBannerW = 140;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 120;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");
</script><script type="text/javascript" language="javascript">MainContentW = 980;LeftBannerW = 140;RightBannerW = 140;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 120;ShowAdDiv();window.onresize=ShowAdDiv;;</script>

<form id="frmGioHang" name="frmGioHang" action="http://gianhangvn.com/invescovn/gh-gio-hang.html" method="post">
    <input type="hidden" id="hdIDSanPhamCanMua" name="hdIDSanPhamCanMua">
    <input type="hidden" id="hdSanPhamHuy" name="hdSanPhamHuy">
    <input type="hidden" id="hdCapNhatGioHang" name="hdCapNhatGioHang">
</form>

<script type="text/javascript">
    function MuaSanPham(IDSanPham)
    {
        document.getElementById("hdIDSanPhamCanMua").value = IDSanPham;
        document.getElementById("frmGioHang").submit();
    }
    function HuySanPham(IDThanhVien, IDSanPham)
    {
        document.getElementById("hdSanPhamHuy").value = IDThanhVien + "," + IDSanPham;
        document.getElementById("frmGioHang").submit();
    }
    function CapNhatGioHang()
    {
        var objHdCapNhatGioHang = document.getElementById("hdCapNhatGioHang");
        var arrTxtSoLuong = document.getElementsByName("txtSoLuongSanPham_GioHang");
        var valid = true;
        objHdCapNhatGioHang.value = "";
        for(var i=0; i < arrTxtSoLuong.length;i++)
        {
            if(arrTxtSoLuong[i].value.Trim().length == 0)
            {
                valid = false;
                alert("Số lượng sản phẩm chưa nhập");
                arrTxtSoLuong[i].focus();
                break;
            }
            else if(arrTxtSoLuong[i].value <= 0)
            {
                valid = false;
                alert("Số lượng sản phẩm không hợp lệ, số lượng phải lớn hơn 0");
                arrTxtSoLuong[i].focus();
                break;
            }

            objHdCapNhatGioHang.value += arrTxtSoLuong[i].getAttribute("IDThanhVien") + "," + arrTxtSoLuong[i].getAttribute("IDSanPham") + "," + arrTxtSoLuong[i].value + ((i < arrTxtSoLuong.length - 1)? ";" : "");
        }

        if(valid)
        {
            document.getElementById("frmGioHang").submit();
        }
    }

    function SetSelectedMenu()
    {
        var currentPage = "/invescovn/home.html";

        var ulMenu = document.getElementById("nav");
        var arrMenu = ulMenu.getElementsByTagName("a");
        var objASelected = null;
        for(var i=0; i < arrMenu.length; i++)
        {
            if(arrMenu[i].href.toLowerCase().indexOf(currentPage) != -1)
            {
                objASelected = arrMenu[i];
                break;
            }
        }
        if(objASelected != null)
        {
            //Get li parent
            var liMenuSelected = objASelected.parentNode;
            while(liMenuSelected.parentNode.id != "nav")
            {
                liMenuSelected = liMenuSelected.parentNode;
            }

            if(liMenuSelected != null)
            {
                liMenuSelected.childNodes[0].className = "top_link selected";
            }
        }
    }
    SetSelectedMenu();
</script>
</body>
</html>