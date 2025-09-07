

<?php //echo '<pre>';print_r($data);exit(); ?>
<!DOCTYPE html>
<html lang="en">
<style>
    body{
        margin:250px;
        border:10px solid black;
        width:50%;
        padding:80px;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
        <thead>
            <th>
                id
            </th>
            <th>
                Name
            </th>
            <th>
                address
            </th>
            <th>Edit</th>
            <th>Delete</th>

        </thead>
        <tbody>
        
        
            <?php if (isset($data)): ?>
            <?php foreach ($data as $d):?>
            <tr>
            <td><?php echo $d->id ?></td>
            <td><?php echo $d->name; ?></td>
            <td><?php echo $d->address; ?></td>
            <td><a href="<?= base_url('index.php/biodata/edit/'.$d->id) ?>">Edit</a></td>
            <td><a href="<?= base_url('index.php/biodata/delete/'.$d->id) ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?>
        
        
        </tbody>
        
    </table>
    
</body>
</html>