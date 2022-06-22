<!-- Inout modal -->
<div class="modal fade" id="input-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">New message to @mdo</h6>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/rating/send/{{$receiver_id}}">
                    @csrf
                    <div class="rating-stars block" id="company_rating" data-stars="5">
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-floating floating-label">
                            <textarea name="comment" class="form-control" placeholder="review" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Reviews</label>
                        </div>
                    </div>
                    <div class="row"><button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button></div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-success" type="button">Save changes</button>
                <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
