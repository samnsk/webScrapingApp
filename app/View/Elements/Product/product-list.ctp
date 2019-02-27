<div class="item col-md-12 col-lg-4 col-sm-12" style="padding-top: 20px;">
	<div class="card">
		<a href="<?= $item['Product']['url']; ?>"><img class="card-img-top" src="<?= $item['Product']['image_url']; ?>" alt="画像がありません"></a>
		<div class="card-body">
			<h5 class="card-title"><a href="<?= $item['Product']['url']; ?>"><?= $item['Product']['name']; ?></a></h5>
			<p class="card-text"><?= $item['Product']['description']; ?></p>
			<span class="product-price">¥<?= number_format($item['Product']['price']); ?></span><br>
			<a href="<?= $item['Product']['url']; ?>" class="btn btn-primary detail-btn">詳細を見る</a>
		</div>
	</div>
</div>
