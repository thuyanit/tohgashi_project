<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('admin-application/css/style.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="dashboard">
    <div class="register_amenity_goods">
        <h2 class="title">レンタル備品 登録</h2>
        <form class="form_register_amenity_goods" enctype="multipart/form-data" action="" method="post">
            <!--<div class="input_form">-->
            <!--    <label for="">備品番号</label>-->
            <!--    <div class="input">-->
            <!--        <input type="number" name="item_number" value="<?php //echo $items->item_number ?>">-->
            <!--        <span>半角英数字</span>-->
            <!--    </div>-->
            <!--</div>-->
            <?php
            // echo "<pre>";
            // print_r($items);
            // echo "</pre>";
            ?>
            
            
               
            <?php if(count($items_op) !=0){?> 
            <div class="input_form">
                <label for="">備品名</label>
                <div class="input">
                    <input type="text" name="item_name" value="<?php echo $items->item_name ?>">
                </div>
            </div>
            <div class="input_form">
                <label for="">仕様</label>
                <div class="input" data-role="dynamic-fields">
                    <?php foreach($items->items_op as $op): ?>
                    <div class="form-inline">
                        <input type="text" class="form-control" name="quantity_stock[]" id="field-name" placeholder="備品番号" value="<?php echo $op->quantity_stock ?>">
                        <input type="text" class="form-control" name="specification[]" id="field-name" placeholder="仕様" value="<?php echo $op->specification ?>">
                        <input type="text" class="form-control" name="gia[]" id="field-name" placeholder="価格" value="<?php echo $op->price ?>">
                        <select name="check[]">
                            <option value="1" <?php echo ($op->status==1)?'selected':''; ?> >公開</option>
                            <option value="0" <?php echo ($op->status==0)?'selected':''; ?> >非公開</option>
                        </select>
                        <button class="bodi" data-role="remove"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <button class="themzo" data-role="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php } 
            else{?>
            <!-- Add by ms.thuyanit -->
            <input type="hidden" value="no_spec" id="chk_addition">
            <div class="input_form">
                <label for="">備品名</label>
                <div class="input">
                    <input type="text" name="item_name" value="<?php echo $items->item_name ?>">
                    <a class="add_spec"><i class="fa fa-plus" aria-hidden="true"></i>仕様</a>
                    <a class="sub_spec"><i class="fa fa-minus" aria-hidden="true"></i>仕様</a>
                </div>
            </div>
			<div class="input_form input_price_item">
			    <label for="">価格</label>
			    <div class="input">
			        <input type="text" name="item_price" value="<?php echo $items->item_price ?>">
			    </div>
			</div>
			<div class="input_form input_number_item">
			    <label for="">備品番号</label>
			    <div class="input">
			        <input type="text" name="item_number" value="<?php echo $items->item_number ?>">
			    </div>
			</div>
			<!--End add -->
			 <div class="input_form frame_spec">
                <label for="">仕様</label>
                <div class="input" data-role="dynamic-fields">
                    <div class="form-inline">
                        <input type="text" class="form-control" name="quantity_stock[]" id="field-name" placeholder="備品番号" value="">
                        <input type="text" class="form-control" name="specification[]" id="field-name" placeholder="仕様" value="">
                        <input type="text" class="form-control" name="gia[]" id="field-name" placeholder="価格" value="">
                        <select name="check[]">
                            <option value="1">公開</option>
                            <option value="0">非公開</option>
                        </select>
                        <button class="bodi" data-role="remove"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <button class="themzo" data-role="add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <?php }?>
            
            
            <!-- <div class="input_form">
                <label for="">価格 </label>
                <div class="input">
                    <input type="text" name="rental_price" value="">
                    <span>円</span>
                </div>
            </div> -->
            <div class="input_form">
                <label for="">画像登録</label>
                <div class="input" id="output_img">
                    <p><span id="upload_button">ファイルを参照</span></p>

                    <?php foreach($items->item_imgs as $img): ?>
                    <p><input class="input_image" name="file_image[]" value="<?php echo $img ?>" readonly=""></p>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="input_form">
                <label for="">公開設定</label>
                <div class="input group_publish">
                    <input type="radio" name="publish" value="1" <?php echo ($items->status==1)?'checked':'' ?> id="chk1"><label for="chk1"><span></span>公開　</label>
                    <input type="radio" name="publish" value="0" <?php echo ($items->status==0)?'checked':'' ?> id="chk2"><label for="chk2"><span></span>非公開　</label>
                </div>
            </div>
            <hr noshade="" size="1px" color="#dee1e2">
            <div class="button_group">
            <input type="submit" value="Update" name="update" class="registration">
            </div>
        </form>
        
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
  var mediaUploader;
  $('#upload_button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    //Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: true, });

    // When a file is selected, grab the URL and set it as the text field's value
    // mediaUploader.on('select', function() {
    //   attachment = mediaUploader.state().get('selection').first().toJSON();
    //   $('#image-url').val(attachment.url);
    // });

    mediaUploader.on('select', function() {
        var selection = mediaUploader.state().get('selection');
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            $("#output_img").append("<p><input class='input_image' name='file_image[]' value="+attachment.url+" readonly /></p>");
        });
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
});
</script>

<script type="text/javascript">
$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
});
</script>
<script type="text/javascript">
$(".frame_spec").hide();
$(".sub_spec").hide();
$(".add_spec").click(function(){
    $(".frame_spec").show();
    $(".input_price_item").hide();
    $(".input_number_item").hide();
    $("input[name='item_price']").val('');
    $("input[name='item_number']").val('');
    $(".sub_spec").show();
    $(".add_spec").hide();
    $("#chk_addition").val('have_spec');

});
$(".sub_spec").click(function(){
    $(".frame_spec").hide();
    $(".input_price_item").show();
    $(".input_number_item").show();
    $(".add_spec").show();
    $(".sub_spec").hide();
    $(".frame_spec input[name='quantity_stock[]']").val('');
    $(".frame_spec input[name='specification[]']").val('');
    $(".frame_spec input[name='gia[]']").val('');
    $(".frame_spec select[name='check[]']").val('1');
    $("#chk_addition").val('no_spec');
});

