	<!-- Modal -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content flat">
				<div class="modal-header modal-primary">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
	                    <input type="hidden" value="" name="cat_id"/> 
	                    <div class="form-body">

	                        <div class="form-group">
	                            <label class="control-label col-md-3">No Meja</label>
	                            <div class="col-md-9">
	                                <input name="no_meja" placeholder="No meja" class="form-control" type="number" min="1" autofocus>
	                                <span class="help-block"></span>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="control-label col-md-3">Keterangan</label>
	                            <div class="col-md-9">
	                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
	                                <span class="help-block"></span>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="control-label col-md-3">Status</label>
	                            <div class="col-md-9">
	                                <select name="status" class="form-control">
	                                    <option value="">--Select--</option>
	                                    <option value="1">Available</option>
	                                    <option value="0">Non-available</option>
	                                </select>
	                                <span class="help-block"></span>
	                            </div>
	                        </div>

	                    </div>
	                </form>
				</div>
				<div class="modal-footer">
	                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-flat">Save</button>
	                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
	            </div>
			</div>
		</div>
	</div>

	<!-- Modal Confirm-->
	<div class="modal fade" id="modal_confirm" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content flat">
				<div class="modal-body">
					<h3> Are you sure ?</h3>
					<input type="hidden" name="id_delete" id="id_delete">
				</div>
				<div class="modal-footer">
	                <button type="button" id="yes" onclick="yes()" class="btn btn-danger btn-flat">OK</button>
	                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
	            </div>
			</div>
		</div>
	</div>