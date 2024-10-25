@props([
    'top' => '1rem',
    'right' => '1rem',
    'target' => '#',
    'type' => 'danger',
])

<button class="btn btn-{{ $type }} position-absolute" style="top: {{ $top }}; right: {{ $right }};" data-bs-toggle="modal" data-bs-target="{{ $target }}">
    <i class="bi bi-pencil"></i>
    {{ $slot }}
</button>
