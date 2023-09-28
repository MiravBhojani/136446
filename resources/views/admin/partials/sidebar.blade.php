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
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
                    <li> <a href="{{url('new-admin')}}"><i class="bx bx-right-arrow-alt"></i>New Admin</a>
						</li>
                        <li> <a href="{{url('admins-list')}}"><i class="bx bx-right-arrow-alt"></i>Admins List</a>
						</li>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Teams/Clubs</a>
						</li>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Players</a>
						</li>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Scoring</a>
						</li>
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
