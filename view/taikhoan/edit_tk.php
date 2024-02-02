<div style="margin-top: 100px" class="container py-5">
    <h1 class="mb-4 text-center">Account</h1>
    <?php
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        extract($_SESSION['user']);
    }
    ?>
    <form style="width: 500px; margin: 0 auto;" action="index.php?act=edit_tk" method="post">

        <div class="form-group mb-3">
            <label for="companyName">User</label>
            <input type="text" name="user" class="form-control" id="l-name" value="<?= $user ?>">
            <?php if (isset($errors['user'])) : ?>
                <span class="text-danger"><?= $errors['user']; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="city">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?= $email ?>">
            <?php if (isset($errors['email'])) : ?>
                <span class="text-danger"><?= $errors['email']; ?></span>
            <?php endif; ?>
        </div>


        <div class="form-group mb-3">
            <label for="companyName">Password</label>
            <input type="text" name="pass" class="form-control" id="inputPassword" value="<?= $pass ?>">
            <?php if (isset($errors['pass'])) : ?>
                <span class="text-danger"><?= $errors['pass']; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="companyName">Tel</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?= $phone ?>">
            <?php if (isset($errors['phone'])) : ?>
                <span class="text-danger"><?= $errors['phone']; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group mb-4">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="capnhat" class="btn btn-primary" value="Save">
        </div>

        <!--        <div class="form-group mb-3">-->
        <!--            <label class="form-check-label" for="Account-1"><a href="">Do you have an account? Log in now</a></label>-->
        <!--        </div>-->
    </form>
</div>

