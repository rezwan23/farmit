<template>
  <div>
    <!-- Main Sidebar Container -->
    <Sidebar :user="user"></Sidebar>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="Dashboard"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
</template>

<script>

import Sidebar from './Sidebar'
import Header from './Header'
export default {
    components : {Sidebar, Header},
    props : {
      user : {}
    },
}
</script>
