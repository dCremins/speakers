<?php
 /*
 Template Name: Keynote Speakers Archive
 Template Post Type: sponsors
 */
    ?>
<header class="container">
    <h1 class="page-title">Keynote Speakers</h1>
</header>

<?php
    $the_query = new WP_Query(array(
      'post_type'         => 'speaker',
      'posts_per_page'    => -1,
      'order'             => 'ASC',
      'orderby'           => 'meta_value',
      'meta_key'          => 'session',
      'meta_type'         => 'DATETIME'
    ));

    if ($the_query->have_posts()) :
        ?>
        <div class="container">
        <?php
        while ($the_query->have_posts()) :
            $the_query->the_post();
    ?>

        <div class="row">
            <?php
            $session = get_field('session_title');
            $image = get_field('image');
            $date = get_field('session');
            $eventdate = date("l, M jS", strtotime($date));
            ?>
              <article <?php post_class('container col'); ?>>
                <div class="row">
                  <div class="speaker-link">
                    <a href="<?php the_permalink(); ?>"><span class="sr-only">Link to biographical information for this speaker</span></a>
                </div>
                  <div class="archive-speaker-image accent background">
                      <span class="speaker-view-more accent color inverse">View More</span>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo get_the_title() . ' - ' . get_field('title'); ?>">
                    </div>
                    <div class="entry-content col speakers">
                            <h2> <?php the_title(); ?></h2>
                            <h3><?php echo $eventdate . ' ' . $session; ?></h3>
                            <h4> <?php the_field('title'); ?></h4>
                            <p><?php the_excerpt(); ?></p>
                    </div>
                  </div>
                </article>
                    </div>
    <?php
        endwhile; ?>
        </div>
    <?php
    endif;?>
