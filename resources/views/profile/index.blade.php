@extends('templates.default')
@section('content')
	<div class="mt-3">
		<div class="row">
			<div class="col-lg-5">
				@include('user.partials.userblock')
				<hr>
				@if (!$statuses->count())
					<p>{{ $user->getFirstNameOrUsername() }} hasn't posted anything yet.</p>
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

							    @if ($authUserIsFriend || Auth::user()->id === $status->user->id)
								    <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
								    	{{ csrf_field() }}
								    	<div class="form-group">
								    		<textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="reply to this status"></textarea>
								    		<button type="submit" class="mt-2 btn btn-primary btn-sm">Reply</button>
								    	</div>
								    </form>
							    @endif
						  	</div>
						</div>
						<hr>
					@endforeach
				@endif
			</div>
			<div class="col-lg-4 offset-3">
				@if (Auth::user()->hasFriendRequestPending($user))
					<p>Waiting for {{ $user->getNameOrUsername() }} to accept you request.</p>
				@elseif (Auth::user()->hasFriendRequestReceived($user))
					<a href="{{ route('friend.accept', ['username' => $user->username]) }}">Accept friend request</a>
				@elseif (Auth::user()->isFriendsWith($user))
					<p>You and {{ $user->getNameOrUsername() }} are friends.</p>
				@elseif (Auth::user()->id !== $user->id)
					<a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary btn-sm">Add as friend</a>
				@endif
				<h4>{{ $user->getFirstNameOrUsername() }}'s friends</h4>
				@if (!$user->friends()->count())
					<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
				@else
					@foreach ($user->friends() as $user)
						@include('user.partials.userblock')
					@endforeach
				@endif
			</div>
		</div>
	</div>
@stop