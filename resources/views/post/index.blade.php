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
                              @forelse ($post as $p)
                              <div class="col-md-4">
                          <div class="card">
                              <div class="card-header">Add new Post</div>
                              <div class="card-body">
                                  <form action="{{ route('post.create') }}" method="post" id="add-country-form" autocomplete="off">
                                      @csrf
                                      <div class="form-group">
                                          <label for="">judul</label>
                                          <input type="text" class="form-control" name="judul" placeholder="Enter country name">
                                          <span class="text-danger error-text judul_error"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="">isi</label>
                                          <input type="text" class="form-control" name="isi" placeholder="Enter capital city">
                                          <span class="text-danger error-text isi_error"></span>
                                      </div>
                                      <td>{!! $p->slug!!}</td></br>
                                      <td class="text-center">
                                          <img src="{{ Storage::url('public/post/').$p->gambar }}" class="rounded" style="width: 150px">
                                      </td>
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-block btn-success">SAVE</button>
                                      </div>
                                  </form>
                                  @endforelse
                              </div>
                          </div>
                    </div>
                </div>
          
          </div>
                        </table>
                    </div>
                </div>
            </div>
         
                       
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
    $('#post-table').DataTable({
            processing:true,
            info:true,
            ajax:"{{ route('postlist') }}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                {data:'id', name:'id'},
                {data:'judul', name:'judul'},
                {data:'isi', name:'isi'},
              
            ]
        });
    </script>

</body>
</html>