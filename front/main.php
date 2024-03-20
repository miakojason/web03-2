<style>
  .lists {
    position: relative;
    left: 114px;
    overflow: hidden;
  }
  .item {
    margin: auto;
    box-sizing: border-box;
    display: none;
    position: absolute;
  }
  .item * {
    box-sizing: border-box;
  }

  .controls {
    position: relative;
    margin-top: 10px;
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
    <div class="lists" style="width:200px;height:240px;">
      <?php
      $rows = $Poster->all(['sh' => 1], " order by rank");
      foreach ($rows as $row) {
      ?>
        <div class="item" style=:width:200px;height:240px; data-ani="<?= $row['ani']; ?>">
          <div><img src="./img/<?= $row['img']; ?>" style="width:200px;height: 220px;"></div>
          <div style="text-align: center;"><?= $row['name']; ?></div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="controls" style="width:420px;height:100px;display:flex">
      <div class="left"><img src="./icon/l.jpg" alt=""></div>
      <div class="btns" style="width:360px;height:100px;display:flex;overflow:hidden">
        <?php
        foreach ($rows as $idx => $row) {
        ?>
          <div class="btn">
            <div><img src="./img/<?= $row['img']; ?>" style="width:60px;height:80px"></div>
            <div style="text-align: center;"><?= $row['name']; ?></div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="right"><img src="./icon/r.jpg" alt=""></div>
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
  let p=0;
  $(".left,.right").on('click',function(){
    let arrow=$(this).attr('class')
    switch(arrow){
      case "right": 
        if(p+1<=(total-4)){//如果是向右按鈕，則判斷p+1是否小於總海報數量-4
          p=p+1;
        }
        break;
        case "left":
          if(p-1>=0){
            p=p-1;
          }
          break;

    }
    $(".btn").animate({right:90*p})
  })
  $(".btn").on("click",function(){
    let idx=$(this).index()
    slide(idx);
  })
  $(".btns").hover(function(){
    clearInterval(timer)
  },
  function(){
    timer=setInterval(()=>{
      slide()},3000)
  })
</script>
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