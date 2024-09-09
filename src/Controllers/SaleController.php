<?php
namespace taller2\Controllers;
require_once '../vendor/autoload.php';
use taller2\Models\Sale;
use \Mpdf\Mpdf;


class SaleController {
    //Magic methods
    private $jsonFile;
    function __construct($jsonFile){
        $this->jsonFile = $jsonFile;
    }

    public function readJsonFile(){
        return json_decode(file_get_contents($this->jsonFile),true);
    }


    public function add(Sale $sale){
        $sales = $this->readJsonFile($this->jsonFile);

        $sales[] =  $sale->toArray();
        // Guardar la información en el archivo
        file_put_contents($this->jsonFile,json_encode($sales));
    }

    public function generateSalePDF($sale) {

        $mpdf = new mPDF();

        $html = '<h1>Factura de venta</h1>';
        $html .= '<p>Venta: ' . $sale->getSale() . '</p>';
        $html .= '<p>Precio: ' . $sale->getPrice() . '</p>';
        $html .= '<p>Fecha: ' . $sale->getDate() . '</p>';
        $html .= '<p>IVA: ' . $sale->getIva() . '</p>';
        $html .= '<p>Precio total: ' . $sale->getTotalPrice() . '</p>';

        
        $mpdf->WriteHTML($html);

        $mpdf->Output('venta.pdf', 'D');

    }


}