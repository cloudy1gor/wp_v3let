<?php get_header() ?>

<main class="main">
  <div class="container">

    <div class="bar" data-aos="zoom-out">
      <dvi class="social">
        <ul class="social__list">
          <li class="social__item"><a href="https://ok.ru/profile/529378520930" target="_blank"
              class="social__link"><svg class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#odnok"></use>
              </svg></a></li>
          <li class="social__item"><a href="https://telegram.me/v3letRu" target="_blank" class="social__link"><svg
                class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#telegram"></use>
              </svg></a></li>
          <li class="social__item"><a href="mailto:admin@v3let.ru" class="social__link"><svg class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#email"></use>
              </svg></a></li>
        </ul>
      </dvi>

      <?php get_search_form(  ) ?>

    </div>

    <section class="news" data-aos="fade-up">
      <div class="container">
        <h2 class="title" data-aos="fade-up">Самое важное</h2>
        <ul class="news__list">

          <?php

          $args = array(
            'posts_per_page'      => -1,
            'category__not_in'    => 8,
            'category_name' => 'vazhnoe	',
            'order' => 'DESC',
            'orderby' => 'date',
            'suppress_filters' => true,
            'ignore_custom_sort' => true,
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
<div class="up-wrapper"><button class="up"><span class="up__txt">Наверх</span> <svg class="up__icon">
      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#up"></use>
    </svg></button></div>
</div>

<?php get_footer() ?>