    <article class="product__wrapper" data-aos="slide-up" data-aos-duration="1000">
      <div class="product__content">
        <h2 class="product__title"><?php the_title(); ?></h2>
        <div class="product__text" data-aos="fade-in" data-aos-duration="1000">
          <!-- <img src="/images/content/2.jpg" alt="Изображение" class="product__img" data-aos="fade-in" data-aos-duration="1000"> -->
          <?php // echo vzlet_post_thumb( get_the_ID(), 'full', '', 'product__img' ) ?>
          <?php the_content( '' ); ?>
        </div>
      </div>

      <div class="product__info">
        <small>
          <?php
						echo vzlet_get_human_time();
						?>
        </small>
        <small>
          <?php
						the_tags();
						?>
        </small>
        <small>Категории:
          <?php
						the_category( ', ' );
						?>
        </small>
      </div>
    </article>