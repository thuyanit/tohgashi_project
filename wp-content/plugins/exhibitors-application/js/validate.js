
$('.content_selected .package_booth').hide();
$('.content_selected .choose_myself').hide();
//No need - No display form
$('.choose_booth_contractor input[class="choose1"]').click(function(){
    $('.content_selected .package_booth').hide();
	$('.content_selected .choose_myself').hide(); 
	$('.content_selected .package_booth input').val('');
	$('.content_selected .choose_myself input').val('');
});
//Package Booth
$('.choose_booth_contractor input[class="choose2"]').click(function(){
    $('.content_selected .package_booth').fadeIn();
	$('.content_selected .choose_myself').hide();
	$('.content_selected .choose_myself input').val('');
});
//Request admin - No display form
$('.choose_booth_contractor input[class="choose3"]').click(function(){
    $('.content_selected .package_booth').hide();
	$('.content_selected .choose_myself').hide(); 
	$('.content_selected .package_booth input').val('');
	$('.content_selected .choose_myself input').val(''); 
});
// Myself
$('.choose_booth_contractor input[class="choose4"]').click(function(){
    $('.content_selected .package_booth').hide();
    $('.content_selected .package_booth input').val('');
	$('.content_selected .choose_myself').fadeIn(); 
});
//===========================================================================
$('#nameplate input[class="need"]').click(function(){
    $('#nameplate input[type="number"]').fadeIn(); 
    $('#nameplate .unit_number').fadeIn();
});
$('#nameplate input[class="noneed"]').click(function(){
    $('#nameplate input[type="number"]').hide();
    $('#nameplate .unit_number').hide();
    $('#nameplate input[type="number"]').val('');
});
//===========================================================================		
		//$('#the_car #form_the_car').hide();
		//Don't have
$('#the_car input[class="choose1"]').click(function(){
    $('#the_car #form_the_car').hide(); 
    	$('#the_car #form_the_car input').val('');
});
//Have but It doesn't come inside
$('#the_car input[class="choose2"]').click(function(){
    $('#the_car #form_the_car').fadeIn(); 
});
//Have but It will come inside
$('#the_car input[class="choose3"]').click(function(){
    $('#the_car #form_the_car').fadeIn();
});
//===========================================================================				
//$('.need_company_name_plate').hide();

$('.company_name_plate input[class="need"]').click(function(){
    $('.need_company_name_plate').fadeIn(); 
});
$('.company_name_plate input[class="noneed"]').click(function(){
    $('.need_company_name_plate').hide();
    $('.need_company_name_plate input').val('');
});
//===========================================================================		
//$('.content_electrical_construction .electrical_myself').hide();
//Request to admin
$('.electrical_construction input[class="choose1"]').click(function(){
    $('.content_electrical_construction .electrical_myself').hide();
    $('.content_electrical_construction .electrical_myself input').val(''); 
});
//Myself

$('.electrical_construction input[class="choose2"]').click(function(){
    $('.content_electrical_construction .electrical_myself').fadeIn(); 
});
//No need
$('.electrical_construction input[class="choose3"]').click(function(){
    $('.content_electrical_construction .electrical_myself').hide(); 
    $('.content_electrical_construction .electrical_myself input').val('');
});
// Check validate 
if($('input[name=package]').val()=="事務局指定業者以外に依頼する"){
	$('.content_selected .choose_myself').fadeIn(); 
}

$(function() {
    var $radios = $('input:radio[value="事務局指定業者以外に依頼する"]');
    if($radios.is(':checked') === true) {
        $('.content_selected .choose_myself').show();
    }
    var $radios2 = $('input:radio[value="パッケージブースを申し込む"]')
     if($radios2.is(':checked') === true) {
        $('.content_selected .package_booth').show();
    }
});


