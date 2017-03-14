<?php
 /*
 Template Name: Single Keynote Speaker
 Template Post Type: speaker
 */
while (have_posts()) :
            the_post();
        ?>
       <article <?php post_class(); ?>>
        <?php
        $session = get_field('session');
        ?>
         <header>
          <h1 class="entry-title"> <?php the_title(); ?></h1>
          <h2><?php echo var_dump($session); ?></h2>
        </header>
        <div class="row">
          <div class="entry-content col">
            <?php

            ?>
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
