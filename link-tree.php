<?php //Template name: Link Tree ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= home_url() ?>/wp-content/uploads/fav-icon.png" type="image/x-icon">
    <title>
    <?php
      if( is_page('home') or is_home() ):
        echo get_bloginfo('name') . " | " . get_bloginfo('description');
      else:
        echo  get_bloginfo('name'). " | " .get_the_title();
      endif;
    ?>
    </title>
    <?php wp_head(); ?>
  </head>
  <style>
    .social-flutuante {
      display: none;
    }
  </style>
<body <?php body_class(); ?>>
    <section class="link-tree">
      <div class="container-wrap">
        <div class="link-tree_holder">
          <div class="logo-container">
            <a href="<?= home_url() ?>"><img src="<?= home_url() ?>/wp-content/uploads/logo-escrita-black.png" alt="Hung Sing Kung Fu Academy"></a>
          </div>
          <div class="text-container text-center">
            <p class="normal-text">• Kung Fu para toda a família • Agende sua aula experimental gratuita •</p>
          </div>
          <a href="<?php the_field('whatsapp') ?>" class="button-link-tree">WhatsApp informações e orçamentos</a>
          <a href="<?php the_field('site') ?>" class="button-link-tree button-site-linktree"><span class="icons icon-left"><img src="<?= home_url() ?>/wp-content/uploads/globe.png" alt="Globe"><img src="<?= home_url() ?>/wp-content/uploads/globe-active.png" class="globe-active" alt="Globe"></span> Site</a>
          <span class="button-link-tree button-academias-linktree button-link-tree--dark-gold"><span class="icons icon-left fab fa-whatsapp"></span> Academias <span class="icons icon-right fas fa-chevron-up"></span></span>
          <?php if( have_rows('academias_container') ) :?>
          <div class="links-academias-whatsapp">
            <?php 
              while( have_rows('academias_container') ) : 
                the_row(); ?>
                <a href="<?php the_sub_field('link_whatsapp') ?>" class="link-tree-academias"><?php the_sub_field('academia') ?></a>
            <?php 
              endwhile; 
              wp_reset_postdata();?>
          </div>
          <?php endif; ?>
          <?php 
            if( have_rows('rede_sociais_linktree') ) :
              while( have_rows('rede_sociais_linktree') ) :
                the_row(); ?>
                <a href="<?php the_sub_field('link_rede_social') ?>" class="button-link-tree button-site-linktree"><?php the_sub_field('nome_rede_social') ?></a>
          <?php
              endwhile;
              wp_reset_postdata();
            endif;
          ?>
          <footer class="text-center">
            <p class="normal-text">Hung Sing Kung Fu Academy © 2021 | Site desenvolvido por <a href="https://dp8.studio">Estúdio DP8</a></p>
          </footer>
        </div>
        
      </div>
    </section>
    <script>
      const button_Linktree = document.querySelector('.button-academias-linktree')
      const container_academias = document.querySelector('.links-academias-whatsapp')
      const button_arrow = button_Linktree.querySelector('.icon-right')

      button_Linktree.addEventListener('click', () => {
        container_academias.classList.toggle('active')
        if( container_academias.classList.contains('active') ){
          button_arrow.classList.add('fa-chevron-down')
          button_arrow.classList.remove('fa-chevron-up')
          button_Linktree.classList.add('active')
        } else {
          button_arrow.classList.add('fa-chevron-up')
          button_arrow.classList.remove('fa-chevron-down')
          button_Linktree.classList.remove('active')
        }
      })
    </script>
  <?php wp_footer() ?>
</body>
</html>