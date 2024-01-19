<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Danh sách sản phẩm</h5>
    </div>
    <div class="table-responsive">
    <div class="border-top">
        <div class="card-body">
            <a href="index.php?act=addsp"><input type="button" class="btn btn-success" value="Thêm sản phẩm"></a>
        </div>
    </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>
                        <label class="customcheckbox m-b-20">
                            <input type="checkbox" id="mainCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th scope="col">ID sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php
            foreach ($listsanpham as $sp) {
                extract($sp);
                $suasp= "index.php?act=suasp&id=".$id;
                $xoasp= "index.php?act=xoasp&id=".$id;
                $hinhpath = "../upload/" . $image;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='100'>";
                } else {
                    $hinh = "Không có hình ảnh";
                }
                echo '<tbody class="customtable">
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$hinh.'</td>
                    <td>'.$price.'</td>
                    <td>'.$mota.'</td>
                    <td>
                        <a href="'.$suasp.'"><input type="button" class="btn btn-primary" value="Sửa"></a>
                        <a href="'.$xoasp.'"><input type="button" class="btn btn-primary" value="Xoá"></a>
                    </td>
                </tr>
            </tbody>';
            }
            ?>
        </table>
    </div>
</div>