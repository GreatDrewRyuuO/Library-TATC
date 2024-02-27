<!-- <section class="vh-100 gradient-custom mb-5" style="background-image: url('A.jpg');"> -->
<section class="vh-100 gradient-custom" style="background-color: #3498db;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <?php include('./controllers/auth.php') ?>
                <form class=" px-3" method="post">
          <div class="card-body p-5 text-center">
              <div class="mb-md-6 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" id="username" name="m_user" class="form-control form-control-lg" />
                  <label class="form-label" for="username">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="password" name="m_pass" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              </div>

              <div>
                <p class="mb-0">ยังไม่มีบัญชีสำหรับสมาชิก ? <a href="?page=register" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
