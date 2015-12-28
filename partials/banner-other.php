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
        <div class="overlay"> </div>
        <div class="col-full">
            <?php if ($claim) : ?>
                <h1 class="claim"><?php echo $claim; ?></h1>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>