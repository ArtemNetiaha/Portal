<div class="modal fade" id="modal-add-sub-blocks" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add subblocks?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               
                <input type="number" form="subBlocksForm" name="blocksNumber" value="1">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form action="{{route('blocks.store')}}" method="post" id="subBlocksForm">
                    @csrf
                    
                    <input type="hidden" name="block_id" id="blockId">
                    <button type="submit" class="btn btn-danger">Add Sub Blocks</button>
                </form>
            </div>
        </div>
    </div>
</div>
