<style>
	ul.autc{
		background-color:#EEEEEE;
		cursor:pointer;
		position: absolute;
		width: 95%;
	}
	
	li.autc{
		/*padding:12px;*/
		list-style-type: none;
		border:bold solid #F0F8FF;
	}
	/*
	li.autc:hover{
		background-color:#7FFFD4;
	}*/

</style>
<script type="text/javascript">
	$('.autc-mtk').on('click', function(){
		$('#gnlab_mtk').val($(this).text());
		$('#gnlab_mtklist').fadeOut();
	});
	$('.autc-mtk').on('click', function(){
		$('#gnadl_mtk').val($(this).text());
		$('#gnadl_mtklist').fadeOut();
	});
</script>
<ul class="autc list-group">
	<?php if (!is_null($data)): ?>
		<?php foreach ($data as $hasil): ?>
			<li class="autc <?php if ($hasil['mtk_buka'] != 0 AND $hasil['mtk_tutup'] == 0) echo 'autc-mtk'; else echo 'text-danger'; ?> list-group-item list-group-item-action"><?php echo $hasil['mtk_id'] . ' - ' . $hasil['mtk_nama'] . ' - ' . $hasil['dsn_nama'] . ' (' . $hasil['mtk_periode'] . ')'; ?></li>
		<?php endforeach ?>
	<?php else: ?>
		<li class="autc autc-mtk text-center">Tidak ada data.</li>
	<?php endif ?>
</ul>