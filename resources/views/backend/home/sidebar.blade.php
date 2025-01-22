@php
    $userInfo = Illuminate\Support\Facades\Auth::user();
@endphp
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('dashboard')}}">
            <span class="sidebar-brand-text align-middle">
                Commenting System
            </span>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{ url('asset/backend/img/avatars/avatar-6.png') }}" class="avatar img-fluid rounded me-1" alt="Jassa">
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        {{$userInfo->name??''}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Log out
                            </button>
                        </form>
                    </div>

                    <div class="sidebar-user-subtitle">{{$userInfo->role??''}}</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>
            @if (auth()->check() && auth()->user()->role == 'admin')
            <li class="sidebar-item">
                <a href="#review" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Categories</span>
                </a>
                <ul id="review" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('categories')}}">Categories</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('create.category')}}">Create Category</a></li>
                </ul>
            </li>
            @endif
            
            <li class="sidebar-item">
                <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="align-center"></i> <span class="align-middle">Post</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('posts')}}">All Post</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('create.post')}}">Create Post</a></li>  
                </ul>
            </li>

        </ul>
    </div>
</nav>