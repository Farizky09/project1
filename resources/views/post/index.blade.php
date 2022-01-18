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
                     
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">ISI</th>
                                    <th scope="col">SLUG</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">AKSI</th>
                                  </tr>
                                </thead>
                                <tbody>
                              @forelse ($post as $p)
                              <div class="modal fade" id="edit{{$p->id}}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                  <h4 class="modal-title">Default Modal</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <div class="modal-body">
                                    <form action="{{ route('post.create', $p->id) }}" method="post">
                                      {{ csrf_field() }}
                                      <div class="form-group">
                                        <label for="title" class="col-form-label">JUDUL</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$p->judul}}">
                                      </div>
                                      <div class="form-group">
                                        <label>ISI</label>
                                        <textarea name="body" class="form-control" rows="3">{{ $p->isi}}</textarea>
                                      </div>
                                    </div>
                               
                                    <div>
                                    <td>{!! $p->slug!!}</td></br>
                                    </div>
                                    <div class="form-group">
                                      <td class="text-center">
                                         
                                          <img src="{{ Storage::url('public/post/').$p->gambar }}" class="rounded" style="width: 150px">
                                      </td>
                                    </div>
                                      <div class="form-group">
                                      <td class="text-center">
                                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $p->id) }}" method="POST">
                                              <a href="{{ route('post.edit', $p->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                          </form>
                                          </td>
                                      </tr>
                                      </div>
                                  </div>
                              </div>
                          </div>
       
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
            @endif
    </script>

</body>
</html>