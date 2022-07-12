<?php get_header() ?>

<main class="main" data-aos="slide-up">
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
    <section class="content">

      <a href="<?php echo get_category_link(5); ?>">
        <h2 class="title">Самое важное</h2>
      </a>
      <div class="content__inner">

        <?php
// указываем категорию 5 и выключаем разбиение на страницы (пагинацию)
$args = array(
  'suppress_filters' => true,
	'posts_per_page'      => 5,
  'category_name' => 'vazhnoe',
  'post_status' => 'publish',
  'order' => 'DESC',
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

      </div>

      <?php
      // Получим ID категории
      $category_id = get_cat_ID( 'Важное' );

      // Теперь, получим УРЛ категории
      $category_link = get_category_link( $category_id );
      ?>

      <!-- выведем ссылку на категорию -->
      <a href="<?php echo $category_link; ?>" class="news__btn btn"><span>Показать все статьи</span></a>


    </section>

    <?php get_template_part( 'template-parts/content/content-image', get_post_format() ) ?>

    <div class="container">
      <section class="news" data-aos="fade-up">
        <div class="container">

          <a href="<?php echo get_category_link(3); ?>">
            <h2 class="title">Свежие статьи</h2>
          </a>

          <ul class="news__list">

            <?php
          // указываем категорию 5 и выключаем разбиение на страницы (пагинацию)
          $args = array(
            'posts_per_page'      => 6,
            'category__not_in'    => [8, 5],
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'date',
            'suppress_filters' => true,
            'ignore_sticky_posts' => 1
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

          <?php
        // Получим ID категории
        $category_id = get_cat_ID( 'Творчество' );

        // Теперь, получим УРЛ категории
        $category_link = get_category_link( $category_id );
        ?>

          <!-- выведем ссылку на категорию -->
          <a href="<?php echo $category_link; ?>" class="news__btn btn"><span>Показать все статьи</span></a>

        </div>
      </section>
    </div>
  </div>
</main>
<div class="up-wrapper">
  <button class="up"><span class="up__txt">Наверх</span>
    <svg class="up__icon">
      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#up"></use>
    </svg>
  </button>

    <button class="up theme btn-toggle">
    <span class="up__txt theme__txt">Тема</span>

    <svg class="up__icon theme__icon" data-theme="light" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 40 40" version="1.1" style="display: none;">
      <g id="surface1">
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 20.070312 10.015625 C 14.527344 10.015625 10.015625 14.527344 10.015625 20.070312 C 10.015625 25.617188 14.527344 30.128906 20.070312 30.128906 C 25.613281 30.128906 30.125 25.617188 30.125 20.070312 C 30.125 14.527344 25.613281 10.015625 20.070312 10.015625 Z M 20.070312 10.015625 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 20.070312 7.0625 C 18.988281 7.0625 18.109375 6.183594 18.109375 5.101562 L 18.109375 1.960938 C 18.109375 0.878906 18.988281 0 20.070312 0 C 21.15625 0 22.03125 0.878906 22.03125 1.960938 L 22.03125 5.101562 C 22.03125 6.183594 21.152344 7.0625 20.070312 7.0625 Z M 20.070312 7.0625 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 20.070312 33.078125 C 18.988281 33.078125 18.109375 33.957031 18.109375 35.042969 L 18.109375 38.179688 C 18.109375 39.265625 18.988281 40.140625 20.070312 40.140625 C 21.15625 40.140625 22.03125 39.265625 22.03125 38.179688 L 22.03125 35.042969 C 22.03125 33.957031 21.152344 33.078125 20.070312 33.078125 Z M 20.070312 33.078125 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 29.269531 10.871094 C 28.503906 10.105469 28.503906 8.863281 29.269531 8.097656 L 31.488281 5.878906 C 32.253906 5.113281 33.496094 5.113281 34.261719 5.878906 C 35.03125 6.644531 35.03125 7.886719 34.261719 8.652344 L 32.042969 10.871094 C 31.277344 11.636719 30.035156 11.636719 29.269531 10.871094 Z M 29.269531 10.871094 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 10.871094 29.269531 C 10.105469 28.503906 8.863281 28.503906 8.097656 29.269531 L 5.878906 31.488281 C 5.113281 32.253906 5.113281 33.5 5.878906 34.265625 C 6.644531 35.03125 7.886719 35.03125 8.652344 34.265625 L 10.871094 32.042969 C 11.636719 31.277344 11.636719 30.035156 10.871094 29.269531 Z M 10.871094 29.269531 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 33.078125 20.070312 C 33.078125 18.988281 33.957031 18.109375 35.042969 18.109375 L 38.179688 18.109375 C 39.265625 18.109375 40.140625 18.988281 40.140625 20.070312 C 40.140625 21.15625 39.265625 22.03125 38.179688 22.03125 L 35.042969 22.03125 C 33.957031 22.03125 33.078125 21.15625 33.078125 20.070312 Z M 33.078125 20.070312 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 7.0625 20.070312 C 7.0625 18.988281 6.183594 18.109375 5.097656 18.109375 L 1.960938 18.109375 C 0.878906 18.109375 0 18.988281 0 20.070312 C 0 21.15625 0.878906 22.03125 1.960938 22.03125 L 5.101562 22.03125 C 6.183594 22.03125 7.0625 21.15625 7.0625 20.070312 Z M 7.0625 20.070312 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 29.269531 29.269531 C 30.035156 28.503906 31.277344 28.503906 32.042969 29.269531 L 34.261719 31.492188 C 35.03125 32.253906 35.03125 33.5 34.261719 34.265625 C 33.496094 35.03125 32.253906 35.03125 31.488281 34.265625 L 29.269531 32.042969 C 28.503906 31.277344 28.503906 30.035156 29.269531 29.269531 Z M 29.269531 29.269531 "/>
      <path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 10.871094 10.871094 C 11.636719 10.105469 11.636719 8.863281 10.871094 8.097656 L 8.652344 5.878906 C 7.886719 5.113281 6.644531 5.113281 5.878906 5.878906 C 5.113281 6.644531 5.113281 7.886719 5.878906 8.652344 L 8.097656 10.871094 C 8.863281 11.640625 10.105469 11.640625 10.871094 10.871094 Z M 10.871094 10.871094 "/>
      </g>
    </svg>
    <svg class="up__icon theme__icon" data-theme="dark" width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"> <path d="M15 0.695136C15.244 0.991667 15.3935 1.35457 15.4292 1.73694C15.4648 2.11932 15.385 2.5036 15.2 2.84014C13.7546 5.49382 12.9998 8.46837 13.005 11.4901C13.005 21.5426 21.2 29.6826 31.3 29.6826C32.6175 29.6826 33.9 29.5451 35.1325 29.2826C35.5103 29.2008 35.9039 29.2321 36.264 29.3726C36.6241 29.5131 36.9349 29.7566 37.1575 30.0726C37.3925 30.4013 37.5123 30.7983 37.4983 31.2021C37.4842 31.6058 37.3372 31.9936 37.08 32.3051C35.1192 34.7137 32.6456 36.6544 29.8396 37.9856C27.0335 39.3168 23.9658 40.0051 20.86 40.0001C9.335 40.0001 0 30.7151 0 19.2751C0 10.6651 5.285 3.28014 12.81 0.150136C13.1848 -0.00828447 13.601 -0.0407995 13.9959 0.057475C14.3908 0.15575 14.7431 0.379507 15 0.695136V0.695136Z" fill="#222222"></path></svg>
  </button>
</div>

<?php get_footer() ?>