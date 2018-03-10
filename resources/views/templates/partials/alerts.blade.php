@if (Session::has('info'))
	<div class="alert alert-info alert-dismissible fade show" role="alert" style="border-left: 6px solid #40A4F4;">
		{{ Session::get('info') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
	  	</button>
	</div>
@endif