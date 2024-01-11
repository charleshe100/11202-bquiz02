<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th  class="clo" width="30%">標題</th>
            <th  class="clo" width="50%">內容</th>
            <th class="clo" >人氣</th>
        </tr>
        <?php 
        $total=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
        foreach($rows as $row){
        ?>
        <tr>
            <td>
                <div class='title' data-id="<?=$row['id'];?>">
                    <?=$row['title'];?>
                </div>
            </td>
            <td style="position: relative;">
                <div>
                    <?=mb_substr($row['news'],0,25);?>...
                </div>
                <div id="p<?=$row['id'];?>" class="pop">
                    <h3 style='color:skyblue'><?=$row['title'];?></h3>
		            <pre><?=$row['news'];?></pre>
	            </div>
            </td>
            <td>
                <span id="g<?=$row['id'];?>"><?=$row['good'];?></span>個人說
                <img src="./icon/02B03.jpg" style="width:25px">
                <?php
                if(isset($_SESSION['user'])){
                    if($Log->count(['news'=>$row['id'],'acc'=>$_SESSION['user']])>0){
                        echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                    }else{
                        echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                    }
                }

                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
    <?php
    if(($now-1)>0){
        $prev=$now-1;
        echo "<a href='?do=pop&p=$prev'> < </a>";
    }
    for($i=1;$i<=$pages;$i++){
        $fontsize=($now==$i)?"font-size:20px":"font-size:16px";
        echo "<a href='?do=pop&p=$i' style='$fontsize'> $i </a>";
    }
    if(($now+1)<=$pages){
        $next=$now+1;
        echo "<a href='?do=pop&p=$next'> > </a>";
    }
    ?>
    </div>    
</fieldset>
<script>
$(".title").hover(
    function(){
        $(".pop").hide()
        let id=$(this).data("id")
        $("#p"+id).show();
    }
)

</script>