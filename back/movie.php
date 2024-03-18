<button>新增電影</button>
<hr>
<div style="height: 330px;overflow:auto">
    <?php
    $rows = $Movie->all(" order by rank");
    foreach ($rows as $idx => $row) {
    ?>
        <div style="display:flex">
            <div><img src="./img/<?= $row['poster']; ?>" style="width:100px"></div>
            <div>分級:<img src="./icon/03C0<?= $row['level']; ?>.png" alt=""></div>
            <div>
                <div style="display:flex">
                    <div>片名:<?= $row['name']; ?>/片長:<?= $row['length']; ?>/上映時間:<?= $row['ondate']; ?></div>
                    <div>
                        <button class="show-btn" data-id="<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? '顯示' : '隱藏'; ?></button>
                        <button class="sw-btn" data-id="<?= $row['id']; ?>" data-sw="<?= ($idx != 0) ? $rows[$idx - 1]['id'] : $row['id']; ?>">上</button>
                        <button class="sw-btn" data-id="<?= $row['id']; ?>" data-sw="<?= ((count($rows) - 1) != $idx) ? $rows[$idx + 1]['id'] : $row['id']; ?>">下</button>
                        <button class="edit-btn" data-id="<?= $row['id']; ?>">編輯電影</button>
                        <button class="del-btn" data-id="<?= $row['id']; ?>">刪除電影</button>
                    </div>
                </div>
                <div>劇情介紹<?= $row['intro']; ?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script>
    $(".sw-btn").on('click', function() {
        let id = $(this).data('id');
        let sw = $(this).data('sw');
        let table = "movie";
        $.post("./api/sw.php", {
            id,
            sw,
            table
        }, () => {
            location.reload();
        })
    })
    $(".show-btn").on('click', function() {
        let id = $(this).data('id');
        $.post("./api/show.php", {
            id
        }, () => {
            location.reload();
        })
    })
    $(".del-btn").on('click', function() {
        let id = $(this).data('id');
        let table = "movie"
        $.post("./api/del.php", {
            id,
            table
        }, () => {
            location.reload()
        })
    })
</script>