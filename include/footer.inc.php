	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/pagination.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".button-collapse").off("click").sideNav();
			$('#sidenav-overlay').remove();
			$('select').material_select();
			$('.modal').modal({
				dismissible: true, 
				opacity: .5,  
			});
			$('.datepicker').pickadate({
				selectMonths: true,
				selectYears: 15,
				format: 'You selecte!d: dddd, dd mmm, yyyy',
				formatSubmit: 'yyyy-mm-dd',
				hiddenName: true,
			});
			$('#pagination-short').materializePagination({
				align: 'center',
				lastPage:  3,
				firstPage:  1,
				useUrlParameter: true,
			}); 

			$('#pagination-long').materializePagination({
				align: 'center',
				lastPage:  10,
				firstPage:  1,
				useUrlParameter: false,
				onClickCallback: function(requestedPage){
					console.log('Requested page from #pagination-long: '+ requestedPage);
				}
			});
		});

	</script>