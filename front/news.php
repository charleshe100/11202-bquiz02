<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width: 95%;margin:auto;text-align:center">
        <tr>
            <th class="clo" width="30%">標題</th>
            <th class="clo" width="50%">內容</th>
            <th class="clo" ></th>
        </tr>
        <?php
        $total=$News->count();
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$News->all(['sh'=>1]," limit $start,$div");
        foreach($rows as $row){
        ?>
        <tr>
            <td><div class="title" data-id="<?=$row['id'];?>" style="cursor: pointer">
                    <?=$row['title'];?>
                </div>
            </td>
            <td>
                <div id="s<?=$row['id'];?>" >
                    <?=mb_substr($row['news'],0,25);?>...
                </div>
                <div id="a<?=$row['id'];?>" style="display:none" >
                    <?=$row['news'];?>
                </div>
            </td>
            <td>
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
                if($now>1){
                    $prev=$now-1;
                    echo "<a href='?do=$do&p=$prev'> < </a>";
                }

                for($i=1;$i<=$pages;$i++){
                    $fontsize=($now==$i)?'24px':'16px';
                    echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
                }

                if($now<$pages){
                    $next=$now+1;
                    echo "<a href='?do=$do&p=$next'> > </a>";
                }
            ?>
        </div>
</fieldset>
<script>
    $(".title").on('click',(e)=>{
        let id=$(e.target).data('id');
        $(`#s${id},#a${id}`).toggle();
    })
</script>