<!DOCTYPE html>
<html <?php language_attributes()?>>

<head>
  <!-- <title><?php document_title_filter($title); ?></title> -->
  <title><?php wp_title('|'); ?></title>
  <meta name="robots" content="index, follow">
  <meta name="keywords"
    content="ХВВАУЛ,Харьковское ВВАУЛ,Харьковское высшее военное авиационное училище лётчиков,выпускники 1974 года,выпуск 1974 года, лучший сайт авиации">
  <meta name="description"
    content="Сайт выпускников ХВВАУЛ 1974 года выпуска, ХВВАУЛ-74, Взлёт.ру, v3let.ru, лучший сайт авиации">
  <meta charset="<?php bloginfo( 'charset' )?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link type="image/x-icon" rel="shortcut icon"
    href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
  <meta property="og:title"
    content="ХВВАУЛ,Харьковское ВВАУЛ,Харьковское высшее военное авиационное училище лётчиков,выпускники 1974 года,выпуск 1974 года, лучший сайт авиации">
  <meta property="og:description"
    content="Сайт выпускников ХВВАУЛ 1974 года выпуска, ХВВАУЛ-74, Взлёт.ру, v3let.ru, лучший сайт авиации">
  <meta property="og:image" content="http://192.168.0.109/assets/images/meta.jpg">
  <meta property="og:url" content="http://v3let.ru/">

  <?php wp_head() ?>
</head>

<?php
$themeClass = '';
if (!empty($_COOKIE['theme'])) {
  if ($_COOKIE['theme'] == 'dark') {
    $themeClass = 'dark-theme';
  } else if ($_COOKIE['theme'] == 'light') {
    $themeClass = 'light-theme';
  }
}
?>

<!-- <body <?php //body_class(); ?>> -->

<body class="<?php echo $themeClass; ?>">

  <div class="wrapper">
    <header class="header">
      <div class="header-top">
        <div class="container">
          <div class="header-top__inner"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.png"
              alt="Орден" class="star" style="width: 50px; height: 50px">
            <p class="header-top__content">[ХВВАУЛ-74] Харьковское Высшее Военное Авиационное ордена Красной Звезды
              Училище Лётчиков ВВС им. дважды Героя Советского Союза С.И. Грицевца</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="header__inner">
          <div class="header__about" data-aos="fade-left" data-aos-duration="1000">
            <h1 class="header__title"><a href="<?php echo home_url( '/' ) ?>"
                class="header__link"><?php bloginfo( 'name' )?></a></h1>
            <span class="header__subtitle">Сайт
              выпускников 1974 года</span>
          </div>


          <?php
            wp_nav_menu(
              array(
                'theme_location'=>'header_menu',
                'container' => 'nav',
                'container_class' => 'menu',
                'menu_class' => 'menu__list',
                'walker' => new New_Menu(),
                )
                )
                ?>
          <button class="menu__btn"><span>Меню</span> <svg class="menu__icon">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#menu"></use>
            </svg>
          </button>

          <!-- <nav class="menu">
            <ul class="menu__list">
              <li class="menu__item"><svg class="menu__pic">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#users"></use>
                </svg> <a href="./index.html#slide" class="menu__link">Наш курс</a></li>
              <li class="menu__item"><svg class="menu__pic">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#history"></use>
                </svg> <a href="./history.html" class="menu__link">Исторические хроники</a></li>
              <li class="menu__item"><svg class="menu__pic">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#art"></use>
                </svg> <a href="./template-parts/content.php" class="menu__link">Творчество</a></li>
              <li class="menu__item"><svg class="menu__pic">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#author"></use>
                </svg> <a href="./author.html" class="menu__link">Юрий Фёдоров</a></li>
              <li class="menu__item"><svg class="menu__pic">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#help"></use>
                </svg> <a href="#" class="menu__link" data-modal="data-modal">Помощь</a></li>
            </ul>
            <button class="menu__btn"><span>Меню</span> <svg class="menu__icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#menu"></use>
              </svg>
            </button>
          </nav> -->
        </div>
      </div>
    </header>