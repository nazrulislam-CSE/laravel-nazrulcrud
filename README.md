<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nazrul CRUD — Laravel CRUD Generator Package</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background: #f8fafc; }
    .hero { background: linear-gradient(90deg,#0d6efd22,#6c757d11); border-radius: .5rem; }
    pre { background:#0b1220; color:#e6eef8; padding:1rem; border-radius:.5rem; overflow:auto; }
    code { color: #e6eef8; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, 'Roboto Mono', monospace; }
    .badge-feature { font-size:.85rem; }
    .table thead th { vertical-align: middle; }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="mb-4 hero p-4">
      <h1 class="display-6">Nazrul CRUD <small class="text-muted">— Laravel CRUD Generator Package</small></h1>
      <p class="lead mb-0">A beautiful Bootstrap-based CRUD generator package for Laravel with one-click installation.</p>
    </div>

    <div class="row gy-4">
      <div class="col-12 col-lg-8">
        <section class="card mb-3">
          <div class="card-body">
            <h3>✨ Overview</h3>
            <p>
              A powerful, beautiful, and intuitive CRUD generator that automatically creates complete admin panels with Bootstrap 5 UI.
              Save hours of development time with a single command.
            </p>

            <h5 class="mt-4">🚀 Core Features</h5>
            <ul>
              <li><span class="badge bg-success badge-feature">One-Command CRUD Generation</span> – Generate complete CRUD operations with a single command</li>
              <li><span class="badge bg-success badge-feature">Bootstrap 5 UI</span> – Modern, responsive interface</li>
              <li><span class="badge bg-success badge-feature">Automatic Code Generation</span> – Models, Controllers, Migrations, Views, Routes</li>
              <li><span class="badge bg-success badge-feature">Image Upload with Preview</span></li>
              <li><span class="badge bg-success badge-feature">Advanced Search & Filters</span></li>
              <li><span class="badge bg-success badge-feature">Client & Server Validation</span></li>
              <li><span class="badge bg-success badge-feature">SweetAlert Notifications</span></li>
              <li><span class="badge bg-success badge-feature">Statistics Dashboard</span></li>
            </ul>

            <h5 class="mt-4">📌 Requirements</h5>
            <ul>
              <li>PHP 8.2+</li>
              <li>Laravel 12+</li>
              <li>Bootstrap 5</li>
              <li>MySQL / PostgreSQL / SQLite</li>
            </ul>
          </div>
        </section>

        <section class="card mb-3">
          <div class="card-body">
            <h3>📥 Installation (Simple)</h3>
            <p>Follow these steps in your project root:</p>

            <pre><code># Step 1: Add Package Repository
composer config repositories.nazrulcrud vcs https://github.com/nazrulislam-CSE/laravel-nazrulcrud

# Step 2: Install Package
composer require nazrulcrud/crud:dev-main

# Step 3: Publish Migrations
php artisan vendor:publish --tag=crud-migrations

# Step 4: Run Migrations
php artisan migrate

# Step 5: Check Migration Status
php artisan migrate:status

# Step 6: Create Images Directory
mkdir -p public/images
chmod 755 public/images</code></pre>

            <p class="text-muted">If you need to publish config, assets or views, use the appropriate <code>php artisan vendor:publish</code> tags provided by the package.</p>

          </div>
        </section>

        <section class="card mb-3">
          <div class="card-body">
            <h3>📁 Available CRUD Routes</h3>
            <div class="table-responsive">
              <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Action</th>
                    <th>HTTP Method</th>
                    <th>URL</th>
                    <th>Notes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Items List</td>
                    <td><strong>GET</strong></td>
                    <td><code>/items</code></td>
                    <td>Show all items (index)</td>
                  </tr>
                  <tr>
                    <td>Create Item</td>
                    <td><strong>GET</strong></td>
                    <td><code>/items/create</code></td>
                    <td>Show create form</td>
                  </tr>
                  <tr>
                    <td>Store Item</td>
                    <td><strong>POST</strong></td>
                    <td><code>/items</code></td>
                    <td>Save new item</td>
                  </tr>
                  <tr>
                    <td>Show Item</td>
                    <td><strong>GET</strong></td>
                    <td><code>/items/{id}</code></td>
                    <td>Show single item (optional)</td>
                  </tr>
                  <tr>
                    <td>Edit Item</td>
                    <td><strong>GET</strong></td>
                    <td><code>/items/{id}/edit</code></td>
                    <td>Show edit form</td>
                  </tr>
                  <tr>
                    <td>Update Item</td>
                    <td><strong>PUT / PATCH</strong></td>
                    <td><code>/items/{id}</code></td>
                    <td>Update existing item</td>
                  </tr>
                  <tr>
                    <td>Delete Item</td>
                    <td><strong>DELETE</strong></td>
                    <td><code>/items/{id}</code></td>
                    <td>Delete item</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>

        <section class="card mb-3">
          <div class="card-body">
            <h3>🎯 Quick Usage Tips</h3>
            <ul>
              <li>Ensure your app's filesystem/public disk is configured correctly for image uploads.</li>
              <li>Run <code>php artisan storage:link</code> if package saves images to <code>storage/app/public</code>.</li>
              <li>Check permissions for <code>public/images</code> so web server can write uploads.</li>
            </ul>
          </div>
        </section>

      </div> <!-- col -->

      <div class="col-12 col-lg-4">
        <aside class="card">
          <div class="card-body">
            <h5>📦 Package Info</h5>
            <p class="mb-2"><strong>Repository:</strong><br>
              <a href="https://github.com/nazrulislam-CSE/laravel-nazrulcrud" target="_blank" rel="noopener">github.com/nazrulislam-CSE/laravel-nazrulcrud</a>
            </p>

            <h6>Want more?</h6>
            <ul class="small">
              <li>Badges (Packagist / License)</li>
              <li>Screenshots or Demo GIF</li>
              <li>How-to: Example generate commands</li>
            </ul>

            <hr>

            <h6>Contact / Help</h6>
            <p class="small mb-0">If you want I can also generate a full GitHub README.md with badges, screenshots, and example commands — or prepare a demo page showing the admin UI.</p>
          </div>
        </aside>
      </div>

    </div> <!-- row -->

    <footer class="text-center text-muted mt-4">
      <small>Prepared with ❤ for Laravel developers • Nazrul CRUD</small>
    </footer>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
