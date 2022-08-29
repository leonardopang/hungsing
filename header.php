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

<body <?php body_class( 'main_container' ) ?>>
  <header class="header">
    <div class="header-middle">
      <div class="container-wrap">
        <div class="header-middle--menu header-middle--desktop">
          <?php
              $args = array(
                'menu' => 'principal',
                'container' => false
              );
              wp_nav_menu($args);
            ?>
        </div>
        <div class="header-middle--menu header-middle--mobile">
          <div class="header-mobile_holder">
            <div class="header-mobile--logo flex-center">
              <a href="<?= home_url() ?>">
                <img src="<?= home_url() ?>/wp-content/uploads/logo.png" alt="Hung Sing">
              </a>
            </div>
            <div class="header-mobile--button-menu">
              <i class="fas fa-bars text-white fa-lg"></i>
            </div>
          </div>
          <div class="container-mobile-menu">
            <?php
              $args = array(
                'menu' => 'mobile',
                'container' => false
              );
              wp_nav_menu($args);
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>