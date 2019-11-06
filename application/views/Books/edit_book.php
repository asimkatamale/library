<?php

defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('Books/edit_book');
echo form_label('title');
echo form_input(array('id' => 'title', 'name' => 'title')) . '<br>';
echo form_label('Quantity');
echo form_input(array('id' => 'quantity', 'name' => 'quantity')) . '<br>';
echo form_submit(array('id' => 'submit', 'value' => 'Submit'));
echo form_close();
