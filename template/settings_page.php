<form method="post">
<?php
settings_fields("my-section-bla");
do_settings_sections("theme-options");
?>
<div>
    <h2>Woo Show Items</h2>

    <div>
        <label>
            <input type="checkbox" name="show_single_product_price" value="1"
                <?php checked(1, $show_single_product_price); ?>>
            Hide single product price
        </label>
    </div>
</div>
<?php submit_button();?>
</form>
