@if(Auth::user()->role == 777 || Auth::user()->role == 333)
{{--	<li class="dropdown @if( ( Request::is('backoffice/strc') ) ||  ( Request::is('backoffice/department') ) ) show @endif">--}}
	<li class="@if(  Request::is('mk/doc')  ) show @endif">
		<a href="#" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Asosiy </span>
		</a>
	</li>
	<li class="@if(  Request::is('mk/user')  ) show @endif">
		<a href="{{ route('mk')}}" class="dropdown-toggle">
			<span class="micon dw dw-user"></span><span class="mtext">Foydalanuvchilar </span>
		</a>
	</li>
@endif
@if(Auth::user()->role == 555)
{{--	<li class="dropdown @if( ( Request::is('backoffice/strc') ) ||  ( Request::is('backoffice/department') ) ) show @endif">--}}
	<li class="show">
		<a href="{{ route('mk')}}" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Hujjatlarim </span>
		</a>
	</li>
	
@endif