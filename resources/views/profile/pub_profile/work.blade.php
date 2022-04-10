@foreach ($profiles as $profile)
@endforeach

<div class="text-center">
    <div class="head1">
        <i class="bi bi-briefcase-fill"></i>
        Experience
    </div>
    <div class="text-con">
        {!! nl2br(e($profile->exp)) !!}
    </div>
</div>
