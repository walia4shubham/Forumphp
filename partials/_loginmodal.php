<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginmodal" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content" id="aa">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodalLabel">Login to Shubham forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_handlelogin.php" method= "post" >
            <div class="modal-body">
            <div class="form-group">
                        <label for="loginemail">Email address</label>
                        <input type="text" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                    <label for="loginpassword"> Password</label>
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>