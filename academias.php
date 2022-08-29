<?php
  //Template Name: Academias
  get_header()
?>
<?php hero_header_academias(); ?>
<?php construtor(); ?>
<?php
    $select_depoimentos = get_field('categorias_depoimento');
  ?>
<?= do_shortcode('[depoimentos cat="'.$select_depoimentos.'"]') ?>
<?php contato_academias(); ?>
<?php artista_marcial_one(); ?>
<!--<section class="calendario academia">
    <div class="container-wrap">
      <?php 
        $calendarios = get_field('calendario');
        echo do_shortcode("[tribe_events category='".esc_html($calendarios->name)."' view='month' tribe-bar='false']");
      ?>
    </div>
  </section>-->
<?php
  get_footer();
?>