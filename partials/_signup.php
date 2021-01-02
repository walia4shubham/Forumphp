
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Sign up to Shubham forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_handle.php" method= "post" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="signuppassword"> Password</label>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                    </div>
                    <div class="form-group">
                        <label for="signupcpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
                        <small id="emailHelp" class="form-text text-muted">Password and Confirm password must be
                            same.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>