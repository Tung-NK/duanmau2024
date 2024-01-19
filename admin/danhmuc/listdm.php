<div class="card">
<div class="border-top">
        <div class="card-body">
            <a href="index.php?act=adddm">
                <input type="submit" class="btn btn-success" value="Thêm danh mục">
            </a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title m-b-0">Danh sách danh mục</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>
                        <label class="customcheckbox m-b-20">
                            <input type="checkbox" id="mainCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th scope="col">ID Danh mục</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="customtable">
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm = "index.php?act=suadm&id=" . $id;
                    $xoadm = "index.php?act=xoadm&id=" . $id;

                    echo '<tr>
                        <th>
                            <label class="customcheckbox">
                                <input type="checkbox" class="listCheckbox" />
                                <span class="checkmark"></span>
                            </label>
                        </th>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>
                        <a href="' . $suadm . '"><input type="button" class="btn btn-primary" value="Sửa"></a>
                        <a href="' . $xoadm . '"><input type="button" class="btn btn-primary" value="Xoá"></a>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>