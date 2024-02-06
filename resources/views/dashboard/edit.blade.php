<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">

  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>

            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5 class="text-danger">E D I T &nbsp;&nbsp;&nbsp;</h5>
              </div>
              <div class="row px-xl-5 px-sm-4 px-3">
                <div class="col-3 ms-auto px-1"></div>


              </div>
              <div class="card-body">

                <form action="{{ url('update-data/'.$u->id) }}" method="POST" role="form text-left">
                @csrf
                @method('PUT')
                  <div class="mb-3">
                    <input type="text" class="form-control" value="{{ $u->name}}" placeholder="Name" aria-label="Name" name="name">
                    @if ($errors->has('name'))
                    <p class="error-message">{{ $errors->first('name') }}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" value="{{ $u->email}}"" placeholder="Email" aria-label="Email" name="email">
                    @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="tel" class="form-control" value="{{ $u->phone}}"" placeholder="Phone Number" name="phone">
                    @if ($errors->has('number'))
                    <p class="error-message">{{ $errors->first('number') }}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" value="{{ $u->password}}"" placeholder="Password" aria-label="Password" name="password">
                    @if ($errors->has('password'))
                    <p class="error-message">{{ $errors->first('password') }}</p>
                    @endif
                  </div>

                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" value="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">UPDATE</button>
                  </div>

                </form>
                @if (Session::has('success'))
                <p class="success-message">{{ Session::get('success') }}</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>

</html>
