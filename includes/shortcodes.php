<?php

add_action( 'init', 'cp_filter_add_custom_shortcode' );
 
function cp_filter_add_custom_shortcode() {
    add_shortcode( 'cp_fiter_form', 'cp_filter_form' );
}

function cp_filter_form($atts){
    $atts = shortcode_atts( array(
        'post_type' => 'post',
    ), $atts, 'cp_filter_form' );

    ?>

    <?php $categories = cp_filter_get_taxonomy('business_categories'); ?>

    <?php ob_start(); ?>

    <ul class="cp-cat-list">
    <li><a class="cp-cat-list_item active" href="#!" data-slug="">All</a></li>
    
    <?php foreach($categories as $category) : ?>
        <li>
        <a class="cp-cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
            <?= $category->name; ?>
        </a>
        </li>
    <?php endforeach; ?>
    </ul>

    <?php 
    
    $form = ob_get_clean(); 

    return $form;
}
