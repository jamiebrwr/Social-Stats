<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?><?php
function pippin_create_post_form() {
	ob_start(); 
	if(isset($_GET['post'])) {
		switch($_GET['post']) {
			case 'successfull':
				echo '<p class="success">' . __('Stats Below', 'pippin') . '</p>';
				break;
			case 'failed' :
				echo '<p class="error">' . __('Please fill in all the info', 'pippin') . '</p>';
				break;
		}
	}
	?>
	<form id="pippin_create_post" action="" method="POST">
		<fieldset>
			<input name="website_url" id="website_url" type="text"/>
			<label for="website_url">Website URL</label>
		</fieldset>
		<fieldset>
			<?php wp_nonce_field('website_url_nonce', 'website_url_nonce_field'); ?>
			<input type="submit" name="website_url_submit" value="<?php _e('Submit URL', 'pippin'); ?>"/>
		</fieldset>
	</form>
	<?php 
	return ob_get_clean();
}
add_shortcode('post_form', 'pippin_create_post_form');
 
function pippin_process_post_creation() {
	if(isset($_POST['website_url_nonce_field']) && wp_verify_nonce($_POST['website_url_nonce_field'], 'website_url_nonce')) {
 
		if(strlen(trim($_POST['website_url'])) < 1 ) {
			$redirect = add_query_arg('post', 'failed', $_POST['_wp_http_referer']);
		} else {		
			$website_url_info = array(
				'post_title' => esc_attr(strip_tags($_POST['website_url_title'])),
				'post_type' => 'website_urls',
				'post_content' => esc_attr(strip_tags($_POST['website_url_desc'])),
				'post_status' => 'pending'
			);
			$website_url_id = wp_insert_post($website_url_info);
 
			if($website_url_id) {
				update_post_meta($website_url_id, 'ecpt_postedby', esc_attr(strip_tags($_POST['user_name'])));
				update_post_meta($website_url_id, 'ecpt_posteremail', esc_attr(strip_tags($_POST['user_email'])));
				update_post_meta($website_url_id, 'ecpt_contactemail', esc_attr(strip_tags($_POST['inquiry_email'])));
				$redirect = add_query_arg('post', 'successfull', $_POST['_wp_http_referer']);
			}
		}
		wp_redirect($redirect); exit;
	}
}
add_action('init', 'pippin_process_post_creation'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php 
					if ( true == $_POST["website_url"] ):
					echo "<p>Feedback for ". $url = htmlspecialchars($_POST["website_url"])."</p>";
					endif;
			  
			  		the_content();
					
					$url = htmlspecialchars($_POST["website_url"]);
					
				  	$social_count = new SocialCounter($url);
		
		        	// Printing out, what the greet method returns
					echo "<li>This is the Twitter output of <strong>".$social_count->socialcounter_get_tweets()."</strong> Tweets</li>";
					echo "<li>This is the Facebook Likes output of <strong>".$social_count->socialcounter_get_likes()."</strong> Facebook Likes</li>";
					echo "<li>This is the Google Plus output of <strong>".$social_count->socialcounter_get_plusones()."</strong> Google +1's</li>";
					echo "<li>This is the Linkedin Shares output of <strong>".$social_count->socialcounter_get_shares()."</strong> shares</li>";
				?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php twentythirteen_post_nav(); ?>
				<?php comments_template(); ?>
		  	
		  	
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>