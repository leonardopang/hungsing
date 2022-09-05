<?php
function link_css()
{
  wp_enqueue_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style('childstyle', get_stylesheet_directory_uri() . '/assets/css/style.main.css');
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/public/css/main.css');
}
add_action('wp_enqueue_scripts', 'link_css', 11);

function wp_custom_script()
{
  wp_register_script('siema-js', get_stylesheet_directory_uri() . '/assets/js/siema.min.js', array(), false, false);
  wp_register_script('siema-dots-js', get_stylesheet_directory_uri() . '/assets/js/siema-dots.js', array('siema-js'), false, false);
  wp_register_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.main.js', array('siema-dots-js'), false, true);
  wp_enqueue_script('siema-dots-js');
}
add_action('wp_enqueue_scripts', 'wp_custom_script', 10);

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_theme_support('menus');


function mytheme_register_nav_menu()
{
  register_nav_menus(array(
    'primary_menu' => __('Primary Menu', 'text_domain'),
    'footer_menu'  => __('Footer Menu', 'text_domain'),
  ));
}
add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);

function hero_header_home()
{
?>
<section class="hero-header hero-header-home bg_black" style="background-image: url(<?php the_field('imagem'); ?>);">
  <div class="container-wrap">
    <div class="hero-header_holder">
      <div class="chamada-aula box-moldura">
        <p class="normal-text text-white">Agende uma aula agora mesmo <span class="no-mobile">|</span> <span
            class="text-bold text-yellow">Ganhe uma aula grátis</span></p>
      </div>
      <div class="title_container">
        <?php
          if (have_rows('titulos')) :
            while (have_rows('titulos')) :
              the_row();
          ?>
        <h2 class="super-title text-white"><?php the_sub_field('principal') ?></h2>
        <p class="super-text text-white no-mobile"><?php the_sub_field('secundario') ?></p>
      </div>
      <?php
            endwhile;
          endif;
          if (have_rows('buttons')) :
            while (have_rows('buttons')) :
              the_row();
      ?>
      <a href="<?= home_url() ?>/contato/" class="button-contato text-yellow"><?php the_sub_field('texto') ?></a>
      <?php
            endwhile;
          endif;
    ?>
    </div>
    <div class="arrows-down">
      <a href="#first-section" class="fas fa-angle-down text-white fa-2x"></a>
    </div>
  </div>
</section>
<?php
}

function hero_header_academias()
{
?>
<section class="hero-header hero-header-academias bg_black"
  style="background-image: url(<?php the_field('imagem'); ?>);">
  <div class="container-wrap">
    <div class="hero-header_holder">
      <div class="chamada-aula box-moldura">
        <p class="normal-text text-white">Agende uma aula agora mesmo <span class="no-mobile">|</span> <span
            class="text-bold text-yellow">Ganhe uma aula grátis</span></p>
      </div>
      <div class="image-mobile">
        <img src="<?php the_field('imagem'); ?>" alt="<?php the_title(); ?>">
      </div>
      <div class="title_container">
        <?php
          if (have_rows('titulos')) :
            while (have_rows('titulos')) :
              the_row();
          ?>
        <h2 class="super-title text-white"><?php the_sub_field('principal') ?></h2>
        <p class="super-text text-white no-mobile"><?php the_sub_field('secundario') ?></p>
      </div>
      <?php
            endwhile;
          endif;
          if (have_rows('buttons')) :
            while (have_rows('buttons')) :
              the_row();
      ?>
      <a href="<?= home_url() ?>/contato/" class="button-contato text-yellow"><?php the_sub_field('texto') ?></a>
      <?php
            endwhile;
          endif;
    ?>
    </div>
    <div class="arrows-down">
      <a href="#first-section" class="fas fa-angle-down text-white fa-2x"></a>
    </div>
  </div>
</section>
<?php
}

