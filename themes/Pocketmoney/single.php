<?php 

// Standard API query arguments
$args = array(
    'orderby' => 'title',
    'per_page' => 3
  );
  $url = add_query_arg( $args, rest_url('wp/v2/posts') );
  // GET Request
  $request = wp_remote_get($url);
  // On Success 
  $body = wp_remote_retrieve_body($request);
  // Decode the JSON object into a PHP object
  $posts = json_decode($body);
  
get_header(); ?>
<main role="main" class="main container-xl">
<?php // Start the Loop ?>
        <?php if (!empty($posts)) : ?>
            <a href="<?php echo $post->link; ?>">
                    <article <?php post_class(); ?>>
                    <h3><?php echo $post->title->rendered; ?></h3>
                        <div>
                            <img src="<?php if(has_post_thumbnail()) { echo $post->featured_image_src; } ?> " alt="">
                            <p><?php echo $post->excerpt->rendered; ?></p>
                        </div>
                    </article>
                </a>
        <?php endif; ?>
</main>
<?php get_footer(); ?>