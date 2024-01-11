<div class="aut tab">
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
    <div style="display: flex;">
        <div class="clo">問卷名稱</div>
        <div>
            <input type="text" name="subject">
        </div>
    </div>
    <div>
        <div id="opt" class="clo">選項
            <input type="text" name="option[]">
            <input type="button" value="更多" onclick="more()">
        </div>
    </div>
    <div class="ct">
        <input type="submit" value="新增"><input type="reset" value="清空">
    </div>
    </form>
</fieldset>

<script>
    function more(){
        let opt=`<div id="opt" class="clo">選項
                    <input type="text" name="option[]">
                </div>`
        $("#opt").before(opt);
    }
</script>
</div>