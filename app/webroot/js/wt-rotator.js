function InitRotatorBanner(idheartbanner, heightHeartBanner){
	var k=$("."+idheartbanner);
	
	k.wtRotator({width:560,
				height:heightHeartBanner,
				button_width:24,
				button_height:24,
				button_margin:5,
				auto_start:true,
				delay:4000,
				transition:"random",
				transition_speed:800,
				block_size:75,
				vert_size:55,
				horz_size:50,
				cpanel_align:"BR",
				timer_align:"top",
				display_thumbs:true,
				display_dbuttons:true,
				display_playbutton:true,
				tooltip_type:"image",
				display_numbers:true,
				display_timer:false,
				mouseover_pause:false,
				cpanel_mouseover:false,
				text_mouseover:false,
				text_effect:"fade",
				text_sync:true,
				shuffle:true,
				block_delay:25,
				vstripe_delay:73,
				hstripe_delay:183});				   
	var q=$("#submit-btn");
	var d=$("#reset-btn");
	var n=$("#transitions");
	var o=$("#easing");
	var h=$("#texteffects");
	var b=$("#cpalignments");
	var r=$("input[name='cp-pos']");
	var p=$("#cpanel-cb");
	var f=$("#tt-type");
	var m=$("#thumbs-cb");
	var c=$("#dbuttons-cb");
	var e=$("#playbutton-cb");
	var i=$("#timer-cb");
	var j=$("#pause-cb");
	var a=$("#text-cb");
	
	q.click(function(){k.undoChanges().setTransition(n.val()).setEasing(o.val()).setTextEffect(h.val()).setCpanelAlign(b.val()).setCpanelPos(r.filter(":checked").val()).setTooltipType(f.val()).setThumbs(m.prop("checked")).setDButtons(c.prop("checked")).setPlayButton(e.prop("checked")).setTimerBar(i.prop("checked")).setMouseoverText(a.prop("checked")).setMouseoverPause(j.prop("checked")).setMouseoverCPanel(p.prop("checked")).updateChanges()});
	d.click(function(){l();q.trigger("click")});
	n.change(function(){o.attr("disabled",$(this).val()=="none")});	
	r.change(function(){p.attr("disabled",$(this).filter(":checked").val()=="outside")});
	m.change(function(){f.attr("disabled",!$(this).prop("checked"));g()});
	c.change(function(){g()});
	e.change(function(){g()});
	
	var l=function(){n.val("random");
					o.val("").attr("disabled",false);
					h.val("fade");
					b.val("BR").attr("disabled",false);
					r.attr("disabled",false);
					$("input#pos-inside").prop("checked",true);
					f.val("image").attr("disabled",false);
					m.prop("checked","checked");
					c.prop("checked","checked");
					e.prop("checked","checked");
					i.prop("checked","checked");
					j.prop("checked","");
					a.prop("checked","");
					p.prop("checked","").attr("disabled",false)};
	
	var g=function(){var s=(m.prop("checked")||c.prop("checked")||e.prop("checked"));
	p.attr("disabled",!s||r.filter(":checked").val()=="outside");
	r.attr("disabled",!s);
	b.attr("disabled",!s)};
	l()
};