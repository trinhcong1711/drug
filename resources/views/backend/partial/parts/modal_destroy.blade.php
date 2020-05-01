<div class="modal fade" id="m_modal_{{@$listItem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn sắp xóa 1 bản ghi. Sau khi xóa sẽ không thể phục hồi lại dữ liệu bản ghi này!</p>
                <p>Bạn có muốn tiếp tục không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a type="button" href="{{ route($modules['slug'].'.destroy',@$listItem->id) }}" class="btn btn-primary">Xóa ngay!</a>
            </div>
        </div>
    </div>
</div>
