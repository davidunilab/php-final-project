<div class="card mb-3">
    <div class="card-header">
        Anonymous
        <small class="ml-3 text-muted"> {{ \Carbon\Carbon::parse($comments->created_at)->diffForHumans() }}</small>
    </div>
    <div class="card-body">
        {{$comments->comment ?? "no comment"}}
    </div>
</div>
