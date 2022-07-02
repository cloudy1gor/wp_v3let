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

    <section class="author">
      <div class="container author__container">
        <h2 class="author__title title">Об авторе</h2>

        <div class="author__top" data-aos="slide-up" data-aos-duration="1000">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/author.jpg" alt="Федоров Юрий Игоревич"
            class="author__img" />

          <div class="author__body">
            <h2 class="author__name">Фёдоров Юрий Игоревич</h2>
            <span class="author__year">(1953 года рождения)</span>

            <blockquote class="author__block" cite="http://developer.mozilla.org">
              <p>Лётчики – это люди, которые всю свою жизнь потом не могут отвыкнуть от своей молодости.</p>
              <cite>Из записных книжек курсанта</cite>
            </blockquote>

            <div class="author__social">
              <a href="https://ok.ru/profile/529378520930" target="_blank" class="author__social-link">
                <svg class="social__icon">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#odnok"></use>
                </svg>
                <span>Профиль в Оноклассниках</span>
              </a>
            </div>
          </div>
        </div>

        <h2 class="author__title title" data-aos="fade-up">Произведения</h2>
        <ol class="author__content" reversed data-aos="fade-up" data-aos-duration="1200">

          <?php
      // Получим ID категории
      $category_id = get_cat_ID( 'Зарницы памяти' );

      // Теперь, получим УРЛ категории
      $category_link = get_category_link( $category_id );
      ?>

          <h3 class="author__title">Книги</h3>
          <li class="author__item">
            <a href="<?php echo $category_link; ?>" class="author__link">Зарницы памяти. Записки курсанта лётного
              училища.</a>

            <small>
              Опубликовано: <?php the_time('j F Y'); ?>
            </small>
          </li>

          <h3 class="author__title">Статьи</h3>

          <?php

              $args = array(
                'posts_per_page'      => -1,
                'category__not_in'    => [8,7],
                // 'category_name' => 'tvorchestvo',
                'author_name'=> 'Fedorov',
                'order' => 'ASC',
                'orderby' => 'date',
                'suppress_filters' => true,
                'ignore_custom_sort' => true,
                    );

              $query = new WP_Query( $args );
              if( $query->have_posts() ){
              while( $query->have_posts() ){
              $query->the_post();
              ?>

          <li class="author__item">
            <a href="<?php the_permalink(); ?>" class="author__link"><?php the_title() ?></a>
            <small>
              Опубликовано: <?php the_time('j F Y'); ?>
            </small>
          </li>

          <?php
            }
            wp_reset_postdata(); // сбрасываем переменную $post
          }
          else
            echo 'Записей нет.';
          ?>

        </ol>
      </div>
    </section>

  </div>

</main>
<div class="up-wrapper"><button class="up"><span class="up__txt">Наверх</span> <svg class="up__icon">
      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#up"></use>
    </svg></button></div>
</div>

<?php get_footer() ?>