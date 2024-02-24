<div class="card">
    <div class="border-top">
        <div class="card-body">
            <a href="index.php?act=bieudo" class="btn btn-secondary">Biểu đồ</a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title m-b-0">Thống kê</h5>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Mã danh mục</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Số lượng sản phẩm</th>
            <th scope="col">Giá cao nhất</th>
            <th scope="col">Giá thấp nhất</th>
            <th scope="col">Giá trung bình</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($thongke_data as $data) {
            extract($data);
            echo '<tr>
                <td>' . $data['madm'] . '</td>
                <td>' . $data['tendm'] . '</td>
                <td>' . $data['countsp'] . '</td>
                <td>' . $data['maxprice'] . '</td>
                <td>' . $data['minprice'] . '</td>
                <td>' . $data['avgprice'] . '</td>
            </tr>';
        } ?>
        </tbody>
    </table>
</div>
