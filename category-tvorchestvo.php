<?php get_header() ?>

<main class="main">
  <div class="container">

    <?php get_template_part( 'template-parts/content/content-bar', get_post_format() ) ?>


    <section class="news" data-aos="fade-up">
      <div class="container">
        <h2 class="title" data-aos="fade-up">Творчество</h2>
        <ul class="news__list">

          <?php

          $args = array(
            'posts_per_page'      => -1,
            'category__not_in'    => 8,
            'category_name' => 'tvorchestvo',
          );

          $query = new WP_Query( $args );
          if( $query->have_posts() ){
          while( $query->have_posts() ){
          $query->the_post();
          ?>

          <li class="news__item">
            <article class="news__element" data-aos="slide-up">
              <a href="<?php the_permalink(); ?>" target="_blank" class="news__link"></a>

              <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'news__image lazy' ) ?>

              <div class="news__info">
                <h3 class="news__title"><?php the_title() ?></h3>
                <div class="news__text">
                  <?php $content = get_the_content(); echo wp_trim_words( get_the_content(), 180, '...' );?>
                </div>
                <div class="content__info">
                  <div class="content__author">
                    <?php the_author(); ?>
                  </div>
                  <time class="content__date">
                    <?php the_time('j F Y'); ?>
                  </time>
                </div>
              </div>
            </article>
          </li>

          <?php
	}
	wp_reset_postdata(); // сбрасываем переменную $post
}
else
	echo 'Записей нет.';
?>

        </ul>
      </div>
    </section>

  </div>

</main>
<?php get_template_part( 'template-parts/content/content-right-buttons', get_post_format() ) ?>

<?php get_footer() ?>