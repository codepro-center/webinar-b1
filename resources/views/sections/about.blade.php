<section class="bg-secondary p-lg-5 p-4" id="about">
    <div class="card m-lg-5">
        <div class="card-body position-relative">
            @auth
                <x-edit_section_btn target="#edit-about-modal" />

                <x-modal id="edit-about-modal" title="Edit Section About" form_action="{{ route('contents.update.about') }}" form_method="put" form_data="true">
                    <div class="form-group mb-3">
                        <label for="about_title" class="form-label fw-semibold">Judul section about</label>
                        <input type="text" class="form-control @error('about_title') is-invalid @enderror" id="about_title" name="about_title" placeholder="Masukkan profesi anda" value="{{ old('about_title') ?? $contents['about_title'] }}" required>
                        @error('about_title')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="self_description" class="form-label">Deskripsi diri</label>
                        <textarea class="form-control" id="self_description" name="self_description" rows="3" required>{{ old('self_description') ?? $contents['self_description'] }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="about_image" class="form-label">Gambar section about</label>
                        <input class="form-control @error('about_image') is-invalid @enderror" type="file" id="about_image" name="about_image">
                        @error('about_image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="self_resume" class="form-label">Resume</label>
                        <input class="form-control @error('self_resume') is-invalid @enderror" type="file" id="self_resume" name="self_resume">
                        @error('self_resume')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </x-modal>
            @endauth
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <img src="{{ $contents['about_image'] ? $contents['about_image'] : asset('images/me-2.png') }}" alt="About Image" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 col-lg-8 px-5 d-flex flex-column justify-content-center">
                    <h2 class="text-primary fw-semibold">{{ $contents['about_title'] }}</h2>
                    <p>{{ $contents['self_description'] }}</p>
                    <div>
                        <a href="{{ $contents['self_resume'] ? $contents['self_resume'] : 'javascript:void(0);' }}" target="_blank">
                            <button class="btn btn-primary rounded-5">
                                <i class="bi bi-file-earmark-richtext me-2"></i>
                                Download CV
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>