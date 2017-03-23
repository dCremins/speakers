<?php

namespace Speaker\Widget;

class SpeakerWidget extends \WP_Widget
{
// constructor
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'SpeakerWidget',
            'description' => 'Speakers Widget'
        );

        parent::__construct('SpeakerWidget', 'Speakers Widget', $widget_details);
    }

// widget form creation
    public function form($instance)
    {
// Backend Form
        $title = (isset($instance['title'])) ? $instance['title'] : 'Speakers';
        $link = (isset($instance['link'])) ? $instance['link'] : '/speaker'; ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link to Speaker Page:'); ?></label>
          <input class="widefat" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>
    <?php
    } //End Form

// widget update
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
        return $instance;
    } //End Update

// widget display
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $link = $instance['link'];
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            if (!empty($link)) {
                echo '<a href="' . $link . '">';
            }
            if (is_front_page()) {
                echo '<h4 class="homepage">' . $title . '</h4>';
            } else {
                echo '<h5>' . $title . '</h5>';
            }
            if (!empty($link)) {
                echo '</a>';
            }
        }

        $the_query = new \WP_Query(array(
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
                <div class="row">
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
        ?>


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
                                <h4> <?php the_title(); ?></h4>
                                <h5><?php echo $eventdate . ' ' . $session; ?></h5>
                                <h6> <?php the_field('title'); ?></h6>
                            </header>
                        </div>
                      </div>
                    </article>
        <?php
            endwhile; ?>
                </div>
            </div>
        <?php
        endif;


        echo $args['after_widget'];
    } //widget end
} //class end

// register widget
add_action('widgets_init', function () {
    register_widget(__NAMESPACE__ . '\\SpeakerWidget');
});