function hero_header()
{
?>
<section class="hero-header hero-header_internas bg_black"
  style="background-image: url(<?php the_field('imagem'); ?>);">
  <div class="container-wrap">
    <div class="hero-header_holder">
      <div class="title_container">
        <?php
          if (have_rows('titulos')) :
            while (have_rows('titulos')) :
              the_row();
          ?>
        <h2 class="super-title text-white"><?php the_sub_field('principal') ?></h2>
        <?php if (get_sub_field('secundario')) : ?>
        <p class="super-text text-white no-mobile"><?php the_sub_field('secundario') ?></p>
        <?php endif; ?>
      </div>
      <?php
            endwhile;
          endif;
    ?>
    </div>
    <div class="arrows-down">
      <a href="#first-section" class="fas fa-angle-down text-white fa-2x"></a>
    </div>
  </div>
</section>
<?php
}

function depoimentos($atts)
{

  extract(shortcode_atts(array(
    'cat' => '#',
  ), $atts));

  $args = array(
    'post_type' => 'depoimentos',
    'posts_per_page' => -1,
    'cat' => $cat,
    'order' => 'ASC',
  );

  $depoimentos_id = new WP_Query($args);
?>
<section class="depoimentos">
  <div class="container-wrap">
    <div class="depoimentos_holder">
      <div class="depoimento_siema">
        <?php
          if ($depoimentos_id->have_posts()) :
            while ($depoimentos_id->have_posts()) :
              $depoimentos_id->the_post();
          ?>
        <div class="depoimento--item">
          <div class="title_container">
            <h2 class="small-title text-gold text-bold text-upper"><?php the_title(); ?></h2>
            <h3 class="super-text text-bold"><?= the_field('quem_e'); ?></h3>
          </div>
          <div class="depoimento_info">
            <p class="normal-text">
              <?php the_field('depoimento'); ?>
            </p>
          </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
      </div>
      <div class="arrows_holder">
        <span class="arrows arrows-left">
          <span class="fa-stack">
            <i class="far fa-circle fa-stack-2x"></i>
            <i class="fas fa-angle-left fa-stack-1x"></i>
          </span>
        </span>
        <span class="arrows arrows-right">
          <span class="fa-stack">
            <i class="far fa-circle fa-stack-2x"></i>
            <i class="fas fa-angle-right fa-stack-1x"></i>
          </span>
        </span>
      </div>
    </div>
  </div>
</section>

<?php
}
add_shortcode('depoimentos', 'depoimentos');

function script_depoimento()
{
?>
<script>
if (document.querySelector('.depoimento_siema')) {
  const depoimento_rotativo = new SiemaWithDots({
    selector: '.depoimento_siema',
    duration: 250,
    threshold: 0,
    onInit: function() {
      this.addDots();
      this.updateDots();
    },
    onChange: function() {
      this.updateDots()
    },
  });
  setInterval(() => depoimento_rotativo.next(), 8000);

  const prev = document.querySelector('.arrows-left')
  const next = document.querySelector('.arrows-right')

  prev.addEventListener('click', () => depoimento_rotativo.prev())
  next.addEventListener('click', () => depoimento_rotativo.next())
}
</script>
<?php
}
add_action('wp_footer', 'script_depoimento');


function artista_marcial_one()
{
?>
<section class="artista-marcial bg_gray">
  <div class="container-wrap">
    <div class="artista-marcial_holder">
      <div class="artista-marcial--item">
        <div class="artista-marcial-info flex-center">
          <h2 class="super-title text-center">Quero ser um<br>Artista Marcial</h2>
          <a href="<?php home_url(); ?>/contato/" class="button-only-border normal-text text-bold">Começar minha jornada
            no Kung Fu</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}

