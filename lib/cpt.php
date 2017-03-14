<?php

namespace Speaker\CPT;

function speaker_post_type()
{
    register_post_type('speaker', [
    'labels'        => [
      'name'                => __('Keynote Speakers'),
      'singular_name'       => __('Keynote Speaker'),
      'add_new'             => __('Add New'),
      'add_new_item'        => __('Add New Keynote Speaker'),
      'new_item'            => __('New Keynote Speaker'),
      'edit_item'           => __('Edit Keynote Speaker'),
      'view_item'           => __('View Keynote Speaker'),
      'all_items'           => __('All Keynote Speakers'),
      'search_items'        => __('Search Keynote Speakers'),
      'parent_item_colon'   => __('Parent Keynote Speaker'),
      'not_found'           => __('No Keynote Speaker found.'),
      'not_found_in_trash'  => __('No Keynote Speaker found in Trash.'),
    ],
    'public'        => true,
    'query_var'     => true,
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-megaphone',
    'supports'      => array('title', 'editor'),

    ]);
}

add_action('init', __NAMESPACE__ . '\\speaker_post_type');
