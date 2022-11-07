<?php
    include "aula 2.php";
    $premio = 1547.90;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <th>id</th>
        <th>nome</th>
        <th>telefone</th>
        <tr>
        <td>1254</td>
        <td>Jean</td>
        <td>21589200</td>
        <td><?php echo($premio * 0.12); ?></td>
        </tr>

    </table>
</body>
</html>