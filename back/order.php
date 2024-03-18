<h1>訂單清單</h1>
<div>
    快速刪除: <input type="radio" name="" value="">
    依日期<input type="text" name="" id="">
    <input type="radio" name="" id="">依電影
    <select name="" id="">
        <option value="">電影00</option>
    </select>
    <button>刪除</button>
</div>
<div style="height: 330px;overflow:auto">
    <table style="text-align: center;">
        <tr>
            <th>訂單編號</th>
            <th>電影名稱</th>
            <th>日期</th>
            <th>場次時間</th>
            <th>訂購數量</th>
            <th>訂購位置</th>
            <th>操作</th>
        </tr>
        <?php
        $rows = $Orders->all();
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['no']; ?></td>
                <td><?= $row['movie']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['session']; ?></td>
                <td><?= $row['qt']; ?></td>
                <td>
                    <?php
                    $seats = unserialize($row['seat']);
                    foreach ($seats as $seat) {
                        echo floor(($seat / 5) + 1) . "排" . (($seat % 5) + 1) . "號<br>";
                    }
                    ?>
                </td>
                <td><button onclick="del(<?= $row['id']; ?>)">刪除</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<script>
    function del(id) {
        $.post(".api/del.php", {
            table: 'orders',
            id
        }, () => {
            location.reload();
        })
    }
</script>