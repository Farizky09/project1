<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Post | project1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
</head>

<body style="background: lightgray">
    <!-- Edit Article Modal -->
    <div class="modal" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Post</h4>
                    <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->


                <div class="modal-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">

                        @csrf


                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>

                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Post"> </input>


                            <!-- error message untuk judul -->
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ISI</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="5" placeholder="Masukkan Isi Post">{{ old('isi') }}</textarea>

                            <!-- error message untuk isi -->
                            @error('isi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>

                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            <!-- error message untuk title -->
                            @error('gambar')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
                <!-- Modal footer -->
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div> --}}
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <button data-toggle="modal" data-target="#modal" class="btn btn-md btn-success mb-3">TAMBAH POST</button>
                        <table class="table" id="datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">ISI</th>
                                    <th scope="col">SLUG</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update') }}" method="POST" id="updateform" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>

                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Post"> </input>

                            <!-- error message untuk judul -->
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ISI</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="5" placeholder="Masukkan Isi Post">{{ old('isi') }}</textarea>

                            <!-- error message untuk isi -->
                            @error('isi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>

                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            <!-- error message untuk title -->
                            @error('gambar')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data-index') }}",
        columns: [
            //  { data: 'id', name: 'id' },
            {
                data: 'judul',
                name: 'judul'
            },
            {
                data: 'isi',
                name: 'isi'
            },
            {
                data: 'slug',
                name: 'slug'
            },

            //  {data:'gambar', name:'gambar'},
            // { data: 'gambar', name:'gambar'},
            {
                data: 'gambar',
                name: 'gambar',
                render: function(data, type, full, meta) {
                    return '<img src="{{url("")}}/storage/post/' + data + '" width="100px">'
                    // return "<img src= />"
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },

        ]
    });
    $(document).ready(function() {

        table.on('click', '.edit', function() {

            tr = $(this).closest('tr');
            if (tr.hasClass('child')) {
                tr = tr.prev('.parent');
            }

            var data = table.row(tr).data(); 
            console.log(data); // console.log digunakan untuk menampilkan data
            $('#id').val(data.id);
            $('#judul').val(data.judul); 
            $('#isi').val(data.isi); 
            $('#slug').val(data.slug); 
            // $('#gambar').val(data.gambar);

            $('#updateform').attr('action', '{{ route("update") }}' + data[0]); $('#updatemodal').modal('show');
        });
    });




    $(function() {


    });




    function hapus(data) {
        //   alert("apakah anda yakin ingin menghapus?");
        $.ajax({
            url: 'post/delete/'.data,
            method: 'GET',
            success: function(result) {
                setInterval(function() {
                    $('.datatable').DataTable().ajax.reload();
                    // $('#DeleteArticleModal').hide();
                }, 1000);
            }
        });
    }
</script>
<script>
    //message with toastr

    <?php
    if(session()->has('success')){
    ?>
        toastr.success("{{ session('success') }}", 'BERHASIL!');
    <?php
    }elseif(session()->has('error')){
    ?>
        toastr.error("{{ session('error ') }}", 'GAGAL!');
    <?php
        }
    ?>
</script>

</html>