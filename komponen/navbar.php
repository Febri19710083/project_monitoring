<header class="navbar  sticky-top flex-md-nowrap p-0 shadow" style="background-color: #040f4a;">
   <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-0 " href="#" style="background-color: #eaeaea; color:#040f4a; font-weight: bold; font-size: 20px;">
      <img src="../logo/logo2.png" alt="" width="150px">
   </a>
   <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

   <div class="navbar-nav">
      <div class="nav-item text-nowrap">
         <a class="btn px-3 me-3" href="#" style="background-color: #eaeaea;">Sign out</a>
      </div>
   </div>
</header>

<div class="container-fluid">
   <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: #eaeaea;">
         <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
               <li class="nav-item">
                  <a class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>" aria-current="page" href="/monitoring/dashboard/">
                     <span data-feather="home" class="align-text-bottom"></span>
                     Dashboard
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $page == 'project' ? 'active' : '' ?>" href="/monitoring/project/">
                     <span data-feather="file" class="align-text-bottom"></span>
                     Project
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $page == 'progress' ? 'active' : '' ?>" href="/monitoring/progress/">
                     <span data-feather="trello" class="align-text-bottom"></span>
                     Progress
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?= $page == 'client' ? 'active' : '' ?>" href="/monitoring/client/">
                     <span data-feather="user" class="align-text-bottom"></span>
                     Client
                  </a>
               </li>

            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
               <span>Saved reports</span>
               <a class="link-secondary" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle" class="align-text-bottom"></span>
               </a>
            </h6>

         </div>
      </nav>