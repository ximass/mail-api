<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inscrição no Evento</title>
</head>
<body>
    <p>Olá {{ $name }},</p>
    <p>Você se inscreveu com sucesso no evento <strong>{{ $eventTitle }}</strong>.</p>
    <p>Data de início: {{ \Carbon\Carbon::parse($eventStartDate)->format('d/m/Y') }}</p>
    <p>Data de término: {{ \Carbon\Carbon::parse($eventEndDate)->format('d/m/Y') }}</p>
    <p>Obrigado por se inscrever!</p>
</body>
</html>