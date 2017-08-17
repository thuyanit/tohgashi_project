<?php
session_start();
?>
<div id="dashboard">
    <div id="rental_goods">
        <h1>レンタル備品</h1>
        <?php
        if(isset($_SESSION["cart_products"][$location]) && count($_SESSION["cart_products"][$location]) > 0)
        {
        ?>
        <h2>お申込み内容確認</h2>
        <div class="confirm_info">
            以下のお申込み内容でよろしければ、「申込む」ボタンをクリックしてください。<br />
            お申込みと同時にご担当者様宛に、お申込み内容確認メールを送信いたします。
        </div>
        <form class="content" action="" method="post">
            <table class="parent" style="font-weight:bold;">
                <tr>
                    <td class='padding_15 product_img' style="width: 140px;">画像登録</td>
                    <td class='padding_15 product_name'>レンタル備品名</td>
                    <td class='specification'>
                        <table class="child" style="table-layout: fixed;">
                            <tr class="group_spec">
                                <td class="padding_15 specification_sp">仕様</td>
                                <td class="padding_15 gia_sp">金額</td>
                                <td class="padding_15 nhap_sl">備品番号</td>
                                <td class="padding_15 subtotal" style="width:100px;">小計</td>
                                <td class="padding_15 add_sp" style="width:100px;">削除</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="parent">
                <?php
                $total = 0;
            	foreach ($_SESSION["cart_products"][$location] as $key => $cart_itm) {
                ?>
                <tr id="orders_form<?php echo $key; ?>" class="orders_form">
                    <td class='padding_15 product_img'>
                        <?php
                        if (is_array($cart_itm['product_img'])) {
                            foreach ($cart_itm['product_img'] as $img) {
                               ?>
                               <img src="<?php echo $img; ?>" alt="" >
                               <?php
                           }
                        }
                        ?>
                    </td>
                    <td class='padding_15 product_name'>
                        <?php echo $cart_itm['product_name']; ?>
                    </td>
                    <td class='specification'>
                        <table class="child" style="table-layout: fixed;">
                            <?php
                                if (is_array($cart_itm['product_op'])) {
                                    foreach ($cart_itm['product_op'] as $product_id => $item) {
                                        $subtotal = $item['product_price'] * $item['product_qty'];
                                       	$total = $total + $subtotal;
                                        ?>
                                        <tr class="group_spec">
                                            <td class="padding_15 specification_sp">
                                                <?php echo $item['product_specification']; ?>
                                            </td>
                                            <td class="padding_15 gia_sp">
                                                <?php echo '￥'.number_format($item['product_price']); ?>
                                            </td>
                                            <td class="padding_15 nhap_sl">
                                                <input type="number" class="product_qty" name="product_qty[<?php echo $key; ?>][<?php echo $product_id; ?>]" value="<?php echo $item['product_qty']; ?>" min="1" max="<?php echo $item['qty_stock']?>">
                                            </td>
                                            <td class="padding_15 subtotal" style="width:100px;">
                                                <?php echo '￥'.number_format($subtotal); ?>
                                            </td>
                                            <td class="padding_15 add_sp" style="width:100px;">
                                                <input type="checkbox" name="remove_code[<?php echo $key; ?>][]" value="<?php echo $product_id; ?>" />
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="total">
                <?php echo '<span>合計金額</span><span style="font-size: 24px;color: #e74c3c;">'.number_format($total).'円</span>（税抜）'; ?>
                <input type="hidden" name="total_price" value="<?php echo $total; ?>" />
            </div>
            <div class="group_btn">
                <input type="submit" name="back_order" value="備品を追加する" class="add_all"></input>
                <input type="submit" name="update_cart" value="更新" class="add_all"></input>
                <input type="submit" name="save_order" value="申し込む" class="add_all"></input>
            </div>
        </form>
        <?php
        } else {
            ?>
            <div class="confirm_info">
                申込み内容はありません
            </div>
            <form class="content" action="" method="post">
                <div class="group_btn">
                    <input type="submit" name="back_order" value="レンタル備品一覧へ" class="add_all"></input>
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</div>
