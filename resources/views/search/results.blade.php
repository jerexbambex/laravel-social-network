@extends('templates.default')
@section('content')
	<div class="mt-3">
		<h3>Your search for "{{ Request::input('query') }}"</h3>
	</div>
	@if (!$users->count())
		<p>No results found</p>
	@else
		<div class="row">
			<div class="col-lg-12">
				@foreach($users as $user)
					@include('user.partials.userblock')
				@endforeach
			</div>
		</div>
	@endif
@stop