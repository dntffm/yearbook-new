@extends('layouts.app')

@section('content') 
    <div class="background-big">
    <div class="container">
	<div class="pt-5">
	    <h4 class="text-center">Archive Yearbook UMB periode sebelumnya bisa dilihat <a class="text-blue" href="{{url('archive')}}">disini</a></h4>

	<div>
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5 pb-5">
                <div class="card">
                    <h3 class="card-header">Yearbook Terbaru</h3>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($pdfs as $pdf)
                            <div>
                                <embed src="{{asset('storage/pdf/'.$pdf->url) }}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="300" type="application/pdf" alt="pdf" />
                                <h4 class="text-bold mt-3">{{$pdf->name}}</h4>
                                <div class="d-flex mb-3">
				    <div class="mr-3">
                                        <a class="btn btn-primary" href="{{url('pdf/'.$pdf->url)}}">Show</a>
                                    </div>
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-file="{{$pdf->url}}">
                                            Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>     
		   <div class="mx-3">               
		    {{ $pdfs->links() }}
		   </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Download Ebook Yearbook Sekarang Juga!!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
		<div class="modal-image d-flex justify-content-center mb-3">
		  <img src="{{url('storage/image/download.png')}}" alt="download" height="150">
		</div>
                <div id="alert"></div>
		<div class="d-flex justify-content-center">
                  <p class="font-14 mr-2 mt-2">Masukan Password : </p>
                  <form id="modal-form">
                    <input type="text" class="form-control" name="password" id="password">
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="download">Download File</button>
            </div>
          </div>
        </div>
      </div>
@endsection
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    let file = null;
    jQuery(document).ready(function() {
        $('#exampleModalCenter').on('show.bs.modal', function (event) {
            file = $(event.relatedTarget).data('file');
        });
        $('#download').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var formData = {
                password: $('#password').val(),
                file: file
            };
    
            $.ajax({
                type: "GET",
                url: "download/pdf",
                data: formData,
                success: function (data){
                    window.open(data, '_blank')
                },
                error: function (data) {
                    console.log(data)
                    $('#alert').append(`
                    <div class="alert alert-danger" role="alert">
                        `+data.responseJSON.message+`   
                    </div>
                    `)
                }
            })
        })
    })
</script>