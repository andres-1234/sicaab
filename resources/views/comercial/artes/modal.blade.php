{{-- Inicio modal elimminar registro --}}
<div class="modal fade modal-slide-in-right" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$art->id_arte}}">
    {{Form::Open(array('action'=>array('ArteProductoController@destroy',$art->id_arte),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿want to delete the record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Delet</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>
{{-- Fin modal eliminar registro --}}

    