<?php //Template name: Header ?>
<?php get_header() ?>
<section class="hero-banner bg_black">
  <div class="container-wrap">
    <div class="hero-banner_holder grid two_grid">
      <div class="hero-banner__item hero-banner__content">
        <div class="chamada-aula box-moldura">
          <p class="normal-text text-white">Agende uma aula agora mesmo <span class="no-mobile">|</span>
            <span class="text-bold text-yellow">Ganhe uma aula grátis</span>
          </p>
        </div>
        <div class="title_container">
          <h2 class="super-title text-white">Aprenda Kung Fu</h2>
          <p class="super-text text-white no-mobile">Mais de 9 mil pessoas já escolheram a Hung Sing Kung Fu Academy. Só
            falta você. Agende uma Aula Experimental na unidade que preferir, e faça parte da nossa família.</p>
        </div>
        <a href="http://localhost:10022/contato/" class="button-contato text-yellow">Agendar Agora</a>
      </div>
      <div class="arrows-down">
        <a href="#first-section" class="fas fa-angle-down text-white fa-2x"></a>
      </div>
    </div>
    <div class="hero-banner__item hero-banner__image">
      <img src="<?= site_url() ?>/wp-content/uploads/Mestre-com-espada-1.png" alt="">
    </div>
  </div>
  </div>
</section>
<?php get_footer() ?>