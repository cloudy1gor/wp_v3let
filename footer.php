<div class="modal hide">
  <div class="modal__dialog">
    <div class="modal__content">
      <span class="modal__title">Контактная информация!</span>

      <div class="modal__body">
        <span class="modal__subtitle">Для связи:</span>

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
      </div>

      <div class="modal__text">
        <p>
          Если что-то не получилось открыть, если у Вас есть хороший материал или интересные фото для публикации,
          информация для наших читателей, если появились вопросы, пишите
          нам на адресса электроной почты, указаные ниже. Здесь Вы получите ответ на Ваши вопросы и будет рассмотрена
          Ваша
          информация!
        </p>
        <br />
      </div>

      <address modal__address>
        <span>Связь с администрацией:</span>
        <a href="mailto:v3letz@gmail.com" class="modal__mail">v3letz@gmail.com</a>
        <a href="mailto:v3let@mail.ru" class="modal__mail">v3let@mail.ru</a>
        <a href="mailto:admin@v3let.ru" class="modal__mail">admin@v3let.ru</a>
      </address>

      <div class="modal__inner">
        <div class="modal__person">
          <div class="modal__close" data-close="">&times;</div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <ol class="footer__txt">
        <li class="footer__copy">Взлет® - лучший сайт об авиации.</li>
        <li class="footer__copy">&copy Все права защищены 2007-<?php echo date("Y"); ?>г.</li>
      </ol>
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
    </div>
    <div class="created"><svg xmlns="http://www.w3.org/2000/svg" class="created__icon" width="32" height="32"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="#fff" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1" />
      </svg> Created by <a href="https://cloudy1gor.github.io" class="created__link" target="_blank">Савельев
        Игорь</a></div>
  </div>
</footer>
</div>

<?php wp_footer() ?>
<script>
const btn = document.querySelector(".btn-toggle");
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
let changeThemeButtons = document.querySelectorAll(".theme__icon");

changeThemeButtons.forEach((button) => {
  button.addEventListener("click", function () {
    let theme = this.dataset.theme;
    applyTheme(theme);
  });
});

function applyTheme(themeName) {
  changeThemeButtons.forEach((button) => {
    button.style.display = "block";
  });
  document.querySelector(`[data-theme="${themeName}"]`).style.display = "none";
}

const currentTheme = localStorage.getItem("theme");

if (currentTheme == "dark") {
  document.body.classList.toggle("dark-mode");
} else if (currentTheme == "light") {
  document.body.classList.toggle("light-mode");
}

btn.addEventListener("click", function () {
  if (prefersDarkScheme.matches) {
    document.body.classList.toggle("light-mode");
    var theme = document.body.classList.contains("light-mode") ? "light" : "dark";
  } else {
    document.body.classList.toggle("dark-mode");
    var theme = document.body.classList.contains("dark-mode") ? "dark" : "light";
  }
  localStorage.setItem("theme", theme);
});
</script>
</body>

</html>