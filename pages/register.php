<!-- <section class="vh-100 gradient-custom mb-5" style="background-image: url('A.jpg');"> -->
<section class="vh-100 gradient-custom mb-5 ">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form class="mb-md-6 mt-md-4 pb-5" id="registerForm" action="./controllers/regis.php" method="POST">
                            <div class="mb-md-6 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter your Account ID!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                    <label class="form-label" for="username">Username</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

                                <div>
                                    <p class="mb-0">มีบัญชีอยู่แล้ว ? <a href="?page=login" class="text-white-50 fw-bold">Login</a>
                                    </p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>