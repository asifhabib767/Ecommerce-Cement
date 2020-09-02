<div class="card register-style">
        <div class="list-group">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Route::is('home') ? 'active' : '' }}" >
                  Dashboard
                </a>
                <a href="{{ route('my-orders') }}" class="list-group-item list-group-item-action {{ Route::is('my-orders') ? 'active' : '' }}">My Orders</a>
                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action ">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
    </div>