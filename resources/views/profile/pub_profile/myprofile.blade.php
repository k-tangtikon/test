@include('profile/pub_profile/header')
@foreach ($profiles as $profile)
@endforeach
<title>{{ $profile->name_surname }}</title>

<body>
    <div class="container">
        <div class="profile" id="profile">
            <div class="text-center">

                <br>
                <img src="img/profile.jpg" alt="Avatar" style="width:200px;border-radius: 50%;">
                <br>
                <div class="txt-profile mt-3">
                    {{ $profile->name_surname }}
                </div>
            </div>
        </div>

        @include('profile/pub_profile/navbar')
        <div class="row">
            <div class="col col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div id="about" class="line">
                            @include('profile/pub_profile/about')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>


        @include('profile/pub_profile/post_test')


    </div>


</body>

</html>
