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
	<div class="card-deck col-md-12">
		<?php foreach ($productList as $item) { ?>
			<?= $this->element('Product/product-list', ['item' => $item]) ?>
		<?php } ?>
	</div>
</main>

</body>
</html>
