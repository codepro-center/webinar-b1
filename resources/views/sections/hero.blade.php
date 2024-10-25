<section class="container position-relative" id="home">
    @auth
        <x-edit_section_btn target="#edit-hero-modal" />

        <x-modal id="edit-hero-modal" title="Edit Section Hero" form_action="{{ route('contents.update.hero') }}" form_method="put" form_data="true">
            <div class="form-group mb-3">
                <label for="name" class="form-label fw-semibold">Nama Anda</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama anda" value="{{ old('name') ?? $contents['name'] }}" autofocus required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="profesion" class="form-label fw-semibold">Profesi</label>
                <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion" name="profesion" placeholder="Masukkan profesi anda" value="{{ old('profesion') ?? $contents['profesion'] }}" required>
                @error('profesion')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="wa_link" class="form-label fw-semibold">Link WhatsApp</label>
                <input type="text" class="form-control @error('wa_link') is-invalid @enderror" id="wa_link" name="wa_link" placeholder="Masukkan link WhatsApp anda" value="{{ old('wa_link') ?? $contents['wa_link'] }}" required>
                @error('wa_link')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hero_text" class="form-label">Teks Hero</label>
                <textarea class="form-control" id="hero_text" name="hero_text" rows="3" required>{{ old('hero_text') ?? $contents['real_hero_text'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="hero_image" class="form-label">Gambar Hero</label>
                <input class="form-control @error('hero_image') is-invalid @enderror" type="file" id="hero_image" name="hero_image">
                @error('hero_image')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </x-modal>
    @endauth
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 class="fw-semibold mb-3">{!! $contents['hero_text'] !!}</h1>
            <div class="d-flex mb-2">
                <a href="#about" class="me-2">
                    <button class="btn btn-outline-dark rounded-5">
                        Tentang Saya
                    </button>
                </a>
                <a href="{{ $contents['wa_link'] }}" class="mx-2">
                    <button class="btn btn-primary rounded-5">
                        <i class="bi bi-whatsapp me-2"></i>
                        Hubungi Saya
                    </button>
                </a>
            </div>
            <div class="d-flex">
                <a href="{{ $socmeds['instagram'] }}" class="me-2">
                    <i class="bi bi-instagram text-secondary fs-2"></i>
                </a>
                <a href="{{ $socmeds['linkedin'] }}" class="mx-2">
                    <i class="bi bi-linkedin text-secondary fs-2"></i>
                </a>
                <a href="{{ $socmeds['gmail'] }}" class="mx-2">
                    <i class="bi bi-envelope-at-fill text-secondary fs-2"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 p-4 p-md-5 text-center">
            <img src="{{ $contents['hero_image'] ? $contents['hero_image'] : asset('images/me-1.png') }}" alt="Hero Image" class="img-fluid w-75">
        </div>
    </div>
</section>