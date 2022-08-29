<?php //Template Name: Site em Contrução ?>
<?php get_header() ?>
<section class="erro-404 bg_black">
  <div class="container-wrap">
    <div class="erro-404_holder grids two_grids">
      <div class="erro-404--item erro-404_content">
        <div class="title_container">
          <h1 class="super-title text-white">Desculpe, esta página não está disponível.</h1>
          <p class="super-text text-white">O link que você acessou pode estar quebrado ou a página pode ter sido
            removida</p>
        </div>
        <a href="<?= site_url() ?>" class="button-contato text-yellow">Voltar</a>
      </div>
      <div class="erro-404--item erro-404_image">
        <img src="<?= home_url() ?>/wp-content/uploads/background-mestre.png" alt="Mester Banner">
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>