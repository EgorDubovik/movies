<!-- Inout modal -->
<div class="modal fade" id="input-modal">
    <div class="modal-dialog" role="document">
        <form method="post" action="/rating/send/{{$receiver_id}}">@csrf
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">New message to @mdo</h6>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="rating-stars block" id="company_rating" data-stars="5">
                </div>
                <div class="form-group mt-3">
                    <div class="form-floating floating-label">
                        <textarea name="comment" class="form-control" placeholder="review" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Reviews</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-success" type="submit">Send review</button>
                <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
