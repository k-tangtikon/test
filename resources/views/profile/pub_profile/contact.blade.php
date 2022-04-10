@foreach ($profiles as $profile)
@endforeach


<div class="head1 text-center">
    <i class="bi bi-house-fill"></i>
    Contact
</div>
<div class="text-con text-center">
    โทรศัพท์:{{ $profile->phone }}<br>
    E-mail:{{ $profile->email }}<br>
    ที่อยู่: {{ $profile->address }}<br>
</div>
