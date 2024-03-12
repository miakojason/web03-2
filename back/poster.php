<style>
    .item div {
        width: 25%;
    }
</style>
<h1>預告片清單</h1>
<div style="display: flex;justify-content:space-around;">
    <div>預告片海報</div>
    <div>預告片片名</div>
    <div>預告片排序</div>
    <div>操作</div>
</div>
<form action="./api/save_poster.php" method="post">
    <div style="height:200px;overflow:auto">
        <?php
        $rows = $Poster->all(" order by rank");
        foreach ($rows as $idx=>$row) {
        ?>
       
        <div class="item" style="display: flex;text-align: center;">
            <div><img src="./img/<?=$row['img'];?>" style="width:50px;heigth:50px;"></div>
            <div><input type="text" name="name[]" value="<?=$row['name'];?>"></div>
            <div>
               <input class="btn" type="button" value="往上" data-id="<?=$row['id'];?>" data-sw="<?=($idx!==0)?$rows[$idx-1]['id']:$row['id'];?>">
               <input class="btn" type="button" value="往下" data-id="<?=$row['id'];?>" data-sw="<?=((count($rows)-1)!=$idx)?$rows[$idx+1]['id']:$row['id'];?>">
            </div>
            <div>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>>顯示
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
                <select name="ani[]" id="">
                    <option value="1"<?=($row['ani']==1)?'selected':'';?>>淡入淡出</option>
                    <option value="2"<?=($row['ani']==2)?'selected':'';?>>收縮</option>
                    <option value="3"<?=($row['ani']==3)?'selected':'';?>>滑入滑出</option>
                </select>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>

<hr>
<h1>新增預報片海報</h1>
<form action="./api/save_poster.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>預告片海報:</td>
            <td><input type="file" name="img" id=""></td>
            <td>預告片片名:</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>