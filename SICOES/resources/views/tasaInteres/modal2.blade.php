<div class="modal modal-danger fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$ma->idtipocredito}}">
	{{Form::Open(array('action'=>array('TasaInteresController@destroy',$ma->idtipocredito),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Tasa de Interés</h4>
			</div>
			<div class="modal-body">
				<h4 style="font-family: bold;">Confirme si desea eliminar la tasa de interés del: </h4>
				<h2 style="font-family:  Times New Roman, sans-serif; color: #e3f2fd;  text-align: center;"><b>{{ $ma->interes*100 }}%</b></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-outline">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>