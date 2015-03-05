<?php
    //image attribution
    if( get_field( 'quan_img_license_url' ) || get_field( 'quan_img_license_name' ) || get_field( 'quan_img_url' ) || get_field( 'quan_img_name' ) ) :
?>
    <div class="attribution">
        IMG:
        <?php if( get_field( 'quan_img_url' ) ) : ?>
            <a href="<?= get_field( 'quan_img_url' ); ?>" target="_blank"><span><?= get_field( 'quan_img_name' ); ?></span></a>
        <?php endif; ?>
        <?php 
            if( get_field( 'quan_img_license_url' ) && get_field( 'quan_img_license_name' ) ) : 
                if( in_array( get_field( 'quan_img_license_name' ), array( 'cc', 'CC', 'CreativeCommons', 'Creative Commons', 'creative commons', 'creativecommons' ) ) ) {
                    $anchor = '<img src="' . get_stylesheet_directory_uri() . '/images/cc.png' . '" alt="cc" class="cc" />';
                } else {
                    $anchor = '<span>' . get_field( 'quan_img_license_name' ) . '</span>';
                }
        ?>
            <a href="<?= get_field( 'quan_img_license_url' ); ?>" target="_blank" class="license"><?= $anchor; ?></a>
        <?php endif; ?>
    </div>
<?php endif ?>
