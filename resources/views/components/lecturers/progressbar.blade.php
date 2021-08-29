<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="progress">
        @if ( $rank >= 80 )
        <div class="progress-bar bg-success text-dark" role="progressbar" style="width: {{ $rank }}%" aria-valuenow="{{ $rank }}" aria-valuemin="0" aria-valuemax="100">{{ $rank }}</div>
        @elseif ( $rank >= 60 )
        <div class="progress-bar bg-info" role="progressbar " style="width: {{ $rank }}%" aria-valuenow="{{ $rank }}" aria-valuemin="0" aria-valuemax="100">{{ $rank }}</div>
        @elseif ( $rank >= 40 )
        <div class="progress-bar" role="progressbar" style="width: {{ $rank }}%" aria-valuenow="{{ $rank }}" aria-valuemin="0" aria-valuemax="100">{{ $rank }}</div>
        @elseif ( $rank >= 20 )
        <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ $rank }}%" aria-valuenow="{{ $rank }}" aria-valuemin="0" aria-valuemax="100">{{ $rank }}</div>
        @else
        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $rank }}%" aria-valuenow="{{ $rank }}" aria-valuemin="0" aria-valuemax="100">{{ $rank }}</div>
        @endif
    </div>
</div>
