<?php
/**
 * The template for displaying archive page for CPT Realisation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Twentythirteen-child
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-meta">', '</div>' );
				?>
			</header><!-- .archive-header -->

			<section class="portfolio-realisations">
				<?php
				// Liens boutons de tri des réalisations selon la taxonomie type.
				$terms = get_terms( 'type', array(
					'orderby'    => 'count',
					'hide_empty' => 0,
				) );
				$count = count( $terms );
				echo '<ul id="realisation-filter" class="filter clearfix">';
				echo '<li><a class="active btn" href="#all" data-filter="*" title="Tout" role="button">Tout</a></li>';
				if ( $count > 0 ) {
					foreach ( $terms as $term ) {
						$termname = ( $term->slug );
						echo ' <li><a class="btn" href="#' . esc_html( $termname ) . '" title="" data-filter=".' . esc_html( $termname ) . '" rel="search" role="button">' . esc_html( $term->name ) . '</a></li>';
					}
				}
				echo '</ul>';
				?>
				<div id="portfolio-wrapper">
					<ul id="portfolio-list" class="thumbnails isotope">
						<li class="item-sizer"></li>
						<?php while ( have_posts() ) : the_post(); ?>
							<li id="post-<?php the_ID(); ?>" <?php post_class( 'item-portfolio' ); ?> >
								<?php
								$image_id       = get_post_thumbnail_id();
								$image_url      = wp_get_attachment_image_src( $image_id, 'large' );
								$image_url      = $image_url[0]; // On récupère l'image à la une.
								$id             = get_the_ID();
								$single_cpt_url = get_post_permalink( $id );
								?>
								<h2 class="projet-title">
									<a class="thumbnail" href="<?php echo esc_html( $single_cpt_url ); ?>" title="<?php the_title_attribute(); ?>">
									<div class="thumbnail-overlay hover">
										<div class="overlay">
											<div class="lire genericon-zoom"></div>
										</div>
										<?php the_post_thumbnail( 'cpt-realisation', array( 'class' => 'img-responsive' ) ); ?>
									</div>
									<span class="info-projet"><span class="more"><?php the_title_attribute(); ?></span></span></a>
								</h2>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</section>

		<?php else : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php esc_html_e( 'No portfolio yet', 'twenty-thirteen-child' ); ?></h1>
			</header>
			<section class="post_content">
				<p><?php esc_html_e( 'Sorry, What you were looking for is not here.', 'twenty-thirteen-child' ); ?></p>
			</section>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
