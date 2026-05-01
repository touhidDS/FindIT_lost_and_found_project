<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindIt – Post Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            background-color: #f5f8fa;
            font-family: Raleway, sans-serif;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            background-color: #fff;
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #3d4852 !important;
        }

        .nav-link {
            color: #6c757d !important;
            font-size: 14px;
            font-weight: 600;
        }

        .page-wrapper {
            padding: 32px 0 48px;
        }

        .card {
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 1px solid #e3e6f0;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px 20px;
            color: #3d4852;
        }

        .card-body { padding: 28px; }

        .form-group { margin-bottom: 20px; }

        .form-group label {
            font-weight: 600;
            color: #3d4852;
            margin-bottom: 6px;
            display: block;
            font-size: 13px;
        }

        .form-control,
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            color: #495057;
            background-color: #fff;
            font-family: Raleway, sans-serif;
            outline: none;
            transition: border-color 0.15s;
            box-sizing: border-box;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 3px rgba(90,103,216,0.12);
        }

        textarea { resize: vertical; min-height: 100px; line-height: 1.6; }
        select { cursor: pointer; }

        .text-danger {
            color: #e3342f;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        .type-row {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .type-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 2px solid #ced4da;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #6c757d;
            background: #fff;
            transition: all 0.2s;
            user-select: none;
            font-family: Raleway, sans-serif;
        }

        .type-btn input { display: none; }

        .type-btn.active-lost {
            border-color: #e53e3e;
            background: #fff5f5;
            color: #c53030;
        }

        .type-btn.active-found {
            border-color: #38a169;
            background: #f0fff4;
            color: #276749;
        }

        /* Photo upload */
        .photo-upload-box {
            border: 2px dashed #ced4da;
            border-radius: 4px;
            padding: 28px;
            text-align: center;
            background: #fafbfc;
            cursor: pointer;
            transition: all 0.2s;
        }

        .photo-upload-box:hover {
            border-color: #5a67d8;
            background: #f0f4ff;
        }

        .photo-upload-box input[type="file"] {
            display: none;
        }

        .upload-icon { font-size: 28px; margin-bottom: 6px; }
        .upload-text { font-size: 14px; font-weight: 600; color: #3d4852; margin-bottom: 3px; }
        .upload-hint { font-size: 12px; color: #6c757d; }

        /* Preview grid */
        .preview-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 10px;
        }

        .preview-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #e3e6f0;
        }

        .preview-item img {
            width: 100%; height: 100%;
            object-fit: cover;
        }

        .preview-remove {
            position: absolute;
            top: 4px; right: 4px;
            width: 20px; height: 20px;
            background: rgba(0,0,0,0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            cursor: pointer;
            color: #fff;
            border: none;
            line-height: 1;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            font-family: Raleway, sans-serif;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-primary {
            background-color: #5a67d8;
            color: #fff;
            width: 100%;
        }

        .btn-primary:hover { background-color: #4c51bf; color: #fff; }

        .btn-secondary {
            background-color: #fff;
            color: #6c757d;
            border: 1px solid #ced4da;
        }

        .btn-secondary:hover { background-color: #f8f9fc; }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #6c757d;
            text-decoration: none;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .back-link:hover { color: #3d4852; text-decoration: none; }

        @media (max-width: 576px) {
            .preview-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">🔍 FindIt</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit"
                            style="background:none;border:none;cursor:pointer;
                                   color:#6c757d;font-family:Raleway,sans-serif;
                                   font-size:14px;padding:8px 0;font-weight:600;">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Content -->
<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <a href="{{ route('home') }}" class="back-link">← Back to Home</a>

                <div class="card">
                    <div class="card-header">Post an Item</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('items.store') }}"
                              enctype="multipart/form-data" id="itemForm">
                            @csrf

                            {{-- Lost / Found Toggle --}}
                            <div class="form-group">
                                <label>ITEM TYPE</label>
                                <div class="type-row">
                                    <label class="type-btn" id="lostBtn">
                                        <input type="radio" name="type" value="lost"
                                               {{ old('type', $type) === 'lost' ? 'checked' : '' }}
                                               onchange="updateType('lost')">
                                        <span>😟 I Lost Something</span>
                                    </label>
                                    <label class="type-btn" id="foundBtn">
                                        <input type="radio" name="type" value="found"
                                               {{ old('type', $type) === 'found' ? 'checked' : '' }}
                                               onchange="updateType('found')">
                                        <span>😊 I Found Something</span>
                                    </label>
                                </div>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title">Item Title</label>
                                <input type="text" id="title" name="title"
                                       value="{{ old('title') }}"
                                       placeholder="e.g. Black leather wallet, Blue iPhone 14...">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Category + Date --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select id="category_id" name="category_id">
                                            <option value="">Select category…</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->icon }} {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_occurred">Date Occurred</label>
                                        <input type="date" id="date_occurred"
                                               name="date_occurred"
                                               value="{{ old('date_occurred') }}"
                                               max="{{ date('Y-m-d') }}">
                                        @error('date_occurred')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Location --}}
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location"
                                       value="{{ old('location') }}"
                                       placeholder="e.g. DIU Library 3rd floor, Cafeteria, Main Gate…">
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Contact Number --}}
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number"
                                       value="{{ old('contact_number') }}"
                                       placeholder="e.g. 01712345678">
                                <small style="color:#6c757d;font-size:12px;">
                                    Enter your phone number so the finder/owner can contact you
                                </small>
                                @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description"
                                          placeholder="Describe the item — color, brand, any identifying marks…">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Photo Upload --}}
                            <div class="form-group">
                                <label>
                                    Photos
                                    <span style="font-weight:400;color:#6c757d;">(optional, max 4)</span>
                                </label>

                                <div class="photo-upload-box" id="uploadBox" onclick="document.getElementById('photoInput').click()">
                                    <div id="uploadContent">
                                        <div class="upload-icon">📷</div>
                                        <div class="upload-text">Click to upload photos</div>
                                        <div class="upload-hint">JPG, PNG, WEBP up to 2MB · Max 4 photos</div>
                                    </div>
                                </div>

                                {{-- ✅ Real file input — always stays in sync --}}
                                <input type="file" id="photoInput" name="photos[]"
                                       multiple accept="image/*"
                                       style="display:none"
                                       onchange="handlePhotos(this)">

                                <div class="preview-grid" id="previewGrid"></div>

                                @error('photos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('photos.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    🚀 Post Item
                                </button>
                            </div>

                            <div class="form-group mt-2 mb-0 text-center">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // ─── Type toggle ───────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        const checked = document.querySelector('input[name="type"]:checked');
        if (checked) updateType(checked.value);
    });

    function updateType(type) {
        const lostBtn  = document.getElementById('lostBtn');
        const foundBtn = document.getElementById('foundBtn');
        lostBtn.classList.remove('active-lost', 'active-found');
        foundBtn.classList.remove('active-lost', 'active-found');
        type === 'lost' ? lostBtn.classList.add('active-lost')
                        : foundBtn.classList.add('active-found');
    }

    // ─── Photo upload ──────────────────────────────────────────────
    let selectedFiles = []; // stores File objects

    function handlePhotos(input) {
        const added   = Array.from(input.files);
        const canAdd  = 4 - selectedFiles.length;
        selectedFiles = [...selectedFiles, ...added.slice(0, canAdd)];
        input.value   = ''; // reset so same file can be re-selected after remove
        renderPreviews();
        syncInput();
    }

    function removePhoto(index) {
        selectedFiles.splice(index, 1);
        renderPreviews();
        syncInput();
    }

    function renderPreviews() {
        const grid    = document.getElementById('previewGrid');
        const content = document.getElementById('uploadContent');
        grid.innerHTML = '';

        selectedFiles.forEach((file, i) => {
            const reader = new FileReader();
            reader.onload = e => {
                const div = document.createElement('div');
                div.className = 'preview-item';
                div.innerHTML = `
                    <img src="${e.target.result}" alt="preview">
                    <button type="button" class="preview-remove" onclick="removePhoto(${i})">✕</button>`;
                grid.appendChild(div);
            };
            reader.readAsDataURL(file);
        });

        const remaining = 4 - selectedFiles.length;
        if (remaining === 0) {
            content.innerHTML = `<div class="upload-text" style="color:#6c757d;">Maximum 4 photos added</div>`;
        } else {
            content.innerHTML = `
                <div class="upload-icon">📷</div>
                <div class="upload-text">Click to upload photos</div>
                <div class="upload-hint">JPG, PNG, WEBP up to 2MB · ${remaining} photo${remaining !== 1 ? 's' : ''} remaining</div>`;
        }
    }

    // ✅ KEY FIX: sync selectedFiles array back into the real file input
    function syncInput() {
        const input = document.getElementById('photoInput');
        const dt    = new DataTransfer();
        selectedFiles.forEach(f => dt.items.add(f));
        try {
            input.files = dt.files; // works in Chrome, Edge, Firefox
        } catch(e) {
            // fallback: if DataTransfer assignment fails, inject hidden inputs on submit
            input.dataset.fallback = 'true';
        }
    }

    // ─── On submit ─────────────────────────────────────────────────
    document.getElementById('itemForm').addEventListener('submit', function (e) {
        const input = document.getElementById('photoInput');

        // Fallback for browsers where input.files = dt.files doesn't work
        if (input.dataset.fallback === 'true' && selectedFiles.length > 0) {
            // Remove the original input to avoid sending empty
            input.remove();

            // Create one hidden input per file
            selectedFiles.forEach((file, i) => {
                const dt  = new DataTransfer();
                dt.items.add(file);
                const inp = document.createElement('input');
                inp.type  = 'file';
                inp.name  = 'photos[]';
                inp.style.display = 'none';
                try { inp.files = dt.files; } catch(err) {}
                document.getElementById('itemForm').appendChild(inp);
            });
        }

        const btn       = document.getElementById('submitBtn');
        btn.textContent = '⏳ Posting…';
        btn.disabled    = true;
    });
</script>

</body>
</html>