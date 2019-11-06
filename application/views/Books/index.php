<div class="col-sm-8 text-left"> 
    <div class="row">
        <div class="col-lg-12">           
            <h2>Books List</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>BookId</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Issue Book</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->quantity ?></td>
                        <td><?=
                            ($book->quantity == 0 ? "Book Unavailable" :
                                    '<button onclick =issueBook(' . $book->id . ') type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Issue Book</button>'
                            )
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Issue Book</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <?php echo form_open('Books/issue_book'); ?>                    
                    <div class="form-group">
                        <label>User Id:</label>
                        <?php
                        echo form_input(array('type' => 'number', 'id' => 'user_id', 'name' => 'user_id', 'class' => 'form-control'));
                        echo form_input(array('type' => 'hidden', 'id' => 'book_id', 'name' => 'book_id'))
                        ?>
                    </div>                       
                    <div class="form-group">
                        <label>Issue Date:</label>
                        <?php echo form_input(array('value' => date('Y-m-d'), 'readonly' => 'readonly', 'autocomplete' => "off", 'id' => 'issue_date', 'name' => 'issue_date', 'class' => 'form-control')) ?>
                    </div>
                    <div class="form-group">
                        <label>Return Date:</label>
                        <?php echo form_input(array('autocomplete' => "off", 'id' => 'return_date', 'name' => 'return_date', 'class' => 'form-control')) ?>
                    </div>
                    <div class="modal-footer">
                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success')); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    function issueBook(id) {
        $('#book_id').val(id);
        $('#return_date').datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
    }
</script>
