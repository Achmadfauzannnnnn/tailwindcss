<?php
include_once('./models/student.php');

$student = student::show($_GET['id']);

if(isset($_POST['submit'])) {
    $response = student::update([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);

    header("Location: index.php");
}
 ?>

<?php include('layouts/top.php') ?>
<?php include('layouts/header.php') ?>

<!-- content -->
<div class="basis-1/4 bg-white p-5">
        <form class="rounded-xl bg-white p-4 shadow-xl" action="" method="POST">
            <input type="hidden" name="id" value="<?=$student['id']?>">
          <h1 class="pb-5 pt-1 font-semibold
            text-3xl text-center">Form Input Nilai</h1>
          <div class="mb-3">
            <label for="name">Nama :</label>
            <input class=" w-full block placeholder:font-light rounded border border-gray-300 p-1" id="name" name="name" type="text"
              placeholder="Nama Lengkap" value="<?=$student['name'] ?>">
          </div>
          <div class=" mb-3">
            <label for="nis">nis :</label>
            <input class=" block w-full placeholder:font-light rounded border border-gray-300 p-1" id="nis" name="nis"
              type="number" placeholder="Nis" value="<?=$student['nis'] ?>">
          </div>
          <div class="gap-2">
            <button name="submit" type="submit" class=" text-white bg-green-500 hover:bg-green-600 pt-2 pb-2 pr-6 pl-6 rounded-xl ">Submit</button>
          </div>
        </form>
      </div>



<?php include('layouts/footer.php') ?>
<?php include('layouts/bottom.php') ?>