<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">This is view from HomeController</h1>
    <table>
        <tr>
            <th>№</th>
            <th>title</th>
            <th>description</th>
        </tr>
        <?php foreach($users as $key => $value) {?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['description'] ?></td>              
            </tr>
        <?php }?>
    </table>
</body>
</html>