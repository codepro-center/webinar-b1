@props([
    'id' => 'modalId',
    'title' => 'Modal Title',
    'size' => '',
    'footer' => true,
    'form_action' => null,
    'form_method' => 'POST',
    'form_data' => false,
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog {{ $size }}">
        <div class="modal-content">
            @if($form_action)
                @php
                    $method = strtoupper($form_method);
                    $hasUncommonMethod = $method != 'POST' && $method != 'GET';
                @endphp
                <form action="{{ $form_action }}" method="{{ $hasUncommonMethod ? 'POST' : $method  }}" {{ $form_data ? "enctype=multipart/form-data" : "" }}>
                    @csrf
                    @if($hasUncommonMethod)
                        @method($method)
                    @endif
            @endif

            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>

            @if($footer)
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            @endif

            @if($form_action)
                </form>
            @endif
        </div>
    </div>
</div>
