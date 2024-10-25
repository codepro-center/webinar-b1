<section id="projects" class="bg-secondary py-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="text-white fw-semibold mb-3">Daftar Projek</h2>
            @auth
                <div class="d-flex justify-content-end mb-3">
                    <div class="btns-toggle d-none">
                        <button class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#add-project-modal">
                            <i class="bi bi-plus"></i>
                            Tambah Projek
                        </button>
                        <button class="btn btn-outline-danger edit-control">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <button class="btn btn-danger edit-control btns-toggle">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
                <x-modal id="add-project-modal" title="Tambah Projek" form_action="{{ route('projects.store') }}" form_data="true">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Projek</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama projek" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="link" class="form-label fw-semibold">Link Projek</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan link projek" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Projek</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Projek</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </x-modal>
                <x-modal id="edit-project-modal" title="Edit Projek" form_action="{{ route('projects.update') }}" form_method="PUT" form_data="true">
                    <input type="hidden" name="id" id="project_id">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Projek</label>
                        <input type="text" class="form-control" id="project_name" name="name" placeholder="Masukkan nama projek" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="link" class="form-label fw-semibold">Link Projek</label>
                        <input type="text" class="form-control" id="project_link" name="link" placeholder="Masukkan link projek" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Projek</label>
                        <input class="form-control" type="file" id="project_image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Projek</label>
                        <textarea class="form-control" id="project_description" name="description" rows="3" required></textarea>
                    </div>
                </x-modal>
            @endauth
        </div>
        <div class="row py-3">
            @foreach ($projects as $project)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow rounded-4">
                        <img src="{{ asset("storage/{$project->image}") }}" class="card-img-top" alt="Projek item">
                        <div class="card-body">
                            <h5 class="text-center fw-bold my-3">{{ $project->name }}</h5>
                            <p class="text-muted text-center">{{ $project->description }}</p>
                            <div class="d-flex align-items-center">
                                <a href="{{ $project->link }}" class="flex-grow-1" target="_blank">
                                    <button class="btn btn-outline-dark w-100">
                                        Lihat Projek
                                    </button>
                                </a>
                                @auth
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical fs-3"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item edit-project-btn" href="javascript:void(0);" data-name="{{ $project->name }}" data-link="{{ $project->link }}" data-description="{{ $project->description }}" data-id="{{ $project->id }}">
                                                    <i class="bi bi-pencil text-warning me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item delete-btn" href="javascript:void(0);" data-url="{{ route('projects.delete', $project->id) }}" data-csrf="{{ csrf_token() }}">
                                                    <i class="bi bi-trash text-danger me-2"></i>Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @empty($projects->count())
                <div class="col-12 bg-light rounded-3 p-5">
                    <div class="text-center">
                        <i class="bi bi-cloud-slash fs-1"></i>
                        <h6>Belum ada projek ditambahkan</h6>
                    </div>
                </div>
            @endempty
        </div>
    </div>
</section>