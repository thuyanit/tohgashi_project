<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div id="dashboard">
    <form id="setup_dealine" name="setup_dealine" action="" method="post">
       <div class="row">
           <p class="name_row">基本申込有効期限</p>
           <p><input name="dealine_all" type="text" min="2017-05-01" id="date1" value="<?php echo $date->dealine_all; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
       </div>
       <div class="row">
           <p class="name_row">工事・各種申請申込期限</p>
           <p><input name="dealine_billing" type="text" min="2017-05-01" id="date2" value="<?php echo $date->dealine_billing; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
       </div>
       <div class="row">
           <p class="name_row">レンタル備品申込期限 </p>
           <p><input name="dealine_goods" type="text" min="2017-05-01" id="date3" value="<?php echo $date->dealine_goods; ?>"/></p>
           <p>YYYY/MM/DDDD</p>
       </div>
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
     });
</script>