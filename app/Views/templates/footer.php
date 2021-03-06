
        <div id="footer" class="mb-0">
          <footer class="py-4 bg-light mt-auto">
              <div class="container-fluid px-4">
                  <div class="d-flex align-items-center justify-content-between small">
                      <div class="text-muted">Copyright &copy; Gustavo Quilodrán | gaqs.02@gmail.com | Puerto Montt - 2022</div>
                      <div>
                          <a href="#">Privacy Policy</a>
                          &middot;
                          <a href="#">Terms &amp; Conditions</a>
                      </div>
                  </div>
              </div>
          </footer>
        </div> <!-- /end footer -->
      </div><!-- /end sidenav_content && authentication_content-->
    </div><!-- /end sidenav && authentication -->
  </body>
</html>

<script type="text/javascript" src="<?= base_url('dist/bootstrap-5.1.3/js/bootstrap.bundle.js');?>"></script>
<script type="text/javascript" src="<?= base_url('js/scrollreveal.js');?>"></script>
<script type="text/javascript" src="<?= base_url('js/scripts.js?v=0.0');?>"></script>

<!-- Custom script -->
<script type="text/javascript">

  const toggle_button = document.querySelector('#toggle_button');
  const password = document.querySelector('#input_password');

  toggle_button.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    toggle_button.firstChild.classList.toggle('fa-eye-slash');
    toggle_button.firstChild.classList.toggle('fa-eye');
});


</script>
