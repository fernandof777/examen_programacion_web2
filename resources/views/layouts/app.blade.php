<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taller Automotriz') - Sistema de Vehículos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border-bottom: 1px solid #334155;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: #f8fafc;
            font-size: 1.25rem;
            font-weight: 700;
        }

        .navbar-brand .icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .navbar-nav {
            display: flex;
            gap: 0.5rem;
            list-style: none;
        }

        .navbar-nav a {
            color: #94a3b8;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .navbar-nav a:hover,
        .navbar-nav a.active {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        /* ── MAIN ── */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #f8fafc;
        }

        .page-title span {
            color: #3b82f6;
        }

        /* ── ALERTS ── */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateY(-10px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fbbf24;
        }

        .btn-warning:hover {
            background: rgba(245, 158, 11, 0.25);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.25);
        }

        .btn-secondary {
            background: rgba(100, 116, 139, 0.2);
            border: 1px solid rgba(100, 116, 139, 0.3);
            color: #94a3b8;
        }

        .btn-secondary:hover {
            background: rgba(100, 116, 139, 0.3);
            color: #cbd5e1;
        }

        /* ── CARD ── */
        .card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            overflow: hidden;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* ── FORM ── */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-control {
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: #e2e8f0;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            outline: none;
            width: 100%;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #f87171;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #334155;
        }

        /* ── TABLE ── */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 0.875rem 1.25rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            background: #0f172a;
            border-bottom: 1px solid #334155;
        }

        tbody tr {
            border-bottom: 1px solid #1e293b;
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        tbody td {
            padding: 1rem 1.25rem;
            font-size: 0.9rem;
            color: #cbd5e1;
            vertical-align: middle;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(59, 130, 246, 0.15);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        /* ── PAGINATION ── */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            padding: 1.5rem;
            border-top: 1px solid #334155;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
            list-style: none;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid #334155;
            background: #1e293b;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .pagination .page-link:hover {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .pagination .active .page-link {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #475569;
        }

        .empty-state .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        /* ── COLOR DOT ── */
        .color-dot {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .color-dot::before {
            content: '';
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--dot-color, #64748b);
            display: inline-block;
            flex-shrink: 0;
        }

        /* ── FOOTER ── */
        footer {
            text-align: center;
            padding: 2rem;
            color: #475569;
            font-size: 0.8rem;
            border-top: 1px solid #1e293b;
            margin-top: 3rem;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .navbar {
                padding: 0 1rem;
            }

            main {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('vehiculos.index') }}" class="navbar-brand">
        <div class="icon">🚗</div>
        Taller Automotriz
    </a>
    <ul class="navbar-nav">
        <li><a href="{{ route('vehiculos.index') }}" class="{{ request()->routeIs('vehiculos.index') ? 'active' : '' }}">📋 Lista</a></li>
        <li><a href="{{ route('vehiculos.create') }}" class="{{ request()->routeIs('vehiculos.create') ? 'active' : '' }}">➕ Nuevo Vehículo</a></li>
    </ul>
</nav>

<main>
    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Errores generales --}}
    @if($errors->any() && !$errors->has('marca') && !$errors->has('modelo'))
        <div class="alert alert-danger">
            ⚠️ Por favor corrige los errores del formulario.
        </div>
    @endif

    @yield('content')
</main>

<footer>
    Sistema de Registro de Vehículos — Taller Automotriz &copy; {{ date('Y') }} — Programación Web II
</footer>

</body>
</html>
