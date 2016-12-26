	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
		$(document).ready(function() {
			$('select').material_select();
			$('.modal').modal({
				dismissible: true, 
				opacity: .5,  
			});
			// $('.modal-trigger').leanModal();
			// $('.modal').openModal();
			// $('.modal').click(function() {
			// 	$('.modal').openModal();
			// })
		});
	</script>
