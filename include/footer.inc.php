	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
		$(document).ready(function() {
			$('select').material_select();
			$('.modal').modal({
				dismissible: true, 
				opacity: .5,  
			});
		});
	</script>
