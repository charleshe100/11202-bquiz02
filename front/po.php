<style>
    .type-item{
        display: block;
        margin: 3px 6px;
    }
    .types,.news-list{
        display: inline-block;
        vertical-align: top;
    }
    .news-list{
        width: 600px;
    }

</style>

<div class="nav">目前位置：首頁 > 分類網誌 > <span class="type"></span></div>
<fieldset class="types">
    <legend>分類網誌</legend>
    <a class="type-item" data-id="1">健康新知  </a>
    <a class="type-item" data-id="2">菸害防治</a>
    <a class="type-item" data-id="3">癌症防治</a>
    <a class="type-item" data-id="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list">
    <legend>文章列表</legend>
    <div class="list-items" style="display:none"></div>
    <div class="article"></div>

</fieldset>

<script>
    getList(1)
    $(".type-item").on('click',function(){
        $(".type").text($(this).text())
        let type=$(this).data('id')
        getList(type)
    })

    function getList(type){
        $.get("./api/get_list.php",{type},(list)=>{
            $(".list-items").html(list)
            $(".article").hide()
            $(".list-items").show()
            // 若要用toggle，則list-items的後面要加上 style="display:none"
            // 但因為不是同個按鈕，所以會產生問題
            // $(".article, .list-items").toggle()

        })
    }

    function getNews(id){
        $.get("./api/get_news.php",{id},(news)=>{
                    //id是id（資料庫欄位）,id（functiond的(id)。名字相同可只寫一個。
                    //news是自行命名
            $(".article").html(news)
            // 拿到的news放到.article裡
            $(".list-items").hide()
            $(".article").show()
            // $(".article, .list-items").toggle()
        })
    }
    
</script>