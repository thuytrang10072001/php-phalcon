<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>403 Not Found</title>
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous"
/>
<link rel="stylesheet" href="<?= $this->url->getStatic('public/css/style.css') ?>" />
<!-- End layout styles -->

  </head>

  <body>
    

<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div
    class="content-wrapper d-flex align-items-center text-center error-page bg-primary"
  >
    <div class="row flex-grow">
      <div class="col-lg-7 mx-auto text-white">
        <div class="row align-items-center d-flex flex-row">
          <div class="col-lg-6 text-lg-right pr-lg-4">
            <h1 class="display-1 mb-0">403</h1>
          </div>
          <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
            <h2>PERMISSION DENIED!</h2>
            <h3 class="font-weight-light">
              You are not allowed to access this page.
            </h3>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 text-center mt-xl-2">
            <a class="text-white font-weight-medium" href="#">Back to home</a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 mt-xl-2">
            <p class="text-white font-weight-medium text-center">
              Copyright &copy; 2021 All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>

 <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"
></script>

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script src="<?= $this->url->getStatic('public/js/customer.js') ?>"></script>

  </body>
</html>
