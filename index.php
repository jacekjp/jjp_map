<div class="wrap">

    <h2>JJP - Map</h2>

    <div>
        <form action="" method="post">
            <input type ="hidden" name="form_name" value ="api-key"/>
            <?php wp_nonce_field('jjp-map-api-key-token'); ?>

            <label for="jjp-map-api-key">Google maps api key:</label>
            <input type="text" id="jjp-map-api-key" name="jjp-map-api-key" style="width: 350px;"
                   value="<?php echo esc_attr(get_option('jjp-map-api-key')); ?>"/>

            <input class="button-primary" type="submit" value="Save"/>
        </form>
    </div>

    <div>
        <h3>Settings:</h3>
        <form action="" method="post">
            <input type ="hidden" name="form_name" value ="settings"/>
            <?php wp_nonce_field('jjp-map-settings-token'); ?>

            <p>
                <label for="jjp-map-width">Width:</label>
                <input type="text" id="jjp-map-width" name="jjp-map-width" style="width: 60px;"
                       value="<?php echo esc_attr(get_option('jjp-map-width')); ?>"/>
            </p>
            <p>
                <label for="jjp-map-height">Height:</label>
                <input type="text" id="jjp-map-height" name="jjp-map-height" style="width: 60px;"
                       value="<?php echo esc_attr(get_option('jjp-map-height')); ?>"/>
            </p>
            <p>
                <input class="button-primary" type="submit" value="Save"/>
            </p>

        </form>
    </div>

    <div>
        <h3>Tracks:</h3>
        <form action="" method="post">
            <input type ="hidden" name="form_name" value ="tracks"/>
            <?php wp_nonce_field('jjp-map-tracks-token'); ?>

            //TODO adding track form

        </form>

        <div>

            //TODO tracks list

        </div>
    </div>

    <br style="clear: both;">

</div>