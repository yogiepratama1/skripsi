<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/dompdf/autoload.inc.php'; // Path to dompdf autoload

use Dompdf\Dompdf;

class Pdf extends Dompdf {
    public function __construct() {
        parent::__construct();
    }
}
