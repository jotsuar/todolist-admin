<div id="modal-success" class="modal modal-message modal-success2 fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title"><?php echo __('Mensaje'); ?></div>
            <div class="modal-body"><?php echo $message ?></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><?php echo __('Ok') ?></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$("#modal-success").modal();
	});
</script>
