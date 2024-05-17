<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      <?php
                foreach ($user as $data){

                ?>
        <div class="pull-left image">
          <img src="<?php echo base_url();?>img/profile/<?php echo $data->photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $data->name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Super Admin & Admin -->
        <?php if ( $data->id_role == 1 || $data->id_role == 2) : ?>
          <?php if ($title == "Dashboard") : ?>
            <li class="active"><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <?php else : ?>
            <li><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <?php endif ?>
          <?php if ($title == "Transaction") : ?>
            <li class="active"><a href="<?php echo base_url("Transaction")?>"><i class="fa fa-exchange"></i> <span>Transaction</span></a></li>
          <?php else : ?>
            <li><a href="<?php echo base_url("Transaction")?>"><i class="fa fa-exchange"></i> <span>Transaction</span></a></li>
          <?php endif ?>
          <?php if ($title == "Finance") : ?>
            <li class="active"><a href="<?php echo base_url("Finance")?>"><i class="fa fa-money"></i> <span>Finance</span></a></li>
          <?php else : ?>
            <li><a href="<?php echo base_url("Finance")?>"><i class="fa fa-money"></i> <span>Finance</span></a></li>
          <?php endif ?>
          <?php if ($title == "Product" || $title == "Category") : ?>
            <li class="treeview active">
          <?php else : ?>
            <li class="treeview">
          <?php endif ?>
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($title == "Product") : ?>
              <li class="active"><a href="<?php echo base_url('Product')?>"><i class="fa fa-cube"></i>Product</a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url('Product')?>"><i class="fa fa-cube"></i>Product</a></li>
            <?php endif ?>
            <?php if ($title == "Category") : ?>
              <li class="active"><a href="<?php echo base_url('Product/Category')?>"><i class="fa fa-cubes"></i>Category</a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url('Product/Category')?>"><i class="fa fa-cubes"></i>Category</a></li>
            <?php endif ?>
          </ul>
        </li>
        <?php if ($title == "User" || $title == "Role") : ?>
          <li class="treeview active">
        <?php else : ?>
          <li class="treeview">
        <?php endif ?>
        <a href="#">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($title == "User") : ?>
              <li class="active"><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
            <?php endif ?>
            <?php if ($title == "Role") : ?>
              <li class="active"><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
            <?php endif ?>
            
       
          </ul>
        </li>
        <?php if ($title == "History") : ?>
          <li class="active"><a href="<?php echo base_url("History")?>"><i class="fa fa-history"></i> <span>History Transaction</span></a></li>
        <?php else : ?>
          <li class=""><a href="<?php echo base_url("History")?>"><i class="fa fa-history"></i> <span>History Transaction</span></a></li>
        <?php endif ?>
        
        <?php if ($title == "Setting") : ?>
            <li class="active"><a href="<?php echo base_url("Setting")?>"><i class="fa fa-gear"></i><span>Setting</span></a></li>
          <?php else : ?>
            <li><a href="<?php echo base_url("Setting")?>"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
          <?php endif ?>
        <li><a href="<?php echo base_url("Login/logout")?>"onclick="return confirm('are you going to logout?');"><i class="fa fa-user-times"></i> <span>Sign Out</span></a></li>
        <?php endif ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php } ?>
    <!-- Content Header (Page header) -->