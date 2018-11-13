<div class="wrap">

    <h2>JJP - Map</h2>

    <form action="" method="post">

        <?php wp_nonce_field('jjp-map-api-key-token'); ?>

        <label for="jjp-map-api-key">Google maps api key:</label>
        <input type="text" id="jjp-map-api-key" name="jjp-map-api-key" style="width: 350px;"
               value="<?php echo esc_attr(get_option('jjp-map-api-key')); ?>"/>

        <input class="button-primary" type="submit" value="Save"/>
    </form>

    <br style="clear: both;">

</div>