@section('css')
    .modal .modal-dialog { width: 60%; } 
@stop

    <div class="modal fade" id="{{$triggerModal}}" style="display: none;" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => "$routeModal", 'class' => 'form-inline', 'method'=>"$methodModal", 'enctype'=> 'multipart/form-data'])!!} 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span></button>
                <h4 class="modal-title">{{$tituloModal}}</h4>
            </div>
            <div class="modal-body">
                <div id="blanket"></div>
                <div id="aguarde"><img src="{{ asset('img\carregando.gif') }}"></div>
                    {{$bodyModal}}
            </div>
            <div class="modal-footer">
                {!! Form::submit("$btnConfirmar",['class' => 'btn btn-success', 'name' => 'confirm_modal', 'onclick'=>'javascript:document.getElementById("blanket").style.display = "block";document.getElementById("aguarde").style.display = "block"']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.confirm_modal').click(function(){
            $('#aguarde, #blanket').css('display','block');
        });
    });
</script>
    
