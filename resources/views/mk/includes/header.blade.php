<div class="header-left">
    {{--
    <div class="menu-icon dw dw-menu"></div>
    --}}
    <div class="search-toggle-icon dw dw-search2">
        <h3 class="ml-5">
            TSUL
        </h3></div>
    <div class="header-search">
        {{--
        <form> --}}
            <div class="form-group mb-0">
                <a href="{{ route('mk') }}"><h3>
                        TSUL attestation
                    </h3>
                </a>
                {{-- <i class="dw dw-search2 search-icon"></i>
                <input type="text" class="form-control search-input" placeholder="Qidirish...">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="ion-arrow-down-c"></i>
                    </a>

                </div>
                --}}
            </div>
            {{--
        </form>
        --}}
    </div>
</div>
<div class="header-right">
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
				<span class="user-icon">
					<img src="{{ asset('assets/tsul.png') }}" alt="">
				</span>
                <span class="user-name">
					TSUL_admin
				</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="{{ route('x') }}"><i class="icon-copy fi-graph-trend"></i> Profil</a>
                @if((Auth::user()->role == 111))
                <a class="dropdown-item" href="{{ route('users') }}"><i class="dw dw-settings2"></i> Foydalanuvchilar</a>
                <a class="dropdown-item" href="{{ route('mainquestions') }}"><i class="dw dw-settings2"></i> Umumiy savollar</a>
                @endif
<!--                <a class="dropdown-item" href="https://t.me/ShokirjonMK"><i class="dw dw-help"></i> Yordam</a>-->
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                    <i class="dw dw-logout"></i>
                    {{ __('Chiqish') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="github-link">
        <a href="https://t.me/ShokirjonMK" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
    </div>
</div>