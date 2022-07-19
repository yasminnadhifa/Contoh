<?php
$template = array(

    'table_open' => '<table border="1 cellpadding="4" cellspacing="0">',
    'table_close' => '</table>'
);

$this->table->set_template($template);
$this->table->set_heading(array('no', 'Nama', 'Alamat'));

$this->table->add_row(array('1', "Budi", 'Rumbai'));
$this->table->add_row(array('1', "badu", 'panam'));
$this->table->add_row(array('1', "bidi", 'nangka'));

echo $this->table->generate();

?>; 