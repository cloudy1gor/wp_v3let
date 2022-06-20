    <article class="product__wrapper" data-aos="slide-up" data-aos-duration="1000">
      <div class="product__content">
        <h2 class="product__title"><?php the_title(); ?></h2>
        <div class="product__text">
          <!-- <img src="/images/content/2.jpg" alt="Изображение" class="product__img" data-aos="fade-in" data-aos-duration="1000"> -->
          <?php // echo vzlet_post_thumb( get_the_ID(), 'full', '', 'product__img' ) ?>
          <?php the_content( '' ); ?>
        </div>
      </div>

      <div class="product__info">
        <small>
          Автор: <?php the_author(); ?>
        </small>
        <small>
          Просмотров: <?php echo get_post_meta( $post->ID, 'views', true ); ?>
        </small>
        <!-- <small>
          Просмотров: <?php //setPostViews(get_the_ID()); ?>
          <?php //echo getPostViews(get_the_ID()); ?>
        </small> -->
        <small>
          <?php
						echo vzlet_get_human_time();
						?>
        </small>
        <small>Категории:
          <?php
						the_category( ', ' );
						?>
        </small>
      </div>
    </article>


    <div class="comments" data-aos="slide-up" data-aos-duration="1000">
      <?php comments_template(); ?>

    </div>