<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="{{ route('admin') }}"><img src="{{ asset('manage/images/logo.svg')}}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{ asset('manage/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ asset('manage/images/faces/face1.jpg')}}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">{{ Auth::user() ? Auth::user()->name : '' }}</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('setting') }}">
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          <span class="menu-title">Ayarlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('faqs') }}">
          <i class="mdi mdi-comment-question-outline menu-icon"></i>
          <span class="menu-title">Tez-tez verilən suallar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'blogs' }}">
          <i class="mdi mdi-newspaper menu-icon"></i>
          <span class="menu-title">Xəbərlər</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'vacancies'}}">
          <i class="mdi mdi-comment-question-outline menu-icon"></i>
          <span class="menu-title">Vakansiyalar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'services' }}">
          <i class="mdi mdi-wrench menu-icon"></i>
          <span class="menu-title">Xidmətlər</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'applies' }}">
          <i class="mdi mdi-application menu-icon"></i>
          <span class="menu-title">Müraciətlər <span class="badge bg-warning">{{-- \App\Models\Apply::all()->where('is_read',0)->count()>0?\App\Models\Apply::all()->where('is_read',0)->count():"" --}}</span></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'messages' }}">
          <i class="mdi mdi-message menu-icon"></i>
          <span class="menu-title">Mesajlar <span class="badge bg-warning">{{-- \App\Models\Message::all()->where('is_read',0)->count()>0?\App\Models\Message::all()->where('is_read',0)->count():"" --}}</span></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">
          <i class="mdi mdi-exit-to-app menu-icon"></i>
          <span class="menu-title">Çıxış</span>
        </a>
      </li>
    </ul>
  </nav>
