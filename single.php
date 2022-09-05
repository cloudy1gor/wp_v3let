<?php get_header() ?>

<main class="main">
  <div class="container">
    <?php get_template_part( 'template-parts/content/content-bar', get_post_format() ) ?>
  </div>

  <section class="product">
    <div class="container">

      <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/single', get_post_format() ) ?>

      <?php endwhile; ?>

    </div>
  </section>

  <?php get_template_part( 'template-parts/content/content-right-buttons', get_post_format() ) ?>

</main>

<?php get_footer() ?>