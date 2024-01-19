<form action="index.php?act=addsp" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="card-body">
        <h4 class="card-title">Personal Info</h4>
        <div class="form-group row">
            <label class="col-md-2 text-center m-t-15">Single Select</label>
            <div class="col-md-9 ">
                <select name="iddm" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                    <?php
                    foreach ($listdanhmuc as $dm) {
                        extract($dm);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="fname" class="col-sm-2 text-center control-label col-form-label">Tên sản phẩm</label>
            <div class="col-sm-9">
                <input type="text" name="tensp" class="form-control" id="fname" placeholder="Tên sản phẩm">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors) && empty($_POST['tensp'])) : ?>
                    <div class="text-danger">Vui lòng nhập tên sản phẩm</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Giá</label>
            <div class="col-sm-9">
                <input type="text" name="giasp" class="form-control" id="lname" placeholder="Giá sản phẩm">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors) && (empty($_POST['giasp']) || floatval($_POST['giasp']) <= 0)) : ?>
                    <div class="text-danger">Giá sản phẩm phải lớn hơn 0 và không được để trống</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 text-center">Hình ảnh</label>
            <div class="col-md-9">
                <div class="custom-file">
                    <input type="file" name="hinh" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile"></label>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors) && empty($_FILES['hinh']['name'])) : ?>
                        <div class="text-danger">Vui lòng chọn hình ảnh sản phẩm</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="cono1" class="col-sm-2 text-center control-label col-form-label">Mô tả</label>
            <div class="col-sm-9">
                <textarea name="mota" class="form-control"></textarea>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors) && empty($_POST['mota'])) : ?>
                    <div class="text-danger">Vui lòng nhập mô tả sản phẩm</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Thông báo lỗi chung -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) : ?>
            <div class="text-danger">Vui lòng nhập đầy đủ thông tin cho các trường dữ liệu.</div>
        <?php endif; ?>
    </div>

    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới">
            <a href="index.php?act=listsp"><input type="button" class="btn btn-success" value="Danh sách sản phẩm"></a>
            <input type="reset" class="btn btn-danger" value="Nhập lại">
        </div>
    </div>
</form>