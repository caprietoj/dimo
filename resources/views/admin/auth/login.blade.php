<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso Administrativo | DIMO Law Firm</title>

    <!-- Google Fonts: Inter & Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        :root {
            --primary: #1152d4;
            --primary-dark: #0d3ea4;
            --background-dark: #0b111e;
        }

        html {
            font-size: 14px !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            background-color: var(--background-dark) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1, h2, h3, .grid-header {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
            font-weight: 700;
        }

        .login-box {
            width: 400px;
            max-width: 92%;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5) !important;
            overflow: hidden;
            background-color: #ffffff;
        }

        .form-control {
            border-radius: 6px 0 0 6px !important;
            border: 1px solid #cbd5e1 !important;
            padding: 0.45rem 0.75rem !important;
            height: 38px !important;
            font-size: 0.88rem !important;
        }

        .form-control:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 2px rgba(17, 82, 212, 0.15) !important;
        }

        .input-group-text {
            border-radius: 0 6px 6px 0 !important;
            border: 1px solid #cbd5e1 !important;
            border-left: 0;
            background-color: #f8fafc;
            height: 38px !important;
            padding: 0.45rem 0.75rem !important;
        }

        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            border-radius: 6px !important;
            padding: 0.55rem 1.25rem !important;
            font-size: 0.88rem !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 6px rgba(17, 82, 212, 0.25) !important;
            transition: all 0.15s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card">
        <div class="card-header text-center py-3 border-bottom bg-white">
            <div class="d-flex align-items-center justify-content-center mb-1">
                <div class="bg-primary p-1 rounded text-white d-flex align-items-center justify-content-center mr-2 shadow-sm" style="width: 26px; height: 26px;">
                    <span class="material-symbols-outlined" style="font-size: 18px;">balance</span>
                </div>
                <h1 class="h5 font-weight-bold mb-0 text-dark">
                    DIMO <span class="text-primary font-weight-bold">Colombia</span>
                </h1>
            </div>
            <p class="text-muted text-xs mb-0">Panel de Administración Jurídica</p>
        </div>
        <div class="card-body login-card-body px-4 py-3">
            <p class="text-center font-weight-600 text-dark mb-3 text-xs">
                Inicie sesión para gestionar el contenido y consultas
            </p>

            @if(session('info'))
                <div class="alert alert-info py-2 text-sm border-0 shadow-sm">
                    <i class="fas fa-info-circle mr-1"></i> {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger py-2 text-sm border-0 shadow-sm">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="text-xs font-weight-bold text-uppercase text-muted">Correo Electrónico</label>
                    <div class="input-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@dimo.com.co" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope text-primary"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="text-xs font-weight-bold text-uppercase text-muted">Contraseña</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-primary"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                            <label class="custom-control-label text-sm text-muted font-weight-normal" for="remember">Recordarme</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block text-uppercase font-weight-bold">
                    Ingresar al Panel <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </form>

            <div class="mt-4 pt-3 text-center border-top">
                <a href="{{ route('home') }}" class="text-sm text-primary font-weight-bold">
                    <i class="fas fa-arrow-left mr-1"></i> Volver al Sitio Web Principal
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
