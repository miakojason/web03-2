<style>
  .lists {
    position: relative;
    left: 114px;
    width: 200px;
    height: 240px;
    overflow: hidden;
  }

  .item {
    width: 200px;
    height: 240px;
    margin: auto;
    box-sizing: border-box;
    display: none;
    position: absolute;
  }

  .item * {
    box-sizing: border-box;
  }


  .controls {
    width: 420px;
    height: 100px;
    position: relative;
    margin-top: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }


.btn {
    font-size: 12px;
    text-align: center;
    flex-shrink: 0;
    /* 讓元在flex排列下保有自己的寬度不會被擠壓 */
    width: 90px;
    position: relative;
  }
</style>
<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div class="lists">
      <?php
      $posters = $Poster->all(['sh' => 1], " order by rank");
      foreach ($posters as $idx => $poster) {
      ?>
        <div class="item" data-ani="<?= $poster['ani']; ?>">
          <div><img src="./img/<?= $poster['img']; ?>" style="width:200px;height:220px;"></div>
          <div style="text-align: center;"><?= $poster['name']; ?></div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="controls">
      <div class="left"></div>
      <div class="btns" style="width:360px;height:100px;display:flex;overflow:hidden">
        <?php
        foreach ($posters as  $idx => $poster) {
        ?>
          <div class="btn">
            <div><img src="./img/<?= $poster['img']; ?>" style="width:60px;height:80px"></div>
            <div style="text-align: center;"><?= $poster['name']; ?></div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="right"></div>
    </div>
  </div>
</div>
<script>
  $(".item").eq(0).show(); //指定第一張海報先顯示
  let total = $(".btn").length //計算有幾張海報
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
        next = 0;
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
  // 
  let p = 0;
  $(".left,.right").on('click', function() {
    let arrow = $(this).attr('class');
    switch (arrow) {
      case "right":
        if (p + 1 <= (total - 4)) {
          p = p + 1;
        }
        break;
      case "left":
        if (p - 1 >= 0) {
          p = p - 1;
        }
        break;
    }
    $(".btn").animate({
      right: 90 * p
    })
  })
  $(".btn").on('click', function() {
    let idx = $(this).index();
    slide(idx);
  })
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
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <div class="movies" style="display:flex;flex-wrap:wrap;font-size: 13px;">
      <?php
      $today = date("Y-m-d");
      $ondate = date("Y-m-d", strtotime("-2 days"));
      $total = $Movie->count(" where `ondate` >= '$ondate' && `ondate` <= '$today' && `sh`=1");
      $div = 4;
      $now = $_GET['p'] ?? 1;
      $pages = ceil($total / $div);
      $start = ($now - 1) * $div;
      $movies = $Movie->all(" where `ondate` >= '$ondate' && `ondate` <= '$today' && `sh`=1 order by rank limit $start,$div");
      foreach ($movies as $movie) {
      ?>
        <div class="movie" style="display:flex;flex-wrap:wrap;width:50%">
          <div>
            <a href="?=intro&id=<?= $movie['id']; ?>">
              <img src="./img/<?= $movie['poster']; ?>" style="width:50px;height:80px">
            </a>
          </div>
          <div>
            <div><?= $movie['name']; ?></div>
            <div>分級:<img src="/icon/03C0<?= $movie['level']; ?>.png"></div>
            <div>上映日期:<?= $movie['ondate']; ?></div>
          </div>
          <div>
            <button onclick="location.href='?do=intro&id=<?= $movie['id']; ?>'">劇情介紹</button>
            <button onclick="location.href='?do=order&id=<?= $movie['id']; ?>'">線上訂票</button>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="ct">
      <?php
      if ($now > 1) {
        $prev = $now - 1;
        echo "<a href='?do=$do&p=$prev'><</a>";
      }
      for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? '24px' : '16px';
        echo "<a href='?do=$do&p=$i'>$i</a>";
      }
      if ($now < $pages) {
        $next = $i + 1;
        echo "<a href='?do=$do&p=$i'>></a>";
      }
      ?>
    </div>
  </div>
</div>
</div>