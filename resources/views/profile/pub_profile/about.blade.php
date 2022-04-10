@foreach ($profiles as $profile)
@endforeach

<div class="head1 text-center">
    <i class="bi bi-person-fill"></i>
    About
</div>
<div class="text-con">
    {{ $profile->about }}
</div>
<hr>
<div class="head1 text-center">Link</div>
<a href="{{ $profile->link }}" target="_blank">
    <div class="txtnav-pdf text-center">GitHub</div>
</a>
