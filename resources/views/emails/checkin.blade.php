<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Check-in no Evento</title>
</head>
<body>
    <p>Olá {{ $name }},</p>
    <p>Seu check-in no evento <strong>{{ $eventTitle }}</strong> foi realizado com sucesso.</p>
    <p>Data do evento: {{ \Carbon\Carbon::parse($eventStartDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($eventEndDate)->format('d/m/Y') }}</p>
    <p>Agradecemos sua participação!</p>
</body>
</html>