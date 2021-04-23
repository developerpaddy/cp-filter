<?php

function cp_filter() {
  $postType = $_POST['type'];
  $tax_term = $_POST['tax_term'];

  $args = [
    'post_type' => 'businesses',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'desc',
  ];

  if(!empty($tax_term)){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'business_categories',
            'field'    => 'slug',
            'terms'    => $tax_term,
        ),
    );
  }

  $ajaxposts = new WP_Query($args);

  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part( 'loop-templates/content-business-archive' );;
    endwhile;
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_cp_filter', 'cp_filter');
add_action('wp_ajax_nopriv_cp_filter', 'cp_filter');