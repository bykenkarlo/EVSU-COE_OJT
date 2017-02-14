<!DOCTYPE html>
<html>
<head>
	<title>Ajax example</title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript">
		//Ajax post
		$(document).ready(function() {
			$(".submit").click(function(event) {
				event.preventDefault();
				var username = $("input#name").val();
				var password = $("inout#password").val();
				jquery.Ajax({
					type: "POST",
					url: "<?= base_url();?>"+ "index.php/ajax_post-controller/user_data_submit"
					dataType: 'json',
					data: {name: username, password:password},
					success: fucntiion(res) {
						if (res)
						{
							jquery(div#result"")
						}
					}
				})
			})
		})
	</script>
</head>
<body>

<div>
	<div>
		<div>
			
		</div>
	</div>
</div>

</body>
</html>