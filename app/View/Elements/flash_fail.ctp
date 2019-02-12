<div id="modal-danger" class="modal modal-message modal-danger2 fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title"><?php echo __('¡Error!'); ?></div>
            <div class="modal-body"><?php echo $message ?></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo __('Ok') ?></button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<script type="text/javascript">
	$(function(){
		$("#modal-danger").modal();
	});
</script>
