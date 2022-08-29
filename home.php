<?php
//Template Name: Home
get_header();
?>
<?php hero_header_home(); ?>
<section id="first-section" class="cards cards-menu">
  <div class="container-wrap">
    <div class="cards-menu_holder grids four_grids" date-anima="card">
      <?php
      if (have_rows('cards')) :
        while (have_rows('cards')) :
          the_row();
          $card_1 = get_sub_field('card_1');
          $card_2 = get_sub_field('card_2');
          $card_3 = get_sub_field('card_3');
          $card_4 = get_sub_field('card_4'); ?>

      <?php if ($card_1) : ?>
      <a class="cards-menu--item text-center four_grids--item">
        <img src="<?= $card_1['imagem'] ?>" class="cards-menu-image" alt="">
        <h3 class="normal-title text-gold text-bold text-upper"><?= $card_1['titulo'] ?></h3>
        <p class="normal-text"><?= $card_1['conteudo'] ?></p>
      </a>
      <?php endif; ?>
      <?php if ($card_2) : ?>
      <a class="cards-menu--item text-center four_grids--item">
        <img src="<?= $card_2['imagem'] ?>" class="cards-menu-image" alt="">
        <h3 class="normal-title text-gold text-bold text-upper"><?= $card_2['titulo'] ?></h3>
        <p class="normal-text"><?= $card_2['conteudo'] ?></p>
      </a>
      <?php endif; ?>
      <?php if ($card_3) : ?>
      <a class="cards-menu--item text-center four_grids--item">
        <img src="<?= $card_3['imagem'] ?>" class="cards-menu-image" alt="">
        <h3 class="normal-title text-gold text-bold text-upper"><?= $card_3['titulo'] ?></h3>
        <p class="normal-text"><?= $card_3['conteudo'] ?></p>
      </a>
      <?php endif; ?>
      <?php if ($card_4) : ?>
      <a class="cards-menu--item text-center four_grids--item">
        <img src="<?= $card_4['imagem'] ?>" class="cards-menu-image" alt="">
        <h3 class="normal-title text-gold text-bold text-upper"><?= $card_4['titulo'] ?></h3>
        <p class="normal-text"><?= $card_4['conteudo'] ?></p>
      </a>
      <?php endif; ?>
      <?php
        endwhile;
      endif;
      ?>
      <!--<a class="cards-menu--item text-center four_grids--item">
          <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-filosofia.png" class="cards-menu-image" alt="">
          <h3 class="normal-title text-gold text-bold text-upper">Filosofia</h3>
          <p class="normal-text">Em nossas academias, trabalhamos diariamente pensando em melhorar a qualidade de vida de  nossos alunos.</p>
        </a>
        <a class="cards-menu--item text-center four_grids--item">
          <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-treinamento.png" class="cards-menu-image" alt="">
          <h3 class="normal-title text-gold text-bold text-upper">Treinamento</h3>
          <p class="normal-text">Na Hung Sing Kung Fu Academy as turmas são divididas de acordo com a idade, graduação no estilo ou modalidade.</p>
        </a>
        <a class="cards-menu--item text-center four_grids--item">
          <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-estilo.png" class="cards-menu-image" alt="">
          <h3 class="normal-title text-gold text-bold text-upper">Estilo</h3>
          <p class="normal-text">Aqui ensinamos o estilo Choy Lay Fut, que é um dos mais eficientes e populares estilos de Kung Fu praticados na atualidade.</p>
        </a>
        <a class="cards-menu--item text-center four_grids--item">
          <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-treinamento.png" class="cards-menu-image" alt="">
          <h3 class="normal-title text-gold text-bold text-upper">Mestre</h3>
          <p class="normal-text">Conheça um pouco mais sobre os Mestres responsáveis pela continuidade e expansão do estilo Choy Lay Fut ensinado na Hung Sing.</p>
        </a>-->
    </div>
  </div>
</section>
<section class="academias">
  <div class="container-wrap">
    <div class="academias_holder grids two_grids">
      <div class="academias--item two_grids--item">
        <div class="chamada-unidade bg_gray box-moldura">
          <p class="normal-text"><i class="fas fa-map-marker-alt"></i> 13 Academias espalhadas pelo país</p>
        </div>
        <div class="title-container">
          <h2 class="normal-title text-yellow text-bold text-upper">Encontre a unidade mais proxima de você</h2>
          <p class="normal-text">Veja qual das academias está mais perto de você e saiba mais informações.</p>
        </div>
        <div class="form-unidades">
          <select class="select-unidades" id="select-unidades">
            <option>Selecione uma unidade</option>
            <option value="<?= home_url() ?>/alecrins">Alecrins</option>
            <option value="<?= home_url() ?>/kung-fu-feira-de-santana-ba">Feira de Santana</option>
            <option value="<?= home_url() ?>/guarulhos-kung-fu/">Guarulhos</option>
            <option value="<?= home_url() ?>/joinville-kung-fu/">Joinville</option>
            <option value="<?= home_url() ?>/lapa-kung-fu/">Lapa</option>
            <option value="<?= home_url() ?>/natal-kung-fu/">Natal</option>
            <option value="<?= home_url() ?>/kung-fu-nova-europa/">Nova Europa</option>
            <option value="<?= home_url() ?>/kung-fu-pacaembu/">Pacaembu</option>
            <option value="<?= home_url() ?>/kung-fu-perdizes/">Perdizes</option>
            <option value="<?= home_url() ?>/kung-fu-pinheiros/">Pinheiros</option>
            <option value="<?= home_url() ?>/kung-fu-tatuape/">Tatuapé</option>
            <option value="<?= home_url() ?>/kung-fu-vila-prudente/">Vila Prudente</option>
            <option value="<?= home_url() ?>/kung-fu-vitoria/">Vitória</option>
          </select>
          <button class="button-unidades">Buscar</button>
        </div>
      </div>
      <div class="academias--item two_grids--item">
        <img src="<?= home_url() ?>/wp-content/uploads/mapa-unidades.png" alt="Mapa Unidades Academias Hung Sing">
      </div>
    </div>
  </div>
</section>
<?php
$cat_dep = get_field('categorias_depoimento');
echo do_shortcode('[depoimentos cat="' . $cat_dep . '"]');
?>
<?php chamada_artista_marcial(); ?>
<!--<section class="artista-marcial">
    <div class="artista-marcial_holder grids two_grids">
      <div class="artista-marcial--item two_grids--item" >
        <img src="<?= home_url() ?>/wp-content/uploads/thumbnail-quer-ser-artistamarcial.jpg" alt="">
      </div>
      <div class="artista-marcial--item bg_gray two_grids--item">
        <div class="half-container-wrap">
          <div class="artista-marcial-info">
            <h2 class="super-title">Quero ser um<br>Artista Marcial</h2>
            <a href="contato" class="button-only-border normal-text text-bold">Começar minha jornada no Kung Fu</a>
          </div>
        </div>
      </div>
    </div>
  </section>-->
<script>
if (window.innerWidth < 960) {
  const cards_slider = new SiemaWithDots({
    selector: '.cards-menu_holder',
    duration: 250,
    threshold: 0,
    loop: true,
    onInit: function() {
      this.addDots();
      this.updateDots();
    },
    onChange: function() {
      this.updateDots()
    },
  });
  setInterval(() => cards_slider.next(), 5000);
}

const select_unidades = document.querySelector('.select-unidades')
const button_unidades = document.querySelector('.form-unidades .button-unidades')

button_unidades.addEventListener('click', () => location.href = select_unidades.value)
</script>
<?php
get_footer();
?>