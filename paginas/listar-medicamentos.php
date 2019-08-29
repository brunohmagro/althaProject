<?php
    
    //PROTEÇÃO PARA ACESSO DIRETO AO ARQUIVO
    if(!isset($logado)) {
        echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
    }

?>
<div class="box-content">

	<h3><i class="fas fa-list"></i> Listar Medicamentos</h3>

    <div id="resultadoExcluirMedicamento"></div>

    <div class="table-responsive">
    	<table id="data-table" class="table table-striped table-hover" style="width:100%; text-align: center;">
            <thead>
                <tr>
                    <th></th>
                    <th>CÓDIGO</th>
                    <th>APRESENTAÇÃO</th>
                    <th>P. ATIVO</th>
                    <th>FORNECEDOR</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>CÓDIGO</th>
                    <th>APRESENTAÇÃO</th>
                    <th>P. ATIVO</th>
                    <th>FORNECEDOR</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!--box-content-->

<!-- Modal para mostrar a descrição do medicamento -->
<div class="modal fade" id="mostrarDescricao" tabindex="-1" role="dialog" aria-labelledby="ModalMedicamento" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Descrição do Medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="descricaoMedicamento" id="infoMedicamento">

                </div><!-- descricaoMedicamento -->
            </div><!--modal-body-->
            <div class="modal-footer text-body text-center" id="footerInfMedicamento">

            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal fade -->
<!-- Fim da modal de descrição do medicamento -->
<script src="<?php echo INCLUDE_PATH_PORTAL ?>Controlador/MedicamentoControlador.js"></script>