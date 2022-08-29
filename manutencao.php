<?php //Template Name: Site em Contrução ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hung Sing | Academias de Kung Fu</title>
  <?php wp_head() ?> 
</head>
<style>

html,body{
  overflow: hidden;
}

</style>
<body class="content_all bg_black">
  <header class="header header-contrucao">
    <div class="container_logo">
      <a href="<?= home_url() ?>"><img src="<?= home_url() ?>/wp-content/uploads/logo.png" alt=""></a>
    </div>
  </header>
  <section class="site-contrucao ">
    <div class="container-wrap">
      <div class="site-construcao_holder" style=" background-image: url(<?= home_url() ?>/wp-content/uploads/metre-banner.jpg);">
        <div class="title_container">
          <h1 class="super-title text-white">ESTAMOS EM MANUTENÇÃO</h1>
          <p class="super-text text-white">voltaremos o mais rapido possivel</p>
        </div>
        <a href="mailto:contato@hungsing.com.br" class="button-contato text-yellow">contato</a>
      </div>
    </div>
  </section>
  <?php wp_footer(); ?>
</body>
</html>

