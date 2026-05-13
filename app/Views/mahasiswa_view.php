<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>
        :root{
            --primary:#4f46e5;
            --primary2:#6366f1;
            --danger:#ef4444;
            --success:#10b981;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background: linear-gradient(135deg, #a4a3a4 0%, #a4a3a4 100%);
            min-height:100vh;
            font-family: Arial, Helvetica, sans-serif;
            padding:30px 0;
        }

        .main-container{
            max-width:1100px;
            margin:auto;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,0.2);
        }

        .header{
            background:linear-gradient(135deg,var(--primary),var(--primary2));
            color:white;
            padding:35px;
            text-align:center;
        }

        .header h1{
            font-size:2.5rem;
            margin-bottom:10px;
            font-weight:bold;
        }

        .header p{
            opacity:0.9;
        }

        .content{
            padding:35px;
        }

        .card-custom{
            background:#f8fafc;
            border-radius:15px;
            padding:30px;
            margin-bottom:35px;
            border:1px solid #e2e8f0;
        }

        .card-title{
            color:var(--primary);
            font-weight:bold;
            margin-bottom:25px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:8px;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
            border:2px solid #e2e8f0;
        }

        .form-control:focus{
            border-color:var(--primary);
            box-shadow:none;
        }

        .btn-save{
            background:linear-gradient(135deg,var(--primary),var(--primary2));
            color:white;
            border:none;
            padding:12px;
            width:100%;
            border-radius:10px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-save:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(79,70,229,0.3);
        }

        .table thead th{
            background:var(--primary);
            color:white;
            border:none;
            padding:15px;
            text-align:center;
        }

        .table tbody td{
            vertical-align:middle;
            text-align:center;
            padding:14px;
        }

        .table tbody tr:hover{
            background:#f8fafc;
        }

        .btn-delete{
            background:var(--danger);
            border:none;
            color:white;
            padding:8px 14px;
            border-radius:8px;
            transition:0.3s;
        }

        .btn-delete:hover{
            background:#dc2626;
            transform:translateY(-2px);
        }

        .empty-state{
            text-align:center;
            padding:50px 20px;
            color:#94a3b8;
        }

        .empty-state i{
            font-size:3rem;
            margin-bottom:15px;
        }

        @media(max-width:768px){

            .header h1{
                font-size:1.8rem;
            }

            .content{
                padding:20px;
            }

            .card-custom{
                padding:20px;
            }

        }
    </style>
</head>
<body>

<div class="main-container">


    <!-- CONTENT -->
    <div class="content">

        <!-- ALERT -->
        <div id="alertContainer"></div>

        <!-- FORM -->
        <div class="card-custom">

            <h4 class="card-title">
                <i></i>
                Form Input Mahasiswa
            </h4>

            <form id="formMahasiswa">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            NIM
                        </label>

                        <input
                            type="text"
                            name="nim"
                            class="form-control"
                            placeholder="Masukkan NIM"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Nama Mahasiswa
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Masukkan Nama"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Jurusan
                        </label>

                        <input
                            type="text"
                            name="jurusan"
                            class="form-control"
                            placeholder="Masukkan Jurusan"
                            required
                        >
                    </div>

                </div>

                <button type="submit" class="btn-save">
                    <i></i>
                    Simpan Data
                </button>

            </form>

        </div>

        <!-- TABLE -->
        <div class="card-custom">

            <h4 class="card-title">
                <i></i>
                Data Mahasiswa
            </h4>

            <div id="tableContainer">

                <div class="empty-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Memuat data...</p>
                </div>

            </div>

        </div>

    </div>

</div>

<script>

// ALERT
function showAlert(message, type='success')
{
    let bgClass = type === 'success'
        ? 'alert-success'
        : 'alert-danger';

    let html = `
        <div class="alert ${bgClass} alert-dismissible fade show">
            ${message}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    `;

    $('#alertContainer').html(html);

    setTimeout(function(){
        $('.alert').fadeOut();
    },3000);
}

// LOAD DATA
function loadData()
{
    $.ajax({

        url: "<?= base_url('mahasiswa/data') ?>",

        type: "GET",

        dataType: "json",

        success: function(data)
        {
            let html = '';

            if(data.length > 0)
            {
                html += `
                    <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                `;

                data.forEach(function(row,index){

                    html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${row.nim}</td>
                            <td>${row.nama}</td>
                            <td>${row.jurusan}</td>
                            <td>

                                <button
                                    class="btn-delete"
                                    onclick="hapusData(${row.id})"
                                >
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>

                            </td>
                        </tr>
                    `;
                });

                html += `
                        </tbody>

                    </table>

                    </div>
                `;
            }
            else
            {
                html = `
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>Belum ada data mahasiswa</p>
                    </div>
                `;
            }

            $('#tableContainer').html(html);
        },

        error: function(xhr)
        {
            console.log(xhr.responseText);

            showAlert('Gagal memuat data','error');
        }

    });
}

// SIMPAN DATA
$('#formMahasiswa').submit(function(e){

    e.preventDefault();

    $.ajax({

        url: "<?= base_url('mahasiswa/save') ?>",

        type: "POST",

        data: $(this).serialize(),

        dataType: "json",

        success: function(response)
        {
            if(response.status)
            {
                showAlert(response.message,'success');

                $('#formMahasiswa')[0].reset();

                loadData();
            }
            else
            {
                showAlert(response.message,'error');
            }
        },

        error: function(xhr)
        {
            console.log(xhr.responseText);

            alert(xhr.responseText);
        }

    });

});

// HAPUS DATA
function hapusData(id)
{
    if(confirm('Yakin ingin menghapus data?'))
    {
        $.ajax({

            url: "<?= base_url('mahasiswa/delete') ?>",

            type: "POST",

            data: {id:id},

            dataType: "json",

            success: function(response)
            {
                if(response.status)
                {
                    showAlert(response.message,'success');

                    loadData();
                }
                else
                {
                    showAlert(response.message,'error');
                }
            },

            error: function(xhr)
            {
                console.log(xhr.responseText);

                showAlert('Gagal menghapus data','error');
            }

        });
    }
}

// PERTAMA KALI LOAD
$(document).ready(function(){

    loadData();

});

</script>

</body>
</html>