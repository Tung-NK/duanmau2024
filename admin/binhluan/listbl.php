<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Bình luận</h5>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày bình luận</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listbinhluan as $bl) {
                extract($bl);
                $xoabl = "index.php?act=xoabl&id=" . $id;
                echo '<tr>
                    <th>' . $id . '</th>
                    <td>' . $noidung . '</td>
                    <td>' . $ngaybinhluan . '</td>
                    <td>
                        <a href="' . $xoabl . '"><input type="button" class="btn btn-primary" value="Xoá"></a>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>