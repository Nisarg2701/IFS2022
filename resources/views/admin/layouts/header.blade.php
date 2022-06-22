<!doctype html>
<html lang="en">
  <head>
    <title>
        @stack('title')
    </title>
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="{{ url('cssAdmin\main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark header">
    <i class="fa fa-header" aria-hidden="true" style="padding-right: 2%; color: white">Admin</i>
    <a class="navbar-brand" href="#"><img src="{{ url('images\innovative_logo_design.jpg') }}" alt="Logo" style="width:40px;"></a>
    <a class="navbar-brand" href="#"><img src="{{ url('images\innovative_logo_name.jpg') }}" alt="Logo" style="width:140px;"></a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link  @if ($__env->yieldPushContent('title') == "Home") active @endif" href="{{ url('/admin') }}">Home</a>
      </li>
      <li class="nav-item dropdown @if ($__env->yieldPushContent('title') == "Testimonials" || $__env->yieldPushContent('title') == "Princapals" || $__env->yieldPushContent('title') == "Awards") active @endif">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          About Us
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-primary" href="{{ url('/admin/about/awards') }}">Awards</a>
            <a class="dropdown-item bg-primary" href="{{ url('/admin/about/testimonials') }}">Testimonials</a>
            <a class="dropdown-item bg-primary" href="{{ url('/admin/about/principals') }}">Principals</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link  @if ($__env->yieldPushContent('title') == "Services") active @endif" href="{{ url('/admin/services') }}">Services</a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if ($__env->yieldPushContent('title') == "Apply Now") active @endif" href="{{ url('/admin/apply') }}">Apply Now</a>
      </li>
      <li class="nav-item dropdown @if ($__env->yieldPushContent('title') == "Recruitment Application" || $__env->yieldPushContent('title') == "Recruitment Information") active @endif">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Careers
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-primary" href="{{ url('/admin/careers/information') }}">Recruitment Information</a>
            <a class="dropdown-item bg-primary" href="{{ url('/admin/careers/application') }}">Recruitment Application</a>
        </div>
      </li>

    </ul>
  </nav>
