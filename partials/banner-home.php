<!-- config Banner -->
<?php
$claim = get_field('claim');
$list = get_field('liste');
$button01 = get_field('button-01');
$button02 = get_field('button-02');
?>
<?php if ($claim) : ?>
    <h1 class="claim"><?php echo $claim; ?></h1>
        <?php if ($list || $button01 || $button02) : ?>
    <div class="claim-list">
                <?php echo $list; ?>

                <div class="buttongroup">
                    <?php
                    echo $button01;
                    if ($button02) :
                        ?>
                        <span><?php _e('oder', 'storefront'); ?></span>
                        <?php
                        echo $button02;
                    endif;
                    ?>  
                </div>
            </div>
    <?php endif; ?>
<?php endif; ?>