<section id="skills" class="bg-white py-5">
    <h2 class="text-center text-primary fw-semibold mb-3">Teknologi yang Dikuasai</h2>
    <div class="container py-4">
        @auth
            <div class="d-flex justify-content-end mb-3">
                <div class="btns-toggle d-none">
                    <button class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#add-skill-modal">
                        <i class="bi bi-plus"></i>
                        Tambah Skill
                    </button>
                    <button class="btn btn-outline-danger edit-control">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <button class="btn btn-danger edit-control btns-toggle">
                    <i class="bi bi-pencil"></i>
                </button>
            </div>
            <x-modal id="add-skill-modal" title="Tambah Skill" form_action="{{ route('skills.store') }}" form_data="true">
                <div class="form-group mb-3">
                    <label for="name" class="form-label fw-semibold">Skill</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama skill" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Skill</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </x-modal>
            <x-modal id="edit-skill-modal" title="Edit Skill" form_action="{{ route('skills.update') }}" form_method="PUT" form_data="true">
                <input type="hidden" name="id" id="skill_id">
                <div class="form-group mb-3">
                    <label for="skill_name" class="form-label fw-semibold">Skill</label>
                    <input type="text" class="form-control" id="skill_name" name="name" placeholder="Masukkan nama skill" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Skill</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </x-modal>
        @endauth
        <div class="row">
            @foreach ($skills as $skill)
                <div class="col-4 col-md-3 col-lg-2 mb-3">
                    <div class="card shadow rounded-4">
                        <div class="card-body d-flex align-items-center flex-column position-relative">
                            <img src="{{ asset("storage/{$skill->image}") }}" alt="Skill item" class="img-fluid w-75 mb-2">
                            <h5 class="text-center fw-bold">{{ $skill->name }}</h5>
                            @auth
                                <div class="dropdown position-absolute" style="bottom: 10px; right: 10px;">
                                    <a class="" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item edit-skill-btn" href="javascript:void(0);" data-name="{{ $skill->name }}" data-id="{{ $skill->id }}">
                                                <i class="bi bi-pencil text-warning me-2"></i>Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item delete-btn" href="javascript:void(0);" data-url="{{ route('skills.delete', $skill->id) }}" data-csrf="{{ csrf_token() }}">
                                                <i class="bi bi-trash text-danger me-2"></i>Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
            @empty($skills->count())
                <div class="col-12 bg-light rounded-3 p-5">
                    <div class="text-center">
                        <i class="bi bi-code-slash fs-1"></i>
                        <h6>Belum ada skill ditambahkan</h6>
                    </div>
                </div>
            @endempty
        </div>
    </div>
</section>