<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <div class="lists" style="width: 420px;height: 300px;">
        <?php
        $rows = $Poster->all(['sh' => 1], " order by rank");
        foreach ($rows as $row) {
        ?>

        <?php
        }
        ?>
      </div>
      <div class="btns" style="width: 420px;height:100px;display:flex">
        <div onclick="pp(1)" style="display:flex;align-items:center;"><img src="./icon/l.jpg" alt=""></div>
        <?php
        $rows = $Poster->all(['sh' => 1]);
        foreach ($rows as $idx => $row) {
        ?>
          <div class="im" id="ssaa<?= $idx; ?>">
            <img src="./img/<?= $row['img']; ?>" style="width:95px;height:100px;">
          </div>
        <?php
        }
        ?>
        <div onclick="pp(2)" style="display:flex;align-items:center;"><img src="./icon/r.jpg"></div>
      </div>
      <script>
        var nowpage = 1,
          num = <?= $Poster->count(['sh' => 1]); ?>;

        function pp(x) {
          var s, t;
          if (x == 1 && nowpage - 1 >= 0) {
            nowpage--;
          }
          if (x == 2 && nowpage < (num - 4)) {
            nowpage++;
          }
          $(".im").hide()
          for (s = 0; s <= 3; s++) {
            t = s * 1 + nowpage * 1;
            $("#ssaa" + t).show()
          }
        }
        pp(1)
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