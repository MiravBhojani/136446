	<!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">DASHBOARD</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard </div>
					</a>
					<ul>
                        @if(Auth::user()->role==="admin")
                    <li> <a href="{{url('new-admin')}}"><i class="bx bx-right-arrow-alt"></i>New Club</a>
						</li>
                        <li> <a href="{{url('admins-list')}}"><i class="bx bx-right-arrow-alt"></i>Clubs List</a>
						</li>


                        <li> <a href="{{url('new-match')}}"><i class="bx bx-right-arrow-alt"></i>New Match</a>
						</li>
                        @endif
                        @if(Auth::user()->role==="admin" || Auth::user()->role==="club-admin")
                        <li> <a href="{{url('matches-list')}}"><i class="bx bx-right-arrow-alt"></i>Matches List</a>
						</li>
                        @endif

                        @if(Auth::user()->role==="club-admin")
						<li> <a href="{{url('new-player')}}"><i class="bx bx-right-arrow-alt"></i>New Player</a>
						</li>
						<li> <a href="{{url('players-list')}}"><i class="bx bx-right-arrow-alt"></i>Players Lists</a>
						</li>
                        @endif

						<li>
                        <li> <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bx bx-right-arrow-alt"></i>Logout
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
					</a>
						</li>
						</li>

						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
