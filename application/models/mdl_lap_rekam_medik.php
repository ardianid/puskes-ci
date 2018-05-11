<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_lap_rekam_medik extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function export_excel($kd_pasien){

    $this->load->library('Excel');

    $this->excel->setActiveSheetIndex(0);
        
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('Rekam Medik (' . $kd_pasien . ')');

    //set cell A1 content with some text
    //$this->excel->getActiveSheet()->setCellValue($col, $kd_pasien);

    //change the font size
    

    //merge cell A1 until D1
    //$this->excel->getActiveSheet()->mergeCells('A1:D1');

    //set aligment to center for that merged cell (A1 to D1)
    //$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(2);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(23);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(2);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(23);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(2);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(9);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(2);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(3);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(35);


        $sql2 = "select kd_pasien,nama,alamat from m_pasien where kd_pasien=?";
        $query2 = $this->db->query($sql2,array($kd_pasien));       

        foreach ($query2->result_array() as $row2)
        {

            $this->excel->getActiveSheet()->setCellValue('A1',"LAPORAN REKAM MEDIK PASIEN");            
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setItalic(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(true);

            $this->excel->getActiveSheet()->setCellValue('A2',"Kode :");
            $this->excel->getActiveSheet()->setCellValue('A3',"Nama :");
            $this->excel->getActiveSheet()->setCellValue('A4',"Alama :");

            $nama_pasien=$row2['nama'];
            $alamat_pasien=$row2['alamat'];

            $this->excel->getActiveSheet()->setCellValue('B2',"'" . $kd_pasien);
         //   $this->excel->getActiveSheet()->getStyle('B1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

            $this->excel->getActiveSheet()->setCellValue('B3',$nama_pasien);
            $this->excel->getActiveSheet()->setCellValue('B4',$alamat_pasien);

            $sql_daftar="select id_daftar,tanggal_msk,anamnesa,keterangan from tr_daftar
                where kd_pasien=? order by id_daftar asc";
            $query_daftar = $this->db->query($sql_daftar,array($kd_pasien));       

            $no_row=5;
            $no_akh=0;

            foreach ($query_daftar->result_array() as $row_daftar)
            {

                $tanggal_msk = $row_daftar['tanggal_msk'];
                $anamnesa = $row_daftar['anamnesa'];
                $keterangan = $row_daftar['keterangan'];
                $id_daftar = $row_daftar['id_daftar'];


                $rcel1 = "A" . strval($no_row+1);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"INFO :");                

                $rcel1 = $rcel1 . ':' . "B" . strval($no_row+1);

                $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');


                $rcel1 = "A" . strval($no_row+2);

                $this->excel->getActiveSheet()->setCellValue($rcel1,"Tanggal :");

                $rcel1 = "A" . strval($no_row +3);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"Anamnesa :");

                $rcel1 = "A" . strval($no_row +4);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"Keterangan :");

                $rcel1 = "B" . strval($no_row +2);
                $this->excel->getActiveSheet()->setCellValue($rcel1,$tanggal_msk);

                $rcel1 = "B" . strval($no_row +3);
                $this->excel->getActiveSheet()->setCellValue($rcel1,$anamnesa);

                $rcel1 = "B" . strval($no_row +4);
                $this->excel->getActiveSheet()->setCellValue($rcel1,$keterangan);
            
                // mulai diagnosa
                $sql_diagnosa="select p.nama_penyakit,t.jenis_diagnosa from tr_diagnosa t inner join m_penyakit p on t.kd_penyakit_tr=p.kd_penyakit where t.id_daftar=?";
                $query_diagnosa = $this->db->query($sql_diagnosa,array($id_daftar));       


                $rcel1 = "D" . strval($no_row +1);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"DIAGNOSA :");


                $rcel1 = $rcel1 . ':' . "E" . strval($no_row+1);

                $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');

                $no_brs= $no_row +1;
                $no_aja=0;

                foreach ($query_diagnosa->result_array() as $row_diagnosa)
                {

                    $nama_diagnosa = $row_diagnosa['nama_penyakit'];
                    $jenis_diagnosa = $row_diagnosa['jenis_diagnosa'];

                    $nama_diagnosa = $nama_diagnosa . " (" . $jenis_diagnosa . ")";
                    
                    $no_aja=$no_aja+1;

                    $no_brs = $no_brs+1;
                    $rcel1 = "D" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$no_aja);                    

                    $rcel1 = "E" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$nama_diagnosa);                    

                }   
                // akhir diagnosa
               
                if ($no_brs > $no_akh){
                    $no_akh= $no_brs;
                }

               // mulai tindakan
                $sql_tindakan="select nama_tindakan from tr_tindakan where id_daftar=?";
                $query_tindakan = $this->db->query($sql_tindakan,array($id_daftar));       


                $rcel1 = "G" . strval($no_row +1);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"TINDAKAN :");

                $rcel1 = $rcel1 . ':' . "H" . strval($no_row+1);

                $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');

                $no_brs= $no_row +1;
                $no_aja=0;

                foreach ($query_tindakan->result_array() as $row_tindakan)
                {

                    $nama_tindakan = $row_tindakan['nama_tindakan'];
                    
                    $no_aja=$no_aja+1;

                    $no_brs = $no_brs+1;
                    $rcel1 = "G" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$no_aja);                    

                    $rcel1 = "H" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$nama_tindakan);                    

                }   
                // akhir tindakan

                if ($no_brs > $no_akh){
                    $no_akh= $no_brs;
                }

                // mulai obat
                $sql_obat="select alkes.nama,tr.qty,tr.satuan,tr.dosis,tr.spost from tr_obat tr inner join m_obatalkes alkes on tr.kd_obat=alkes.kode where id_daftar=?";
                $query_obat = $this->db->query($sql_obat,array($id_daftar));       


                $rcel1 = "J" . strval($no_row +1);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"OBAT :");

                $rcel1 = $rcel1 . ':' . "M" . strval($no_row+1);

                $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');

                $no_brs= $no_row +1;
                $no_aja=0;

                foreach ($query_obat->result_array() as $row_obat)
                {

                    $nama_obat = $row_obat['nama'];
                    $qty = $row_obat['qty'];
                    $satuan = $row_obat['satuan'];
                    $dosis = $row_obat['dosis'];
                    $spos = $row_obat['spost'];

                    $qty2 = $qty . " " . $satuan;

                    $no_aja=$no_aja+1;

                    $no_brs = $no_brs+1;
                    $rcel1 = "J" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$no_aja);                    

                    $rcel1 = "K" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$nama_obat);                    

                    $rcel1 = "L" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$qty2);                    

                    $rcel1 = "M" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$dosis);                    

                }   
                // akhir obat

                if ($no_brs > $no_akh){
                    $no_akh= $no_brs;
                }

                // mulai lab dan radiologi
                $sql_lab="select nama_lab,'LB' as jenis from tr_lab where id_daftar=? union all select nama_radio,'RD' from tr_radiologi where id_daftar=?";
                $query_lab = $this->db->query($sql_lab,array($id_daftar,$id_daftar));       


                $rcel1 = "O" . strval($no_row +1);
                $this->excel->getActiveSheet()->setCellValue($rcel1,"PEMERIKSAAN LAB & RADIOLOGI :");

                $rcel1 = $rcel1 . ':' . "P" . strval($no_row+1);

                $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');

                $no_brs= $no_row +1;
                $no_aja=0;

                foreach ($query_lab->result_array() as $row_lab)
                {

                    $namal = $row_lab['nama_lab'];
                    $jenis_lab = $row_lab['jenis'];

                    $namal = $namal . " (" . $jenis_lab . " )";

                    $no_aja=$no_aja+1;

                    $no_brs = $no_brs+1;
                    $rcel1 = "O" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$no_aja);                    

                    $rcel1 = "P" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$namal);                    

                }   
                // akhir lab
                
                if ($no_brs > $no_akh){
                    $no_akh= $no_brs;
                }

               if (($no_row+4) > $no_akh ){
                $no_row = $no_row+5;
               }else{
                $no_row = $no_akh+2;
               }
               
            } 
            // akhir daftar

            // ALERGI OBAT
            $rcel1 = "A" . strval($no_row +1);
            $this->excel->getActiveSheet()->setCellValue($rcel1,"ALERGI OBAT :");

            $rcel1 = $rcel1 . ':' . "P" . strval($no_row+1);

            $this->excel->getActiveSheet()->getStyle($rcel1)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setARGB('bfbfbf');

            $sql_alergi="select obat.nama,alergi.keterangan from tr_alergi alergi inner join m_obatalkes obat on alergi.kd_obat=obat.kode where kd_pasien=?";
            $query_alergi = $this->db->query($sql_alergi,array($kd_pasien)); 

            $no_brs= $no_row +1;
            $no_aja=0;

                foreach ($query_alergi->result_array() as $row_alergi)
                {

                    $nama_alergi = $row_alergi['nama'];
                    $ket_alergi = $row_alergi['keterangan'];

                    $no_aja=$no_aja+1;

                    $no_brs = $no_brs+1;
                    $rcel1 = "A" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$no_aja);                    

                    $rcel1 = "B" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$nama_alergi);

                    $rcel1 = "D" . strval($no_brs);
                    $this->excel->getActiveSheet()->setCellValue($rcel1,$ket_alergi);


                }   

            // AKHIR ALERGI OBAT

            $filename='rekam_medik.xlsx'; //save our workbook as this file name

            // gridlines dinonaktifin aja
            $this->excel->getActiveSheet()->setShowGridlines(false);

            ob_end_clean();

            header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0');            

            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  

            //force user to download the Excel file without writing it to server's HD
    
            $objWriter->save('php://output');

            ob_end_clean();

        } 

        

    }


}