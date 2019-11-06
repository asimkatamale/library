<div class="col-sm-8 text-left"> 
    <div class="row">
        <div class="col-lg-12">           
            <h2>Issued Books List</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Issued By</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <td><?= $book->title ?></td>
                        <td><?= $book->name ?></td>
                        <td><?= $book->issue_date ?></td>
                        <td><?= $book->return_date ?></td>
                        <td><button onclick="returnBook(<?= $book->id ?>,<?= $book->book_id ?>)" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Return Book</button></td>
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
                <h4 class="modal-title">Return Book</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure to return the book ?</p>
                <div class="table-responsive">
                    <?php
                    echo form_open('Books/return_book');
                    echo form_input(array('type' => 'hidden', 'id' => 'book_issued_id', 'name' => 'book_issued_id', 'class' => 'form-control'));
                    echo form_input(array('type' => 'hidden', 'id' => 'book_id', 'name' => 'book_id', 'class' => 'form-control'));
                    ?>
                    <div class="modal-footer">
                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Return', 'class' => 'btn btn-success')); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function returnBook(issueId,book_id) {
        $('#book_issued_id').val(issueId);
        $('#book_id').val(book_id);
    }
</script>
