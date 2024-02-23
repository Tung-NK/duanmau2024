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
            <th scope="col">Giá cao nhất</th>
            <th scope="col">Giá thấp nhất</th>
            <th scope="col">Sản phẩm có lượt bán cao nhất</th>
            <th scope="col">Số lượt bán cao nhất</th>
            <th scope="col">Sản phẩm có lượt bán thấp nhất</th>
            <th scope="col">Số lượt bán thấp nhất</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($thongke_data as $data) : ?>
            <tr>
                <td><?php echo $data['madm']; ?></td>
                <td><?php echo $data['tendm']; ?></td>
                <td><?php echo $data['maxprice']; ?></td>
                <td><?php echo $data['minprice']; ?></td>
                <td><?php echo $data['tensp']; ?></td>
                <td><?php echo $data['soluong']; ?></td>
                <!-- Hiển thị sản phẩm có lượt bán thấp nhất và số lượt bán của nó -->
                <?php if ($lowest_sold_product): ?>
                    <?php foreach ($lowest_sold_product as $product) : ?>
                        <td><?php echo $product['tensp']; ?></td>
                        <td><?php echo $product['soluong']; ?></td>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

