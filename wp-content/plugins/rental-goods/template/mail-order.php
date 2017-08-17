<div style="color:#34495e;">
    <header style="width: 1000px; margin:32px auto 40px;">
        <img src="<?php echo plugin_dir_url(__FILE__);?>images/logo.jpg" alt="">
    </header>
    <div style="font-size: 20px;font-weight: 600;margin: 10px auto;">レンタル備品の確認</div>
    <table style="border:1px solid #dee1e2;border-collapse:collapse;font-size:14px;width: 1000px;table-layout:fixed;font-weight: bold;">
        <tr>
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;width:20px">No.</td>
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;width:150px">レンタル備品名</td>
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;">
                <table style="border-collapse:collapse;width: 100%;table-layout:fixed">
                    <tr >
                        <td style="width:45%">仕様</td>
                        <td style="width:20%">金額</td>
                        <td style="width:15%">備品番号</td>
                        <td style="width:20%">小計</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table style="border:1px solid #dee1e2;border-collapse:collapse;font-size:14px;width: 1000px;table-layout:fixed">
        <?php
        $total = 0;
        $number = 1;
    	foreach ($_SESSION["cart_products"][$location] as $key => $cart_itm) {
        ?>
        <tr >
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;width:20px">
                <?php
                    echo $number ++;
                ?>
            </td>
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;width:150px">
                <?php echo $cart_itm['product_name']; ?>
            </td>
            <td style="border:1px solid #dee1e2;text-align: center;padding: 10px 5px;">
                <table style="border-collapse:collapse;width: 100%;table-layout:fixed">
                    <?php
                        if (is_array($cart_itm['product_op'])) {
                            $first_product_op = key($cart_itm['product_op']);
                            foreach ($cart_itm['product_op'] as $product_id => $item) {
                                $subtotal = $item['product_price'] * $item['product_qty'];
                               	$total = $total + $subtotal;
                                $style = '';
                                if ($first_product_op != $product_id) {
                                    $style = 'style="border-top: 1px solid #dee1e2"';
                                }
                                ?>
                                <tr <?php echo $style; ?> >
                                    <td style="width:45%">
                                        <?php echo $item['product_specification']; ?>
                                    </td>
                                    <td style="width:20%">
                                        <?php echo '￥'.number_format($item['product_price']); ?>
                                    </td>
                                    <td style="width:15%">
                                        <?php echo $item['product_qty']; ?>
                                    </td>
                                    <td style="width:20%">
                                        <?php echo '￥'.number_format($subtotal); ?>
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
    <div style="font-size:18px; font-weight:bold;text-align:right; margin:20px 0;width:1000px">
        <?php echo '<span style="margin-right:20px;">合計金額</span><span style="font-size: 24px;color: #e74c3c;">'.number_format($total).'円</span>（税抜）'; ?>
    </div>
</div>
