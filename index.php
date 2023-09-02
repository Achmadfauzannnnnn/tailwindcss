<?php
    include_once('./models/student.php');

    $students = student::index();

    if(isset($_POST['submit'])){
        $response = student::create([
            'name' => $_POST['name'],
            'nis' => $_POST['nis']
        ]);

        setcookie('message', $response, time() + 10);
        header("Location: index.php");
    }

    if(isset($_POST['delete'])) {
        $response = Student::delete($_POST['id']);
      
        setcookie('message', $response, time() + 10); 
        
        header("Location: index.php");
      }
      ?>
      
      <!-- top -->
      <?php include('layouts/top.php') ?>
      
      <!-- header -->
      <?php include('layouts/header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <!-- <header class="bg-green-400 text-white p-4 shadow">
        <h1 class="text-2xl">Class Rank Tailwind</h1>
    </header> -->

    <!-- Main Content -->
    <?php if(isset($_COOKIE['message'])) : ?>
    <div class="p-3 bg-sky-500 text-white m-3 rounded-lg text-center bg-gray-500">
      <p><?= $_COOKIE['message'] ?></p>
    </div>
    <?php endif ?>

    <div class="flex flex-row h-screen">
        <!-- Sidebar (1/4) -->
        <aside class="bg-gray-300 w-1/4 p-4">
            <h2 class="text-xl mt-4 mb-4">Form Input Nilai</h2>
            <form action="" method="POST">
                <!-- Form elements here -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Masukkan nama" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nis">
                        Nilai
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nis" type="number" name="nis" placeholder="Masukkan nis" required>
                </div>
                <button class=" shadow bg-green-400 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                    KIRIM
                </button>
            </form>
        </aside>

        <!-- Content (3/4) -->
        <div class="w-3/4 p-4">
            <div class="bg-white rounded shadow-md p-4">
                <h2 class="text-xl mb-4">Tabel Nilai Siswa</h2>
                <table class="w-full border">
                    <thead class="bg-green-400 text-white">
                        <tr>
                            <th class="py-2 px-4 text-left">No</th>
                            <th class="py-2 px-4 text-center">Nama</th>
                            <th class="py-2 px-4 text-center">Nilai</th>
                            <th class="py-2 px-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $key => $student) : ?>
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left"><?= $key + 1 ?></td>
                            <td class="py-2 px-4 text-center"><?= $student ["name"] ?></td>
                            <td class="py-2 px-4 text-center"><?= $student ["nis"] ?></td>
                            <td class="py-2 px-4 text-center">
                            <button title="Detail" class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-sky-600"><a href="detail.php?id=<?= $student["id"] ?>" >detail<i class="bi bi-eye"></i></a></button>
                   <!-- <div class="group"> -->
                            <button title="Edit" class="px-3 py-2 bg-green-500 text-white rounded hover:bg-emerald-600"><a href="edit.php?id=<?= $student["id"] ?>" >edit<i class="bi bi-pencil-square"></i></a></button>
                   <!-- </div> -->
                    <form action="" method="POST" class="inline">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <button title="Hapus" name="delete" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700"><a href=""></a>delete<i class="bi bi-trash3"></i></button>
                   </form>
                        </td>
                        </tr>
                        <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

                        <!-- <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">2</td>
                            <td class="py-2 px-4 text-center">Zahra Malia Putri</td>
                            <td class="py-2 px-4 text-center">90</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-400 hover:bg-green-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Hapus
                                </button>
                            </td> -->
                        </tr>

                        
                        
                        <!-- More table rows can be added here -->
                    

    <!-- Footer -->
    <!-- <footer class="bg-green-400 text-white p-4 mt-auto text-center shadow">
        <p>(c) Copyright Achmad Fauzan 2023</p>
    </footer> -->
</body>
</html>
<?php include("layouts/footer.php") ?>
