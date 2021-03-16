<?php
class SupplierType
{
    var $name;
    var $slug;
    var $link;
    var $featuredImage;
    var $supplierTypeCount;

    public static function getSupplierTypes($postsPerPage)
    {
        $terms = get_terms(array(
            'taxonomy' => 'suppliertypes',
            'hide_empty' => false,
            'orderby' => 'count',
            'order' => 'DESC'
        ));
        $countTerms = 0;
        $supplierTypes = [];
        if ($terms) {
            $count = 0;
            
            foreach ($terms as $term) {
                if ($count < $postsPerPage) {
                    $supplierType = new SupplierType();
                    $supplierType->name = $term->name;
                    $supplierType->slug = $term->slug;
                    $supplierType->link = get_site_url() . '/supplier-hub?type=' . $term->term_id;
                    $supplierType->featuredImage = get_field('pictureUrl', $term) ? get_field('pictureUrl', $term) : get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
                    $supplierType->supplierTypeCount = $term->count ? $term->count : 0;
                    if($term->count)
                        $countTerms++;
                    array_push($supplierTypes, $supplierType);
                    $count++;
                } else {
                    break;
                }
            }
        }

        return
            json_decode('{
                "supplierTypes" : ' . json_encode($supplierTypes) . ',' .
                '"posts_count" : ' .  $countTerms .
                '}');
    }
}
