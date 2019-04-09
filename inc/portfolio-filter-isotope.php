<?php
/**
 * Utilisation de Isotope pour le portfolio CPT : realisation
 * Pour que le système de filtrage opère via Isotope : Récupérer les slugs des termes de la taxonomie liée au portfolio.
 * http://redvinestudio.com/how-to-build-isotope-portfolio-in-your-wordpress-theme/
 * Ajout des termes de taxonomies dans les classes CSS des éléments du portfolio : les li de chaque images, c'est ce qui permettra à isotope de faire le filtrage en fonction des types. La taxonomie liée au CPT "realisation" est "type"
 */
function pixi_item_portfolio_class( $classes, $class, $id ) {
	$taxonomy = 'type';
	$terms    = get_the_terms( (int) $id, $taxonomy );
	if ( ! empty( $terms ) ) {
		foreach ( (array) $terms as $order => $term ) {
			if ( ! in_array( $term->slug, $classes ) ) {
				$classes[] = $term->slug;
			}
		}
	}
	return $classes;
}
add_filter( 'post_class', 'pixi_item_portfolio_class', 10, 3 );
