<!DOCTYPE html>
<html lang="en">

<head>
    @include('cms.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img class="animation__shake" src="/public/cms/dist/img/AdminFinalStyle.png" alt="AdminFinalStyle" height="39">
            </div>
            <div class="card-body">
                <p class="login-box-msg">Vui lòng nhập địa chỉ email của bạn.</p>
                @include('cms.arlert')
                <form id="quickForm" name="quickForm" action="/{{env('APP_CMS_PATH')}}/do_forgot_password" method="post">
                    <div class="input-group mb-3 element-validator">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Lấy mật khẩu</button>
                        </div>
                    </div>
                    @csrf
                </form>
                <p class="mb-1 mt-3">
                    <a href="/{{env('APP_CMS_PATH')}}/login">Đăng nhập</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    @include('cms.footer')
    <script>
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    return true;
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    email: {
                        required: "Vui lòng nhập email của bạn"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.element-validator').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>
</html>