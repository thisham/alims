<style>
	ul.autc{
		background-color:#EEEEEE;
		cursor:pointer;
		position: absolute;
		width: 95%;
	}
	
	li.autc{
		padding:4px;
		list-style-type: none;
		border:bold solid #F0F8FF;
	}
	
	li.autc:hover{
		background-color:#7FFFD4;
	}

</style>
<script type="text/javascript">
	$('.autc-mhs').on('click', function(){
		$('#gnlab_mhs').val($(this).text());
		$('#gnlab_mhslist').fadeOut();
	});
	$('.autc-mhs').on('click', function(){
		$('#gnadl_mhs').val($(this).text());
		$('#gnadl_mhslist').fadeOut();
	});
	$('.autc-mhs').on('click', function(){
		$('#gnapp_mhs').val($(this).text());
		$('#gnapp_mhslist').fadeOut();
		var hasil = $(this).text();
		var nim   = hasil.split(' - ', 1);
		var url   = "<?php echo BASIS_URL; ?>/gunakan/app/carimhs-pinjam/" + nim;
		$.ajax({
			success: function(){
				$('#gnapp_tbl-appbymhs').load(url);
			}
		});
	});
	$('.autc-mhs').on('click', function(){
		$('#gnapp_mhs-add').val($(this).text());
		$('#gnapp_mhslist-add').fadeOut();
	});
</script>
<ul class="autc list-group">
	<?php if (!is_null($data)): ?>
		<?php foreach ($data as $hasil): ?>
			<li class="autc autc-mhs list-group-item list-group-item-action"><?php echo $hasil['mhs_nim'] . ' - ' . $hasil['mhs_nama']; ?></li>
		<?php endforeach ?>
	<?php else: ?>
		<li class="autc autc-mhs text-center list-group-item list-group-item-action">Tidak ada data.</li>
	<?php endif ?>
		
</ul>