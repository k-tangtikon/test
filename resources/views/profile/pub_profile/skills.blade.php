@foreach ($profiles as $profile)
@endforeach
<div class="text-center">
    <div class="head1">
        <i class="bi bi-cloud-check-fill"></i>
        Skills
    </div>
    <div class="text-con">
        {!! nl2br(e($profile->skills)) !!}
    </div>
</div>