function contato_academias()
{
?>
<section class="contato-academias bg_black">
  <div class="container-wrap">
    <div class="contato-academias_holder grids two_grids">
      <div class="contato-academias--item two_grids--item">
        <div class="title_container">
          <h3 class="normal-text text-gold">Localização</h3>
          <h2 class="small-title text-white">Hung Sing <?php the_title(); ?></h2>
        </div>
        <div class="contato-academias-info">
          <div class="contato-academias-info--item">
            <h3 class="normal-text text-bold text-white">Endereço</h3>
            <a href="<?php the_field('link_endereco') ?>" target="_blank"
              class="normal-text text-white"><?php the_field('endereco') ?></a>
          </div>
          <!--<div class="contato-academias-info--item">
              <h3 class="normal-text text-bold text-white">Telefone</h3>
              <a href="tel:<?php the_field('telefone') ?>" class="normal-text text-white"><?php the_field('telefone') ?></a>
            </div>
            <div class="contato-academias-info--item">
              <h3 class="normal-text text-bold text-white">WhatsApp</h3>
              <a href="<?php the_field('link_whatsapp') ?>" target="_blank" class="normal-text text-white"><?php the_field('whatsapp') ?></a>
            </div>-->
          <?php
            if (have_rows('telefones')) :
              while (have_rows('telefones')) :
                the_row();
            ?>
          <div class="contato-academias-info--item">
            <?php if (get_row_layout() == 'whatsapp') : ?>
            <h3 class="normal-text text-bold text-white">WhatsApp</h3>
            <a href="<?php the_sub_field('link'); ?>" target="_blank"
              class="normal-text text-white"><?php the_sub_field('numero'); ?></a>
            <?php
                  endif;
                  if (get_row_layout() == 'fixo') :
                  ?>
            <h3 class="normal-text text-bold text-white">Telefone</h3>
            <a href="tel:<?php the_sub_field('numero'); ?>"
              class="normal-text text-white"><?php the_sub_field('numero'); ?></a>
            <?php
                  endif;
                  ?>
          </div>
          <?php
              endwhile;
            endif;
            ?>
          <div class="contato-academias-info--item">
            <h3 class="normal-text text-bold text-white">E-mail</h3>
            <a href="mailto:<?php the_field('e-mail') ?>" target="_blank"
              class="normal-text text-white"><?php the_field('e-mail') ?></a>
          </div>
          <div class="contato-academias-info--item contato-academias-social">
            <a href="<?php the_field('link_facebook') ?>" target="_blank"
              class="fab fa-facebook-f fa-lg text-white"></a>
            <a href="<?php the_field('link_instagram') ?>" target="_blank"
              class="fab fa-instagram fa-lg text-white"></a>
          </div>
        </div>
      </div>
      <div class="contato-academias--item two_grids--item">
        <?php the_field('mapa_academia') ?>
      </div>
    </div>
  </div>
</section>
<?php
}

