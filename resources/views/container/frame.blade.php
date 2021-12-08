<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/public/css/main.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://localhost/public/admin/voyager-assets?path=css%2Fapp.css">
<?php $menu = Auth::user() ? \App\Role::find(Auth::user()->role_id)->menu->options : \App\Menu::find(3)->options; ?>
<section id="main-frame">
	<div class="main-sidebar" style="display:none;">
		<ul class="nav navbar-nav" style="margin-top:50px;">
			@foreach($menu as $option)
			<a class="menu-option" href="{{ asset($option->url) }}">
				<li class="menu-list-format">
					<span class="sidebar-option icon {{ $option->icon_class }}">
						<span class="title">{{ $option->title }}</span>
					</span>
				</li>
			</a>
			@endforeach
		</ul>
	</div>
	<div class="main-topbar">
		<i class="fa fa-music main-hamburger"></i>
		<a href="{{ asset('') }}"><img id="logo" src="{{ asset('images/giguptransparent.png') }}"></a>
		<div id="search-container">
			<form id="search-bar" method="POST" action="{{ asset('search') }}">
				@csrf
				<input type="text" id="main-search" name="search" value="{{ isset($search) ? $search : '' }}">
			</form>
			<i class="fa fa-search"></i>
		</div>
		@if(Auth::user())
		<?php $user = Auth::user(); ?>
		<li class="dropdown profile">
			<a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img"> <span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-menu-animated">
				<li class="profile-img">
					<img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img">
					<div class="profile-body">
						<h5>{{ $user->name }}</h5>
						<h6>{{ $user->email }}</h6>
					</div>
				</li>
				<li class="divider"></li>
					<li class="class-full-of-rum">
						<a href="{{ asset('profile') }}">
							<i class="voyager-person"></i>
							Profile
						</a>
					</li>
				<li>
				<a href="{{ asset('') }}">
					<i class="voyager-home"></i>
					Home
				</a>
			</li>
		<li>
		<input type="hidden" name="_token" value="{{ Auth::user()->remember_token }}">
		<a href="{{ asset('/logout') }}">
			<button type="submit" class="btn btn-danger btn-block">
				<i class="voyager-power"></i>
				Logout
			</button>
		</a>
		@else
		<div class="login-register">
			<a href="{{ asset('login') }}">Login</a> | <a href="{{ asset('account-create') }}">Register</a>
		</div>
		@endif
	</div>
</section>
<script>
$(document).ready(function($) {
	$('.main-hamburger').click(function() {
		$('.main-sidebar').animate({width: 'toggle'});
	});

	$('.dropdown.profile').click(function() {
		$('.dropdown-menu').toggle();
	});

	$('.fa-search').click(function() {
		$('#search-bar').submit();
	});
});
</script>
<div class="page-wrapper">
	@yield('page')
</div>
@yield('javascript')