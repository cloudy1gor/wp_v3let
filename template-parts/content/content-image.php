    <section class="slider" data-aos="fade-up">
      <div class="contaner">
        <h2 class="title">Наши выпускники</h2>
      </div>
      <div class="slider__container swiper">
        <ul class="slider__list swiper-wrapper">

          <?php $args = array(
            'category_name' => 'nash-kurs',
            'posts_per_page' => 50,
        );
          $query = new WP_Query( $args );
            if( $query->have_posts() ){
	            while( $query->have_posts() ){
		            $query->the_post();
		      ?>

          <li class="slider__item swiper-slide">
            <a href="<?php the_permalink(); ?>" target="_blank" class="slider__link swiper-zoom-container">
              <!-- <img data-src="images/slider/1.jpg" src="images/1x1.png" alt="Фото" class="slider__img swiper-lazy"> -->
              <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'slider__img swiper-lazy' ) ?>
              <div class="swiper-lazy-preloader"></div>
            </a>
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