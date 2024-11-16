<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Nhập Vào Hệ Thống Quản Trị</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href=" {{ asset('public/backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('public/backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href=" {{ asset('public/backend/assets/images/favicon.ico') }}" />
    {{-- Toastr Css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Js Toast  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function message_toastr(type, content) {
            Command: toastr[type](content)
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
    </script>
</head>
<style>
    @font-face {
        font-family: nhanf;
        src: url({{ asset('public/backend/assets/fonts/Mt-Regular.otf') }});
        font-display: swap;
    }

    .chongloihuhu {}
</style>

<body>
    <?php
    if(session()->get('message')!=null){
       $message = session()->get('message');
       $type = $message['type'];
       $content = $message['content'];
    ?>
    <script>
        message_toastr("{{ $type }}", "{{ $content }}");
    </script>
    <?php
    session()->forget('message');
    }
    ?>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src=" {{ asset('public/backend/assets/images/logo.svg') }}">
                            </div>
                            <h4>Chào Mừng Quản Trị Viên Đến Với Hệ Thống !</h4>
                            <h6 class="font-weight-light">Đăng Nhập Tài Khoản Quản Trị Để Tiếp Tục.</h6>
                            <form class="pt-3" action="{{ URL::to('/admin/auth/login') }}" method="post">
                                {{ csrf_field() }} {{-- chống sql injection tự động sinh ra trường token --}}
                                @foreach ($errors->all() as $error)
                                <script>
                                        message_toastr("warning", '{{ $error }}', "Cảnh Báo !");
                                </script>
                                @endforeach
                                <div class="form-group">
                                    <input type="email" name="admin_email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Username" value="{{ old('admin_email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="admin_password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" value="{{ old('admin_password') }}">
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                    <br />
                                    @if ($errors->has('g-recaptcha-response'))
                                        {{-- <span class="invalid-feedback" style="display:block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span> --}}
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <input type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                        value="Đăng nhập">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="SaveLoginCooke"
                                                value="ON">Lưu Phiên Đăng Nhập</label>
                                    </div>
                                    <a href="#" style="text-decoration: none;" class="auth-link text-black ">Bạn
                                        Quên Mật Khẩu?</a>
                                </div>
                                {{-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="mdi mdi-facebook me-2"></i>Đăng Nhập Bằng Facebook</button>
                                </div> --}}
                                {{-- <div class="text-center mt-4 font-weight-light">Bạn Chưa Có Tài Khoản?
                                    <a href="" style="color: black;text-decoration: none;">Nhấn Vào Để Đăng
                                        Ký</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('public/backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>
