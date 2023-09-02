<?php

include_once('models/student.php');

$id = $_GET['id'];
$student = student::show($id);
?>

<?php include('layouts/top.php') ?>
<?php include('layouts/header.php') ?>

<!-- content -->
<div class="flex bg-white-300 rounded-xl p-3 m-3 shadow-xl">
    <div class="basis-1/5">
        <p class="font-bold">Nama</p>
        <p class="font-bold">NIS</p>
    </div>
    <div class="basis-4/5">
        <p><?= $student['name'] ?></p>
        <p><?= $student['nis'] ?></p>
    </div>
</div>
<div class="grid gap-2">
    <a href="index.php" class="bg-gray-500 p-3 rounded-xl text-white m-3 text-center">Kembali</a>
</div>

<?php include('layouts/footer.php') ?>
<?php include('layouts/bottom.php') ?>