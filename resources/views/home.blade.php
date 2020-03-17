@extends('layouts.header')
@section('content')
<body class="">
    <div class="container-fluid" style="">
        <div class="row pt-5" style="min-height: 100vh;background-color: #FFF8DC">
         
            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2 pb-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col">
                        @if ($message = Session::get('status'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                              </div>
                        @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            
                            <form action="{{route('noteToPost')}}" method="POST" id="newpost">
                                {{csrf_field()}}
                                <div class="row pb-3">
                                    <div class="col col-lg-12">
                                        <label class="col-form-label">Your status starts here...</label>
                                        <textarea class="form-control @error('status') is-invalid @enderror" id="textarea" name="status"></textarea>
                                        <small id="charscount" class="form-text">200 Characters remaining...</small>
                                        
                                    </div>

                                    <div class="col col-lg-12">
                                        <div class="row">
                                            <div class="col col-lg-9">
                                                @error('status')
                                                <span class="invalid-feedback d-block" role="alert"><strong>
                                                    {{ $message }}
                                                </strong></span>
                                                @enderror
                                            </div>
                                            <div class="col col-lg-3 text-right">
                                                <button class="btn btn-outline-warning">Reset</button>
                                                <button class="btn btn-primary" type="submit" id="btnupdate">Update now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            @if(isset($lists))
                                @foreach($lists AS $r)
                                <div class="row">

                                    <div class="col col-2 col-md-1 ">
                                        <div class="row float-right">
                                            <img src="{{$r->user->user_picture == '' ? asset('picture/user.png') : asset('picture/').$r->user_picture}}" alt="user" class="rounded-circle" width="50" height="50">
                                        </div>
                                    </div>
                                    <div class="col col-10 col-md-11">
                                        <span class="status">
                                            {{$r->content}}
                                        </span>
                                        <span class="blockquote-footer"> by {{'@'.$r->user->name}} <i class="fa fa-clock-o"></i> {{$r->created_at}}</span>
                                        <span class="text-muted" for="reply"><small>
                                            <a href="#reply" class="reply" data-id="{{$r->id}}"><i class="fa fa-reply"></i> reply</a>
                                            </small>
                                        </span>
                                        @foreach($r->replies AS $rp)
                                        <div class="row pt-1">
                                            <div class="col col-1 col-md-1 ">
                                                    <img src="{{$r->user->user_picture == '' ? asset('picture/user.png') : asset('picture/').$r->user_picture}}" alt="user" class="rounded-circle" width="45" height="45">
                                            </div>
                                            <div class="col col-11 col-md-11">
                                                <span class="status">
                                                    {{$rp->content}}
                                                </span>
                                                <span class="blockquote-footer"> replies from {{'@'.$rp->user->name}} <i class="fa fa-clock-o"></i> {{$rp->updated_at}}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="sr-only pt-2" id="div-{{$r->id}}" for="reply">
                                            <form action="{{route('noteReplies')}}" method="POST" id="formreplies{{$r->id}}">
                                            {{csrf_field()}}
                                                <input type="hidden" name="post_id" value="{{$r->id}}">
                                                <input type="text" name="reply" class="form-control input-rep" data-id="{{$r->id}}" placeholder="type your reply here">
                                            </form>
                                        </div>
                                    </div>

                                   
                                </div>
                                <hr>
                            @endforeach
                            @endif
                            
                            
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
    $(document).ready(function(){
        $('#textarea').val('');
        $('#textarea').on('keyup', function(e){

           let numcars = 200-parseInt(this.value.length);
            let charstext = numcars+' Characters remaining...';
            if(numcars < 0){
                $('#charscount').text(charstext);
                $('#btnupdate').attr('disabled', true);
                
            }else{
                $('#charscount').text(charstext);
                $('#btnupdate').attr('disabled', false);
            }
           
        })
        $('.reply').on('click', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            
            if($('#div-'+id).hasClass('sr-only')){
                $('#div-'+id).removeClass('sr-only').fadeIn('slow');
            }else{
                $('#div-'+id).addClass('sr-only').fadeOut('slow');
            }

        })
        $('.input-rep').on('keyup', function(e){
            let id = $(this).attr('data-id');
            
            if(e.which == '13'){

                if(this.value != ''){
                    $('#formreplies'+id).submit();
                }
            }
        })

        /*$('#newpost').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: $(this).serialize(),
                url : "{{ route('noteToPost')}}",
                dataType: 'JSON',
                success : function(result){
                    if(result.type == 'error'){
                        $('#textarea').addClass('is-invalid');
                        let html = '<span class="invalid-feedback d-block" role="alert"><strong>'+result.message+'</strong></span>';
                        $('#messageerror').html(html);
                        
                    }else{
                        $('#textarea').removeClass('is-invalid');
                        $('#messageerror').html('');
                    }
                }
            })
        })*/

    })
</script>
@endsection

