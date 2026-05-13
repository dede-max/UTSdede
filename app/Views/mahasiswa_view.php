<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Modern</title>

  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#0f172a;
            font-family:'Segoe UI', sans-serif;
            color:white;
            min-height:100vh;
            overflow-x:hidden;
        }

        .blur-bg-1{
            position:fixed;
            width:350px;
            height:350px;
            background:#2563eb;
            border-radius:50%;
            top:-120px;
            left:-120px;
            filter:blur(130px);
            z-index:-1;
        }

        .blur-bg-2{
            position:fixed;
            width:350px;
            height:350px;
            background:#9333ea;
            border-radius:50%;
            bottom:-150px;
            right:-150px;
            filter:blur(130px);
            z-index:-1;
        }

        .container-custom{
            width:90%;
            max-width:1100px;
            margin:50px auto;
        }

        .header{
            text-align:center;
            margin-bottom:40px;
        }

        .header h1{
            font-size:3rem;
            font-weight:800;
            background:linear-gradient(to right,#38bdf8,#a855f7);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
            margin-bottom:10px;
        }

        .header p{
            color:#cbd5e1;
            font-size:1.1rem;
        }

        .glass-box{
            background:rgba(255,255,255,0.05);
            border:1px solid rgba(255,255,255,0.08);
            backdrop-filter:blur(15px);
            border-radius:25px;
            padding:30px;
            margin-bottom:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.25);
        }

        .box-title{
            font-size:1.4rem;
            font-weight:700;
            margin-bottom:25px;
        }

        .form-label{
            margin-bottom:8px;
            font-weight:600;
            color:#f1f5f9;
        }

        .form-control{
            background:rgba(255,255,255,0.04);
            border:1px solid rgba(255,255,255,0.08);
            border-radius:15px;
            color:white;
            padding:14px;
        }

        .form-control:focus{
            background:rgba(255,255,255,0.06);
            border-color:#38bdf8;
            color:white;
            box-shadow:none;
        }

        .form-control::placeholder{
            color:#94a3b8;
        }

        .btn-save{
            width:100%;
            border:none;
            padding:15px;
            border-radius:15px;
            background:linear-gradient(to right,#06b6d4,#8b5cf6);
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .btn-save:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 20px rgba(139,92,246,0.3);
        }

        .table{
            color:white;
        }

        .table thead th{
            background:rgba(255,255,255,0.08);
            border:none;
            padding:18px;
            text-align:center;
        }

        .table tbody td{
            border-color:rgba(255,255,255,0.06);
            padding:16px;
            text-align:center;
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:rgba(255,255,255,0.03);
        }

        .btn-delete{
            border:none;
            background:#ef4444;
            color:white;
            padding:10px 14px;
            border-radius:12px;
            transition:0.3s;
        }

        .btn-delete:hover{
            background:#dc2626;
            transform:scale(1.05);
        }

        .empty-state{
            text-align:center;
            padding:50px;
            color:#94a3b8;
        }

        .empty-state i{
            font-size:4rem;
            margin-bottom:15px;
        }

        .alert{
            border-radius:14px;
        }

        @media(max-width:768px){

            .header h1{
                font-size:2rem;
            }

            .glass-box{
                padding:20px;
            }

        }

    </style>

</head>

<body>

<div class="blur-bg-1"></div>
<div class="blur-bg-2"></div>

<div class="container-custom">

    <div class="header">

        <h1>
            <i class="fas fa-user-graduate"></i>
            Data Mahasiswa
        </h1>

        <p>
            Sistem pengelolaan data mahasiswa berbasis AJAX
        </p>

    </div>


    <div id="alertContainer"></div>

   
    <div class="glass-box">

        <div class="box-title">

            <i class="fas fa-pen"></i>
            Form Input Mahasiswa

        </div>

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

                <i class="fas fa-floppy-disk"></i>
                Simpan Data

            </button>

        </form>

    </div>

    <div class="glass-box">

        <div class="box-title">

            <i class="fas fa-table"></i>
            Tabel Mahasiswa

        </div>

        <div id="tableContainer">

            <div class="empty-state">

                <i class="fas fa-spinner fa-spin"></i>

                <p>
                    Sedang memuat data...
                </p>

            </div>

        </div>

    </div>

</div>

<script>


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


    function loadData()
    {

        $.ajax({

            url : "<?= base_url('mahasiswa/data') ?>",

            type : "GET",

            dataType : "json",

            success : function(data)
            {

                let html = '';

                if(data.length > 0)
                {

                    html += `
                        <div class="table-responsive">

                            <table class="table align-middle">

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

                            <i class="fas fa-database"></i>

                            <p>
                                Belum ada data mahasiswa
                            </p>

                        </div>
                    `;

                }

                $('#tableContainer').html(html);

            },

            error : function(xhr)
            {

                console.log(xhr.responseText);

                showAlert('Gagal memuat data','error');

            }

        });

    }



    $('#formMahasiswa').submit(function(e){

        e.preventDefault();

        $.ajax({

            url : "<?= base_url('mahasiswa/save') ?>",

            type : "POST",

            data : $(this).serialize(),

            dataType : "json",

            success : function(response)
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

            error : function(xhr)
            {

                console.log(xhr.responseText);

                showAlert('Terjadi kesalahan server','error');

            }

        });

    });


    function hapusData(id)
    {

        if(confirm('Yakin ingin menghapus data?'))
        {

            $.ajax({

                url : "<?= base_url('mahasiswa/delete') ?>",

                type : "POST",

                data : {id:id},

                dataType : "json",

                success : function(response)
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

                error : function(xhr)
                {

                    console.log(xhr.responseText);

                    showAlert('Gagal menghapus data','error');

                }

            });

        }

    }


    $(document).ready(function(){

        loadData();

    });

</script>

</body>
</html>