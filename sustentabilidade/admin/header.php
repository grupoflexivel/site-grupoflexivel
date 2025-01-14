<?php 
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/sustentabilidade/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/sustentabilidade/vendor/connection.php');

if (isset($_GET['logout'])){
  unset($_SESSION['loggedin']);
  unset($_SESSION['username']);
  header('Location: login.php');
  exit;
}
if ( !isset($_SESSION['loggedin']) ) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>

<html
lang="en"
class="light-style layout-menu-fixed layout-compact"
dir="ltr"
data-theme="theme-default"
data-assets-path="<?php echo URL ?>admin/assets/"
data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Administração</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="<?php echo URL ?>admin/assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo URL ?>admin/assets/vendor/libs/apex-charts/apex-charts.css" />
  
  <script src="<?php echo URL ?>admin/assets/vendor/js/helpers.js"></script>
  <script src="<?php echo URL ?>admin/assets/js/config.js"></script>
  <script src="<?php echo URL ?>admin/assets/vendor/libs/jquery/jquery.js"></script>
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?php echo URL ?>admin/" class="app-brand-link">
            <img src="<?php echo URL ?>admin/assets/img/logo.svg" alt="">
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
          </li>            
          <li class="menu-item"><a href="<?php echo URL ?>admin/textos" class="menu-link"> <i class="menu-icon bx bx-calendar-event"></i> Textos </a></li>
          <li class="menu-item"><a href="<?php echo URL ?>admin/blog" class="menu-link"> <i class="menu-icon bx bx-blogger"></i> Blog </a></li>
          <li class="menu-item"><a href="<?php echo URL ?>admin/relatorios" class="menu-link"> <i class="menu-icon bx bx-calendar-event"></i> Relatórios </a></li>          
          <li class="menu-item"><a href="<?php echo URL ?>admin/usuarios" class="menu-link"> <i class="menu-icon bx bx-user"></i> Usuários </a></li>
        </ul>    
        
      </aside>

      <div class="layout-page">

        <div class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center justify-content-between" id="navbar-collapse">
            <div></div>
            <div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="menu-icon tf-icons bx bx-user"></i>                              
                    
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <i class="menu-icon tf-icons bx bx-user"></i>                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"><?php echo $_SESSION['username'] ?></span>
                            <small class="text-muted">Administração</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo URL.'admin/usuarios/action.php?id='.$_SESSION['loggedin'] ?>">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Editar</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo URL ?>admin/?logout=true">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </div>
        </div>          

        <div class="content-wrapper">
          <div class="container-fluid flex-grow-1 container-p-y">