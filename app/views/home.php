<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        label{
            font-size: large;
            font-family: 'Courier New', Courier, monospace;
        }
        .btn{
            font-size: x-large;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 10px;
        }
        fieldset{
            border-radius: 20px;
        }
        table{
            font-size: x-large;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
<fieldset>
        <legend><h1>Student Information</h1></legend>
    <form action="/<?=(isset($edit['id']))? "submitedit/" . $edit['id']: "submit" ?>" method="post">
        <label>StudentID:</label>
        <input type="text"  name="studentID" required value="<?=(isset($edit['id']))? $edit['studentID']: ""?>">
        <label style="padding-left: 200px;">FullName:</label>
        <input type="text" name="FullName" required value="<?=(isset($edit['id']))? $edit['FullName']: ""?>">
        <label style="padding-left: 175px;">YearLevel:</label>
        <input type="text" name="YearLevel" required value="<?=(isset($edit['id']))? $edit['YearLevel']: ""?>">
        <label style="padding-left: 140px;">Program:</label>
        <input type="text" name="Program" required value="<?=(isset($edit['id']))? $edit['Program']: ""?>">
        <br>
        <br>
        <input class="btn" type="submit" value="<?=(isset($edit['id']))? "Update" : "Submit" ?>">
        </fieldset>
    </form>

    <table border="1">
    <thead>
            <th>STUDENT ID</th>
            <th>Full Name</th>
            <th>Year Level</th>
            <th>Program</th>
            <th>Controls</th>
        </thead>
        <tbody>
            <?php foreach($info as $i): ?>
        <tr>
            <td><?= $i['studentID']?></td>
            <td><?= $i['FullName']?></td>
            <td><?= $i['YearLevel']?></td>
            <td><?= $i['Program']?></td>
            <td><a href="/delete/<?= $i['id'] ?>">DELETE</a>||
            <a href="/edit/<?= $i['id'] ?>">EDIT</a></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>