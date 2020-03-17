@extends('layouts.header')

@section('content')

<div class="container-fluid">
    <div class="row bg-primary">
        <nav class="col-lg-2 sidebar bg-dark" for="userprofile">
          <div class="sidebar-sticky">
            <div class="row">
              <div class="col col-lg-12">
                <div class="text-center pt-4">
                  <img src="{{$user->user_picture == '' ? asset('picture/user.png') : asset('picture/').$r->user_picture}}" alt="user" class="rounded-circle bg-white" width="100" height="100" >
                </div>
                <div class="text-center pt-2">
                  <div class="user-name badge badge-primary">{{$user->name}}
                  </div>
                </div>
                <hr>
                <nav class="navbar navbar-expand-lg">
                  <div class="accordion" id="accordionExample">
                    <div class="navbar-side">
                      <div class="navbar-side-header" id="headingOne">
                        <h2 class="mb-0">
                          <li class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible
                          </button>
                        </h2>
                      </div>
                      <div id="collapseOne" class="collapse @if(isset($menu)) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <a class="nav-link text-white" href="{{url('/post-note')}}"> Post Note</a>
                      </div>
                    </div>
                    <div class="navbar-side">
                      <div class="navbar-side-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible#2
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <a class="nav-link text-white" href="{{url('/post-note')}}"> Post Note</a>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </nav>
        <main class="col col-lg-12 col-sm-12 bg-white" role="main">
            <div class="container pt-5">
                <div class="row">
                    <div class="col">
                        
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
       
        $('.summernote').summernote({
          height: 150,                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          focus: true                  // set focus to editable area after initializing summernote
        });

        $('#newpost').on('submit', function(e){
            let form = this;
            e.preventDefault();
            if ($('.summernote').summernote('isEmpty'))
            {

              swal({
                type: 'error',
                text: 'type something please'
              })
            }else{
                $.ajax({
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'JSON',
                    url : '{{route('summernotePersist')}}',
                    success: function (result){
                        swal({
                            type: result.type,
                            text : result.message
                        }).then(function(){
                            $('.summernote').summernote('reset');
                            $('#title').val('');
                        })
                    }

                })
            }
        })
        $('#reset').on('click', function(e){
            e.preventDefault();
            $('.summernote').summernote('reset');    
        })
        
        
            //set the content to summernote using `code` attribute.
        //$('.summernote').summernote('code', content);
        //$('#summernote').summernote('code');
    });
</script>
@endsection
