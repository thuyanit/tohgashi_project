<div id="dashboard">
    <div id="rental_goods">
        <h1>注文書</h1>
        <table class="parent" style="font-weight:bold;">
            <tr>
                <td class='padding_15 product_img'>画像登録</td>
                <td class='padding_15 product_name'>レンタル備品名</td>
                <td class='specification'>
                    <table class="child">
                        <tr class="group_spec">
                            <td class="padding_15 specification_sp">仕様</td>
                            <td class="padding_15 gia_sp">金額</td>
                            <td class="padding_15 nhap_sl">備品番号</td>
                            <td class="padding_15 subtotal">小計</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="parent">
            <?php
            // Get order detail
			$list_products = get_order_detail($order_detail->id);
            $list_products_format = [];
        	foreach ($list_products as $k => $item) {
                $item = (array) $item;
                if (!isset($list_products_format[$item['id']]['product_detail'])) {
                    $list_products_format[$item['id']]['product_detail'] = json_decode($item['product_detail'], true);
                }
                $list_products_format[$item['id']]['product_spec_detail'][] = json_decode($item['product_spec_detail'], true);
        	}
            foreach ($list_products_format as $key => $item) {
            ?>
            <tr id="orders_form<?php echo $key; ?>" class="orders_form">
                <td class='padding_15 product_img'>
                    <?php
                        $list_img = $item['product_detail']['product_img'];
                        if (!empty($list_img)) {
                            foreach ($list_img as $img) {
                                ?>
                                <img src="<?php echo $img; ?>" alt="" style="width:100%; height:auto;">
                                <?php
                            }
                        }
                    ?>
                </td>
                <td class='padding_15 product_name'>
                    <?php echo $item['product_detail']['product_name']; ?>
                </td>
                <td class='specification'>
                    <table class="child">
                        <?php
                            foreach ($item['product_spec_detail'] as $value) {
                                ?>
                                <tr class="group_spec">
                                    <td class="padding_15 specification_sp">
                                        <?php echo $value['product_specification']; ?>
                                    </td>
                                    <td class="padding_15 gia_sp">
                                        <?php echo '￥'.number_format($value['product_price']); ?>
                                    </td>
                                    <td class="padding_15 nhap_sl">
                                        <?php echo $value['product_qty']; ?>
                                    </td>
                                    <td class="padding_15 subtotal">
                                        <?php
                                            $subtotal = $value['product_price'] * $value['product_qty'];
                                            echo '￥'.number_format($subtotal);
                                        ?>
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
        <div class="total">
            <?php echo '<span>合計金額</span><span style="font-size: 24px;color: #e74c3c;">'.number_format($order_detail->total_price).'円</span>（税抜）'; ?>
        </div>
    </div>
</div>
