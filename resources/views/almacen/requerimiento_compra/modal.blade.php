{{-- Inicio modal elimminar registro --}}
<div class="modal fade modal-slide-in-right" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$req->id_requerimiento}}">
    {{Form::Open(array('action'=>array('RequerimientoInternoController@destroy',$req->id_requerimiento),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Internal Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿want to cancel the request?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">confirm</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>
{{-- Fin modal eliminar registro --}}

    