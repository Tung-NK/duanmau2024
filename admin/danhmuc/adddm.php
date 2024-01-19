<form action="index.php?act=adddm" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="card-body">
        <h4 class="card-title">Personal Info</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-2 text-center control-label col-form-label">ID Danh mục</label>
            <div class="col-sm-9">
                <input type="text" name="maloai" class="form-control" id="fname" placeholder="ID Danh mục" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-2 text-center control-label col-form-label">Tên danh mục</label>
            <div class="col-sm-9">
                <input type="text" name="tenloai" class="form-control" id="fname" placeholder="Tên danh mục">
                <?php if (isset($thongbao) && $thongbao !== "") : ?>
                    <?php echo $thongbao; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="border-top text-center">
            <div class="card-body">
                <input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới">
                <a href="index.php?act=listdm"><input type="button" class="btn btn-success" value="Danh sách danh mục"></a>
                <input type="reset" class="btn btn-danger" value="Nhập lại">
            </div>
        </div>
</form>