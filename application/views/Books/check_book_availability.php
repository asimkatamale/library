<div class="col-sm-8 text-left"> 
    <div class="row">
        <div class="col-lg-12">           
            <h2>Book Availability</h2>
        </div>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label>Book Title:</label>
            <?php echo form_input(array('autocomplete' => 'off', 'id' => 'title', 'name' => 'title', 'class' => 'form-control')) ?>
        </div>
        <button  class="btn btn-default" onclick="checkavailability()">Check</button>
        <div class="results">
        </div>
    </div>
</div>

</div>
</div>
<script>
    function checkavailability() {
        let title = $('#title').val();
        if (title) {
            $.ajax({
                url: "<?php echo base_url('/index.php/Books/check_book_availability') ?>?term=" + title,
                beforeSend: function () {
                    $('.results').html('Searching...');
                },
                success: function (dataValue) {
                    let parsedVal = JSON.parse(dataValue);
                    if (parsedVal.hasOwnProperty('message')) {
                        $('.results').html(parsedVal.message)
                    } else {
                        let data = '<table class="table"><thead><tr><th>Book Title</th><th>Quantity</th><th>Avaialble</th></tr></thead><tbody>';
                        parsedVal.forEach(function (element, index, array) {
                            data += '<tr><td>' + element.title + ' </td>';
                            data += '<td>' + element.quantity + '</td>';
                            data += '<td>' + (element.quantity == 0 ? "Not available" : "Avaialble") + '</td></tr>';
                        });
                        data += '</tbody></table>';
                        $('.results').html(data)
                    }
                }
            });
        } else {
            alert('Please enter book title');
        }

    }
</script>

