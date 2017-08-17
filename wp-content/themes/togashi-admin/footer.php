		</div>
	</div>
</body>
<script type="text/javascript">
    //Add checkbox default base on number of booths with jquery 
   $('input[name="catalogue[1][sophong]"]').change(function () {
        var booth1=$('input[name="catalogue[1][sophong]"]').val();
        if(booth1!=''||booth1!=null){
            $('input[name="catalogue[1][check1]"]').prop('checked', true);
        }
        if(booth1==''||booth1==null){
            $('input[name="catalogue[1][check1]"]').prop('checked', false);
        }
    });
   $('input[name="catalogue[2][sophong]"]').change(function () {
        var booth2=$('input[name="catalogue[2][sophong]"]').val();
        if(booth2!=''||booth2!=null){
            $('input[name="catalogue[2][check1]"]').prop('checked', true);
        }
        if(booth2==''||booth2==null){
            $('input[name="catalogue[2][check1]"]').prop('checked', false);
        }
    });
   $('input[name="catalogue[3][sophong]"]').change(function () {
        var booth3=$('input[name="catalogue[3][sophong]"]').val();
        if(booth3!=''||booth3!=null){
            $('input[name="catalogue[3][check1]"]').prop('checked', true);
        }
        if(booth3==''||booth3==null){
            $('input[name="catalogue[3][check1]"]').prop('checked', false);
        }
    });
   $('input[name="catalogue[4][sophong]"]').change(function () {
        var booth4=$('input[name="catalogue[4][sophong]"]').val();
        if(booth4!=''||booth4!=null){
            $('input[name="catalogue[4][check1]"]').prop('checked', true);
        }
        if(booth4==''||booth4==null){
            $('input[name="catalogue[4][check1]"]').prop('checked', false);
        }
    });
    // $('input[name="catalogue[1][sophong]"]').trigger('change');
    /**** End add 09-08-2017 ***/

	$("input.select_box").on('change', function(evt) {
		var bol = $("input.select_box:checked");
		if(bol.length >=3) 
		{
		$("input.select_box").not(":checked").attr("disabled",bol);
		}    
		else{
		$("input.select_box").not(":checked").removeAttr("disabled",bol);
		}
    });
    //Check validate for form
	$("#error").hide();
 	$('#submit_form').click(function() {
      	var company_name = $("#company_name").val();
        var family_name = $("#family_name").val();
        var given_name = $("#given_name").val();
        var exhibitors_name = $("#exhibitors_name").val();
        var exhibition_service_name = $("#exhibition_service_name").val();
        //Add by ms.thuyanit 06-08-2017
        var person_in_charge = $("#person_in_charge").val();
        var position = $("#position").val();
        //End add
        var zipcode1 = $("#zipcode1").val();
        var zipcode2 = $("#zipcode2").val();
        var prefectures = $("#prefectures").val();
        var city = $("#city").val();
        var address = $("#address").val();
        var tel = $("#tel").val();
        var fax = $("#fax").val();
        var emergency_tel = $("#emergency_tel").val();
        var email = $("#email").val();
        var email2 = $("#email2").val();
        // var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        var email_regex=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // Add addition for location 
            var booth1=$('input[name="catalogue[1][sophong]"]').val();
            var booth1_check1 = $('input[name="catalogue[1][check1]"]:checked').length;
            var booth1_check2 = $('input[name="catalogue[1][check2]"]:checked').length;

            var booth2=$('input[name="catalogue[2][sophong]"]').val();
            var booth2_check1 = $('input[name="catalogue[2][check1]"]:checked').length;
            var booth2_check2 = $('input[name="catalogue[2][check2]"]:checked').length;

            var booth3=$('input[name="catalogue[3][sophong]"]').val();
            var booth3_check1 = $('input[name="catalogue[3][check1]"]:checked').length;
            var booth3_check2 = $('input[name="catalogue[3][check2]"]:checked').length;
          
            var booth4=$('input[name="catalogue[4][sophong]"]').val();
            var booth4_check1 = $('input[name="catalogue[4][check1]"]:checked').length;
            var booth4_check2 = $('input[name="catalogue[4][check2]"]:checked').length;
        //End add
        if((booth1!=""&&(booth1_check1==0)&&(booth1_check2==0))||(booth2!=""&&(booth2_check1==0)&&(booth2_check2==0))||(booth3!=""&&(booth3_check1==0)&&(booth3_check2==0))||(booth4!=""&&(booth4_check1==0)&&(booth4_check2==0))||(booth1==""&&(booth1_check1==0)&&(booth1_check2==0)&&booth2==""&&(booth2_check1==0)&&(booth2_check2==0)&&booth3==""&&(booth3_check1==0)&&(booth3_check2==0)&&booth4==""&&(booth4_check1==0)&&(booth4_check2==0))||company_name == ""||family_name == ""||given_name == ""||exhibitors_name == ""||exhibition_service_name == ""||person_in_charge == ""||position == ""||zipcode1 == ""||zipcode2 == ""||city == ""||address == ""||(!email_regex.test(email)) || email == ""||email!=email2||tel == ""||((/^[0-9-()+]+$/.test(tel)) == false)||fax == ""||((/^[0-9-()+]+$/.test(fax)) == false)||emergency_tel == ""||((/^[0-9-()+]+$/.test(emergency_tel)) == false)){
            $("#error").show();
            $('html, body').animate({scrollTop: '0px'}, 1000);
            if(company_name=="" || company_name==null)
            {
                $("#company_name").addClass("field_not_valid");
                 
            }
            else
            {
                $("#company_name").removeClass("field_not_valid"); 
            }
            //===================================================
            if(family_name=="" || family_name==null)
            {
                $("#family_name").addClass("field_not_valid");
                 
            }
            else
            {
                $("#family_name").removeClass("field_not_valid"); 
            }
            //===================================================
            if(given_name=="" || given_name==null)
            {
                $("#given_name").addClass("field_not_valid");
                 
            }
            else
            {
                $("#given_name").removeClass("field_not_valid"); 
            }
            //===================================================
            if(exhibitors_name=="" || exhibitors_name==null)
            {
                $("#exhibitors_name").addClass("field_not_valid");
                 
            }
            else
            {
                $("#exhibitors_name").removeClass("field_not_valid"); 
            }
            //===================================================
            if(exhibition_service_name=="" || exhibition_service_name==null)
            {
                $("#exhibition_service_name").addClass("field_not_valid");
                 
            }
            else
            {
                $("#exhibition_service_name").removeClass("field_not_valid"); 
            }
             //===================================================
            if(person_in_charge=="" || person_in_charge==null)
            {
                $("#person_in_charge").addClass("field_not_valid");
                 
            }
            else
            {
                $("#person_in_charge").removeClass("field_not_valid"); 
            }
             //===================================================
            if(position=="" || position==null)
            {
                $("#position").addClass("field_not_valid");
                 
            }
            else
            {
                $("#position").removeClass("field_not_valid"); 
            }
            //===================================================
            if(zipcode1=="" || zipcode1==null)
            {
                $("#zipcode1").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zipcode1").removeClass("field_not_valid"); 
            }
            //===================================================
            if(zipcode2=="" || zipcode2==null)
            {
                $("#zipcode2").addClass("field_not_valid");
                 
            }
            else
            {
                $("#zipcode2").removeClass("field_not_valid"); 
            }
            //===================================================
            if(city=="" || city==null)
            {
                $("#city").addClass("field_not_valid");
                 
            }
            else
            {
                $("#city").removeClass("field_not_valid"); 
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
            if(!email_regex.test(email) || email == "")
            {
                $("#email").addClass("field_not_valid");
                 
            }
            else
            {
                $("#email").removeClass("field_not_valid"); 
                if(email!=email2){
                    $("#email2").addClass("field_not_valid");
                }
                else{
                    $("#email2").removeClass("field_not_valid"); 
                }
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
            //===================================================
            if(emergency_tel=="" || emergency_tel==null||((/^[0-9-()+]+$/.test(emergency_tel)) == false))
            {
                $("#emergency_tel").addClass("field_not_valid");
                 
            }
            else
            {
                $("#emergency_tel").removeClass("field_not_valid"); 
            }
            //===================================================
            if(booth1==""&&(booth1_check1==0)&&(booth1_check2==0)&&booth2==""&&(booth2_check1==0)&&(booth2_check2==0)&&booth3==""&&(booth3_check1==0)&&(booth3_check2==0)&&booth4==""&&(booth4_check1==0)&&(booth4_check2==0)||(booth1!=""&&(booth1_check1==0)&&(booth1_check2==0))||(booth2!=""&&(booth2_check1==0)&&(booth2_check2==0))||(booth3!=""&&(booth3_check1==0)&&(booth3_check2==0))||(booth4!=""&&(booth4_check1==0)&&(booth4_check2==0))
                ){
                $(".area_event .content").addClass("field_not_valid");
            }
            else{
                $(".area_event .content").removeClass("field_not_valid");
            }

        } 
        else{
        	//$("#application_form").submit();
            $('#showerror').html('');
            var email = $('#email').val();
            $.ajax({
                url : 'http://zenchin-form.com/wp-content/themes/togashi-admin/check_email.php',
                type : 'post',
                dataType : 'json',
                data : {
                    email : email
                },
                success : function (result)
                {
                    // Kiểm tra xem thông tin gửi lên
                    if (!result.hasOwnProperty('error') || result['error'] != 'success')
                    {                            
                        return false;
                    }                        
                    var html = '';                        
                    // Lấy thông tin lỗi email
                    if ($.trim(result.email) != ''){
                        html = result.email;
                    }                       
                    // Cuối cùng kiểm tra xem có lỗi không Nếu có thì xuất hiện lỗi
                    if (html != ''){
                        $('#showerror').append(html);
                        //$('html, body').animate({scrollTop: '0px'}, 1000);
                        $('html, body').animate({
				            scrollTop: $('#email').offset().top
				        }, 500);
				        $("#email").addClass("field_not_valid");
                    }
                    else{
                        $('form').submit();
                    }
                }
            });                
            return false;
        }         
    }); // end even click
</script>
<?php wp_footer(); ?>
</html>