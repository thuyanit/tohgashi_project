<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div id="dashboard">
    <form id="setup_dealine" name="setup_dealine" action="" method="post">
        <!-- Basic Application - Foundation  -->
        <div class="row">
           <p class="name_row">基本申込有効期限</p>
           <p><input name="dealine_foundation" type="text" min="2017-05-01" id="date1" value="<?php echo strtotime($date->dealine_foundation)<= strtotime('')?'':$date->dealine_foundation; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Construction -->
        <div class="row">
           <p class="name_row">工事・各種申請申込期限</p>
           <p><input name="dealine_construction" type="text" min="2017-05-01" id="date2" value="<?php echo strtotime($date->dealine_construction)<= strtotime('')?'':$date->dealine_construction; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Rental furniture application dealine -->
        <div class="row">
           <p class="name_row">レンタル備品申込期限 </p>
           <p><input name="dealine_goods" type="text" min="2017-05-01" id="date3" value="<?php echo strtotime($date->dealine_goods)<= strtotime('')?'':$date->dealine_goods; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>

        <!-- Add 05-06-2017 by ms.thuyanit  -->
        <!-- Fee Billing address  -->
        <div class="row">
           <p class="name_row">出展料ご請求先</p>
           <p><input name="dealine_billing" type="text" min="2017-05-01" id="date4" value="<?php echo strtotime($date->dealine_billing)<= strtotime('')?'':$date->dealine_billing; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Dangerous goods included -->
         <div class="row">
           <p class="name_row">危険物持込・裸日仕様許可</p>
           <p><input name="dealine_danger" type="text" min="2017-05-01" id="date5" value="<?php echo strtotime($date->dealine_danger)<= strtotime('')?'':$date->dealine_danger; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Water supply and drainage-->
         <div class="row">
           <p class="name_row">給排水工事許可申請</p>
           <p><input name="dealine_drainage" type="text" min="2017-05-01" id="date6" value="<?php echo strtotime($date->dealine_drainage)<= strtotime('')?'':$date->dealine_drainage; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Gar / air construcion permission-->
         <div class="row">
           <p class="name_row">ガス･エアー工事許可申請</p>
           <p><input name="dealine_gar_air" type="text" min="2017-05-01" id="date7" value="<?php echo strtotime($date->dealine_gar_air)<= strtotime('')?'':$date->dealine_gar_air; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Ceiling structure -->
         <div class="row">
           <p class="name_row">天井構造・バルーン届出</p>
           <p><input name="dealine_ceiling" type="text" min="2017-05-01" id="date8" value="<?php echo strtotime($date->dealine_ceiling)<= strtotime('')?'':$date->dealine_ceiling; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Anchor -->
         <div class="row">
           <p class="name_row">アンカー打設作業承認申請</p>
           <p><input name="dealine_anchor" type="text" min="2017-05-01" id="date9" value="<?php echo strtotime($date->dealine_anchor)<= strtotime('')?'':$date->dealine_anchor; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
        <!-- Foods -->
         <div class="row">
           <p class="name_row">飲食権申込書</p>
           <p><input name="dealine_foods" type="text" min="2017-05-01" id="date10" value="<?php echo strtotime($date->dealine_foods)<= strtotime('')?'':$date->dealine_foods; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
        </div>
       <!--                    End add               -->

       <input type="submit" class="confirm" value="登    録">
    </form>
</div>
<script>
    $(function() 
     {   
        $( "#date1" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date2" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date3" ).datepicker({
            dateFormat:"yy/mm/dd" });
        //Add 05-06-2017 by mss.thuyanit
        $( "#date4" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date5" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date6" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date7" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date8" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date9" ).datepicker({
            dateFormat:"yy/mm/dd" });
        $( "#date10" ).datepicker({
            dateFormat:"yy/mm/dd" });
     });
</script>