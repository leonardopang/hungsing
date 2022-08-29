  <footer class="footer bg_black">
    <div class="container-wrap">
      <div class="footer-top_holder grids two_grids">
        <div class="footer-top--item two_grids--item"></div>
        <div class="footer-top--item two_grids--item">
          <div class="footer-info grids two_grids">
            <div class="footer-info--item">
              <a href="<?= home_url() ?>" class="logo-footer"><img src="<?= home_url() ?>/wp-content/uploads/logo.png"
                  alt="Hung Sing"></a>
            </div>
            <div class="footer-info--item">
              <div class="footer-contato grids two_grids">
                <div class="footer-contato--item two_grids--item">
                  <h3 class="text-white normal-text text-bold">E-mail</h3>
                  <a href="mailto:contato@hungsing.com.br" class="normal-text text-white">contato@hungsing.com.br</a>
                  <div class="footer-socials">
                    <p class="normal-text text-white text-bold" style="margin:.5rem 0;">Redes Sociais</p>
                    <a href="https://www.facebook.com/HungSingKungFuAcademy/" target="_blank"
                      class="fab fa-facebook-f fa-lg text-white"></a>
                    <a href="https://www.instagram.com/hungsingkungfuacademy/" target="_blank"
                      class="fab fa-instagram fa-lg text-white"></a>
                  </div>
                </div>
                <div class="footer-contato--item footer-reverse-mobile two_grids--item">
                  <h3 class="text-white normal-text text-bold">Telefone</h3>
                  <a href="tel:+551130342532" class="text-white normal-text">(11) 3034-2532</a>
                  <h3 class="text-white normal-text text-bold" style="margin-top: .5rem;">WhatsApp</h3>
                  <a href="https://api.whatsapp.com/send?phone=5511991496560" target="_blank"
                    class="text-white normal-text">(11) 99149-6560</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="footer-bootom_holder text-center">
          <p class="normal-text text-white">Hung Sing Kung Fu Academy © 2021 | Site desenvolvido por <a
              href="https://dp8.studio/" class="text-white" target="_blank">Estúdio DP8</a></p>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <script>
const button_menu = document.querySelector('.header-mobile--button-menu .fa-bars')
const open_menu = document.querySelector('.container-mobile-menu')

button_menu.addEventListener('click', () => open_menu.classList.toggle('open'))

const arrows_down = document.querySelector('.arrows-down a')

function moveToSetion(event) {
  event.preventDefault()
  const target = event.currentTarget
  const href = target.getAttribute('href')
  const section = document.querySelector(href)
  section.scrollIntoView({
    behavior: 'smooth',
    block: 'start',
  })
}

arrows_down.addEventListener('click', moveToSetion)
  </script>
  <script type="module" src="<?= get_template_directory_uri() ?>/public/js/app.js"></script>
  </body>

  </html>