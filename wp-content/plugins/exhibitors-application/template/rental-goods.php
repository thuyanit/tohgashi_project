<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<div id="dashboard">
    <div id="rental_goods">
        <h1>レンタル備品</h1>
        <form class="content" action="">
            <div class="goods">
                <p class="col thumbnail">
                    <img src="<?php echo plugins_url('exhibitors-application/images/thumbnail.png'); ?>"><br>
                    <img src="<?php echo plugins_url('exhibitors-application/images/thumbnail2.png'); ?>"><br>
                    <img src="<?php echo plugins_url('exhibitors-application/images/thumbnail.png'); ?>"><br>
                </p>
                <p class="col name_goods">受付カウンター</p>
                <p class="col thongso">W900×D450×H800</p>
                <p class="col price">￥6,000</p>
                <p class="col qty"><span>申込数</span><br><input type="number" name="number"></p>
                <p class="col btn"><input type="submit" name="add_to_card" value="申し込む"/></p>
            </div>
            <div class="goods">
                <p class="col thumbnail">
                    <img src="<?php echo plugins_url('exhibitors-application/images/thumbnail.png'); ?>">
                </p>
                <p class="col name_goods">受付カウンター</p>
                <p class="col thongso">W900×D450×H800</p>
                <p class="col price">￥6,000</p>
                <p class="col qty"><span>申込数</span><br><input type="number" name="number"></p>
                <p class="col btn"><input type="submit" name="add_to_card" value="申し込む"/></p>
            </div>
            <div class="goods">
                <p class="col thumbnail">
                    <img src="<?php echo plugins_url('exhibitors-application/images/thumbnail.png'); ?>">
                </p>
                <p class="col name_goods">受付カウンター</p>
                <p class="col thongso">W900×D450×H800</p>
                <p class="col price">￥6,000</p>
                <p class="col qty"><span>申込数</span><br><input type="number" name="number"></p>
                <p class="col btn"><input type="submit" name="add_to_card" value="申し込む"/></p>
            </div>
            <input type="submit" name="add_to_card_all" class="add_all" value="一括申込み"/>
        </form>
    </div>
</div>