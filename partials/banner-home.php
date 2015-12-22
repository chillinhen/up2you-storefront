<!-- config Banner -->
<?php
$claim = get_field('claim');
$list = get_field('liste');
$button01 = get_field('button-01');
$button02 = get_field('button-02');
$hero = get_field("hero-shot-image");
?>
<?php if ($hero) : ?>
    <div class="banner" role="banner" style="background-image: url('<?php echo ($hero) ? $hero : ''; ?>');">
        <div class="col-full">
            <?php if ($claim) : ?>
                <h1 class="claim"><?php echo $claim; ?></h1>
                <?php if ($list || $button01 || $button02) : ?>
                    <div class="claim-list">
                        <?php echo $list; ?>

                        <div class="buttongroup">
                            <div class="first-bt">
                                <?php echo $button01; ?>
                            </div>
                            <?php if ($button02) :
                                ?>
                                <span><?php _e('oder', 'storefront'); ?></span>
                                <div class="second-bt">
                                    <?php
                                    echo $button02;

                                endif;
                                ?>  
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>