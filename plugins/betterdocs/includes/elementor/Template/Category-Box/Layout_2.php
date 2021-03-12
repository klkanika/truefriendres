<?php

/**
 * Template Name: Layout 2
 *
 */

if ($default_multiple_kb) {
    if(!empty($settings['selected_knowledge_base'])){
        $button_link = str_replace('%knowledge_base%', $settings['selected_knowledge_base'], get_term_link($term->slug, 'doc_category'));
    }else{
        $button_link = str_replace('%knowledge_base%', 'non-knowledgebase', get_term_link($term->slug, 'doc_category'));
    }
} else {
    $button_link = get_term_link($term->slug, 'doc_category');
}

echo '<a href="' . $button_link . '" class="el-betterdocs-category-box-post layout__2">';
echo '<div class="el-betterdocs-cb-inner">';

if ($settings['show_icon']) {
    $cat_icon_id = get_term_meta($term->term_id, 'doc_category_image-id', true);

    if ($cat_icon_id) {
        $cat_icon = wp_get_attachment_image($cat_icon_id, 'thumbnail', ['alt' => esc_attr(get_post_meta($cat_icon_id, '_wp_attachment_image_alt', true))]);
    } else {
        $cat_icon = '<img src="' . BETTERDOCS_ADMIN_URL . 'assets/img/betterdocs-cat-icon.svg" alt="betterdocs-category-box-icon">';
    }

    echo '<div class="el-betterdocs-cb-cat-icon__layout-2">' . $cat_icon . '</div>';
}

if ($settings['show_title']) {
    echo '<' . $settings['title_tag'] . ' class="el-betterdocs-cb-cat-title__layout-2"><span>' . $term->name . '</span></' . $settings['title_tag'] . '>';
}

if ($settings['show_count']) {
    printf('<div class="el-betterdocs-cb-cat-count__layout-2"><span class="count-inner__layout-2">%s</span></div>', BetterDocs_Elementor::get_doc_post_count($term->count, $term->term_id));
}

echo '</div>';
echo '</a>';
