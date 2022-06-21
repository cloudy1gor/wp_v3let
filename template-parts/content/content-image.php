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
      <div class="itcss">
        <div class="slider__container itcss__wrapper">
          <ul data-simple-slider class="slider__list itcss__items">

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

            <li class="slider__item itcss__item">
              <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'slider__img lazy' ) ?>
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
      </div>




    </section>