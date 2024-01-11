<div class="aut tab">
<fieldset>
    <legend>最新文章管理</legend>
    <form action="./edit_news.php" method="post"></form>
    <table style="width:55%;margin:auto;text-align:center">
        <tr>
            <th>編號</th>
            <th style="width:70%">標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all("limit $start,$div");
            foreach ($rows as $idx => $row) {
            ?>
        <tr>
            <td class="clo"><?= $idx + 1 + $start . "."; ?></td>
            <td><?= $row['title']; ?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </td>
        </tr>
    <?php
            }
    ?>
    </tr>
    </table>
    <div class="ct">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='back.php?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px' : 'font-size:16px';
            echo "<a href='back.php?do=news&p=$i' style='{$size}'>";
            echo $i;
            echo "</a>";
        }

        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='back.php?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
    </form>
</fieldset>
</div>