@php
    $pickerId = $id ?? 'img_picker_' . \Illuminate\Support\Str::slug($name, '_');
    $fileInputName = $fileInputName ?? ($name . '_file');
    $removeInputName = $removeInputName ?? ('remove_' . $name);
    $currentVal = old($name, $value ?? '');
    $aspect = $aspect ?? 'landscape'; // 'landscape' (16:9 banner) or 'square' (1:1 avatar)
    $hasImage = !empty($currentVal);
    $isLocalStorage = $hasImage && (str_starts_with($currentVal, '/storage/') || str_starts_with($currentVal, 'storage/'));
    $previewUrl = $hasImage ? asset($currentVal) : '';
@endphp

<div class="card card-outline card-secondary border shadow-none mb-3 image-picker-component" id="{{ $pickerId }}_wrapper">
    <div class="card-header bg-light py-2 px-3 d-flex flex-wrap justify-content-between align-items-center">
        <label class="font-weight-bold mb-0 text-dark" style="font-size: 0.88rem;">
            <i class="fas fa-image text-primary mr-1"></i> {{ $label }}
        </label>
        <span class="badge {{ $hasImage ? ($isLocalStorage ? 'badge-primary' : 'badge-info') : 'badge-light border' }} px-2 py-1 mt-1 mt-sm-0" id="{{ $pickerId }}_badge">
            @if($hasImage)
                <i class="fas {{ $isLocalStorage ? 'fa-hdd' : 'fa-globe' }} mr-1"></i> {{ $isLocalStorage ? 'Archivo en servidor' : 'Enlace web externo' }}
            @else
                <i class="fas fa-info-circle mr-1"></i> Sin imagen seleccionada
            @endif
        </span>
    </div>

    <div class="card-body p-3">
        <div class="row align-items-center">
            <!-- Preview Box -->
            <div class="{{ $aspect === 'square' ? 'col-md-3 col-sm-4 text-center' : 'col-md-4 col-sm-5 text-center' }} mb-3 mb-sm-0">
                <div class="position-relative d-inline-block border rounded p-1 bg-white shadow-sm w-100" style="max-width: {{ $aspect === 'square' ? '150px' : '280px' }};">
                    <div class="image-preview-container overflow-hidden rounded bg-light d-flex align-items-center justify-content-center"
                         style="height: {{ $aspect === 'square' ? '140px' : '110px' }}; width: 100%;">
                        <img id="{{ $pickerId }}_preview" 
                             src="{{ $previewUrl }}" 
                             alt="Vista previa" 
                             class="w-100 h-100 {{ $hasImage ? '' : 'd-none' }}" 
                             style="object-fit: cover;">
                        <div id="{{ $pickerId }}_placeholder" class="{{ $hasImage ? 'd-none' : '' }} text-muted py-3 text-center">
                            <i class="fas fa-image fa-2x mb-1 text-secondary opacity-50"></i>
                            <div class="text-xs" style="font-size: 0.75rem;">Sin imagen</div>
                        </div>
                    </div>
                    <button type="button" 
                            id="{{ $pickerId }}_btn_remove" 
                            class="btn btn-outline-secondary btn-xs btn-block mt-1 font-weight-bold {{ $hasImage ? '' : 'd-none' }}" 
                            title="Quitar imagen actual">
                        <i class="fas fa-trash-alt mr-1"></i> Quitar imagen
                    </button>
                </div>
            </div>

            <!-- Controls: File Upload & URL Option -->
            <div class="{{ $aspect === 'square' ? 'col-md-9 col-sm-8' : 'col-md-8 col-sm-7' }}">
                <!-- Segmented Tabs -->
                <ul class="nav nav-pills mb-2" id="{{ $pickerId }}_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active py-1 px-3 font-weight-bold text-xs" 
                           id="{{ $pickerId }}_file_tab" 
                           data-toggle="pill" 
                           href="#{{ $pickerId }}_file_pane" 
                           role="tab">
                            <i class="fas fa-folder-open mr-1"></i> Seleccionar archivo del equipo
                        </a>
                    </li>
                    <li class="nav-item ml-1">
                        <a class="nav-link py-1 px-3 font-weight-bold text-xs" 
                           id="{{ $pickerId }}_url_tab" 
                           data-toggle="pill" 
                           href="#{{ $pickerId }}_url_pane" 
                           role="tab">
                            <i class="fas fa-link mr-1"></i> O ingresar enlace URL
                        </a>
                    </li>
                </ul>

                <div class="tab-content border-top pt-2">
                    <!-- Tab Pane 1: File Upload (Explorador del sistema) -->
                    <div class="tab-pane fade show active" id="{{ $pickerId }}_file_pane" role="tabpanel">
                        <div class="form-group mb-1">
                            <div class="custom-file">
                                <input type="file" 
                                       name="{{ $fileInputName }}" 
                                       id="{{ $pickerId }}_file" 
                                       class="custom-file-input @error($fileInputName) is-invalid @enderror" 
                                       accept="image/jpeg,image/png,image/webp,image/gif">
                                <label class="custom-file-label text-truncate text-muted" 
                                       for="{{ $pickerId }}_file" 
                                       id="{{ $pickerId }}_file_label">
                                    Examinar archivo de imagen...
                                </label>
                            </div>
                            @error($fileInputName)
                                <span class="text-danger text-xs font-weight-bold d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <small class="text-muted d-block" style="font-size: 0.74rem;">
                            <i class="fas fa-check-circle text-primary mr-1"></i> Seleccione una imagen desde su computador (JPG, PNG, WebP o GIF, máx. 5 MB).
                        </small>
                    </div>

                    <!-- Tab Pane 2: URL Input -->
                    <div class="tab-pane fade" id="{{ $pickerId }}_url_pane" role="tabpanel">
                        <div class="form-group mb-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-globe text-muted"></i></span>
                                </div>
                                <input type="text" 
                                       name="{{ $name }}" 
                                       id="{{ $pickerId }}_url" 
                                       class="form-control @error($name) is-invalid @enderror" 
                                       value="{{ $currentVal }}" 
                                       placeholder="https://ejemplo.com/fotografia.jpg o ruta">
                            </div>
                            @error($name)
                                <span class="text-danger text-xs font-weight-bold d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <small class="text-muted d-block" style="font-size: 0.74rem;">
                            <i class="fas fa-info-circle text-primary mr-1"></i> Puede pegar un enlace directo HTTPS de internet o ruta web.
                        </small>
                    </div>
                </div>

                @if(!empty($helpText))
                    <div class="mt-2 text-xs text-muted" style="font-size: 0.74rem;">
                        <i class="fas fa-lightbulb text-primary mr-1"></i> {{ $helpText }}
                    </div>
                @endif

                <!-- Hidden input to signal explicit removal if user clicked "Quitar imagen" -->
                <input type="hidden" name="{{ $removeInputName }}" id="{{ $pickerId }}_remove" value="0">
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var pickerId = "{{ $pickerId }}";
    var fileInput = document.getElementById(pickerId + '_file');
    var fileLabel = document.getElementById(pickerId + '_file_label');
    var urlInput = document.getElementById(pickerId + '_url');
    var preview = document.getElementById(pickerId + '_preview');
    var placeholder = document.getElementById(pickerId + '_placeholder');
    var btnRemove = document.getElementById(pickerId + '_btn_remove');
    var removeInput = document.getElementById(pickerId + '_remove');
    var badge = document.getElementById(pickerId + '_badge');

    if (!fileInput || !urlInput) return;

    // Handle File Selection with instant client-side preview
    fileInput.addEventListener('change', function(e) {
        var file = e.target.files && e.target.files[0];
        if (file) {
            fileLabel.textContent = file.name;
            var reader = new FileReader();
            reader.onload = function(evt) {
                preview.src = evt.target.result;
                preview.classList.remove('d-none');
                placeholder.classList.add('d-none');
                btnRemove.classList.remove('d-none');
                removeInput.value = '0';
                badge.className = 'badge badge-primary px-2 py-1 mt-1 mt-sm-0';
                badge.innerHTML = '<i class="fas fa-check mr-1"></i> Nuevo archivo seleccionado';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle URL input live preview
    urlInput.addEventListener('input', function(e) {
        var val = e.target.value.trim();
        if (val) {
            preview.src = val;
            preview.classList.remove('d-none');
            placeholder.classList.add('d-none');
            btnRemove.classList.remove('d-none');
            removeInput.value = '0';
            badge.className = 'badge badge-info px-2 py-1 mt-1 mt-sm-0';
            badge.innerHTML = '<i class="fas fa-globe mr-1"></i> Enlace web URL';
        } else if (!fileInput.files || !fileInput.files.length) {
            preview.src = '';
            preview.classList.add('d-none');
            placeholder.classList.remove('d-none');
            btnRemove.classList.add('d-none');
            badge.className = 'badge badge-light border px-2 py-1 mt-1 mt-sm-0';
            badge.innerHTML = '<i class="fas fa-info-circle mr-1"></i> Sin imagen';
        }
    });

    // Handle "Quitar imagen"
    btnRemove.addEventListener('click', function() {
        fileInput.value = '';
        fileLabel.textContent = 'Examinar archivo de imagen...';
        urlInput.value = '';
        preview.src = '';
        preview.classList.add('d-none');
        placeholder.classList.remove('d-none');
        btnRemove.classList.add('d-none');
        removeInput.value = '1';
        badge.className = 'badge badge-secondary px-2 py-1 mt-1 mt-sm-0';
        badge.innerHTML = '<i class="fas fa-times-circle mr-1"></i> Imagen marcada para quitar';
    });
})();
</script>
