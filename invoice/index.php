<?php

include 'config.php';
require('invoice.php');
$user_id = $_POST['user_id'];
$session_id = $_POST['session_id'];
//$role="student";
$res = "SELECT * FROM tbl_order WHERE student = '$user_id'  AND session_id='$session_id' ";
$us=mysqli_query($link, $res);
$userfetch_data = mysqli_fetch_array($us);

$ress = "SELECT * FROM tbl_glow_students WHERE id = '$user_id' ";
$uss=mysqli_query($link, $ress);
$userfetch_dataa = mysqli_fetch_array($uss);
$order_id = $userfetch_data['id'];
$namee = $userfetch_dataa['username'];
$email =  $userfetch_dataa['email'];
$mobileno =  $userfetch_dataa['mobile_no'];
$school =  $userfetch_dataa['school'];
$address =  $userfetch_dataa['address'];
//$mobileno = "5678";
$rate = $userfetch_data['rate'];
$tax = $userfetch_data['tax'];
$total_amount = $userfetch_data['total_amount'];
$order_date = $userfetch_data['order_date'];
/////////////////
$today = date("Y/m/d");
$namee = str_replace(' ', '', $namee);
$name = "generated_invoice/".$namee.$session_id.".pdf";
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Glow Infotech",
                  "XYZ\n" .
                  "Dubai\n".
                  "+9199999999\n" .
                  "+9199999999\n" .
                  "Fax - 4573547547 "  );
$pdf->fact_dev( "INVOICE ", "" );
$pdf->addDate($today);
$pdf->addClient("Demo");
$pdf->addPageNumber("1");
$pdf->addClientAdresse("$namee\n $school\n $address\n $mobileno");
$cols=array( "QTY"    => 23,
             "ITEM"  => 33,
             "DESCRIPTION"     => 46,
             "UNIT PRICE"      => 26,
             "DISCOUNT" => 30,
             "LINE TOTAL"          => 41 );
$pdf->addCols( $cols);
$pdf->addLineFormat( $cols);
$y    = 80;
$line = array( "QTY"    => "1 HOUR",
               "ITEM"  => "TUT 100",
               "DESCRIPTION"     => "TUTORING SESSION WITRH AHMED ALI",
               "UNIT PRICE"      => "$10",
               "DISCOUNT" => "",
               "LINE TOTAL"          => "$10" );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

//$pdf->addCadreTVAs();
        
$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  6, "qte" => 1, "tva" => 1 ));
$tab_tva = array( "1"       => 19.6,
                  "2"       => 5.5);
$params  = array( "RemiseGlobale" => 1,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 1,
                      "portTTC"        => 10,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 1,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  "Remarque" => "Avec un acompte, svp..." );

//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
//$pdf->addCadreEurosFrancs();
$pdf->Output($name, 'F');
$details = array(
     'link' =>'https://pinkrickshawdesign.in/glow/invoice/generated_invoice/'.$namee.$session_id.".pdf",
   

  );
 echo json_encode($details);
?>