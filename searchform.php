<div class="search">
  <form action="#" class="search__form" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
    <input type="search" class="search__input" placeholder="Поиск" name="s" id="s">
    <button class="search__btn" type="submit"><svg class="search__icon">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
      </svg>
    </button>
  </form>
</div>
