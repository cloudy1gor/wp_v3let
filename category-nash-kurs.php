<?php get_header() ?>

<main class="main">
  <div class="container">

    <?php get_template_part( 'template-parts/content/content-bar', get_post_format() ) ?>

    <section class="gallery" data-aos="fade-up">
      <div class="container">
        <div class="gallery__container">
          <h2 class="title gallery__title" data-aos="fade-right">Наш выпуск</h2>
          <ul class="gallery__list">

            <?php

            $args = array(
              'posts_per_page'      => -1,
              // 'category__not_in'    => 8,
              'category_name'  => 'nash-kurs',
              'post_status' => 'publish',
              'order' => 'ASC',
              'orderby' => 'date',
              // 'suppress_filters' => true,
              // 'ignore_custom_sort' => true,
            );

            $query = new WP_Query( $args );
            if( $query->have_posts() ){
            while( $query->have_posts() ){
            $query->the_post();
            ?>

            <li class="gallery__item">
              <?php echo vzlet_post_thumb( get_the_ID(), 'full', '', 'gallery__image lazy' ) ?>
              <div class="gallery__text">
                <?php $content = get_the_content(); echo wp_trim_words( get_the_content(), 60, '...' );?>
              </div>
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

  </div>

  <div id="modalWindow">
    <div id="modalClose">&times;</div>
    <div id="modalPic"></div>
  </div>

</main>
<?php get_template_part( 'template-parts/content/content-right-buttons', get_post_format() ) ?>

<?php get_footer() ?>

<script>
document.addEventListener("DOMContentLoaded", () => {
  let pics = document.getElementsByClassName("gallery__image");
  let modalWindow = document.getElementById("modalWindow");
  let modalIsOpen = false;
  let isClickedOutside = false;
  let modalClose = document.getElementById("modalClose");
  modalClose.addEventListener("click", imageClose, false);

  function listenerLaunch() {
    modalWindow.addEventListener("click", function(evt) {
      isClickedOutside = !document.getElementById("modalPic").getElementsByTagName("img")[0].contains(evt
        .target);
      if (isClickedOutside && modalIsOpen) {
        modalWindow.style.display = "none";
        modalIsOpen = false;
      }
    });
  }

  function imageOpen(item) {
    listenerLaunch();
    modalWindow.style.display = "flex";
    document.getElementById("modalPic").innerHTML =
      '<img class="wp-post-image entered loaded gallery__image-full" srcset="' + this.srcset +
      '" src=(unknow) sizes="(max-width: 768px) 100vw, 768px" data-ll-status="loaded">';
    isClickedOutside = false;
    modalIsOpen = true;
  }

  for (let i = 0; i < pics.length; i++) {
    pics[i].addEventListener("click", imageOpen, false);
  }

  function imageClose() {
    modalIsOpen = false;
    modalWindow.style.display = "none";
  }
});
</script>