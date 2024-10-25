<section id="contacts" class="py-4">
    <div class="d-flex justify-content-center align-items-center">
        <h2 class="fw-semibold text-center me-3">Kontak Saya</h2>
        @auth
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modify-socmeds">
                <i class="bi bi-pencil"></i>
            </button>
        @endauth
    </div>
    </div>
    <div class="d-flex justify-content-center align-items-center py-3">
        @foreach ($socmeds as $name => $link)
            <div class="mx-3">
                <a href="{{ $link }}">
                    <img src="{{ asset("images/socmeds/$name.png") }}" alt="contact image" style="max-width: 40px">
                </a>
            </div>
        @endforeach
    </div>
    <x-modal id="modify-socmeds" form_action="{{ route('socmeds.update') }}" form_method="PUT" title="Edit Link Sosial Media">
        @foreach ($socmeds as $name => $link)
            <div class="form-group mb-3">
                <label for="{{ $name }}" class="form-label fw-semibold">{{ ucfirst($name) }}</label>
                <input type="text" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" placeholder="Masukkan {{ $name }} anda" value="{{ old($name) ?? $link }}" autofocus required>
                @error($name)
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @endforeach
    </x-modal>
</section>