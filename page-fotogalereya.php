<?php get_header() ?>

<main class="main">
  <div class="container">

    <!-- <div class="bar" data-aos="zoom-out">
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
    </div> -->

    <section class="albums">
      <div class="container">
        <div class="albums__wrapper">
          <h2 class="title albums__title" data-aos="zoom-out">Фотогалерея</h2>
          <ul class="albums__list" data-aos="fade-up">

            <li class="albums__item">
              <div class="embla albums__slides">
                <div class="embla__viewport albums__viewport">
                  <div class="albums__img-container embla__container">

                    <?php $args = array(
                      'category_name' => 'nash-kurs',
                      'posts_per_page' => -1,
                      'post_status' => 'publish',
                      'order' => 'ASC',
                      'orderby' => 'date',
                    );
                    $query = new WP_Query( $args );
                    if( $query->have_posts() ){
                      while( $query->have_posts() ){
                        $query->the_post();
                        ?>

                    <div class="albums__slide embla__slide">
                      <div class="embla__slide__inner">
                        <?php
                          // Получим ID категории
                          $category_id = get_cat_ID( 'Наш курс' );

                          // Теперь, получим УРЛ категории
                          $category_link = get_category_link( $category_id );
                        ?>

                        <!-- выведем ссылку на категорию -->
                        <a href="<?php echo $category_link; ?>" class="news__link btn"><span></span></a>
                        <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'albums__img lazy' ) ?>
                      </div>
                    </div>
                    <?php
	                  }
                      wp_reset_postdata(); // сбрасываем переменную $post
                    }
                      else
                        echo 'Записей нет.';
                    ?>

                  </div>
                </div>
              </div>

              <h3 class="albums__name">Наш выпуск</h3>
              <?php
              // Получим ID категории
              $category_id = get_cat_ID( 'Наш курс' );

              // Теперь, получим УРЛ категории
              $category_link = get_category_link( $category_id );
              ?>

              <a href="<?php echo $category_link; ?>" class="news__link"></a>
            </li>
            <li class="albums__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/segodna.jpg" alt="image"
                class="albums__img" />
              <h3 class="albums__name">Мы сегодня</h3>
              <?php
              // Получим ID категории
              $category_id = get_cat_ID( 'Мы сегодня' );

              // Теперь, получим УРЛ категории
              $category_link = get_category_link( $category_id );
              ?>

              <a href="<?php echo $category_link; ?>" class="news__link"></a>
            </li>
            <li class="albums__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/vchera.jpg" alt="image"
                class="albums__img" />
              <h3 class="albums__name">Мы вчера</h3>
              <?php
              // Получим ID категории
              $category_id = get_cat_ID( 'Мы вчера' );

              // Теперь, получим УРЛ категории
              $category_link = get_category_link( $category_id );
              ?>

              <a href="<?php echo $category_link; ?>" class="news__link"></a>
            </li>
            <li class="albums__item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/vstrechi.jpg" alt="image"
                class="albums__img" />
              <h3 class="albums__name">Встречи и юбилеи</h3>
              <?php
              // Получим ID категории
              $category_id = get_cat_ID( 'Встречи и юбилеи' );

              // Теперь, получим УРЛ категории
              $category_link = get_category_link( $category_id );
              ?>

              <a href="<?php echo $category_link; ?>" class="news__link"></a>
            </li>
            <li class="albums__item">
              <?php
                  // Получим ID категории
                  $category_id = get_cat_ID( 'История ХВВАУЛ в фотографиях' );

                  // Теперь, получим УРЛ категории
                  $category_link = get_category_link( $category_id );
                ?>

              <!-- выведем ссылку на категорию -->
              <a href="<?php echo $category_link; ?>" class="news__link btn"><span></span></a>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/hist.jpg" alt="image"
                class="albums__img albums__img--nth" />
              <h3 class="albums__name--overflow">История ХВВАУЛ в фотографиях</h3>
              <?php
              // Получим ID категории
              $category_id = get_cat_ID( 'История ХВВАУЛ в фотографиях' );

              // Теперь, получим УРЛ категории
              $category_link = get_category_link( $category_id );
              ?>
            </li>
          </ul>
        </div>
      </div>
    </section>

</main>
<?php get_template_part( 'template-parts/content/content-right-buttons', get_post_format() ) ?>
<?php get_footer() ?>