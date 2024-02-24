<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Static Table</h5>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Tel</th>
                <th scope="col">Rol</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php
        foreach ($listtk as $tk) {
            extract($tk);
            $suatk = "index.php?act=suatk&id=".$id;
            $xoatk = "index.php?act=xoatk&id=".$id;
            $rol = ($role == 1) ? 'Admin' : 'User';
            echo '<tbody>
                <tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $user . '</td>
                    <td>' . $email . '</td>
                    <td>' . $phone . '</td>
                    <td>' . $rol . '</td>
                    <td>
                    <a href="' . $suatk . '"><input type="button" class="btn btn-primary" value="Sửa"></a>
                    <a href="' . $xoatk . '"><input type="button" class="btn btn-primary" value="Xoá"></a>
                    </td>
                </tr>
            </tbody>';
        }
        ?>
    </table>
</div>