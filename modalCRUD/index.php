<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="row">
        <div class="col-8 mx-auto mt-5">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>Table MAHASISWA</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmhs"><i
                            class="fa-solid fa-user-plus"></i>
                        Tambah mahasiswa
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Hp</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $sql = "SELECT * FROM mahasiswa";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) :
                                ?>
                                <tr>
                                    <th>
                                        <?= $no++; ?>
                                    </th>
                                    <td>
                                        <?= $data['nim']; ?>
                                    </td>
                                    <td>
                                        <?= $data['nama']; ?>
                                    </td>
                                    <td>
                                        <?= $data['alamat']; ?>
                                    </td>
                                    <td>
                                        <?= $data['no_hp']; ?>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?= $data['nim'] ?>"
                                            onclick="return confirm('Yakin ingin menghapus ?')"
                                            class="btn btn-danger">Hapus</a>
                                        <a href="edit.php" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editmhs<?= $data['id'] ?>">Edit</a>
                                        <a href="#" name="view" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#viewmhs<?= $data['id'] ?>">View</a>
                                    </td>
                                    <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="tambahmhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="tambah.php">
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hp</label>
                            <input type="text" name="no_hp" class="form-control" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                    class="fa-solid fa-xmark"></i> Close</button>
                            <button type="submit" name="save" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk"></i>
                                Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit -->
    <?php
    $query = $koneksi->query("SELECT * FROM mahasiswa");
    while ($data = $query->fetch_assoc()) :
    ?>
    <div class="modal fade" id="editmhs<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="edit.php">

                        <div class="mb-3">
                            <input type="text" name="id" class="form-control" value="<?= $data['id'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="<?= $data['nama'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hp</label>
                            <input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp'] ?>" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark"></i> Close</button>
                    <button type="submit" name="update" value="update" class="btn btn-primary"><i
                            class="fa-solid fa-floppy-disk"></i>
                        Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal view -->
    <div class="modal fade" id="viewmhs<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                NIM <br>
                                Nama <br>
                                Alamat <br>
                                No HP <br>
                            </div>
                            <div class="col-sm-8">
                                : <?= $data['nim'] ?><br>
                                : <?= $data['nama'] ?><br>
                                : <?= $data['alamat'] ?><br>
                                : <?= $data['no_hp'] ?><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary midle" data-bs-dismiss="modal"><i
                                    class="fa-solid fa-xmark text-center"></i> Close</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    </ <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>