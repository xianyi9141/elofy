<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Gen 
{
	public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
	  {
	  	log_message('error', '----------111-------');
	    $dompdf = new DOMPDF();
	    $dompdf->load_html($html);
	    $dompdf->set_paper($paper, $orientation);
	    $dompdf->render();
	    if ($stream) {
	        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
	    } else {
	        return $dompdf->output();
	    }
	  }
}

?>