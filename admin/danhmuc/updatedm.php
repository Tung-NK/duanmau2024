<?php
if (isset($dm) && is_array($dm)) {
    extract($dm);
}
?>

<form action="index.php?act=updatedm" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="card-body">
        <h4 class="card-title">Personal Info</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-2 text-center control-label col-form-label">ID Danh mục</label>
            <div class="col-sm-9">
                <input type="text" name="maloai" class="form-control" id="fname" value="<?= $id?>" placeholder="ID Danh mục" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="fname" class="col-sm-2 text-center control-label col-form-label">Tên danh mục</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="fname" placeholder="Tên danh mục" value="<?= isset($name) ? $name : ''; ?>">
                <?php
                if (isset($thongbao) && ($thongbao != ""))
                    echo $thongbao;
                ?>
            </div>
        </div>


        <div class="border-top text-center">
            <div class="card-body">
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật">
                <input type="reset" class="btn btn-danger" value="Nhập lại">
            </div>
        </div>

</form>