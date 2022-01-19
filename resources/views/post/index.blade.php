<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Post | project1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link  href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                     
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table" id="table" style="width:100%">
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
    
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        <script>
          $(function() {
                $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-index') }}",
                columns: [
                        //  { data: 'id', name: 'id' },
                         { data: 'judul', name: 'judul' },
                         { data: 'isi', name: 'isi' },
                         { data: 'slug', name:'slug'},

                        //  {data:'gambar', name:'gambar'},
                        // { data: 'gambar', name:'gambar'},
                        {data:'gambar',name:'gambar', render: function(data, type, full, meta) {
                          return "<img src="+data+"/>"
                        }},
                         {data:'action',name:'action',orderable:false,searchable:false},
                         
                      ]
             });
          });
          </script>
        <script>
            //message with toastr
       
        @if(session()->has('success'))
       
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            @endif
    </script>

</body>
</html>