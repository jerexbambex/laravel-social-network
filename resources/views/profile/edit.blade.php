@extends('templates.default')
@section('content')
	<div class="row mt-3">
		<div class="col-lg-6">
		<h3>Update your profile</h3>
			<form method="POST" action="{{ route('profile.edit') }}">
			  	<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="first_name">First name</label>
				      	<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" placeholder="first name" name="first_name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
				      	@if ($errors->has('first_name'))
					    	<div class="invalid-feedback">
					    		{{ $errors->first('first_name') }}
					    	</div>
					    @endif
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="last_name">Last name</label>
				      	<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" placeholder="Last name" name="last_name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
				      	@if ($errors->has('last_name'))
					    	<div class="invalid-feedback">
					    		{{ $errors->first('last_name') }}
					    	</div>
					    @endif
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="location">Location</label>
				    <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" id="location" aria-describedby="emailHelp" placeholder="" name="location" value="{{ Request::old('location') ?: Auth::user()->location }}">
				    @if ($errors->has('location'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('location') }}
				    	</div>
				    @endif
			  	</div>
			  	{{ csrf_field() }}
			  	<button type="submit" class="btn btn-default">Update</button>
			</form>
		</div>
	</div>
@stop