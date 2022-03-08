<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('Hi ') }}</a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">{{ __(auth()->user()->name) }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                {{-- <li  {{{ (Request::is('dashboard') ? 'class=active' : '') }}}> --}}
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            {{-- Inventory--}}
            <li>
                {{-- <a data-toggle="collapse" href="#inventory" {{ $section == 'inventory' ? 'aria-expanded=true' : '' }}> --}}
                <a data-toggle="collapse" href="#inventory">
                    {{-- <i class="tim-icons icon-app"></i> --}}
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="nav-link-text">Inventory</span>
                    <b class="caret mt-1"></b>
                </a>
                {{-- <div class="collapse {{ $section == 'inventory' ? 'show' : '' }}" id="inventory"> --}}
                <div class="collapse" id="inventory">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'products') class="active " @endif>
                            {{-- <li {{{ (Request::is('products') ? 'class=active' : '') }}}> --}}
                            <a href="{{ route('products.index') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'categories') class="active " @endif>
                            {{-- <li {{{ (Request::is('categories') ? 'class=active' : '') }}}> --}}
                            <a href="{{ route('categories.index') }}">
                                {{-- <i class="tim-icons icon-notes"></i> --}}
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <p>Categories</p>
                            </a>
                        </li>

                        {{-- <li @if ($pageSlug == 'istats') class="active " @endif>
                            <a href="{{ route('inventory.stats') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>Statistics</p>
                            </a>
                        </li> --}}

                        {{-- <li @if ($pageSlug == 'categories') class="active " @endif>
                            <a href="{{ route('categories.index') }}">
                                <i class="tim-icons icon-tag"></i>
                                <p>Categoríes</p>
                            </a>
                        </li> --}}
                        {{-- <li @if ($pageSlug == 'receipts') class="active " @endif>
                            <a href="{{ route('receipts.index') }}">
                                <i class="tim-icons icon-paper"></i>
                                <p>Receipts</p>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            {{-- clients --}}
            <li @if ($pageSlug == 'Clients')
                 class="active "
             @endif>
                <a href="{{route('clients.index')}}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Clients') }}</p>
                </a>
            </li>

            {{-- suppliers --}}
            <li @if ($pageSlug == 'Suppliers') class="active " @endif>
                <a href="{{route('suppliers.index')}}">
                    <i class="fa fa-taxi" aria-hidden="true"></i>
                    <p>{{ __('Suppliers') }}</p>
                </a>
            </li>
            {{-- user --}}
            <li>
                <a data-toggle="collapse" href="#user" aria-expanded="true">
                    {{-- <i class="fab fa-laravel" ></i> --}}
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    <span class="nav-link-text" >{{ __('User') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="user">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('users.index')  }}">
                                {{-- <i class="tim-icons icon-bullet-list-67"></i> --}}
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>{{ __('All Users') }}</p>
                            </a>
                        </li>

                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('My Profile') }}</p>
                            </a>
                        </li>

                        <li @if ($pageSlug == 'users-create') class="active " @endif>
                            <a href="{{ route('users.create')  }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>Add user</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{---
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
