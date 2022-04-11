@include('profile/1header')
<title>เข้าสู่ระบบ</title>

<body>
    <div class="container">
        <!-- main app container -->
        <div class="readersack">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 text-center">
                        <br><br><br><br>
                        <h3>เข้าสู่ระบบจัดการโปรไฟล์55</h3>
                        <div id="errors-list"></div>
                        <form method="post" id="handleAjax" action="{{ url('check-login-profile') }}" name="postform">
                            <div class="form-group mb-3">
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                    placeholder="username" required />
                                @csrf
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="password"
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-block btn-primary">LOGIN</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    $(function() {
        // handle submit event of form
        $(document).on("submit", "#handleAjax", function() {

            var e = this;
            // change login button text before ajax
            $(this).find("[type='submit']").html("LOGIN...");

            $.post($(this).attr('action'), $(this).serialize(), function(data) {

                $(e).find("[type='submit']").html("LOGIN");
                if (data.status) { // If success then redirect to login url
                    window.location = data.redirect_location;
                }
            }).fail(function(response) {
                // handle error and show in html
                $(e).find("[type='submit']").html("LOGIN");
                $(".alert").remove();
                var erroJson = JSON.parse(response.responseText);
                for (var err in erroJson) {
                    for (var errstr of erroJson[err])
                        $("#errors-list").append("<div class='alert alert-danger'>" + errstr +
                            "</div>");
                }

            });
            return false;
        });
    });
</script>

</html>
