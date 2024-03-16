<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <div class="lists" style="width: 420px;height: 300px;">
        <?php
        $rows = $Poster->all(['sh' => 1], " order by rank");
        foreach ($rows as $row) {
        ?>
          <div class="item" data-ani="<?= $row['ani']; ?>" style="height: 300px;">
            <div><img src="./img/<?= $row['img']; ?>" style="width:200px;height: 250px;"></div>
            <div><?= $row['name']; ?></div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="control">
        <div class="left"><img src="./icon/l.jpg" alt=""></div>
          <div class="btns">
            <?php
            foreach ($rows as $idx => $row) {
            ?>
            <div class="btn">
              <div><img src="./img/<?=$row['img'];?>" alt=""></div>
              <div><?=$row['name'];<?>/div>
            </div>
            <?php
            }
            ?>
          </div>
          <div class="right"><img src="./icon/r.jpg" alt=""></div>
        </div>
      </div>

      <script>
        $(".item").eq(0).show(); //指定第一張海報先顯示
        let total = <?= $Poster->count(['sh' => 1]); ?> //計算有幾張海報
        let now = 0; //設定從0開始
        let next = 0; //設定下一張為0
        let timer = setInterval(() => {
          slide()
        }, 3000);

        function slide(n) {
          let ani = $(".item").eq(now).data("ani"); //取得目前顯示的海報的動畫效果
          if (typeof(n) == 'undefined') {
            next = now + 1;
            if (next >= total) {
              next = 1;
            }
          } else {
            next = n
          }
          switch (ani) {
            case 1: //淡入淡出
              $(".item").eq(now).fadeOut(1000, function() {
                $(".item").eq(next).fadeIn(1000);
              });
              break;
            case 2: //縮放
              $(".item").eq(now).hide(1000, function() {
                $(".item").eq(next).show(1000);
              });
              break;
            case 3: //滑入滑出
              $(".item").eq(now).slideUp(1000, function() {
                $(".item").eq(next).slideDown(1000);
              });
              break;
          }
          now = next;
        }

        $(".btns").hover(
          function() {
            clearInterval(timer)
          },
          function() {
            timer = setInterval(() => {
              slide()

            }, 3000);
          }
        )
      </script>
    </div>
  </div>
</div>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <table>
      <tbody>
        <tr> </tr>
      </tbody>
    </table>
    <div class="ct"> </div>
  </div>
</div>