<div class="col-sm-8 text-left"> 
    <div class="row">
        <div class="col-lg-12">           
            <h2>Add Book</h2>
        </div>
    </div>
    <div class="table-responsive">
        <?php echo form_open('Books/add_book'); ?>
        <div class="form-group">
            <label>Book Title:</label>
            <?php echo form_input(array('id' => 'title', 'name' => 'title', 'class' => 'form-control')) ?>
        </div>
        <div class="form-group">
            <label>Quantity:</label>
            <?php echo form_input(array('type'=>'number','id' => 'quantity', 'name' => 'quantity', 'class' => 'form-control')) ?>
        </div>
        <?php
        echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success'));
        echo form_close();
        ?>
    </div>
</div>

</div>
</div>