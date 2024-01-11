<?php include_once "./api/db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<style>
		.pop {
			background: rgba(51, 51, 51, 0.8);
			color: #FFF;
			height: 300px;
			width: 300px;
			position: absolute;
			display: none;
			z-index: 9999;
			overflow: auto;
			padding:10px;
		}
	</style>
</head>

<body>

	<div id="all">
		<div id="title">
			<?= date("m月d日 l"); ?> |
			今日瀏覽: <?= $Total->find(['date' => date("Y-m-d")])['total']; ?> |
			累積瀏覽: <?= $Total->sum('total'); ?>
			<a href="index.php" style='float:right'>回首頁</a>
		</div>
		<div id="title2" title='健康促進網-回首頁'>
			<a href='index.php'><img src="./icon/02B01.jpg" alt=""></a>
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<div>
					<marquee style="width:80%; display:inline-block;">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>

					<span style="width:16%; display:inline-block;">
						<?php
						if (!isset($_SESSION['user'])) {
						?>
							<a href="?do=login">會員登入</a>
						<?php
						} else {
						?>
							歡迎,<?= $_SESSION['user']; ?>
							<button onclick="location.href='./api/logout.php'">登出</button>
							<?php
							if ($_SESSION['user'] == 'admin') {
							?>
								<button onclick="location.href='back.php'">管理</button>
						<?php
							}
						}
						?>
					</span>
					<div class="">
						<?php
						$do = $_GET['do'] ?? 'main';
						$file = "./front/{$do}.php";
						if (file_exists($file)) {
							include $file;
						} else {
							include "./front/main.php";
						}

						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2024健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>