<div style="margin-top: 100px" class="container py-5">
    <h1 class="mb-4 text-center">Register</h1>
    <form style="width: 500px; margin: 0 auto;" action="index.php?act=dangki" method="post">
        <div class="form-group mb-3">
            <label for="city">User</label>
            <input type="text" name="user" class="form-control" id="l-name">
            <?php if (isset($errors['user'])) : ?>
                <span class="text-danger"><?= $errors['user'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="companyName">Email</label>
            <input type="text" name="email" class="form-control" id="email">
            <?php if (isset($errors['email'])) : ?>
                <span class="text-danger"><?= $errors['email'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="city">Pass</label>
            <input type="password" name="pass" class="form-control" id="inputPassword">
            <?php if (isset($errors['pass'])) : ?>
                <span class="text-danger"><?= $errors['pass'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <input name="dangki" type="submit" class="btn btn-primary" value="Submit">
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label" for="Account-1"><a href="index.php?act=dangnhap">Do you have an account? Log in now</a></label>
        </div>
    </form>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</div>