<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'DejaVu Sans', sans-serif;
        background: #ffffff;
        color: #1e293b;
        width: 297mm;
        height: 210mm;
    }

    .page {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .corner-logo {
        position: absolute;
        top: 22px;
        z-index: 2;
    }

    .corner-logo--lims {
        left: 42px;
    }

    .corner-logo--lims img {
        width: 104px;
        height: auto;
    }

    .corner-logo--ifpi {
        right: 42px;
        width: 220px;
    }

    .corner-logo--ifpi img {
        width: 100%;
        height: auto;
        display: block;
    }

    .border-top {
        height: 8px;
        background: linear-gradient(90deg, #1d4ed8, #ef4444);
    }

    .content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 24px 48px;
    }

    .logo-area {
        margin-bottom: 16px;
        padding-top: 6px;
    }

    .logo-text {
        font-size: 14pt;
        font-weight: bold;
        color: #1d4ed8;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .institution {
        font-size: 8pt;
        color: #64748b;
        margin-top: 2px;
    }

    .divider {
        width: 60px;
        height: 2px;
        background: #ef4444;
        margin: 14px auto;
    }

    .certificate-label {
        font-size: 11pt;
        color: #64748b;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .certify-text {
        font-size: 10pt;
        color: #475569;
        margin-bottom: 8px;
    }

    .participant-name {
        font-size: 22pt;
        font-weight: bold;
        color: #0f172a;
        margin: 8px 0 14px;
        border-bottom: 1px solid #e2e8f0;
        padding-bottom: 8px;
        width: 80%;
    }

    .event-info {
        font-size: 9pt;
        color: #475569;
        line-height: 1.7;
    }

    .event-name {
        font-size: 12pt;
        font-weight: bold;
        color: #1d4ed8;
        margin: 4px 0;
    }

    .workload {
        font-size: 9pt;
        color: #64748b;
        margin-top: 4px;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 0 48px 20px;
        border-top: 1px solid #e2e8f0;
        margin-top: 16px;
    }

    .signature-block {
        text-align: center;
        width: 180px;
    }

    .signature-line {
        width: 100%;
        height: 1px;
        background: #cbd5e1;
        margin-bottom: 4px;
    }

    .signature-name {
        font-size: 8pt;
        font-weight: bold;
        color: #334155;
    }

    .signature-role {
        font-size: 7pt;
        color: #94a3b8;
    }

    .token-info {
        font-size: 6pt;
        color: #cbd5e1;
        text-align: right;
    }

    .border-bottom {
        height: 6px;
        background: #1d4ed8;
    }
</style>
</head>
<body>
@php
    $limsLogo = public_path('assets/brands/lims-logo-transparent.png');
    $ifpiLogo = public_path('assets/brands/ifpi-teresina.svg');
@endphp
<div class="page">
    <div class="border-top"></div>

    <div class="corner-logo corner-logo--lims">
        <img src="{{ $limsLogo }}" alt="LIMS">
    </div>

    <div class="corner-logo corner-logo--ifpi">
        <img src="{{ $ifpiLogo }}" alt="IFPI - Campus Teresina Central">
    </div>

    <div class="content">
        <div class="logo-area">
            <div class="logo-text">LIMS</div>
            <div class="institution">Laboratório de Inovação em Sistemas Multimídia · IFPI</div>
        </div>

        <div class="divider"></div>

        <div class="certificate-label">Certificado de Participação</div>

        <div class="certify-text">Certificamos que</div>

        <div class="participant-name">{{ $registration->name }}</div>

        <div class="event-info">
            participou do evento
            <div class="event-name">{{ $event->title }}</div>
            realizado em {{ $event->starts_at->translatedFormat('d \d\e F \d\e Y') }}
            @if ($event->location)
                , em {{ $event->location }}
            @endif
        </div>

        @php
            $hours = $event->starts_at && $event->ends_at
                ? $event->starts_at->diffInHours($event->ends_at)
                : null;
        @endphp
        @if ($hours)
            <div class="workload">Carga horária: {{ $hours }}h</div>
        @endif
    </div>

    <div class="footer">
        <div class="signature-block">
            <div class="signature-line"></div>
            <div class="signature-name">Coordenador do LIMS</div>
            <div class="signature-role">Instituto Federal do Piauí</div>
        </div>

        <div class="token-info">
            Código de validação: {{ $registration->token }}<br>
            Emitido em: {{ now()->translatedFormat('d \d\e F \d\e Y') }}
        </div>

        <div class="signature-block">
            <div class="signature-line"></div>
            <div class="signature-name">Responsável pelo Evento</div>
            <div class="signature-role">{{ $event->title }}</div>
        </div>
    </div>

    <div class="border-bottom"></div>
</div>
</body>
</html>
