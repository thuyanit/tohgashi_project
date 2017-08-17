<?php
session_start();
?>
<script type="text/javascript">
    $(document).ready(function() {
        // Action add_all
        $("input.add_all").click(function(event) {
            var $size = $("input.product_qty").length;
            var $count = 0;
            // Check quantity of products before add to order
            $("input.product_qty").each(function() {
                // If quantity is Null
                if ($(this).val() < 1) {
                    $count++;
                }
            });
            // All quantity fields is Null
            if ($count == $size) {
                event.preventDefault();
                alert('Please add quantity for products');
            }
        });
        // Action add_product
        $("button.add_product").click(function(event) {
            // Check quantity of this product before add to order
            // If quantity is Null
            if ($(this).parent().parent().find("input.product_qty").val() < 1) {
                event.preventDefault();
                alert('Please add quantity for this product');
            }
        });
    });
</script>
<div id="dashboard">
    <div id="rental_goods">
        <h1>レンタル備品</h1>
        <?php
            if (isset($note)) {
                echo '<h2 style="background: #e6e6e4;padding: 10px;color:#fb3232">'.$note.'</h2>';
            }
        ?>
        <form class="content" action="" method="post">
            <table class="parent">
                <?php
                $listShopId = get_list_equipments();
                foreach ($listShopId as $key => $item) {
                ?>
                <tr id="orders_form<?php echo $key; ?>" class="orders_form">
                    <td class='padding_15 product_img'>
                        <?php
                            $list_img = unserialize($item['item_imgs']);
                            if (!empty($list_img)) {
                                foreach ($list_img as $img) {
                                    ?>
                                    <img src="<?php echo $img; ?>" alt="" style="width:100%; height:auto;">
                                    <input type="hidden" name="product_img<?php echo $key; ?>[]" value="<?php echo $img; ?>" />
                                    <?php
                                }
                            }
                        ?>
                    </td>
                    <td class='padding_15 product_name'>
                        <?php echo $item['item_name']; ?>
                        <input type="hidden" name="product_name<?php echo $key; ?>" value="<?php echo $item['item_name']; ?>" />
                    </td>
                    <td class='specification'>
                        <table class="child">
                            <?php
                                foreach ($item['shop_op'] as $value) {
                                    ?>
                                    <tr class="group_spec">
                                        <td class="padding_15 specification_sp">
                                            <?php echo $value['specification']; ?>
                                            <input type="hidden" name="product_specification<?php echo $value['id']; ?>" value="<?php echo $value['specification']; ?>" />
                                        </td>
                                        <td class="padding_15 gia_sp">
                                            <?php echo '￥'.number_format($value['price']); ?>
                                            <input type="hidden" name="product_price<?php echo $value['id']; ?>" value="<?php echo $value['price']; ?>" />
                                        </td>
                                        <td class="padding_15 nhap_sl">
                                            <?php
                                                // Get cart from session
                                                $qty = '';
                                                if(isset($_SESSION["cart_products"][$location]) && count($_SESSION["cart_products"][$location])>0)
                                                {
                                                    if (isset($_SESSION["cart_products"][$location][$key])
                                                    && key_exists($value['id'], $_SESSION["cart_products"][$location][$key]["product_op"])) {
                                                        $qty = $_SESSION["cart_products"][$location][$key]["product_op"][$value['id']]['product_qty'];
                                                    }
                                                }
                                            ?>
                                            <span>申込数</span><br>
                                            <input type="number" class="product_qty" name="product_qty[<?php echo $value['id']; ?>]" value="<?php echo $qty; ?>" min="1" max="<?php echo $value['quantity_stock']?>">
                                            <input type="hidden" name="qty_stock<?php echo $value['id']; ?>" value="<?php echo $value['quantity_stock']; ?>">
                                        </td>
                                        <td class="padding_15 add_sp">
                                            <input type="hidden" name="group_product_id<?php echo $value['id']; ?>" value="<?php echo $key; ?>" />
                                            <input type="hidden" name="product_ids[]" value="<?php echo $value['id']; ?>" />
                                            <button type="submit" class="add_product" name="add_product" value="<?php echo $value['id']; ?>" >申し込む</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </table>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <input type="submit" name="add_list_products" class="add_all" value="一括申込み" ></input>
        </form>
    </div>
</div>
