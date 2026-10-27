<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Control') | M&amp;C LEGAL GROUP - AdminLTE</title>

    <!-- Google Fonts: Inter for UI & Playfair Display for legal headers -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,700&display=swap" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        :root {
            --primary: #6E1E2E;
            --primary-hover: #531421;
            --primary-light: rgba(110, 30, 46, 0.08);
            --bg-sidebar: #1C1114;
            --bg-sidebar-hover: rgba(255, 255, 255, 0.05);
            --bg-app: #F8F4F3;
            --bg-card: #ffffff;
            --border-subtle: #E8DEDF;
            --border-hairline: #F5EFEF;
            --text-main: #241619;
            --text-muted: #7B6A6D;
            --text-subtle: #94a3b8;
        }

        /* Base Typography: Balanced, Crisp, Enterprise-Grade Readability */
        html {
            font-size: 14px !important;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body, .hold-transition, .main-sidebar, .content-wrapper, .main-header, .main-footer {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            background-color: var(--bg-app) !important;
            color: var(--text-main);
            font-size: 0.9rem !important; /* ~12.6px - 13px base text */
            line-height: 1.5;
        }

        .content-wrapper {
            background-color: var(--bg-app) !important;
        }

        /* Headings: Clean sans-serif, proportional, non-oversized */
        h1, h2, h3, h4, h5, h6, .card-title, .brand-text, .content-header h1 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
            font-weight: 600;
            color: var(--text-main);
            letter-spacing: -0.015em;
        }

        .content-header {
            padding: 12px 0.75rem !important;
        }

        .content-header h1 {
            font-size: 1.22rem !important; /* ~17px */
            font-weight: 700 !important;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .breadcrumb {
            font-size: 0.8rem !important; /* ~11.2px */
            margin-bottom: 0;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: var(--text-subtle);
            padding: 0 5px;
        }

        /* Top Navbar */
        .main-header.navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid var(--border-subtle) !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02) !important;
            height: 48px;
            padding: 0 0.85rem;
        }

        .main-header .nav-link {
            height: 48px;
            display: flex;
            align-items: center;
            font-size: 0.84rem !important;
            font-weight: 500;
            color: #475569 !important;
            padding: 0 0.75rem !important;
        }

        .main-header .nav-link:hover {
            color: var(--primary) !important;
        }

        /* Sidebar Styling (High-End Linear/Obsidian Dark Theme) */
        .main-sidebar {
            background-color: var(--bg-sidebar) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.06) !important;
            box-shadow: none !important;
        }

        .brand-link {
            background-color: var(--bg-sidebar) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
            padding: 0.75rem 0.95rem !important;
            height: 52px;
            display: flex;
            align-items: center;
        }

        .brand-link .brand-text {
            font-size: 0.95rem !important;
            font-weight: 700;
            color: #ffffff !important;
            letter-spacing: -0.01em;
        }

        .user-panel {
            padding: 0.6rem 0.6rem 0.75rem !important;
            margin-bottom: 0.5rem !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        }

        .user-panel .info a {
            font-size: 0.84rem !important;
            font-weight: 600;
            color: #f1f5f9 !important;
        }

        .nav-sidebar .nav-header {
            font-size: 0.7rem !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #64748b !important;
            padding: 0.75rem 0.75rem 0.25rem !important;
            font-weight: 700;
        }

        .nav-sidebar .nav-item .nav-link {
            font-size: 0.84rem !important;
            font-weight: 500;
            color: #94a3b8 !important;
            padding: 0.42rem 0.75rem !important;
            border-radius: 6px !important;
            margin-bottom: 2px;
            transition: all 0.15s ease;
        }

        .nav-sidebar .nav-item .nav-link:hover {
            background-color: var(--bg-sidebar-hover) !important;
            color: #ffffff !important;
        }

        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            box-shadow: 0 1px 4px rgba(110, 30, 46, 0.3) !important;
            font-weight: 600;
        }

        .nav-sidebar .nav-link i.nav-icon {
            font-size: 0.9rem !important;
            margin-right: 0.5rem !important;
            width: 1.2rem;
            text-align: center;
        }

        /* Cards: Crisp, Clean Borders, Subtle Shadows */
        .card {
            border: 1px solid var(--border-subtle) !important;
            border-radius: 8px !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
            background-color: #ffffff;
            margin-bottom: 1.15rem;
        }

        .card-header {
            background-color: #ffffff !important;
            border-bottom: 1px solid var(--border-hairline) !important;
            padding: 0.65rem 1rem !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 0.92rem !important;
            font-weight: 600;
            color: var(--text-main);
            margin: 0;
        }

        .card-primary.card-outline {
            border-top: 2.5px solid var(--primary) !important;
        }

        .card-body {
            padding: 1rem !important;
        }

        .card-footer {
            padding: 0.65rem 1rem !important;
            background-color: #fafbfc;
            border-top: 1px solid var(--border-hairline);
        }

        /* Form Controls: Balanced, Professional 35px height */
        .form-group {
            margin-bottom: 0.85rem !important;
        }

        label {
            font-size: 0.82rem !important;
            font-weight: 600 !important;
            color: #334155 !important;
            margin-bottom: 0.35rem !important;
            letter-spacing: 0.01em;
        }

        .form-control, .custom-select {
            height: 35px !important;
            font-size: 0.875rem !important;
            padding: 0.35rem 0.65rem !important;
            border-radius: 6px !important;
            border: 1px solid #cbd5e1 !important;
            color: #0f172a !important;
            background-color: #ffffff !important;
            line-height: 1.4;
        }

        textarea.form-control {
            height: auto !important;
            padding: 0.5rem 0.65rem !important;
            font-size: 0.875rem !important;
            line-height: 1.45;
        }

        .form-control:focus, .custom-select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 2px rgba(110, 30, 46, 0.12) !important;
        }

        /* Buttons: Crisp, Balanced */
        .btn {
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            padding: 0.35rem 0.8rem !important;
            border-radius: 6px !important;
            line-height: 1.4;
            transition: all 0.15s ease;
        }

        .btn-sm {
            font-size: 0.8rem !important;
            padding: 0.25rem 0.6rem !important;
            border-radius: 5px !important;
        }

        .btn-lg {
            font-size: 0.95rem !important;
            padding: 0.5rem 1.25rem !important;
            border-radius: 6px !important;
        }

        .btn-primary,
        a.btn-primary,
        a.btn-primary:link,
        a.btn-primary:visited {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
            box-shadow: 0 1px 2px rgba(110, 30, 46, 0.2) !important;
            text-decoration: none !important;
        }

        .btn-primary:hover, 
        .btn-primary:focus,
        .btn-primary:active,
        a.btn-primary:hover,
        a.btn-primary:focus,
        a.btn-primary:active {
            background-color: var(--primary-hover) !important;
            border-color: var(--primary-hover) !important;
            color: #ffffff !important;
            box-shadow: 0 2px 5px rgba(110, 30, 46, 0.3) !important;
            text-decoration: none !important;
            transform: none !important;
        }

        .btn-outline-primary,
        a.btn-outline-primary,
        a.btn-outline-primary:link,
        a.btn-outline-primary:visited {
            color: var(--primary) !important;
            border-color: var(--primary) !important;
            background-color: #ffffff !important;
            text-decoration: none !important;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        a.btn-outline-primary:hover,
        a.btn-outline-primary:focus,
        a.btn-outline-primary:active {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
            text-decoration: none !important;
        }

        .btn-success {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
            box-shadow: 0 1px 2px rgba(110, 30, 46, 0.2) !important;
        }

        .btn-success:hover, .btn-success:focus {
            background-color: var(--primary-hover) !important;
            border-color: var(--primary-hover) !important;
        }

        .btn-info {
            background-color: #1e293b !important;
            border-color: #1e293b !important;
            color: #ffffff !important;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.2) !important;
        }

        .btn-info:hover, .btn-info:focus {
            background-color: #0f172a !important;
            border-color: #0f172a !important;
        }

        .btn-warning {
            background-color: #334155 !important;
            border-color: #334155 !important;
            color: #ffffff !important;
        }

        .btn-warning:hover, .btn-warning:focus {
            background-color: #1e293b !important;
            border-color: #1e293b !important;
        }

        .btn-secondary, .btn-default {
            background-color: #f8fafc !important;
            border-color: #cbd5e1 !important;
            color: #334155 !important;
        }

        .btn-secondary:hover, .btn-default:hover {
            background-color: #f1f5f9 !important;
            border-color: #94a3b8 !important;
            color: #0f172a !important;
        }

        .btn-outline-info,
        .btn-outline-success {
            color: var(--primary) !important;
            border-color: #cbd5e1 !important;
            background-color: #ffffff !important;
        }

        .btn-outline-info:hover,
        .btn-outline-success:hover {
            background-color: var(--primary-light) !important;
            border-color: var(--primary) !important;
            color: var(--primary) !important;
        }

        .btn-outline-secondary {
            color: #475569 !important;
            border-color: #cbd5e1 !important;
            background-color: #ffffff !important;
        }

        .btn-outline-secondary:hover {
            background-color: #f1f5f9 !important;
            border-color: #94a3b8 !important;
            color: #0f172a !important;
        }

        .btn-outline-danger {
            color: #64748b !important;
            border-color: #cbd5e1 !important;
            background-color: #ffffff !important;
        }

        .btn-outline-danger:hover {
            background-color: #f1f5f9 !important;
            border-color: #94a3b8 !important;
            color: #0f172a !important;
        }

        .custom-control-input:checked ~ .custom-control-label::before {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        .custom-control-input:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 1px #ffffff, 0 0 0 3px rgba(110, 30, 46, 0.25) !important;
        }

        /* Metrics / Small Boxes */
        /* Metrics / Small Boxes - Paleta Ejecutiva: Blanco, Azul Corporativo y Grises */
        .small-box {
            border-radius: 10px !important;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05), 0 1px 2px rgba(15, 23, 42, 0.03) !important;
            margin-bottom: 1rem !important;
            overflow: hidden;
            position: relative;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .small-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08) !important;
        }

        .small-box .inner {
            padding: 1rem 1.15rem !important;
        }

        .small-box .inner h3 {
            font-size: 1.85rem !important;
            font-weight: 700 !important;
            margin: 0 0 4px 0 !important;
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .small-box .inner p {
            font-size: 0.76rem !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin: 0;
        }

        .small-box .icon {
            top: 12px !important;
            right: 14px !important;
            font-size: 2.2rem !important;
        }

        .small-box .icon i {
            font-size: 2.2rem !important;
        }

        .small-box .small-box-footer {
            font-size: 0.78rem !important;
            padding: 6px 1rem !important;
            font-weight: 600;
            display: block;
            text-align: center;
            letter-spacing: 0.01em;
            text-decoration: none !important;
            transition: background-color 0.15s ease, color 0.15s ease;
        }

        /* Utilidades Bootstrap heredadas -> vino corporativo */
        .text-primary,
        a.text-primary,
        .btn-link {
            color: var(--primary) !important;
        }
        .bg-primary {
            background-color: var(--primary) !important;
        }
        .border-primary {
            border-color: var(--primary) !important;
        }
        .page-link {
            color: var(--primary) !important;
        }
        .page-item.active .page-link {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #ffffff !important;
        }
        .alert-primary {
            background-color: var(--primary-light) !important;
            border-color: var(--primary) !important;
            color: var(--primary) !important;
        }
        /* 1. Vino Corporativo Primario */
        .small-box.bg-info {
            background: linear-gradient(135deg, #6E1E2E 0%, #3F0D18 100%) !important;
            color: #ffffff !important;
            border: 1px solid rgba(110, 30, 46, 0.25) !important;
        }
        .small-box.bg-info .inner h3,
        .small-box.bg-info .inner p {
            color: #ffffff !important;
        }
        .small-box.bg-info .icon {
            color: rgba(255, 255, 255, 0.22) !important;
            opacity: 1 !important;
        }
        .small-box.bg-info .small-box-footer {
            background-color: rgba(0, 0, 0, 0.14) !important;
            color: rgba(255, 255, 255, 0.95) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        .small-box.bg-info .small-box-footer:hover {
            background-color: rgba(0, 0, 0, 0.25) !important;
            color: #ffffff !important;
        }

        /* 2. Azul Marino / Gris Carbón Ejecutivo (Navy Slate) */
        .small-box.bg-warning {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;
            color: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, 0.3) !important;
        }
        .small-box.bg-warning .inner h3,
        .small-box.bg-warning .inner p {
            color: #ffffff !important;
        }
        .small-box.bg-warning .icon {
            color: rgba(255, 255, 255, 0.2) !important;
            opacity: 1 !important;
        }
        .small-box.bg-warning .small-box-footer {
            background-color: rgba(0, 0, 0, 0.24) !important;
            color: rgba(255, 255, 255, 0.95) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
        }
        .small-box.bg-warning .small-box-footer:hover {
            background-color: rgba(0, 0, 0, 0.38) !important;
            color: #ffffff !important;
        }

        /* 3. Blanco Puro Corporativo con Detalles en Azul (Clean Corporate White) */
        .small-box.bg-success {
            background: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #e2e8f0 !important;
        }
        .small-box.bg-success .inner h3 {
            color: #6E1E2E !important;
        }
        .small-box.bg-success .inner p {
            color: #64748b !important;
        }
        .small-box.bg-success .icon {
            color: #6E1E2E !important;
            opacity: 0.15 !important;
        }
        .small-box.bg-success .small-box-footer {
            background-color: #f8fafc !important;
            color: #6E1E2E !important;
            border-top: 1px solid #e2e8f0 !important;
        }
        .small-box.bg-success .small-box-footer:hover {
            background-color: #f1f5f9 !important;
            color: #0b3da0 !important;
        }

        /* 4. Gris Ejecutivo / Slate Suave con Tipografía Oscura y Enlace Azul (Slate Gray) */
        .small-box.bg-danger,
        .small-box.bg-indigo,
        .small-box.bg-purple {
            background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%) !important;
            color: #0f172a !important;
            border: 1px solid #e2e8f0 !important;
        }
        .small-box.bg-danger .inner h3,
        .small-box.bg-indigo .inner h3,
        .small-box.bg-purple .inner h3 {
            color: #0f172a !important;
        }
        .small-box.bg-danger .inner p,
        .small-box.bg-indigo .inner p,
        .small-box.bg-purple .inner p {
            color: #64748b !important;
        }
        .small-box.bg-danger .icon,
        .small-box.bg-indigo .icon,
        .small-box.bg-purple .icon {
            color: #475569 !important;
            opacity: 0.16 !important;
        }
        .small-box.bg-danger .small-box-footer,
        .small-box.bg-indigo .small-box-footer,
        .small-box.bg-purple .small-box-footer {
            background-color: #e2e8f0 !important;
            color: #1e293b !important;
            border-top: 1px solid #cbd5e1 !important;
        }
        .small-box.bg-danger .small-box-footer:hover,
        .small-box.bg-indigo .small-box-footer:hover,
        .small-box.bg-purple .small-box-footer:hover {
            background-color: #cbd5e1 !important;
            color: #6E1E2E !important;
        }

        /* Tables & Lists */
        .table {
            color: var(--text-main);
            font-size: 0.88rem !important;
            margin-bottom: 0;
        }

        .table thead th {
            border-top: none;
            border-bottom: 1px solid var(--border-subtle) !important;
            font-size: 0.76rem !important;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #64748b !important;
            background-color: #f8fafc !important;
            padding: 0.6rem 0.85rem !important;
            font-weight: 700;
        }

        .table td {
            vertical-align: middle;
            border-top: 1px solid var(--border-hairline) !important;
            padding: 0.6rem 0.85rem !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #fafbfc;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5f9;
        }

        /* Badges */
        .badge {
            font-size: 0.76rem !important;
            font-weight: 600 !important;
            padding: 0.28em 0.6em !important;
            border-radius: 5px !important;
            letter-spacing: 0.01em;
        }

        /* Badges - Paleta Ejecutiva: Blanco, Azul Corporativo y Grises */
        .badge-primary, .badge-dimo {
            background-color: var(--primary-light) !important;
            color: var(--primary) !important;
            border: 1px solid rgba(110, 30, 46, 0.25) !important;
        }

        .badge-info {
            background-color: rgba(110, 30, 46, 0.08) !important;
            color: var(--primary) !important;
            border: 1px solid rgba(110, 30, 46, 0.2) !important;
        }

        .badge-warning {
            background-color: #1e293b !important;
            color: #ffffff !important;
            border: 1px solid #0f172a !important;
        }

        .badge-success {
            background-color: #ffffff !important;
            color: var(--primary) !important;
            border: 1px solid #cbd5e1 !important;
        }

        .badge-secondary, .badge-light {
            background-color: #f1f5f9 !important;
            color: #475569 !important;
            border: 1px solid #e2e8f0 !important;
        }

        .badge-danger {
            background-color: #f8fafc !important;
            color: #64748b !important;
            border: 1px solid #cbd5e1 !important;
        }

        /* Alerts - Tarjetas Ejecutivas */
        .alert {
            border-radius: 8px !important;
            padding: 0.8rem 1.15rem !important;
            font-size: 0.86rem !important;
        }

        .alert-success {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
            border-left: 4.5px solid var(--primary) !important;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05) !important;
        }

        .alert-success i {
            color: var(--primary) !important;
        }

        .alert-danger {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
            border-left: 4.5px solid #475569 !important;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05) !important;
        }

        .alert-danger i {
            color: #475569 !important;
        }

        .alert-info {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
            border-left: 4.5px solid var(--primary) !important;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05) !important;
        }

        .alert-info i {
            color: var(--primary) !important;
        }

        /* Tabs & Pills */
        .nav-tabs {
            border-bottom: 1px solid var(--border-subtle);
        }

        .nav-tabs .nav-link {
            font-size: 0.85rem !important;
            font-weight: 600;
            color: #64748b;
            padding: 0.55rem 0.95rem !important;
            border: none;
            border-bottom: 2px solid transparent;
            border-radius: 0;
            transition: all 0.15s ease;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary);
            border-color: transparent transparent #cbd5e1;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary) !important;
            background-color: transparent !important;
            border-color: transparent transparent var(--primary) !important;
            border-bottom: 2px solid var(--primary) !important;
        }

        .nav-pills .nav-link {
            font-size: 0.82rem !important;
            font-weight: 600;
            padding: 0.35rem 0.75rem !important;
            border-radius: 5px !important;
            color: #475569;
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            box-shadow: 0 1px 3px rgba(110, 30, 46, 0.25) !important;
        }

        /* Pagination */
        .page-item.active .page-link {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
            font-size: 0.8rem;
        }

        .page-link {
            font-size: 0.8rem;
            padding: 0.3rem 0.6rem;
            color: var(--primary);
            border-radius: 5px;
            margin: 0 1px;
        }

        /* Subtle Scrollbars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Section Title Banners Inside Settings */
        .section-header-banner {
            font-size: 0.88rem !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #1e293b;
            padding-bottom: 0.45rem;
            margin-bottom: 0.85rem;
            border-bottom: 1px solid var(--border-subtle);
            display: flex;
            align-items: center;
        }

        .section-header-banner i {
            color: var(--primary);
            margin-right: 0.5rem;
            font-size: 0.95rem;
        }

        .section-sub-header {
            font-size: 0.8rem !important;
            font-weight: 700;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-top: 0.85rem;
            margin-bottom: 0.5rem;
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 0.3rem;
        }

        /* Footer */
        .main-footer {
            padding: 0.65rem 1rem !important;
            font-size: 0.78rem !important;
            border-top: 1px solid var(--border-subtle) !important;
            background-color: #ffffff !important;
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.dashboard') }}" class="nav-link font-weight-bold">Dashboard</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.messages.index') }}" class="nav-link">Consultas</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.settings.index') }}" class="nav-link">Personalizar Web</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-user-circle fa-lg mr-1 text-primary"></i>
                    <span class="d-none d-md-inline font-weight-bold">{{ str_replace(' DIMO', '', Auth::user()->name ?? 'Administrador') }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow-sm border-0">
                    <div class="dropdown-item bg-light text-center py-3">
                        <i class="fas fa-user-shield fa-3x text-primary mb-2"></i>
                        <p class="mb-0 font-weight-bold text-dark">{{ str_replace(' DIMO', '', Auth::user()->name ?? 'Administrador') }}</p>
                        <small class="text-muted">{{ Auth::user()->email ?? 'admin@dimo.com.co' }}</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.users.index') }}" class="dropdown-item">
                        <i class="fas fa-users-cog mr-2 text-primary"></i> Gestión de Usuarios
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="dropdown-item">
                        <i class="fas fa-sliders-h mr-2 text-primary"></i> Ajustes de la Firma
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="dropdown-item">
                        <i class="fas fa-globe mr-2 text-primary"></i> Abrir Sitio Público
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item text-secondary font-weight-bold">
                            <i class="fas fa-sign-out-alt mr-2 text-muted"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo with exact M&C LEGAL GROUP identity -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link d-flex align-items-center px-3 py-2">
            <div class="bg-primary rounded text-white d-flex align-items-center justify-content-center mr-2 shadow-sm" style="width: 28px; height: 28px; min-width: 28px; min-height: 28px;">
                <span class="material-symbols-outlined" style="font-size: 16px;">balance</span>
            </div>
            <div class="d-flex flex-column" style="line-height: 1.15;">
                <span class="brand-text font-weight-bold text-white" style="font-size: 0.875rem !important; letter-spacing: -0.01em;">
                    M&amp;C LEGAL GROUP
                </span>
                <span class="text-muted text-uppercase" style="font-size: 0.58rem; letter-spacing: 0.08em; font-weight: 600;">
                    Panel Administrativo
                </span>
            </div>
        </a>

        <!-- Sidebar -->
        <div class="sidebar px-2">
            <!-- Sidebar user panel -->
            <div class="user-panel mt-2 pb-2 mb-2 d-flex align-items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                <div class="image text-white pr-2">
                    <i class="fas fa-user-circle text-primary" style="font-size: 1.15rem;"></i>
                </div>
                <div class="info p-0">
                    <a href="#" class="d-block font-weight-semibold text-white" style="font-size: 0.75rem !important; line-height: 1.2;">{{ str_replace(' DIMO', '', Auth::user()->name ?? 'Administrador') }}</a>
                    <span class="text-primary" style="font-size: 0.62rem; font-weight: 600;"><i class="fas fa-circle" style="font-size: 6px; vertical-align: middle;"></i> En Línea</span>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">Gestión de Contenido</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>Personalizar Web (100%)</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.practice-areas.index') }}" class="nav-link {{ request()->routeIs('admin.practice-areas.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-gavel"></i>
                            <p>Áreas de Práctica</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Equipo Legal</p>
                        </a>
                    </li>

                    <li class="nav-header">Bandeja de Entrada</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Consultas Legales
                                @php
                                    $pendingCount = \App\Models\ContactMessage::where('status', 'pending')->count();
                                @endphp
                                @if($pendingCount > 0)
                                    <span class="badge badge-primary right font-weight-bold">{{ $pendingCount }}</span>
                                @endif
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Seguridad y Accesos</li>

                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shield-alt"></i>
                            <p>Roles y Permisos</p>
                        </a>
                    </li>

                    <li class="nav-header">Acceso Rápido</li>

                    <li class="nav-item">
                        <a href="{{ route('home') }}" target="_blank" class="nav-link text-primary font-weight-bold">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>Ver Web Pública &rarr;</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('page_title', 'Tablero de Control')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-primary font-weight-bold">Inicio</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content pb-4">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 font-weight-semibold" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 font-weight-semibold" role="alert">
                        <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer text-center">
        Desarrollado con <i class="fas fa-heart text-danger mx-1"></i> por <a href="https://www.caprietoj.com" target="_blank" rel="noopener noreferrer" class="font-weight-bold text-primary">Cristian Andres Prieto J.</a>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
