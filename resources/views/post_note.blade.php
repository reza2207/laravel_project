@extends('layouts.header')

@section('content')
<style type="text/css">
    #pagination:childrend{
        text-align: center;
    }
</style>
<body class="">
    <div class="container-fluid" style="">
        <div class="row pt-5" style="min-height: 100vh;background-color: #FFF8DC">
         
            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2 pb-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col">
                            {!! isset($alert) ? $alert : ''; !!}
                            <form action="{{route('summernotePersist')}}" method="POST" id="newpost">
                                {{ csrf_field() }}

                                <input type="text" name="title" class="form-control" placeholder="title" id="title">
                                <textarea name="summernoteInput" class="summernote"></textarea>
                                <br>
                                <button id="reset" class="btn border-warning btn-sm">Clear</button>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        {!! isset($postnote->content) ? $postnote->content : '' !!}
                    </div>
                    
                    @foreach($lists as $r)
                    
                        <div class="row">
                            <div class="col-lg-12 text-center ">
                                <div><h2><b>{{$r->title}}</b></h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 border border-bottom-0">
                                {!!$r->content!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <span style="font-size: 10px" class="badge badge-primary">Posted by <i class="fa fa-user"></i> <a href="{{ url('profile', $r->user_id)}}" class="text-white">{{$r->user->name}}</a> at <i class="fa fa-clock-o"></i> {{$r->created_at}}</span>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="row ">
                        <div class="col" id="pagination">
                            {{ $lists->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2 d-none d-lg-block">
                
            </div>
        </div>
    </div>
</body>


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
