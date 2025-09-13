


<!DOCTYPE html>
<html lang="en">
<style>
    body{
        margin:250px;
        border:10px solid black;
        width:50%;
        padding:80px;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="padding:20px;margin: 0 auto;">
    <h1>Biodata Form</h1>
   
    <!-- <a href="<?= base_url('index.php/biodata/download_sample') ?>" class="btn-download">Download Sample</a> -->
    <!-- <form action="biodata/add" method="POST">
            <div style="margin-bottom:30px;">
                <label style="padding-right:50px;"><b>Name</b></label>
                <input type="text" name="name"><br>
            </div>
            <div style="margin-bottom:30px;">
                <label for="" style="padding-right:35px;" ><b>Address</b></label>
                <input type="text" name="address">
            </div>

            <button type="submit">Submit</button>
    </form> -->

    
        <!-- <h2>Upload From Excel</h2> -->

        <!-- Download Sample Excel -->
        <a href="<?= base_url('index.php/biodata/download_sample') ?>" class="btn-download">Download Sample Excel</a>

        <!-- Upload Excel -->
        <form action="<?= base_url('index.php/biodata/import_excel') ?>" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
            <input type="file" name="excel_file" accept=".csv" required>
            <button type="submit">Upload</button>
        </form>
    </div>
    
</body>
</html>