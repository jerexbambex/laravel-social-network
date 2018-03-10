@extends('templates.default')

@section('content')
	<div class="row mt-3">
		<div class="col-lg-6">
		<h3>Sign in</h3>
			<form method="POST" action="{{ route('auth.signin') }}">
			  	<div class="form-group">
				    <label for="email">Your Email address</label>
				    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ Request::old('email') ?: '' }}">
				    @if ($errors->has('email'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('email') }}
				    	</div>
				    @endif
			  	</div>
			  	<div class="form-group">
			    	<label for="exampleInputPassword1">Password</label>
			    	<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" name="password">
			    	@if ($errors->has('password'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('password') }}
				    	</div>
				    @endif
			  	</div>
			  	<div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
				    <label class="form-check-label" for="exampleCheck1">Remember me</label>
			  	</div>
			  	{{ csrf_field() }}
			  	<button type="submit" class="btn btn-default">Sign in</button>
			</form>
		</div>
	</div>
@stop