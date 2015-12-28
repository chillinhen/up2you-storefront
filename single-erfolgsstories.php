<?php
/**
 * @package storefront
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
<?php
$phasen = array();
for ($label = 1; $label <= 3; $label++) :
    $phasen[] = get_field('phase_' . $label);
endfor;

$fazit = get_field('fazit');
$tabelle = get_field('vergleichstabelle');
$name = get_field("name");
$weitereInfos = get_field("weitere_infos");
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
    <header class="full-size-bar" id="message-01">
        <div class="col-full">
            <h1><?php the_title(); ?></h1>
            <h2><?php if (get_field('subheadline')) : echo the_field('subheadline');
endif;
?></h2>
        </div>
    </header>
    <section class="col-full">
         <?php if (has_post_thumbnail()) : ?>
            <aside class="thumbnail">
                <?php the_post_thumbnail(); ?>
            </aside>
        <?php endif; ?>
        <div class="post_content"><?php the_content(); ?></div>
    </section>
    <!-- Phasen -->
    <section class="infos col-full">
        <div id="tabbed" class="col-left">
            <ul id="tabs">
                <?php for ($label = 1; $label <= 3; $label++) : ?>
                    <li><h3>Phase <?php echo $label; ?></h3></li>
                <?php endfor; ?>
            </ul> 
            <ul id="tab">
                <?php
                foreach ($phasen as $post) :
                    if ($post) : endif;
                    ?>
                    <li>  <?php echo $post; ?></li>
                <?php endforeach;
                ?>
                
            </ul>
        </div>
        <?php if ($tabelle) : ?>
            <div class="col-right">               
                <?php echo $tabelle; ?>
                <?php if ($name) : ?>
                <p class="name"><?php echo $name; ?></p>
                <?php endif; ?>
                <?php if ($weitereInfos) : ?>
                <em><?php echo $weitereInfos; ?></em>
                <?php endif; ?>
            </div>
        <?php endif; ?> 
    </section>
    <?php if ($fazit) : ?>
        <section class="fazit col-full">

            <h3>Fazit</h3>
            <?php echo $fazit; ?>

        </section>
    <?php endif; ?>
    <!-- Tabelle -->



    <?php #if (get_field('phase_1')) : echo the_field('phase_1'); endif; ?>
</article>
<?php endwhile; // end of the loop.   ?>
<?php do_action('storefront_sidebar'); ?>
<?php get_footer(); ?>