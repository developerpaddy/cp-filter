<?php

function cp_filter_get_taxonomy($tax_slug){

    $taxonomies = get_terms( array(
        'taxonomy' => $tax_slug,
        'hide_empty' => false
    ) );

    foreach($taxonomies as $taxonomy){
        $tax[$taxonomy->term_id] = $taxonomy->name;
    }

    return $taxonomies;
}