<?php get_header();

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

// Note we can use the WordPress REST API to iterate over JSON object in React or other front-end js framework
// and render each post that way if we were building a React theme :D 

?>
<main role="main" class="main container-xl">
    <div class="grid">
        <section class="post__aggregate unit-lg-8">
        <?php // Start the Loop ?>
        <?php if (!empty($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
            <!-- <a href="<?php echo $post->link; ?>"> -->
                    <article <?php post_class(); ?>>
                    <img src="<?php if(!empty($post->featured_image_src)) { echo $post->featured_image_src; } ?> " alt="">
                    <h3><?php echo $post->title->rendered; ?></h3>
                        <div>
                            <p><?php echo $post->excerpt->rendered; ?></p>
                        </div>
                    </article>
                <!-- </a> -->
            <?php endforeach; ?>
        <?php endif; ?>
        </section>
        <aside class="sidebar unit-lg-4">

        </aside>
    </div>
</main>

<?php get_footer(); ?>
