<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>
  

   
    <section class="admin_login container-fluid">
        <div class="row">
            <div class="bg-image">
                <img src="images/background.jpg" alt="background" class="img-responsive">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">Admin Panel</h1>
                    <h4 class="text-center text-grey text-capitalize">Login Here to  update.</h4>
                    <form action="includes/admin_login_proccess.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="admin_email" class="form-control input-custom" id="email" placeholder="Admin Email">
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="admin_password" class="form-control input-custom" id="password" placeholder="********">
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-lg btn-primary">
                        <input type="reset" name="reset" value="Refresh" class="btn btn-lg btn-default">
                    </form>
                </div>
            </div>
        </div>
    </section>

<!-- footer part include here -->
    <?php include"includes/footer.php"?>