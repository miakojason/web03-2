<div id="select">
    <h3 class="ct">線上訂票</h3>
    <div class="order">
        <div>
            <label for="">電影</label>
            <select name="movie" id="movie"></select>
        </div>
        <div>
            <label for="">日期</label>
            <select name="date" id="date"></select>
        </div>
        <div>
            <label for="">場次</label>
            <select name="session" id="session"></select>
        </div>
        <div>
            <button>確定</button>
            <button>重置</button>
        </div>
    </div>
</div>
<div id="booking" style="display:none;">
</div>
<script>
    let url =new URL(window.location.href)
    function getMovies(){
        $.post("./api/get_movies.php",(movies)=>{
            $("#movie").html(movies);
            if(url.searchParams.has('id')){
                $(`$movie option[value='${url.searchParams.get('id')}']`).prop('selected',true)
            }
            getDates($("#movie").val())
        })
    }
</script>