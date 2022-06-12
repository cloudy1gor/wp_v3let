<?php get_header() ?>

<main class="main" data-aos="slide-up">
  <div class="container">
    <div class="bar">
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
    <section class="content">

      <a href="<?php echo get_category_link(5); ?>">
        <h2 class="title">Самое важное</h2>
      </a>
      <div class="content__inner">

        <?php
// указываем категорию 5 и выключаем разбиение на страницы (пагинацию)
$args = array(
	'posts_per_page'      => 5,
  'category_name' => 'vazhnoe',
  'post_status' => 'publish',
  'order' => 'ASC',
  'orderby' => 'date',
);
$query = new WP_Query( $args );
if( $query->have_posts() ){
	while( $query->have_posts() ){
		$query->the_post();
		?>

        <article class="content__item">
          <a href="<?php the_permalink(); ?>" target="_blank" class="content__link"></a>
          <div class="content__img-container">
            <!-- <img data-src="<?php bloginfo( 'temlate_url' ); ?>/assets/images/content/1.jpg" src="<?php bloginfo( 'temlate_url' ); ?>/assets/images/1x1.png"
              alt="Изображение статьи" class="content__img lazy"> -->

            <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'content__img lazy' ) ?>
          </div>
          <h3 class="content__title"><?php the_title(); ?></h3>
          <div class="content__text"><?php the_excerpt(); //the_content('');?></div>
          <div class="content__info">
            <div class="content__author">
              <?php the_author(); ?>
            </div>
            <time class="content__date">
              <?php the_time('j F Y'); ?>
            </time>
          </div>
        </article>

        <?php
	}
	wp_reset_postdata(); // сбрасываем переменную $post
}
else
	echo 'Записей нет.';
?>

      </div><button class="news__btn btn"><span>Показать все статьи</span></button>
    </section>

    <?php get_template_part( 'template-parts/content/content-image', get_post_format() ) ?>

    <section class="news" data-aos="fade-up">
      <div class="container">

        <a href="<?php echo get_category_link(3); ?>">
          <h2 class="title">Свежие статьи</h2>
        </a>

        <ul class="news__list">

          <?php
// указываем категорию 5 и выключаем разбиение на страницы (пагинацию)
$args = array(
	'posts_per_page'      => 5,
  'category__not_in'    => [8, 5],
  'post_status' => 'publish',
  'order' => 'ASC',
  'orderby' => 'date',
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
                <div class="news__text" data-aos="zoom-in-up">
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
        <button class="news__btn btn">
          <span>Показать все статьи</span>
        </button>
      </div>
    </section>
    <div class="up-wrapper">
      <button class="up up--animated"><span class="up__txt">Наверх</span>
        <svg class="up__icon">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#up"></use>
        </svg>
      </button>
    </div>
  </div>
</main>

<?php get_footer() ?>