$('#submit_choose_myself').click(function() {
	var choose_booth_contractor = $('input[name=package]:checked','#foundation_form').val();
	if(choose_booth_contractor=="事務局指定業者以外に依頼する")
	{
		var name_company_supplier = $("#name_company_supplier").val();
		var zip1 = $("#zip1").val();
		var zip2 = $("#zip2").val();
		var address = $("#address").val();
		var person_in_change = $("#person_in_change").val();
		var tel = $("#tel").val();
		var fax = $("#fax").val();
		var email = $("#email").val();
		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		// $('input[name=radioName]:checked', '#myForm').val()
		var nameplate = $('input[name=nameplate]:checked','#nameplate').val();
		var number_nameplate = $('#nameplate input[type="number"]').val();
		
		var the_car = $('input[name=car]:checked','#the_car').val();
		var qty_car = $("#qty_car").val();
		var model_car = $("#model_car").val();
		var from_time = $("#from_time").val();
		var to_time = $("#to_time").val();
        //Add 2 more form 07-08-2017
        var qty_car2 = $("#qty_car2").val();
        var model_car2 = $("#model_car2").val();
        var from_time2 = $("#from_time2").val();
        var to_time2 = $("#to_time2").val();
        var qty_car3 = $("#qty_car3").val();
        var model_car3 = $("#model_car3").val();
        var from_time3 = $("#from_time3").val();
        var to_time3 = $("#to_time3").val();
        //End add
		
		var company_name_plate=$('input[name=company_name_plate]:checked','#description').val();
		var company_name_plate_reg = $("#company_name_plate_reg").val();
		
		var electrical_construction=$('input[name=package_electrical]:checked','#wrap_electrical_construction').val();
        var name_company_supplier2 = $("#name_company_supplier2").val();
		var zip3 = $("#zip3").val();
		var zip4 = $("#zip4").val();
		var address2 = $("#address2").val();
		var person_in_change2 = $("#person_in_change2").val();
		var tel2 = $("#tel2").val();
		var fax2 = $("#fax2").val();
		var email2 = $("#email2").val();
		//==================================================
		if(name_company_supplier == ""
		||zip1 == ""||zip2 == ""
		||address == ""
		||person_in_change == ""
		||(!email_regex.test(email)) || email == ""
		||tel == ""||((/^[0-9-()+]+$/.test(tel)) == false)
		||fax == ""||((/^[0-9-()+]+$/.test(fax)) == false)
		||((nameplate=="会期中のを追加する")&&(number_nameplate==""||number_nameplate==null))
		
		||((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
		||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
		
		||((company_name_plate=="必要")&&(company_name_plate_reg==""||company_name_plate_reg==null))
		
		||((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2 == ""
		||zip3 == ""||zip4 == ""
		||address2 == ""
		||person_in_change2 == ""
		||(!email_regex.test(email2)) || email2 == ""
		||tel2 == ""||((/^[0-9-()+]+$/.test(tel2)) == false)
		||fax2 == ""||((/^[0-9-()+]+$/.test(fax2)) == false)))
		)
		{
			//alert(nameplate);
			$('html, body').animate({scrollTop: '0px'}, 1000);
			if(name_company_supplier=="" || name_company_supplier==null)
            {
                $("#name_company_supplier").addClass("field_not_valid");
                 
            }
            else
            {
                $("#name_company_supplier").removeClass("field_not_valid"); 
            }
            //===================================================
            if(zip1=="" || zip1==null)
            {
                $("#zip1").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zip1").removeClass("field_not_valid"); 
            }
             if(zip2=="" || zip2==null)
            {
                $("#zip2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zip2").removeClass("field_not_valid"); 
            }
            //===================================================
            if(address=="" || address==null)
            {
                $("#address").addClass("field_not_valid");
                 
            }
            else
            {
                $("#address").removeClass("field_not_valid"); 
            }
            //===================================================
            if(person_in_change=="" || person_in_change==null)
            {
                $("#person_in_change").addClass("field_not_valid");
                 
            }
            else
            {
                $("#person_in_change").removeClass("field_not_valid"); 
            }
            //===================================================
            if(!email_regex.test(email) || email == "")
            {
                $("#email").addClass("field_not_valid");
                 
            }
            else
            {
                $("#email").removeClass("field_not_valid"); 
            }
            //===================================================
            if(tel=="" || tel==null||((/^[0-9-()+]+$/.test(tel)) == false))
            {
                $("#tel").addClass("field_not_valid");
                 
            }
            else
            {
                $("#tel").removeClass("field_not_valid"); 
            }
            //===================================================
            if(fax=="" || fax==null||((/^[0-9-()+]+$/.test(fax)) == false))
            {
                $("#fax").addClass("field_not_valid");
                 
            }
            else
            {
                $("#fax").removeClass("field_not_valid"); 
            }
            /***************************/
            if((nameplate=="会期中のを追加する")&&(number_nameplate=="" || number_nameplate==null))
            {
               $('#nameplate input[type="number"]').addClass("field_not_valid");
                 
            }
            else
            {
                $('#nameplate input[type="number"]').removeClass("field_not_valid"); 
            }
            /***************************/
            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car=="" || qty_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car=="" || qty_car==null)) )
            {
                $("#qty_car").addClass("field_not_valid");
            }
            else
            {
                $("#qty_car").removeClass("field_not_valid"); 
            }
            
            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(model_car=="" || model_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(model_car=="" || model_car==null)))
            {
                $("#model_car").addClass("field_not_valid");   
            }
            else
            {
                $("#model_car").removeClass("field_not_valid"); 
            }
            
            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(from_time=="" || from_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(from_time=="" || from_time==null)))
            {
                $("#from_time").addClass("field_not_valid");
            }
            else
            {
                $("#from_time").removeClass("field_not_valid"); 
            }
            
            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(to_time=="" || to_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(to_time=="" || to_time==null)))
            {
                $("#to_time").addClass("field_not_valid");
            }
            else
            {
                $("#to_time").removeClass("field_not_valid"); 
            }
            /****************************************/
            if((company_name_plate=="必要")&&(company_name_plate_reg=="" || company_name_plate_reg==null))
            {
                $("#company_name_plate_reg").addClass("field_not_valid");
            }
            else
            {
                $("#company_name_plate_reg").removeClass("field_not_valid"); 
            }
            /***************************************/
            if((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2=="" || name_company_supplier2==null))
            {
                $("#name_company_supplier2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#name_company_supplier2").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(zip3=="" || zip3==null))
            {
                $("#zip3").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zip3").removeClass("field_not_valid"); 
            }
             if((electrical_construction=="自社で工事業者を手配する")&&(zip4=="" || zip4==null))
            {
                $("#zip4").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zip4").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(address2=="" || address2==null))
            {
                $("#address2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#address2").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(person_in_change2=="" || person_in_change2==null))
            {
                $("#person_in_change2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#person_in_change2").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(!email_regex.test(email2) || email2 == ""))
            {
                $("#email2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#email2").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(tel2=="" || tel2==null||((/^[0-9-()+]+$/.test(tel2)) == false)))
            {
                $("#tel2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#tel2").removeClass("field_not_valid"); 
            }
            //===================================================
            if((electrical_construction=="自社で工事業者を手配する")&&(fax2=="" || fax2==null||((/^[0-9-()+]+$/.test(fax2)) == false)))
            {
                $("#fax2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#fax2").removeClass("field_not_valid"); 
            }
  
		}
		
		else{
			$('#foundation_form').submit();
		}
	}//End if wrap Choose Myself 
	
	else{
		if(choose_booth_contractor==""||choose_booth_contractor==null){
			$('html, body').animate({scrollTop: '0px'}, 1000);
			alert("Please choose booth contructor");
		}
		if(choose_booth_contractor=="パッケージブースを申し込む")
    	{
    		var qty_booth=$('.package_booth input[name="qty_booth"]').val();
    		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    		var nameplate = $('input[name=nameplate]:checked','#nameplate').val();
			var number_nameplate = $('#nameplate input[type="number"]').val();
			
			var the_car = $('input[name=car]:checked','#the_car').val();
			var qty_car = $("#qty_car").val();
			var model_car = $("#model_car").val();
			var from_time = $("#from_time").val();
			var to_time = $("#to_time").val();
			
			var company_name_plate=$('input[name=company_name_plate]:checked','#description').val();
			var company_name_plate_reg = $("#company_name_plate_reg").val();
			
			var electrical_construction=$('input[name=package_electrical]:checked','#wrap_electrical_construction').val();
            var name_company_supplier2 = $("#name_company_supplier2").val();
			var zip3 = $("#zip3").val();
			var zip4 = $("#zip4").val();
			var address2 = $("#address2").val();
			var person_in_change2 = $("#person_in_change2").val();
			var tel2 = $("#tel2").val();
			var fax2 = $("#fax2").val();
			var email2 = $("#email2").val();
			//==================================================
			if( qty_booth==""||qty_booth==null||((nameplate=="会期中のを追加する")&&(number_nameplate==""||number_nameplate==null))
			
			||((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
			||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
			
			||((company_name_plate=="必要")&&(company_name_plate_reg==""||company_name_plate_reg==null))
			
			||((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2 == ""
			||zip3 == ""||zip4 == ""
			||address2 == ""
			||person_in_change2 == ""
			||(!email_regex.test(email2)) || email2 == ""
			||tel2 == ""||((/^[0-9-()+]+$/.test(tel2)) == false)
			||fax2 == ""||((/^[0-9-()+]+$/.test(fax2)) == false)))
			)
			{
				//alert(nameplate);
				$('html, body').animate({scrollTop: '0px'}, 1000);
				if(qty_booth>3||qty_booth<1)
	    		{
	    			$('.package_booth input[name="qty_booth"]').addClass('field_not_valid');
	    		}
	    		else{
	    			$('.package_booth input[name="qty_booth"]').removeClass('field_not_valid');
	    			// $('#foundation_form').submit();
	    		}
	            /***************************/
	            if((nameplate=="会期中のを追加する")&&(number_nameplate=="" || number_nameplate==null))
	            {
	               $('#nameplate input[type="number"]').addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $('#nameplate input[type="number"]').removeClass("field_not_valid"); 
	            }
	            /***************************/
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car=="" || qty_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car=="" || qty_car==null)) )
	            {
	                $("#qty_car").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#qty_car").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(model_car=="" || model_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(model_car=="" || model_car==null)))
	            {
	                $("#model_car").addClass("field_not_valid");   
	            }
	            else
	            {
	                $("#model_car").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(from_time=="" || from_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(from_time=="" || from_time==null)))
	            {
	                $("#from_time").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#from_time").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(to_time=="" || to_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(to_time=="" || to_time==null)))
	            {
	                $("#to_time").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#to_time").removeClass("field_not_valid"); 
	            }
	            /****************************************/
	            if((company_name_plate=="必要")&&(company_name_plate_reg=="" || company_name_plate_reg==null))
	            {
	                $("#company_name_plate_reg").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#company_name_plate_reg").removeClass("field_not_valid"); 
	            }
	            /***************************************/
	            if((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2=="" || name_company_supplier2==null))
	            {
	                $("#name_company_supplier2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#name_company_supplier2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(zip3=="" || zip3==null))
	            {
	                $("#zip3").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#zip3").removeClass("field_not_valid"); 
	            }
	             if((electrical_construction=="自社で工事業者を手配する")&&(zip4=="" || zip4==null))
	            {
	                $("#zip4").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#zip4").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(address2=="" || address2==null))
	            {
	                $("#address2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#address2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(person_in_change2=="" || person_in_change2==null))
	            {
	                $("#person_in_change2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#person_in_change2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(!email_regex.test(email2) || email2 == ""))
	            {
	                $("#email2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#email2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(tel2=="" || tel2==null||((/^[0-9-()+]+$/.test(tel2)) == false)))
	            {
	                $("#tel2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#tel2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(fax2=="" || fax2==null||((/^[0-9-()+]+$/.test(fax2)) == false)))
	            {
	                $("#fax2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#fax2").removeClass("field_not_valid"); 
	            }
			}
			else{
	    		$('#foundation_form').submit();
	    	}
    	}
    	
    	if(choose_booth_contractor=="施工業者無し"||choose_booth_contractor=="事務局指定業者に依頼する（トーガシ）"){
    		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    		var nameplate = $('input[name=nameplate]:checked','#nameplate').val();
			var number_nameplate = $('#nameplate input[type="number"]').val();
			
			var the_car = $('input[name=car]:checked','#the_car').val();
			var qty_car = $("#qty_car").val();
			var model_car = $("#model_car").val();
			var from_time = $("#from_time").val();
			var to_time = $("#to_time").val();
			
			var company_name_plate=$('input[name=company_name_plate]:checked','#description').val();
			var company_name_plate_reg = $("#company_name_plate_reg").val();
			
			var electrical_construction=$('input[name=package_electrical]:checked','#wrap_electrical_construction').val();
            var name_company_supplier2 = $("#name_company_supplier2").val();
			var zip3 = $("#zip3").val();
			var zip4 = $("#zip4").val();
			var address2 = $("#address2").val();
			var person_in_change2 = $("#person_in_change2").val();
			var tel2 = $("#tel2").val();
			var fax2 = $("#fax2").val();
			var email2 = $("#email2").val();
			
			//==================================================
			if(((nameplate=="会期中のを追加する")&&(number_nameplate==""||number_nameplate==null))
			
			||((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
			||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car==""||qty_car==null||model_car==""||model_car==null||from_time==""||from_time==null||to_time==""||to_time==null))
			
			||((company_name_plate=="必要")&&(company_name_plate_reg==""||company_name_plate_reg==null))
			
			||((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2 == ""
			||zip3 == ""||zip4 == ""
			||address2 == ""
			||person_in_change2 == ""
			||(!email_regex.test(email2)) || email2 == ""
			||tel2 == ""||((/^[0-9-()+]+$/.test(tel2)) == false)
			||fax2 == ""||((/^[0-9-()+]+$/.test(fax2)) == false)))
			)
			{
				//alert(nameplate);
				$('html, body').animate({scrollTop: '0px'}, 1000);
	            /***************************/
	            if((nameplate=="会期中のを追加する")&&(number_nameplate=="" || number_nameplate==null))
	            {
	               $('#nameplate input[type="number"]').addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $('#nameplate input[type="number"]').removeClass("field_not_valid"); 
	            }
	            /***************************/
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(qty_car=="" || qty_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(qty_car=="" || qty_car==null)) )
	            {
	                $("#qty_car").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#qty_car").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(model_car=="" || model_car==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(model_car=="" || model_car==null)))
	            {
	                $("#model_car").addClass("field_not_valid");   
	            }
	            else
	            {
	                $("#model_car").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(from_time=="" || from_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(from_time=="" || from_time==null)))
	            {
	                $("#from_time").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#from_time").removeClass("field_not_valid"); 
	            }
	            
	            if(((the_car=="ホール内車進入無し（荷捌き場停め、搬入口より手運び）")&&(to_time=="" || to_time==null))||((the_car=="ホール内車進入有り（小間横停車、荷降ろし）")&&(to_time=="" || to_time==null)))
	            {
	                $("#to_time").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#to_time").removeClass("field_not_valid"); 
	            }
	            /****************************************/
	            if((company_name_plate=="必要")&&(company_name_plate_reg=="" || company_name_plate_reg==null))
	            {
	                $("#company_name_plate_reg").addClass("field_not_valid");
	            }
	            else
	            {
	                $("#company_name_plate_reg").removeClass("field_not_valid"); 
	            }
	            /***************************************/
	            if((electrical_construction=="自社で工事業者を手配する")&&(name_company_supplier2=="" || name_company_supplier2==null))
	            {
	                $("#name_company_supplier2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#name_company_supplier2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(zip3=="" || zip3==null))
	            {
	                $("#zip3").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#zip3").removeClass("field_not_valid"); 
	            }
	             if((electrical_construction=="自社で工事業者を手配する")&&(zip4=="" || zip4==null))
	            {
	                $("#zip4").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#zip4").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(address2=="" || address2==null))
	            {
	                $("#address2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#address2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(person_in_change2=="" || person_in_change2==null))
	            {
	                $("#person_in_change2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#person_in_change2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(!email_regex.test(email2) || email2 == ""))
	            {
	                $("#email2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#email2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(tel2=="" || tel2==null||((/^[0-9-()+]+$/.test(tel2)) == false)))
	            {
	                $("#tel2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#tel2").removeClass("field_not_valid"); 
	            }
	            //===================================================
	            if((electrical_construction=="自社で工事業者を手配する")&&(fax2=="" || fax2==null||((/^[0-9-()+]+$/.test(fax2)) == false)))
	            {
	                $("#fax2").addClass("field_not_valid");
	                 
	            }
	            else
	            {
	                $("#fax2").removeClass("field_not_valid"); 
	            }
			}
			else{
				$('#foundation_form').submit();
			}
    	}
	}
});//End click Submit Choose
