<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Da li ste sigurni da želite da se odjavite?</h3>
            </div>
            <div class="modal-footer">
                <form action="php/odjava.php" method="POST">
                    <button type="submit" class="btn btn-info" id="btnYes">Da</button>
                    <button type="button" class="btn btn-danger" id="btnNo" data-dismiss="modal">Ne</button>
                </form>
            </div>
        </div>
    </div>
</div>