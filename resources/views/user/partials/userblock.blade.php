<div class="media">
	<a href="{{ route('profile.index', ['username' => $user->username]) }}">
  		<img class="mr-3" src="/assets/img/avatar.png" alt="{{ $user->getNameOrUsername() }}" width="50">
	</a> 
  	<div class="media-body">
    	<p class="mt-0 mb-0" style="font-weight: 600;"><a href="{{ route('profile.index', ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a></p>
    	@if ($user->location)
    		<p>{{ $user->location }}</p>
		@endif
  	</div>
</div>