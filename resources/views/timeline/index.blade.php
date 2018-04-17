@extends('templates.default')
@section('content')
	<div class="mt-3">
		<h3>Welcome {{Auth::user()->getNameOrUsername()}}</h3>
	</div>

	<div class="row mt-3">
		<div class="col-lg-6">
			<form role="form" action="{{ route('status.post') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
				    <textarea class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" rows="2" placeholder="What's up {{ Auth::user()->getFirstNameOrUsername() }}" name="status"></textarea>
				     @if ($errors->has('status'))
				    	<div class="invalid-feedback">
				    		{{ $errors->first('status') }}
				    	</div>
				    @endif
				</div>
				<button type="submit" class="btn btn-primary btn-sm">Update status</button>
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-lg-5">
			@if (!$statuses->count())
				<p>There is nothing in your timeline, yet.</p>
			@else
				@foreach ($statuses as $status)
					<div class="media mt-1">
					  	<a href="{{ route('profile.index', ['username' => $status->user->username]) }}"><img class="mr-3" src="/assets/img/avatar.png" alt="{{ $status->user->getFirstNameOrUsername() }}">
					  	</a>
					  	<div class="media-body mb-0">
					  		<p class="mt-0 mb-0" style="font-weight: 600;"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></p>
					    	{{ $status->body }}
					    	<small>
						    	<ul class="list-inline">
						    		<li class="d-inline">{{ $status->created_at->diffForHumans() }}</li>
						    		<li class="d-inline"><a href="#">Like</a></li>
						    		<li class="d-inline">10 likes</li>
						    	</ul>
						    </small>

						    @foreach ($status->replies as $reply)
						    	<div class="media mt-3">
								    <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}"><img class="mr-3" src="/assets/img/avatar.png" alt="{{ $reply->user->getFirstNameOrUsername() }}">
								    </a>
							      	<div class="media-body">
						        		<h5 class="mt-0"><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getFirstNameOrUsername() }}</a></h5>
							        	<p>{{ $reply->body }}</p>
							        	<small>
								        	<ul class="list-inline">
								        		<li class="d-inline">{{ $reply->created_at->diffForHumans() }}</li>
								        		<li class="d-inline"><a href="#">4 Likes</a></li>
								        	</ul>
								        </small>
							      	</div>
							    </div>
						    @endforeach

						    <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
						    	{{ csrf_field() }}
						    	<div class="form-group">
						    		<textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="reply to this status"></textarea>
						    		<button type="submit" class="mt-2 btn btn-primary btn-sm">Reply</button>
						    	</div>
						    </form>
					  	</div>
					</div>
					<hr>
				@endforeach
				{{ $statuses->render() }}
			@endif
		</div>
	</div>
@stop