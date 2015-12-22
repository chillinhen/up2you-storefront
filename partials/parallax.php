<?php
$frage = get_field("frage");
$url = get_field("hintergrundbild");
$post = get_field("post");
?>
<?php if ($url) : ?>
    <div id="cta-anchor" class="parallax" style="background-image: url('<?php echo ($url) ? $url : ''; ?>');">
        <div class="col-full">
            <?php if ($frage) : ?>
                <h2 class="claim"><?php echo $frage; ?></h2>
            <?php endif; ?>
            <?php
            if ($post) :
                setup_postdata($post);
                get_template_part('partials/form');
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php endif; ?>
