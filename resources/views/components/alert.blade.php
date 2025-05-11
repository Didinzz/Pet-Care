@php
    $types = ['success', 'error', 'warning', 'info'];
    $type = null;
    $message = null;

    foreach ($types as $t) {
        if (session($t)) {
            $type = $t;
            $message = session($t);
            break;
        }
    }
@endphp

@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible show fade m-3">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ $message }}
        </div>
    </div>
@endif
