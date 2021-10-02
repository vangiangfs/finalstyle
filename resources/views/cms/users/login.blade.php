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
                @include('cms.arlert')
                <form id="quickForm" name="quickForm" action="/{{env('APP_CMS_PATH')}}/do_login" method="post">
                    <div class="input-group mb-3 element-validator">
                        <input name="username" type="text" class="form-control" placeholder="Tên đăng nhập">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 element-validator">
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" value="1" id="remember">
                                <label for="remember">
                                    Lưu mật khẩu
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    @csrf
                </form>
                <p class="mb-1">
                    <a href="/{{env('APP_CMS_PATH')}}/forgot-password">Quên mật khẩu?</a>
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
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    username: {
                        required: "Vui lòng nhập tên đăng nhập"
                    },
                    password: {
                        required: "Vui lòng nhập mật khẩu",
                        minlength: "Mật khẩu phải >= 8 ký tự"
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