function construtor()
{
?>
<section id="first-section" class="container-page">
  <?php
    if (have_rows('sections')) :
      while (have_rows('sections')) :
        the_row();

        if (get_row_layout() ==  '1_coluna') : ?>
  <div class="container-page--solo">
    <div class="container-wrap"><?php
                                        if (have_rows('container')) :
                                          while (have_rows('container')) :
                                            the_row();

                                            if (get_row_layout() == 'titulo_container') : ?>
      <div class="title_container"><?php
                                                  if (have_rows('primario')) :
                                                    while (have_rows('primario')) :
                                                      the_row(); ?>
        <h2
          class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
          <?php the_sub_field('titulo'); ?></h2><?php
                                                                endwhile;
                                                              endif;
                                                              if (have_rows('secundario')) :
                                                                while (have_rows('secundario')) :
                                                                  the_row(); ?>
        <h3
          class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
          <?php the_sub_field('titulo'); ?></h3><?php
                                                                endwhile;
                                                              endif; ?>
      </div><?php
                                            elseif (get_row_layout() == 'imagem_container') : ?>
      <div class="image_container">
        <img src="<?php the_sub_field('imagem'); ?>" alt="">
      </div><?php
                                            elseif (get_row_layout() == 'video_container') : ?>
      <div class="video_container">
        <?php the_sub_field('video') ?>
      </div><?php
                                            elseif (get_row_layout() == 'slider_container') : ?>
      <div class="slider_container">
        <div class="siema">
          <?php
                                              $slider_siema = get_sub_field('slider');
                                              if ($slider_siema) :
                                                foreach ($slider_siema as $slide) : ?>
          <div class="siema--item">
            <img src="<?= $slide ?> " alt="">
          </div>
          <?php
                                                endforeach;
                                              endif;
                        ?>
        </div>
      </div><?php
                                            elseif (get_row_layout() == 'text_container') : ?>
      <div class="text_container normal-text">
        <p class="normal-text"><?php the_sub_field('text'); ?></p>
      </div><?php
                                            endif; // Layouts

                                          endwhile; // Container
                                          wp_reset_postdata();
                                        endif; // Container 
                          ?>
    </div>
  </div> <?php
                elseif (get_row_layout() == '2_colunas') : ?>
  <div
    class="container-page_holder<?php if (get_sub_field('reverse_column')) { ?> reverse-column-mobile<?php } ?> grids two_grids">
    <div class="container-page--item two_grids--item"><?php
                                                              if (have_rows('column_1')) :
                                                                while (have_rows('column_1')) :
                                                                  the_row();

                                                                  if (get_row_layout() == 'titulo_container') : ?>
      <div class="title_container">
        <div class="half-container-wrap half-container-left"><?php
                                                                            if (have_rows('primario')) :
                                                                              while (have_rows('primario')) :
                                                                                the_row(); ?>
          <h2
            class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
            <?php the_sub_field('titulo'); ?></h2><?php
                                                                              endwhile;
                                                                            endif;
                                                                            if (have_rows('secundario')) :
                                                                              while (have_rows('secundario')) :
                                                                                the_row(); ?>
          <h3
            class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
            <?php the_sub_field('titulo'); ?></h3><?php
                                                                              endwhile;
                                                                            endif; ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'imagem_container') : ?>
      <div class="image_container">
        <img src="<?php the_sub_field('imagem'); ?>" alt="">
      </div><?php
                                                                  elseif (get_row_layout() == 'video_container') : ?>
      <div class="video_container">
        <?php the_sub_field('video'); ?>
      </div><?php
                                                                  elseif (get_row_layout() == 'slider_container') : ?>
      <div class="slider_container">
        <div class="siema">
          <?php
                                                                    $slider_siema = get_sub_field('slider');
                                                                    if ($slider_siema) :
                                                                      foreach ($slider_siema as $slide) : ?>
          <div class="siema--item">
            <img src="<?= $slide ?> " alt="">
          </div>
          <?php
                                                                      endforeach;
                                                                    endif;
                        ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'text_container') : ?>
      <div class="text_container normal-text">
        <div class="half-container-wrap half-container-left">
          <p class="normal-text"><?php the_sub_field('text'); ?></p>
        </div>
      </div><?php
                                                                  endif; // Layouts
                                                                endwhile; // Column 1
                                                                wp_reset_postdata();
                                                              endif; // Column 1 
                          ?>
    </div>
    <div class="container-page--item two_grids--item"><?php
                                                              if (have_rows('column_2')) :
                                                                while (have_rows('column_2')) :
                                                                  the_row();

                                                                  if (get_row_layout() == 'titulo_container') : ?>
      <div class="title_container">
        <div class="half-container-wrap half-container-right"><?php
                                                                            if (have_rows('primario')) :
                                                                              while (have_rows('primario')) :
                                                                                the_row(); ?>
          <h2
            class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
            <?php the_sub_field('titulo'); ?></h2><?php
                                                                              endwhile;
                                                                            endif;
                                                                            if (have_rows('secundario')) :
                                                                              while (have_rows('secundario')) :
                                                                                the_row(); ?>
          <h3
            class="<?php the_sub_field('tamanhos'); ?> <?php if (get_sub_field('fonts')) the_sub_field('fonts'); ?> <?php if (get_sub_field('colors')) the_sub_field('colors'); ?>">
            <?php the_sub_field('titulo'); ?></h3><?php
                                                                              endwhile;
                                                                            endif; ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'imagem_container') : ?>
      <div class="image_container">
        <img src="<?php the_sub_field('imagem') ?>" alt="">
      </div><?php
                                                                  elseif (get_row_layout() == 'video_container') : ?>
      <div class="video_container">
        <?php the_sub_field('video'); ?>
      </div><?php
                                                                  elseif (get_row_layout() == 'slider_container') : ?>
      <div class="slider_container">
        <div class="siema">
          <?php
                                                                    $slider_siema = get_sub_field('slider');
                                                                    if ($slider_siema) :
                                                                      foreach ($slider_siema as $slide) : ?>
          <div class="siema--item">
            <img src="<?= $slide ?> " alt="">
          </div>
          <?php
                                                                      endforeach;
                                                                    endif;
                        ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'text_container') : ?>
      <div class="text_container normal-text">
        <div class="half-container-wrap half-container-right">
          <p class="normal-text"><?php the_sub_field('text'); ?></p>
        </div>
      </div><?php
                                                                  endif; // Layouts

                                                                endwhile; // Column 2
                                                              endif; // Column 2 
                          ?>
    </div>
  </div><?php
                endif; // 1 Coluna e 2 Colunas
              endwhile; // Sections
            endif; // Sections 
                ?>
