<?php

namespace App\Controllers;

use App\Models\UserModel;
use TCPDF;

class ExportarBDController extends BaseController
{
    public function opciones(){
        return view('exportar/opciones');
    }

    public function exportar_CSV_Posts(){
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from posts')->getResultArray();

            if(empty($rows)){
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $filename = sprintf('Posts_Report_%s.csv', time());

            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF";

            $fp = fopen('php://output','wb');

            fputcsv($fp,['id','category','autor','title','content','status','created_at','updated_at','deleted_at']);

            foreach($rows as $row){
                fputcsv($fp, $row);
            }
            fclose($fp);

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch(PDOException $e){
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_PDF_Posts()
    {
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from posts')->getResultArray();

            if (empty($rows)) {
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $pdf = new TCPDF();
            $pdf->SetCreator('Miguel Cruz');
            $pdf->SetTitle('Posts Report');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 6); 

            $cellWidth = 22; 
            $cellHeight = 10;

            $pdf->Cell(5, $cellHeight, 'id', 1, 0, 'C');
            $pdf->Cell(10, $cellHeight, 'category', 1, 0, 'C');
            $pdf->Cell(5, $cellHeight, 'autor', 1, 0, 'C');
            $pdf->Cell(40, $cellHeight, 'title', 1, 0, 'C');
            $pdf->Cell(60, $cellHeight, 'content', 1, 0, 'C');
            $pdf->Cell(5, $cellHeight, 'status', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'created_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'updated_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'deleted_at', 1, 1, 'C');


            foreach ($rows as $row) {
                $pdf->Cell(5, $cellHeight, $row['id'], 1, 0, 'C');
                $pdf->Cell(10, $cellHeight, $row['category'], 1, 0, 'C');
                $pdf->Cell(5, $cellHeight, $row['autor'], 1, 0, 'C');
                $pdf->Cell(40, $cellHeight, $row['title'], 1, 0, 'C');
                $pdf->Cell(60, $cellHeight, $row['content'], 1, 0, 'C');
                $pdf->Cell(5, $cellHeight, $row['status'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['created_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['updated_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['deleted_at'], 1, 1, 'C');
            }

            $backupPath = WRITEPATH . 'backups/';
            $backupFileName = 'Posts_Report_' . date('Ymd_His') . '.pdf';
            $pdf->Output($backupPath . $backupFileName, 'D');

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_CSV_Categories(){
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from categories')->getResultArray();

            if(empty($rows)){
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $filename = sprintf('Categories_Report_%s.csv', time());

            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF";

            $fp = fopen('php://output','wb');

            fputcsv($fp,['id','category','description','status']);

            foreach($rows as $row){
                fputcsv($fp, $row);
            }
            fclose($fp);

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch(PDOException $e){
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_PDF_Categories()
    {
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from categories')->getResultArray();

            if (empty($rows)) {
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $pdf = new TCPDF();
            $pdf->SetCreator('Miguel Cruz');
            $pdf->SetTitle('Categories Report');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 6); 

            $cellHeight = 10;

            $pdf->Cell(5, $cellHeight, 'id', 1, 0, 'C');
            $pdf->Cell(60, $cellHeight, 'category', 1, 0, 'C');
            $pdf->Cell(60, $cellHeight, 'description', 1, 0, 'C');
            $pdf->Cell(5, $cellHeight, 'status', 1, 0, 'C');

            foreach ($rows as $row) {
                $pdf->Cell(5, $cellHeight, $row['id'], 1, 0, 'C');
                $pdf->Cell(15, $cellHeight, $row['category'], 1, 0, 'C');
                $pdf->Cell(15, $cellHeight, $row['description'], 1, 0, 'C');
                $pdf->Cell(5, $cellHeight, $row['status'], 1, 0, 'C');
            }

            $backupPath = WRITEPATH . 'backups/';
            $backupFileName = 'Categories_Report_' . date('Ymd_His') . '.pdf';
            $pdf->Output($backupPath . $backupFileName, 'D');

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_CSV_Users(){
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from users')->getResultArray();

            if(empty($rows)){
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $filename = sprintf('Users_Report_%s.csv', time());

            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF";

            $fp = fopen('php://output','wb');

            fputcsv($fp,['id','username','password','status','created_at','updated_at','deleted_at','profile']);

            foreach($rows as $row){
                fputcsv($fp, $row);
            }
            fclose($fp);

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch(PDOException $e){
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_PDF_Users()
    {
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from users')->getResultArray();

            if (empty($rows)) {
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $pdf = new TCPDF();
            $pdf->SetCreator('Miguel Cruz');
            $pdf->SetTitle('Users Report');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 6); 

            $cellWidth = 22; 
            $cellHeight = 10;

            $pdf->Cell(5, $cellHeight, 'id', 1, 0, 'C');
            $pdf->Cell(15, $cellHeight, 'username', 1, 0, 'C');
            $pdf->Cell(15, $cellHeight, 'password', 1, 0, 'C');
            $pdf->Cell(8, $cellHeight, 'status', 1, 0, 'C');
            $pdf->Cell(8, $cellHeight, 'profile', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'created_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'updated_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'deleted_at', 1, 1, 'C');



            foreach ($rows as $row) {
                $pdf->Cell(5, $cellHeight, $row['id'], 1, 0, 'C');
                $pdf->Cell(15, $cellHeight, $row['username'], 1, 0, 'C');
                $pdf->Cell(15, $cellHeight, $row['password'], 1, 0, 'C');
                $pdf->Cell(8, $cellHeight, $row['status'], 1, 0, 'C');
                $pdf->Cell(8, $cellHeight, $row['profile'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['created_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['updated_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['deleted_at'], 1, 1, 'C');
            }

            $backupPath = WRITEPATH . 'backups/';
            $backupFileName = 'Users_Report_' . date('Ymd_His') . '.pdf';
            $pdf->Output($backupPath . $backupFileName, 'D');

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_CSV_Comments(){
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from comments')->getResultArray();

            if(empty($rows)){
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $filename = sprintf('Comments_Report_%s.csv', time());

            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            echo "\xEF\xBB\xBF";

            $fp = fopen('php://output','wb');

            fputcsv($fp,['id','post','message','created_at','updated_at','deleted_at']);

            foreach($rows as $row){
                fputcsv($fp, $row);
            }
            fclose($fp);

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch(PDOException $e){
            Flasher::new($e->getMessage(),'danger');
        }
    }

    public function exportar_PDF_Comments()
    {
        try {
            $db = \Config\Database::connect();
            $rows = $db->query('select * from comments')->getResultArray();

            if (empty($rows)) {
                throw new Exception('No hay registros en la base de datos para ser exportados');
            }

            $pdf = new TCPDF();
            $pdf->SetCreator('Miguel Cruz');
            $pdf->SetTitle('Comments Report');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 6); 

            $cellWidth = 22; 
            $cellHeight = 10;

            $pdf->Cell(5, $cellHeight, 'id', 1, 0, 'C');
            $pdf->Cell(5, $cellHeight, 'post', 1, 0, 'C');
            $pdf->Cell(100, $cellHeight, 'message', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'created_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'updated_at', 1, 0, 'C');
            $pdf->Cell($cellWidth, $cellHeight, 'deleted_at', 1, 1, 'C');



            foreach ($rows as $row) {
                $pdf->Cell(5, $cellHeight, $row['id'], 1, 0, 'C');
                $pdf->Cell(5, $cellHeight, $row['post'], 1, 0, 'C');
                $pdf->Cell(100, $cellHeight, $row['message'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['created_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['updated_at'], 1, 0, 'C');
                $pdf->Cell($cellWidth, $cellHeight, $row['deleted_at'], 1, 1, 'C');
            }

            $backupPath = WRITEPATH . 'backups/';
            $backupFileName = 'Comments_Report_' . date('Ymd_His') . '.pdf';
            $pdf->Output($backupPath . $backupFileName, 'D');

        } catch (Exception $e) {
            Flasher::new($e->getMessage(),'danger');
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(),'danger');
        }
    }
}
