<?php get_header() ?>

<main class="main">
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
      <div class="search">
        <form action="#" class="search__form"><input type="text" class="search__input" placeholder="Поиск"> <button
            class="search__btn"><svg class="search__icon">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
            </svg></button></form>
      </div>
    </div>

    <div class="row">

      <div class="col-12">
        <h1>Поиск по запросу: <?php echo get_search_query() ?></h1>
      </div>

      <section class="news" data-aos="fade-up">
        <div class="container">
          <h2 class="title" data-aos="fade-up">Все статьи</h2>
          <ul class="news__list">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Цикл WordPress -->

            <li class="news__item">
              <article class="news__element" data-aos="slide-up">
                <a href="<?php the_permalink(); ?>" target="_blank" class="news__link"></a>

                <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'news__image lazy' ) ?>

                <div class="news__info">
                  <h3 class="news__title"><?php the_title() ?></h3>
                  <div class="news__text">
                    <?php $content = get_the_content(); echo wp_trim_words( get_the_content(), 180, '...' );?>
                  </div>
                  <time class="news__date"><?php the_time('j F Y') ?></time>
                </div>
              </article>
            </li>

            <?php endwhile;
        else : ?>
            <p>Записей нет.</p>

            <?php endif; ?>

          </ul>
        </div>
      </section>
    </div>
  </div>

  <div class="up-wrapper"><button class="up up--animated"><span class="up__txt">Наверх</span> <svg class="up__icon">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#up"></use>
      </svg></button></div>
  </div>
</main>

<?php get_footer() ?>