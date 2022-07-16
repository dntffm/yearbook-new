@extends('layouts.app')



@section('content')

@can('add pdf')    

<div class="background-big">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 pt-5 pb-5">

                <div class="card">

                    <div class="card-header">Upload PDF Yearbook</div>



                    <div class="card-body">

                        @if (session('status'))

                            <div class="alert alert-success" role="alert">

                                {{ session('status') }}

                            </div>

                        @endif

                        <form action="{{'/pdf'}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                              <label for="exampleInputEmail1">Judul Yearbook</label>

                              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter judul" required>

                            </div>

                            <div class="form-group">

                                <label for="pdf">File Yearbook</label>

                              <input type="file" class="form-control" name="pdf" id="pdf" required>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                          </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endcan

@endsection

