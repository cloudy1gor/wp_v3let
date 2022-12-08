<?php get_header() ?>

<main class="main">
  <div class="container">
    <div class="bar" data-aos="zoom-out">
      <dvi class="social">
        <ul class="social__list">
          <li class="social__item"><a href="https://ok.ru/profile/529378520930" target="_blank" class="social__link"><svg
                class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#odnok"></use>
              </svg></a></li>
          <li class="social__item"><a href="https://telegram.me/v3letRu" target="_blank" class="social__link"><svg
                class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#telegram"></use>
              </svg></a></li>
          <li class="social__item"><a href="mailto:v3letz@gmail.com" class="social__link"><svg class="social__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#email"></use>
              </svg></a></li>
        </ul>
      </dvi>

      <div class="product__info--top">
        <small>
          Автор: <?php the_author(); ?>
        </small>
        <small>Категория:
          <?php
						the_category( ', ' );
						?>
        </small>
    </div>

    </div>
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