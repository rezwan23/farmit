<template>
  <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <!-- <img src="/frontend/img/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">FarmIT</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          </div>
          <div class="info">
            <a href="#" class="d-block"
              >{{ user.name }} -
              {{user.type}}</a
            >
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header"> MENUS</li>
            <li class="nav-item" v-if="user.type == 'Farmer'">
              <inertia-link :href="route('farmerposts.create')" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>Create Farmer Post</p>
              </inertia-link>
            </li>
            <li class="nav-item" v-if="user.type == 'Farmer'">
              <inertia-link :href="route('farmerposts.index')" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>All My Farmer Posts</p>
              </inertia-link>
            </li>
            <li class="nav-item" v-if="user.type == 'Carrier'">
              <inertia-link :href="route('carrierpost.create')" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>Create Carrier Post</p>
              </inertia-link>
            </li>
            <li class="nav-item" v-if="user.type == 'Carrier'">
              <inertia-link :href="route('carrierpost.all.my')" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>All My Carrier Posts</p>
              </inertia-link>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>

<script>


export default {
    props : {user : {}}
}


</script>
