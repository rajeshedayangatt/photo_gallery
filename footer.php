
<script>
	$("#btn_file_toggle").on('click',function() {

		$("#file_div").slideToggle('slow');
		$('body').css('overflow','hidden')
	});

	function fileupload() {
			var formdata = new  FormData($("#uploadform")[0]);
			$.ajax({

				type:'post',
				url :'server/fileupload.php',
				data:formdata,
				contentType:false,
				cache:false,
				processData:false,
				success:function(data) {

					if(data == "success"){
						$("#uploadform")[0].reset();
						location.reload();
					}else{
						alert(data);
					}

				}


			});


		
	}
</script>

</body>
</html>