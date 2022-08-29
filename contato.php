<?php
  //Template Name: Contato
  get_header();
?>
  <section class="contato bg_black">
    <div class="container-wrap">
      <div class="contato_holder">
        <div class="chamada-aula box-moldura">
          <p class="normal-text text-white">Agende uma aula agora mesmo <span class="no-mobile">|</span> <span class="text-bold text-yellow">Ganhe uma aula gratis</span></p>
        </div>
        <div class="title_container">
          <h1 class="super-title text-white">FALE COM A HUNG SING</h1>
        </div>
        <?= do_shortcode('[contact-form-7 id="327" title="Contato"]') ?>
      </div>
    </div>
  </section>
  <script>
    const checkbox = document.querySelectorAll('.check-alternate .wpcf7-list-item input[type="checkbox"]')
    const select = document.querySelectorAll('.wpcf7-list-item-label')
  </script>
<?php
  get_footer();
?>