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
</script>
<ul class="autc">
	<?php if (!is_null($data)): ?>
		<?php foreach ($data as $hasil): ?>
			<li class="autc autc-mhs"><?php echo $hasil['nim'] . ' - ' . $hasil['nama']; ?></li>
		<?php endforeach ?>
	<?php else: ?>
		<li class="autc autc-mhs text-center">Tidak ada data.</li>
	<?php endif ?>
		
</ul>