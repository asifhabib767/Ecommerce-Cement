@php
$user = Auth::guard('admin')->user();
@endphp

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu"> {{ $user->first_name }}</span>
                </li>

                @if ($user->can('dashboard.view'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.index') }}"
                        aria-expanded="false">
                        <i class="mdi mdi-creation"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @endcan

                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('role.view') ||
                $user->can('role.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Admins & Roles </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{ (Route::is('admin.admins.index') || Route::is('admin.admins.create') || Route::is('admin.admins.edit')) ? 'in' : null }}">
                        @if ($user->can('admin.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admins.index') }}"
                                class="sidebar-link {{ (Route::is('admin.admins.index') || Route::is('admin.admins.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Admin List </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('admin.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admins.create') }}"
                                class="sidebar-link {{ Route::is('admin.admins.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Admin </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('role.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="sidebar-link {{ Route::is('admin.roles.index') ? 'active' : null }}">
                                <i class="mdi mdi-view-quilt"></i>
                                <span class="hide-menu"> Roles </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('role.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.roles.create') }}"
                                class="sidebar-link {{ Route::is('admin.roles.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Role </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-tune"></i>
                        <span class="hide-menu">Posts </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{ (Route::is('admin.posts.index') || Route::is('admin.posts.create') || Route::is('admin.posts.edit')) ? 'in' : null }}">

                        <li class="sidebar-item">
                            <a href="{{ route('admin.posts.index') }}"
                                class="sidebar-link {{ (Route::is('admin.posts.index') || Route::is('admin.posts.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> All Posts </span>
                            </a>
                        </li>


                        {{-- @if ($user->can('post.create')) --}}
                        <li class="sidebar-item">
                            <a href="{{ route('admin.posts.create') }}"
                                class="sidebar-link {{ Route::is('admin.posts.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Post </span>
                            </a>
                        </li>
                        {{-- @endif --}}

                        @if ($user->can('category.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.categories.index') }}"
                                class="sidebar-link {{ Route::is('admin.categories.index') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu">Manage Categories </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('tag.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.tags.index') }}"
                                class="sidebar-link {{ Route::is('admin.tags.index') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu">Manage Tags </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('postcomments.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.postcomments.index') }}"
                                class="sidebar-link {{ Route::is('admin.postcomments.index') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu">Comments </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>


                @if ($user->can('page.view') || $user->can('page.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-file"></i>
                        <span class="hide-menu">Pages </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{ (Route::is('admin.pages.index') || Route::is('admin.pages.create') || Route::is('admin.pages.edit')) ? 'in' : null }}">
                        @if ($user->can('page.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pages.index') }}"
                                class="sidebar-link {{ (Route::is('admin.pages.index') || Route::is('admin.pages.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Page List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('page.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pages.create') }}"
                                class="sidebar-link {{ Route::is('admin.pages.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Page </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('blog.view') || $user->can('blog.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Blogs </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{ (Route::is('admin.blogs.index') || Route::is('admin.blogs.create') || Route::is('admin.blogs.edit')) ? 'in' : null }}">
                        @if ($user->can('blog.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="sidebar-link {{ (Route::is('admin.blogs.index') || Route::is('admin.blogs.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Blog List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('blog.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.blogs.create') }}"
                                class="sidebar-link {{ Route::is('admin.blogs.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Blog </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-poll"></i>
                        <span class="hide-menu">Product Management </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.products.index') || Route::is('admin.products.create') || Route::is('admin.products.edit')) ? 'in' : null }}">
                        @if ($user->can('product.view'))
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ (Route::is('admin.products.index') || Route::is('admin.products.edit')) ? 'active' : null }}">
                                    <i class="mdi mdi-view-list"></i>
                                    <span class="hide-menu">List Products </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.products.create') }}" class="sidebar-link {{ (Route::is('admin.products.index') || Route::is('admin.products.edit')) ? 'active' : null }}">
                                    <i class="mdi mdi-view-list"></i>
                                    <span class="hide-menu"> Add Products </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link {{ (Route::is('admin.products.index') || Route::is('admin.products.edit')) ? 'active' : null }}">
                                    <i class="mdi mdi-view-list"></i>
                                    <span class="hide-menu"> UOM </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                @if ($user->can('transaction.view') || $user->can('transaction.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Transactions Management </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{ (Route::is('admin.transactions.index') || Route::is('admin.transactions.create') || Route::is('admin.transactions.edit')) ? 'in' : null }}">
                        @if ($user->can('transaction.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.transactions.index') }}"
                                class="sidebar-link {{ (Route::is('admin.transactions.index') || Route::is('admin.transactions.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Transactions List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('transaction.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.transactions.create') }}"
                                class="sidebar-link {{ Route::is('admin.transactions.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> Add Transaction </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">Settings </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.sliders.index') || Route::is('admin.sliders.create') || Route::is('admin.sliders.edit')) ? 'in' : null }}">
                        
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sliders.index') }}" class="sidebar-link {{ (Route::is('admin.sliders.index') || Route::is('admin.sliders.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-settings"></i>
                                <span class="hide-menu"> Website Settings </span>
                            </a>
                        </li>

                        @if ($user->can('slider.view') || $user->can('slider.create'))
                            <li class="sidebar-item ">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="mdi mdi-checkerboard"></i>
                                    <span class="hide-menu">Sliders </span>
                                </a>
                                <ul aria-expanded="false"
                                    class="collapse first-level {{ (Route::is('admin.sliders.index') || Route::is('admin.sliders.create') || Route::is('admin.sliders.edit')) ? 'in' : null }}">
                                    @if ($user->can('slider.view'))
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.sliders.index') }}"
                                            class="sidebar-link {{ (Route::is('admin.sliders.index') || Route::is('admin.sliders.edit')) ? 'active' : null }}">
                                            <i class="mdi mdi-view-list"></i>
                                            <span class="hide-menu"> Slider List </span>
                                        </a>
                                    </li>
                                    @endif

                                    @if ($user->can('slider.create'))
                                    <li class="sidebar-item">
                                        <a href="{{ route('admin.sliders.create') }}"
                                            class="sidebar-link {{ Route::is('admin.sliders.create') ? 'active' : null }}">
                                            <i class="mdi mdi-plus-circle"></i>
                                            <span class="hide-menu"> New Slider </span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if ($user->can('document.view'))
                            <li class="sidebar-item">
                                <a href="{{ route('admin.documents.index') }}" class="sidebar-link {{ (Route::is('admin.documents.index') || Route::is('admin.documents.edit')) ? 'active' : null }}">
                                    <i class="mdi mdi-image"></i>
                                    <span class="hide-menu"> Gallary </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>