@extends('templates.default')

@section('content')
	<div class="row mt-3">
		<div class="col-lg-6">
		<h3>Sign up</h3>
			<form method="POST" action="{{ route('auth.signup') }}">
			  	<div class="form-group">
				    <label for="exampleInputEmail1">Your Email address</label>
				    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ Request::old('email') ?: '' }}">
				    @if ($errors->has('email'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('email') }}
				    	</div>
				    @endif
			  	</div>
			  	<div class="form-group">
			    	<label for="username">Choose a username</label>
			    	<input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username" placeholder="username" name="username" value="{{ Request::old('username') ?: '' }}">
			    	@if ($errors->has('username'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('username') }}
				    	</div>
				    @endif
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Choose a password</label>
			    	<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" name="password">
			    	@if ($errors->has('password'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('password') }}
				    	</div>
				    @endif
			  	</div>
			  	{{-- <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  	</div> --}}
			  	{{ csrf_field() }}
			  	<button type="submit" class="btn btn-default">Signup</button>
			</form>
		</div>
	</div>
@stop