</section>
<?php
  if ($slider_siema) :
  ?>
<script>
const siemas = document.querySelectorAll('.siema')
Siema.prototype.addArrows = function() {
  // make buttons & append them inside Siema's container

  this.containerArrow = document.createElement('div')
  this.containerArrow.classList.add('arrows-container')

  this.prevSpan = document.createElement('span')
  this.prevSpan.classList.add('arrows', 'arrows-left', 'fa-stack')
  this.nextSpan = document.createElement('span')
  this.nextSpan.classList.add('arrows', 'arrows-right', 'fa-stack')

  this.nextCircle = document.createElement('i')
  this.nextCircle.classList.add('fas', 'fa-circle', 'fa-stack-2x', 'text-white')
  this.prevCircle = document.createElement('i')
  this.prevCircle.classList.add('fas', 'fa-circle', 'fa-stack-2x', 'text-white')

  this.prevArrow = document.createElement('i')
  this.prevArrow.classList.add('fas', 'fa-angle-left', 'text-black', 'fa-stack-1x')

  this.nextArrow = document.createElement('i')
  this.nextArrow.classList.add('fas', 'fa-angle-right', 'text-black', 'fa-stack-1x')


  this.prevSpan.appendChild(this.prevCircle)
  this.nextSpan.appendChild(this.nextCircle)
  this.prevSpan.appendChild(this.prevArrow)
  this.nextSpan.appendChild(this.nextArrow)

  this.containerArrow.appendChild(this.prevSpan)
  this.containerArrow.appendChild(this.nextSpan)

  this.selector.appendChild(this.containerArrow)

  // event handlers on buttons
  this.prevArrow.addEventListener('click', () => this.prev());
  this.nextArrow.addEventListener('click', () => this.next());
}

/*for (const siema of siemas) {
  const instance = new Siema({
    selector: siema,
    loop: true,
  });
  instance.addArrows();
}*/
</script>
<?php
  endif;
  ?>
<?php
}

function chamada_artista_marcial()
{
  if (have_rows('chamada')) :
    while (have_rows('chamada')) :
      the_row(); ?>
<section class="artista-marcial" style="background-color: <?php the_sub_field('background_color'); ?>;">
  <div
    class="artista-marcial_holder<?php if (get_sub_field('reverse_column')) { ?> reverse-column-mobile<?php } ?> grids two_grids">
    <div class="artista-marcial--item two_grids--item"> <?php
                                                              if (have_rows('column_left')) :
                                                                while (have_rows('column_left')) :
                                                                  the_row();

                                                                  if (get_row_layout() == 'text_container') : ?>
      <div class="half-container-wrap half-container-left">
        <div class="artista-marcial-info"> <?php
                                                                    $text = get_sub_field('title');
                                                                    $button = get_sub_field('button');
                                                                    if ($text) { ?>
          <h2 class="<?= $text['tamanhos'] ?> <?= $text['color'] ?>"><?= $text['text'] ?></h2>
          <?php
                                                                                                          }
                                                                                                          if ($button) { ?>
          <a href="/contato/"
            class="button-only-border <?= $button['color'] ?> normal-text text-bold"><?= $button['text'] ?></a><?php
                                                                                                                                              } ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'imagem_container') : ?>
      <img src="<?php the_sub_field('imagem') ?>" alt=""> <?php
                                                                    endif;
                                                                  endwhile;
                                                                endif; ?>
    </div>
    <div class="artista-marcial--item two_grids--item"><?php
                                                              if (have_rows('column_right')) :
                                                                while (have_rows('column_right')) :
                                                                  the_row();

                                                                  if (get_row_layout() == 'text_container') : ?>
      <div class="half-container-wrap half-container-right">
        <div class="artista-marcial-info"> <?php
                                                                    $text = get_sub_field('title');
                                                                    $button = get_sub_field('button');
                                                                    if ($text) { ?>
          <h2 class="<?= $text['tamanhos'] ?> <?= $text['color'] ?>"><?= $text['text'] ?></h2>
          <?php
                                                                                                          }
                                                                                                          if ($button) { ?>
          <a href="contato"
            class="button-only-border <?= $button['color'] ?> normal-text text-bold"><?= $button['text'] ?></a><?php
                                                                                                                                            } ?>
        </div>
      </div><?php
                                                                  elseif (get_row_layout() == 'imagem_container') : ?>
      <img src="<?php the_sub_field('imagem') ?>" alt=""> <?php
                                                                    endif;
                                                                  endwhile;
                                                                endif; ?>
    </div>
  </div>
