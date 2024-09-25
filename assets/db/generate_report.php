<?php
    include("config.php");
    require '../vendor/autoload.php';
    session_start();
    ob_start();

    use Dompdf\Dompdf;
    use Dompdf\Options;

    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];

    $check_branch = $conn->query("SELECT * FROM ordered_items INNER JOIN branch_inventory ON ordered_items.product_id = branch_inventory.id");
    
    if($dateFrom == "" && $dateTo == ""){
        $filename = "Sales_Reports.pdf";
        $sql = $conn->query('SELECT 
        *
        -- ordered_items.*, 
        -- branch_inventory.name, 
        -- branch_inventory.retail_price, 
        -- branch_inventory.invoice_id 
        FROM ordered_items 
        LEFT JOIN branch_inventory ON ordered_items.product_id = branch_inventory.id 
        ORDER BY date DESC');
    }else{
        $filename = "Sales_Reports_from_" . $dateFrom . "_to_" . $dateTo . ".pdf";
        $sql = $conn->query("SELECT 
        *
        -- ordered_items.*, 
        -- branch_inventory.name, 
        -- branch_inventory.retail_price, 
        -- branch_inventory.invoice_id 
        FROM ordered_items 
        LEFT JOIN branch_inventory ON ordered_items.product_id = branch_inventory.id 
        WHERE DATE(date) BETWEEN '$dateFrom' AND '$dateTo' 
        ORDER BY date DESC"); 
    }
    
    $data = [];
    $checkout_ids = [];
    while($row = $sql->fetch_assoc()){
        $data[] = $row;
    }
    echo json_encode($data);
    // require '../../views/gen_report_format.php?data='.json_encode($data);

    // $options = new Options();
    // $options->set('isHtml5ParserEnabled', true);
    // $options->set('isPhpEnabled', true);
    // $dompdf = new Dompdf($options);

    // // $html = ob_get_clean();
    // $html = file_get_contents('../../views/gen_report_format.php');
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('A4', 'portrait');
    // $dompdf->render();

    // // $dompdf->stream('sample.pdf', array('Attachment' => 0));
    // $output = $dompdf->output();
    // $filePath = '../../generated_reports/'.$filename;
    // file_put_contents($filePath, $output);
    // echo json_encode(['pdf_url' => $filePath]);
