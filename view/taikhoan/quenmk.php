<div style="margin-top: 100px" class="container py-5">
    <h1 class="mb-4 text-center">Register</h1>
    <form style="width: 500px; margin: 0 auto;" action="index.php?act=quenmk" method="post">
        <div class="form-group mb-3">
            <label for="city">User</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn...">
        </div>

        <div class="form-group mb-3">
            <input type="submit" name="guiemail" value="Continue" class="btn btn-primary">
        </div>

        <?php
        if (isset($sendMailMess) && ($sendMailMess != '')) {
            echo $sendMailMess;
        }
        ?>

    </form>

</div>
