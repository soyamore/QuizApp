    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">

      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header" style="padding:0;">

        <div style="padding-left: 10px; display: inline-block;" height="40" class="brand">
          <h2 style="margin-top: 10px; color: #fff">
            <span style="color:#0da899;">Quiz</span>app
          </h2>
        </div>
        <div class="sidebar-header-controls" style="float:right;padding-right: 60px">
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar">
            <i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->

      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-5">
            <a href="{{ route('quizzes.index') }}">
              <span class="title">Tests disponibles</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-th"></i></span>
          </li>
          <li class="m-t-5">
            <a href="{{ route('tests.examinees') }}">
              <span class="title">Tests réalisés</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-navicon"></i></span>
          </li>

          @if (auth()->user()->isAdmin())
          <li class="m-t-5">
            <a href="{{ URL::route('users.index') }}">
              <span class="title">Utilisateurs</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
          </li>

          <li class="m-t-5">
            <a href="{{ URL::route('categories.index') }}">
              <span class="title">Catégories</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-tag"></i></span>
          </li>
          @endif

          <li class="m-t-5">
            <a href="{{ url('auth/logout') }}">
              <span class="title">Déconnexion</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-sign-out"></i></span>
          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
