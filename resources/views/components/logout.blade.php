<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are your sure to logout?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                By clicking "Logout" below, you'll be logged out. Don't worry, you can login again at anytime!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ url('user/logout') }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit"> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
