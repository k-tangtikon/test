@foreach ($profiles as $profile)
@endforeach

<div class="text-center">
    <div class="head1">
        <i class="bi bi-mortarboard-fill"></i>
        Education
    </div>

    <div class="text-con">
        <div class="text-head">ปริญญาตรี</div>
        <br>{{ $profile->edu2 }}
    </div>

    <hr>
    <div class="text-con">
        <div class="text-head">มัธยมปลาย</div>
        <br>{{ $profile->edu1 }}
    </div>

</div>