</script>
<script type="text/javascript">
//Check validate post Product
$( document ).ready(function() {
    $(".registration").click(function(e){
        e.preventDefault();
        var item_name= $("input[name=item_name]").val();
        var item_number= $("input[name=item_number]").val();
        var item_price= $("input[name=item_price]").val();
        var quantity_stock=$("input[name='quantity_stock[]']").val();
        var specification=$("input[name='specification[]']").val();
        var gia=$("input[name='gia[]']").val();
        var chk_addition=$("#chk_addition").val();
        if(chk_addition=='no_spec'){
            if(item_name==''||item_price==''||((/^[0-9-()+]+$/.test(item_price)) == false)||item_number==''||((/^[0-9-()+]+$/.test(item_number)) == false)){
                if(item_name==''){
                    $("input[name=item_name]").css("background","#ffd6d6");
                }
                else{
                    $("input[name=item_name]").css("background","#fff");
                }
                if(item_price==''||((/^[0-9-()+]+$/.test(item_price)) == false)){
                    $("input[name=item_price]").css("background","#ffd6d6");
                }
                else{
                    $("input[name=item_price]").css("background","#fff");
                }
                if(item_number==''||((/^[0-9-()+]+$/.test(item_number)) == false)){
                    $("input[name=item_number]").css("background","#ffd6d6");
                }
                else{
                    $("input[name=item_number]").css("background","#fff");
                }
            }
            else{
                $('form').submit();
            }
        }
        else{
            if(item_name==''||specification==''||quantity_stock==''||((/^[0-9-()+]+$/.test(quantity_stock)) == false)||gia==''||((/^[0-9-()+]+$/.test(gia)) == false)){
                if(item_name==''){
                    $("input[name=item_name]").css("background","#ffd6d6");
                }
                else{
                    $("input[name=item_name]").css("background","#fff");
                }
                if(quantity_stock==''||((/^[0-9-()+]+$/.test(quantity_stock)) == false)){
                    $("input[name='quantity_stock[]']").css("background","#ffd6d6");
                }
                else{
                    $("input[name='quantity_stock[]']").css("background","#fff");
                }
                if(specification==''){
                    $("input[name='specification[]']").css("background","#ffd6d6");
                }
                else{
                    $("input[name='specification[]']").css("background","#fff");
                }
                if(gia==''||((/^[0-9-()+]+$/.test(gia)) == false)){
                    $("input[name='gia[]']").css("background","#ffd6d6");
                }
                else{
                    $("input[name='gia[]']").css("background","#fff");
                }
            }
            else{
                $('form').submit();
            }
        }
        return false;
    });
}); 

//});
</script>

