<div style="margin-top: 100px" class="container py-5">
    <h1 class="mb-4 text-center">Login</h1>
    <form style="width: 500px; margin: 0 auto;" action="index.php?act=dangnhap" method="post">

        <div class="form-group mb-3">
            <label for="companyName">Email</label>
            <input type="text" name="email" class="form-control" id="user" placeholder="Email">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </div>

        <div class="form-group mb-3">
            <label for="city">Pass</label>
            <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </div>
        <?php
        if (isset($tbchung) && ($tbchung != "")) {
            echo $tbchung;
        }
        ?>
        <div class="form-group mb-3">
            <input name="dangnhap" type="submit" class="btn btn-primary" value="Login">
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label" for="Account-1"><a href="index.php?act=dangki">Do you have an account? Register now</a></label>
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label" for="Account-1"><a href="index.php?act=quenmk">Forgot password</a></label>
        </div>
    </form>
</div>
