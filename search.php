<?php get_header() ?>

<main class="main">
  <div class="container">
    <?php get_template_part( 'template-parts/content/content-bar', get_post_format() ) ?>

    <section class="news" data-aos="fade-up">
      <div class="container">
        <h2 class="title search__title" data-aos="fade-up">Поиск по запросу: <?php echo get_search_query() ?></h2>
        <ul class="news__list">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', get_post_format() ) ?>


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

          <?php endwhile; ?>

          <?php else: ?>
          <p>По запросу ничего не найдено...</p>
          <?php endif; ?>

        </ul>
      </div>
    </section>
  </div>

</main>
<?php get_template_part( 'template-parts/content/content-right-buttons', get_post_format() ) ?>

<?php get_footer() ?>