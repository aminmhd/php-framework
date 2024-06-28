<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include "views/notify.php" ?> 
    <h2>User Data</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Role</th>
            <th>Operation</th>
        </tr>
        <?php if(count($data) > 0): ?>
        <?php foreach($data as $val): ?>
            <tr style="font-weight: normal;color: blue">
            <th><?= $val->name ?></th>
            <th><?= $val->username ?></th>
            <th><?= $val->email ?></th>
            <th><?= $val->created_at ?></th>
            <th><?= $val->updated_at ?></th>
            <th><?= $val->role ?></th>
            <th>
                <a style="color: red;" href="#">update</a>
                <a style="color: red;" href="<?= route('user.delete', ["id" => $val->id]) ?>">delete</a>
            </th>
            </tr>
         <?php endforeach ?>
        <?php endif ?>
       
        <!-- Add more rows here for additional users -->
    </table>
</body>
</html>
