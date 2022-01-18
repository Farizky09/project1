<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Post | project1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-hover table-condensed">
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table id="datatable-post" class="table table-bordered">
                            <thead>
                                <tr>
                                  <th scope="col">JUDUL</th>
                                  <th scope="col">ISI</th>
                                  <th scope="col">SLUG</th>
                                  <th scope="col">GAMBAR</th>
                                  <th scope="col">AKSI</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              
                          
                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $p->id) }}" method="POST">
                        <a href="{{ route('post.edit', $p->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                               
                              
                                       
                                      
                                   
                                    
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                              
                            </tbody>
                          </table>  
                          {{ $post->links() }}
                    </div>
                </div>
            </div>
            @endsection
                       
    
            @section('javascript')
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
            <script>
        //message with toastr
       
        @if(session()->has('success'))
       
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            ('#post-table').DataTable().ajax.reload(null, false);

   @endif
        //
        //GET ALL COUNTRIES
        window.onload = function() {
    $('#datatable-post').DataTable({
            "processing":true,
            "serverSide": true,
            "ajax":"{{ route('post.create') }}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                {data:"id",},
                {data:"judul"},
                {data:"isi"},
                {data:"gambar"},              
            ]
        });
        function deleteData(id) {
            $('#delete_data').attr('action', '/backoffice/example/' + id);
            if (confirm('apakah anda yakin akan menghapus ini ?')) {
                $('#delete_data').submit();
    
    </script>

</body>
</html>