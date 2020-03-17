@extends('layouts.header')

@section('content')
<body class="">
    <div class="container-fluid" style="">
        <div class="row pt-5" style="min-height: 100vh;background-color: #FFF8DC">
         
            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2 pb-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col">
                            <div id="summernote">Hello Summernote</div>
                            <form method="post">
                              <textarea id="summernote" name="editordata"></textarea>
                            </form>
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
        $('#summernote').summernote({
          height: 300,                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          focus: true                  // set focus to editable area after initializing summernote
        });
        //$('#summernote').summernote('code');
    });
</script>
@endsection
