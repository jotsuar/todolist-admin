<div id="modal-info" class="modal modal-message modal-info2 fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="modal-title"><?php echo __('¡Información!'); ?></div>

            <div class="modal-body"><?php echo $message ?></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo __('Ok') ?></button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<script type="text/javascript">
	$(function(){
		$("#modal-info").modal();
	});
</script>