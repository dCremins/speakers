<?php
 /*
 Template Name: Single Keynote Speaker
 Template Post Type: speaker
 */
    ?>

 <header class="container">
   <h1>Keynote Speakers</h1>
 </header>

<?php
while (have_posts()) :
            the_post();
        ?>
       <article <?php post_class('container'); ?>>
        <?php
        $session = get_field('session');
        $image = get_field('image');
        $date = get_field('date', $session);
        $eventdate = date("l, M jS", strtotime($date));
        ?>
        <div class="row">
          <div class="speaker-image col-5">
            <img src="<?php echo $image['url']; ?>" alt="<?php the_field('title'); ?>">
          </div>
          <div class="entry-content col">
            <header class="speakers">
             <h2 class="entry-title"> <?php the_title(); ?></h2>
             <h3><?php echo $eventdate . ' ' . get_the_title($session); ?></h3>
             <h4> <?php the_field('title'); ?></h4>
             <p> <a href="<?php the_field('title'); ?>">View Website</a></p>
           </header>
            <?php the_content(); ?>
          </div>
        </div>

        <footer>
          <nav class="post-nav row">
            <div class="previous col"><?php previous_post_link('%link', '<i class="fa fa-arrow-left" aria-hidden="true"></i> Previous'); ?></div>
            <div class="next col"><?php next_post_link('%link', 'Next <i class="fa fa-arrow-right" aria-hidden="true"></i>'); ?></div>
          </nav>
        </footer>
       </article>
        <?php endwhile; ?>