</section> <?php
                endwhile;
              endif;
            }

            function cards()
            {
              if (have_rows('cards')) :
                while (have_rows('cards')) :
                  the_row(); ?>
<section class="cards">
  <div class="container-wrap"><?php
                                    if (get_row_layout() == '3_columns') : ?>
    <div class="cards_holder grids three_grids"><?php
                                                        $column_1 = get_sub_field('1_column');
                                                        $column_2 = get_sub_field('2_column');
                                                        $column_3 = get_sub_field('3_column');
                                                        if ($column_1) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_1['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_1['title']['tamanhos'] ?> <?= $column_1['title']['colors'] ?>">
            <?= $column_1['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_1['text'] ?></p>
        </div>
      </div><?php
                                                        endif;
                                                        if ($column_2) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_2['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_2['title']['tamanhos'] ?> <?= $column_2['title']['colors'] ?>">
            <?= $column_2['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_2['text'] ?></p>
        </div>
      </div><?php
                                                        endif;
                                                        if ($column_3) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_3['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_3['title']['tamanhos'] ?> <?= $column_3['title']['colors'] ?>">
            <?= $column_3['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_3['text'] ?></p>
        </div>
      </div><?php
                                                        endif; ?>
    </div><?php
                                    elseif (get_row_layout() == '4_columns') : ?>
    <div class="cards_holder grids four_grids"><?php
                                                        $column_1 = get_sub_field('1_column');
                                                        $column_2 = get_sub_field('2_column');
                                                        $column_3 = get_sub_field('3_column');
                                                        $column_3 = get_sub_field('4_column');
                                                        if ($column_1) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_1['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_1['title']['tamanhos'] ?> <?= $column_1['title']['colors'] ?>">
            <?= $column_1['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_1['text'] ?></p>
        </div>
      </div><?php
                                                        endif;
                                                        if ($column_2) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_2['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_2['title']['tamanhos'] ?> <?= $column_2['title']['colors'] ?>">
            <?= $column_2['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_2['text'] ?></p>
        </div>
      </div><?php
                                                        endif;
                                                        if ($column_3) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_3['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_3['title']['tamanhos'] ?> <?= $column_3['title']['colors'] ?>">
            <?= $column_3['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_3['text'] ?></p>
        </div>
      </div><?php
                                                        endif;
                                                        if ($column_4) : ?>
      <div class="cards--item three_grids">
        <img src="<?= $column_4['imagem'] ?>" alt="">
        <div class="title_container">
          <h3 class="<?= $column_4['title']['tamanhos'] ?> <?= $column_4['title']['colors'] ?>">
            <?= $column_4['title']['text'] ?></h3>
        </div>
        <div class="text_container">
          <p class="normal-text"><?= $column_4['text'] ?></p>
        </div>
      </div><?php
                                                        endif; ?>
    </div><?php
                                    endif; ?>
  </div>
</section><?php
                endwhile;
              endif;
            }


            function social_flutuante()
            {
                ?>
<div class="social-flutuante">
  <div class="social-flutuante_holder">
    <a href="https://www.facebook.com/HungSingKungFuAcademy/" target="_blank"
      class="fab fa-facebook-f fa-lg text-yellow"></a>
    <a href="https://www.instagram.com/hungsingkungfuacademy/" target="_blank"
      class="fab fa-instagram fa-lg text-yellow"></a>
  </div>
</div>
<?php
            }
            add_action('wp_footer', 'social_flutuante');