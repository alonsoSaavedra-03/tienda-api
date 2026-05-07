<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500&family=DM+Sans:wght@400;500&display=swap');
        
        :root {
            --c-bg: #F8F6F1;
            --c-surface: #FFFFFF;
            --c-accent: #1A3A5C;
            --c-accent2: #C9A96E;
            --c-text: #1C2B3A;
            --c-muted: #6B7A8A;
            --c-border: #D8D3C9;
            --c-err: #A32D2D;
            --c-success: #0F6E56;
            --radius: 10px;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            background: var(--c-bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--c-text);
            min-height: 100vh;
        }
        
        .page { display: flex; min-height: 100vh; }
        
        /* ── Sidebar ── */
        .sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--c-accent);
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .sidebar-logo {
            font-family: 'Fraunces', serif;
            color: #fff;
            font-size: 22px;
            line-height: 1.2;
        }
        .sidebar-logo span {
            display: block;
            font-size: 13px;
            font-weight: 400;
            color: #9BB5CF;
            margin-top: 4px;
            font-family: 'DM Sans', sans-serif;
        }
        
        .sidebar-steps { display: flex; flex-direction: column; }
        
        .step {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            padding: 14px 0;
            border-bottom: 0.5px solid rgba(255,255,255,0.1);
        }
        .step:last-child { border-bottom: none; }
        
        .step-num {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #9BB5CF;
            flex-shrink: 0;
        }
        .step.active .step-num { background: var(--c-accent2); border-color: var(--c-accent2); color: #fff; }
        
        .step-label { font-size: 13px; color: #9BB5CF; margin-top: 3px; }
        .step.active .step-label { color: #fff; font-weight: 500; }
        
        /* ── Main ── */
        .main { flex: 1; padding: 3rem 2.5rem; overflow-y: auto; }
        
        .header { margin-bottom: 2.5rem; }
        .header h1 { font-family: 'Fraunces', serif; font-size: 28px; font-weight: 500; }
        .header p { color: var(--c-muted); font-size: 14px; margin-top: 6px; }
        
        /* ── Banners ── */
        .success-banner {
            background: #EAF3DE;
            border: 0.5px solid #97C459;
            border-radius: var(--radius);
            padding: 12px 16px;
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 14px;
            color: var(--c-success);
        }
        .error-banner {
            background: #FCEBEB;
            border: 0.5px solid #F09595;
            border-radius: var(--radius);
            padding: 12px 16px;
            margin-bottom: 1.5rem;
            font-size: 14px;
            color: var(--c-err);
        }
        .error-banner ul { padding-left: 18px; margin-top: 4px; }
        
        /* ── Form grid ── */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem 1.5rem; }
        
        .field { display: flex; flex-direction: column; gap: 6px; }
        .field.full { grid-column: 1 / -1; }
        
        label { font-size: 13px; font-weight: 500; letter-spacing: 0.01em; }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            height: 42px;
            padding: 0 14px;
            border: 0.5px solid var(--c-border);
            border-radius: var(--radius);
            font-size: 14px;
            color: var(--c-text);
            background: var(--c-surface);
            font-family: 'DM Sans', sans-serif;
            transition: border 0.15s;
            width: 100%;
        }
        input:focus, select:focus {
            outline: none;
            border-color: var(--c-accent);
            box-shadow: 0 0 0 3px rgba(26,58,92,0.08);
        }
        
        /* ── Password toggle ── */
        .pw-wrap { position: relative; }
        .pw-wrap input { padding-right: 42px; }
        .pw-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--c-muted);
            background: none;
            border: none;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        
        /* ── Strength bar ── */
        .strength-bar {
            height: 3px;
            border-radius: 99px;
            background: var(--c-border);
            overflow: hidden;
            margin-top: 6px;
        }
        .strength-fill { height: 100%; border-radius: 99px; width: 0; transition: width 0.3s, background 0.3s; }
        .strength-label { font-size: 11px; color: var(--c-muted); margin-top: 3px; min-height: 14px; }
        
        /* ── Terms ── */
        .terms-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 16px;
            background: #F0ECE4;
            border-radius: var(--radius);
        }
        .terms-row input[type="checkbox"] { width: 16px; height: 16px; flex-shrink: 0; margin-top: 2px; accent-color: var(--c-accent); }
        .terms-row span { font-size: 13px; color: var(--c-muted); line-height: 1.5; }
        .terms-row a { color: var(--c-accent); text-decoration: underline; }
        
        /* ── Submit row ── */
        .submit-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.75rem;
        }
        .btn-submit {
            background: var(--c-accent);
            color: #fff;
            border: none;
            height: 44px;
            padding: 0 28px;
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s, transform 0.1s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-submit:hover { background: #254D75; }
        .btn-submit:active { transform: scale(0.98); }
        
        .login-link { font-size: 13px; color: var(--c-muted); }
        .login-link a { color: var(--c-accent); text-decoration: none; font-weight: 500; }
        
        /* ── Responsive ── */
        @media (max-width: 640px) {
            .sidebar { display: none; }
            .form-grid { grid-template-columns: 1fr; }
            .main { padding: 2rem 1.25rem; }
            .submit-row { flex-direction: column; gap: 1rem; align-items: flex-start; }
        }
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;500&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
 
<div class="page">
 
    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="sidebar-logo">
            Portal Académico
            <span>Universidad · Registro</span>
        </div>
        <div class="sidebar-steps">
            <div class="step active">
                <div class="step-num">1</div>
                <div class="step-label">Datos personales</div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div class="step-label">Selección de carrera</div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div class="step-label">Confirmación</div>
            </div>
        </div>
    </div>
 
    {{-- Main content --}}
    <div class="main">
 
        <div class="header">
            <h1>Registro de Estudiante</h1>
            <p>Completa el formulario para crear tu cuenta en el portal académico.</p>
        </div>
 
        @if(session('success'))
            <div class="success-banner">
                <i class="ti ti-circle-check" aria-hidden="true"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
 
        @if($errors->any())
            <div class="error-banner">
                <strong>Revisa los siguientes campos:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <form action="{{ url('/register') }}" method="POST" id="regForm" novalidate>
            @csrf
 
            <div class="form-grid">
 
                <div class="field full">
                    <label for="name">Nombre completo</label>
                    <input type="text" id="name" name="name"
                        placeholder="Ej. Ana García López"
                        value="{{ old('name') }}"
                        autocomplete="name" required>
                </div>
 
                <div class="field full">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email"
                        placeholder="correo@universidad.edu"
                        value="{{ old('email') }}"
                        autocomplete="email" required>
                </div>
 
                <div class="field">
                    <label for="password">Contraseña</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password"
                            placeholder="Mín. 8 caracteres"
                            autocomplete="new-password" required>
                        <button type="button" class="pw-toggle"
                            onclick="togglePw('password','eyeP')"
                            aria-label="Mostrar contraseña">
                            <i class="ti ti-eye" id="eyeP" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <div class="strength-label" id="strengthLabel"></div>
                </div>
 
                <div class="field">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <div class="pw-wrap">
                        <input type="password" id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Repite tu contraseña"
                            autocomplete="new-password" required>
                        <button type="button" class="pw-toggle"
                            onclick="togglePw('password_confirmation','eyeC')"
                            aria-label="Mostrar confirmación">
                            <i class="ti ti-eye" id="eyeC" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
 
                <div class="field full">
                    <label for="career_id">Carrera</label>
                    <select id="career_id" name="career_id" required>
                        <option value="" disabled selected>Selecciona tu carrera</option>
                        @foreach($careers as $career)
                            <option value="{{ $career->id }}"
                                {{ old('career_id') == $career->id ? 'selected' : '' }}>
                                {{ $career->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
 
                <div class="field full">
                    <div class="terms-row">
                        <input type="checkbox" id="terms_accepted"
                            name="terms_accepted"
                            {{ old('terms_accepted') ? 'checked' : '' }}
                            required>
                        <span>
                            He leído y acepto los
                            <a href="#">términos y condiciones</a>
                            y la <a href="#">política de privacidad</a>.
                        </span>
                    </div>
                </div>
 
            </div>
 
            <div class="submit-row">
                <button type="submit" class="btn-submit">
                    Crear cuenta
                    <i class="ti ti-arrow-right" aria-hidden="true"></i>
                </button>
                <div class="login-link">
                    ¿Ya tienes cuenta? <a href="{{ url('/login') }}">Inicia sesión</a>
                </div>
            </div>
 
        </form>
    </div>
</div>
 <script>
    function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
 
    if (input.type === 'password') {
        input.type    = 'text';
        icon.className = 'ti ti-eye-off';
    } else {
        input.type    = 'password';
        icon.className = 'ti ti-eye';
    }
}
 
function getStrength(value) {
    let score = 0;
    if (value.length >= 8)            score++;
    if (/[A-Z]/.test(value))          score++;
    if (/[0-9]/.test(value))          score++;
    if (/[^A-Za-z0-9]/.test(value))   score++;
    return score;
}
 
document.getElementById('password').addEventListener('input', function () {
    const score  = getStrength(this.value);
    const fill   = document.getElementById('strengthFill');
    const label  = document.getElementById('strengthLabel');
 
    const map = [
        { width: '0',    color: '',          text: ''           },
        { width: '25%',  color: '#E24B4A',   text: 'Muy débil'  },
        { width: '50%',  color: '#EF9F27',   text: 'Débil'      },
        { width: '75%',  color: '#63B3E0',   text: 'Moderada'   },
        { width: '100%', color: '#1D9E75',   text: 'Fuerte'     },
    ];
 
    fill.style.width      = map[score].width;
    fill.style.background = map[score].color;
    label.textContent     = this.value.length ? map[score].text : '';
});
 
document.getElementById('regForm').addEventListener('submit', function (e) {
    const name   = document.getElementById('name').value.trim();
    const email  = document.getElementById('email').value.trim();
    const pw     = document.getElementById('password').value;
    const pwc    = document.getElementById('password_confirmation').value;
    const career = document.getElementById('career_id').value;
    const terms  = document.getElementById('terms_accepted').checked;
 
    const errors = [];
 
    if (!name)
        errors.push('El nombre es requerido.');
 
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
        errors.push('Ingresa un correo electrónico válido.');
 
    if (pw.length < 8)
        errors.push('La contraseña debe tener al menos 8 caracteres.');
 
    if (pw !== pwc)
        errors.push('Las contraseñas no coinciden.');
 
    if (!career)
        errors.push('Selecciona una carrera.');
 
    if (!terms)
        errors.push('Debes aceptar los términos y condiciones.');
 
    if (errors.length === 0) return; // deja que Laravel maneje el submit
 
    e.preventDefault();
 
    const banner = document.getElementById('clientErrors');
 
    if (!banner) {
        const div = document.createElement('div');
        div.id = 'clientErrors';
        div.className = 'error-banner';
        div.innerHTML = '<strong>Revisa los siguientes campos:</strong><ul>'
            + errors.map(err => `<li>${err}</li>`).join('')
            + '</ul>';
        document.getElementById('regForm').prepend(div);
    } else {
        banner.innerHTML = '<strong>Revisa los siguientes campos:</strong><ul>'
            + errors.map(err => `<li>${err}</li>`).join('')
            + '</ul>';
    }
 
    document.getElementById('clientErrors').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
});
 
 </script>
</body>
</html>
