<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>トップページ</title>
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('products/index'); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="#">激安日用品.com</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

<!--	<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--		<ul class="navbar-nav mr-auto">-->
<!--			<li class="nav-item active">-->
<!--				<a class="nav-link" href="#">リンク１ <span class="sr-only">(current)</span></a>-->
<!--			</li>-->
<!--			<li class="nav-item">-->
<!--				<a class="nav-link" href="#">リンク２</a>-->
<!--			</li>-->
<!--		</ul>-->
<!--	</div>-->
</nav>

<main class="container">

	<nav aria-label="Page navigation" class="nav">
		<ul class="pagination">
			<li class="page-item">
				<?php
				echo $this->Paginator->prev(
					'«',//表示される文字列
					null,//リンクタグに加えるオプション（配列指定）
					null,//リンク無効時の文字列（デフォルト値：null）
					array('class' => 'page-link')//リンク無効時にタグに加えるオプションの指定
				);
				?>
			</li>
			<?php
			echo $this->Paginator->numbers([
				'first' => '', //ページ数が多いとき最初のページを出すか（数字で指定）
				'last' => '',//ページ数が多いとき最後のページを出すか（数字で指定）
				'before'=>'',//ページ番号の前に出力する文字を指定
				'after'=>'',//ページ番号の後に出力する文字を指定
				'modulus'=>'',//ページ番号を幾つ表示するか（デフォルト値：8）
				'separator'=>'',//ページ番号を区切る文字列（デフォルト値：|）
				'ellipsis'=>'',//省略される時に表示される文字列（デフォルト値：・・・）
				'tag'=>'li',//ページ番号を囲むタグ（デフォルト値：設定無し）
				'class'=>'page-item',//上記タグのクラス名を設定（デフォルト値：設定無し）
				'currentTag'=>'a',//表示中のページ番号のタグを設定（デフォルト値：null）
				'currentClass'=>'active',//表示中のページ番号のクラスを設定（デフォルト値：current）
			]);
			?>
			<li class="page-item">
				<?php
				echo $this->Paginator->next(
					'»',
					null,
					null,
					array('class' => 'page-link')
				);
				?>
			</li>
		</ul>
	</nav>

	<div class="card-deck col-md-12">
		<?php foreach ($productList as $item) { ?>
			<?= $this->element('Product/product-list', ['item' => $item]) ?>
		<?php } ?>
	</div>
</main>
<nav aria-label="Page navigation" class="nav">
	<ul class="pagination">
		<li class="page-item">
			<?php
			echo $this->Paginator->prev(
				'«',//表示される文字列
				null,//リンクタグに加えるオプション（配列指定）
				null,//リンク無効時の文字列（デフォルト値：null）
				array('class' => 'page-link')//リンク無効時にタグに加えるオプションの指定
			);
			?>
		</li>
		<?php
		echo $this->Paginator->numbers([
			'first' => '', //ページ数が多いとき最初のページを出すか（数字で指定）
			'last' => '',//ページ数が多いとき最後のページを出すか（数字で指定）
			'before'=>'',//ページ番号の前に出力する文字を指定
			'after'=>'',//ページ番号の後に出力する文字を指定
			'modulus'=>'',//ページ番号を幾つ表示するか（デフォルト値：8）
			'separator'=>'',//ページ番号を区切る文字列（デフォルト値：|）
			'ellipsis'=>'',//省略される時に表示される文字列（デフォルト値：・・・）
			'tag'=>'li',//ページ番号を囲むタグ（デフォルト値：設定無し）
			'class'=>'page-item',//上記タグのクラス名を設定（デフォルト値：設定無し）
			'currentTag'=>'a',//表示中のページ番号のタグを設定（デフォルト値：null）
			'currentClass'=>'active',//表示中のページ番号のクラスを設定（デフォルト値：current）
		]);
		?>
		<li class="page-item">
			<?php
			echo $this->Paginator->next(
				'»',
				null,
				null,
				array('class' => 'page-link')
			);
			?>
		</li>
	</ul>
</nav>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	$(function () {
		$('.page-item a').addClass('page-link');
	});
</script>
</body>
</html>
