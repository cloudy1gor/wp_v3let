    <section class="slider" data-aos="fade-up">
      <div class="contaner">
        <?php
        // Получим ID категории
        $category_id = get_cat_ID( 'Наш курс' );

        // Теперь, получим УРЛ категории
        $category_link = get_category_link( $category_id );
      ?>

        <a href="<?php echo $category_link; ?>">
          <h2 class="title">Наш выпуск</h2>
        </a>
      </div>

      <div class="embla">
        <div class="embla__viewport slider__container">
          <div class="embla__container slider__list">

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

            <div class="embla__slide slider__item">
              <div class="embla__slide__inner">
                <?php
                  // Получим ID категории
                  $category_id = get_cat_ID( 'Наш курс' );

                  // Теперь, получим УРЛ категории
                  $category_link = get_category_link( $category_id );
                ?>

                <!-- выведем ссылку на категорию -->
                <a href="<?php echo $category_link; ?>" class="news__link btn"><span></span></a>
                <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'embla__slide__img lazy' ) ?>
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

        <!-- Buttons -->
        <button class="embla__button embla__button--prev" type="button">
          <svg class="embla__button__svg" viewBox="137.718 -1.001 366.563 643.999">
            <path
              d="M428.36 12.5c16.67-16.67 43.76-16.67 60.42 0 16.67 16.67 16.67 43.76 0 60.42L241.7 320c148.25 148.24 230.61 230.6 247.08 247.08 16.67 16.66 16.67 43.75 0 60.42-16.67 16.66-43.76 16.67-60.42 0-27.72-27.71-249.45-249.37-277.16-277.08a42.308 42.308 0 0 1-12.48-30.34c0-11.1 4.1-22.05 12.48-30.42C206.63 234.23 400.64 40.21 428.36 12.5z">
            </path>
          </svg>
        </button>
        <button class="embla__button embla__button--next" type="button">
          <svg class="embla__button__svg" viewBox="0 0 238.003 238.003">
            <path
              d="M181.776 107.719L78.705 4.648c-6.198-6.198-16.273-6.198-22.47 0s-6.198 16.273 0 22.47l91.883 91.883-91.883 91.883c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.071-103.039a15.741 15.741 0 0 0 4.64-11.283c0-4.13-1.526-8.199-4.64-11.313z">
            </path>
          </svg>
        </button>
      </div>

      <div class="embla__progress">
        <div class="embla__progress__bar"></div>
      </div>

      </div>
    </section>