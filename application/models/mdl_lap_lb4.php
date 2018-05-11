<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_lap_lb4 extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

function export_excel($bln,$thn,$kd_puskes){

	$this->load->library('Excel');

    $this->excel->setActiveSheetIndex(0);
        
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('LB4');

    $styleArray = array(
                'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    ),
    );

$this->excel->getActiveSheet()->setCellValue('B2',"LB 4"); 

    $this->excel->getActiveSheet()->setCellValue('A3',"NO"); 
    $this->excel->getActiveSheet()->getStyle('A3')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->mergeCells('A3:A4');
    $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);        
    $this->excel->getActiveSheet()->getStyle("A3:A4")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B3',"KEGIATAN"); 
    $this->excel->getActiveSheet()->getStyle('B3')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->mergeCells('B3:B4');
    $this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);       
    $this->excel->getActiveSheet()->getStyle("B3:B4")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C3',"JUMLAH KASUS"); 
    $this->excel->getActiveSheet()->getStyle('C3')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->mergeCells('C3:D3');
    $this->excel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);       
    $this->excel->getActiveSheet()->getStyle("C3:D3")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C4',"LK"); 
    $this->excel->getActiveSheet()->getStyle('C4')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("C4")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('D4',"PR"); 
    $this->excel->getActiveSheet()->getStyle('D4')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("D4")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A5',"1"); 
    $this->excel->getActiveSheet()->getStyle('A5')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A5")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B5',"2"); 
    $this->excel->getActiveSheet()->getStyle('B5')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("B5")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C5',"3"); 
    $this->excel->getActiveSheet()->mergeCells('C5:D5');
    $this->excel->getActiveSheet()->getStyle('C5:D5')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("C5:D5")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A6',"I"); 
    $this->excel->getActiveSheet()->getStyle('A6')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B6',"KUNJUNGAN PUSKESMAS"); 
    $this->excel->getActiveSheet()->getStyle('B6')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B6")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C6:D6")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A7',"1"); 
    $this->excel->getActiveSheet()->getStyle("A7")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B7',"Jumlah kunjungan puskesmas"); 
    $this->excel->getActiveSheet()->getStyle("B7")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->getStyle("C7")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D7")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A8',"2"); 
    $this->excel->getActiveSheet()->getStyle("A8")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B8',"Jumlah kunjungan dengan kartu sehat"); 
    $this->excel->getActiveSheet()->getStyle("B8")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->getStyle("C8")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D8")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A9',"3"); 
    $this->excel->getActiveSheet()->getStyle("A9")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B9',"Jumlah kunjungan rawat jalan"); 
    $this->excel->getActiveSheet()->getStyle("B9")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C9")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D9")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A10',"4"); 
    $this->excel->getActiveSheet()->getStyle("A10")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B10',"Jumlah kunjungan rawat jalan gol.umur>= 60 th");     
    $this->excel->getActiveSheet()->getStyle("B10")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C10")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D10")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A11',"5"); 
    $this->excel->getActiveSheet()->getStyle("A11")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B11',"Jumlah kunjungan rawat jalan gigi");     
    $this->excel->getActiveSheet()->getStyle("B11")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C11")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D11")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A12:D12")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A13',"II"); 
    $this->excel->getActiveSheet()->getStyle('A13')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A13")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B13',"RAWAT TINGGAL"); 
    $this->excel->getActiveSheet()->getStyle('B13')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B13")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C13:D13")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A14',"1"); 
    $this->excel->getActiveSheet()->getStyle("A14")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B14',"Jumlah penderita yang dirawat");     
    $this->excel->getActiveSheet()->getStyle("B14")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C14")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D14")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A15',"2"); 
    $this->excel->getActiveSheet()->getStyle("A15")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B15',"Jumlah penderita yang keluar");     
    $this->excel->getActiveSheet()->getStyle("B15")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C15")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D15")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A16',"3"); 
    $this->excel->getActiveSheet()->getStyle("A16")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B16',"Jumlah hari perawatan");     
    $this->excel->getActiveSheet()->getStyle("B16")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C16")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D16")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A17',"4"); 
    $this->excel->getActiveSheet()->getStyle("A17")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B17',"Jumlah ibu hamil,melahirkan,nifas dengan kelainan yg dirawat");     
    $this->excel->getActiveSheet()->getStyle("B17")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C17")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D17")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A18',"5"); 
    $this->excel->getActiveSheet()->getStyle("A18")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B18',"Jumlah balita (sakit dengan kelainan) yang dirawat");     
    $this->excel->getActiveSheet()->getStyle("B18")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C18")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D18")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A19',"6");
    $this->excel->getActiveSheet()->getStyle("A19")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B19',"Jumlah kasus cedera/kecelakaan yang dirawat");     
    $this->excel->getActiveSheet()->getStyle("B19")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C19")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D19")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A20',"7"); 
    $this->excel->getActiveSheet()->getStyle("A20")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B20',"Jumlah penderita dengan kasus dirawat");     
    $this->excel->getActiveSheet()->getStyle("B20")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C20")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D20")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A21:D21")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A22',"III"); 
    $this->excel->getActiveSheet()->getStyle('A22')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A22")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B22',"KEGIATAN PERAWATAN KESEHATAN MASYARAKAT"); 
    $this->excel->getActiveSheet()->getStyle('B22')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B22")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C22:D22")->applyFromArray($styleArray);
    
    $this->excel->getActiveSheet()->setCellValue('A23',"1"); 
    $this->excel->getActiveSheet()->getStyle("A23")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B23',"Jumlah keluarga dengan  penderita TB Paru yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B23")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C23")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D23")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A24',"2"); 
    $this->excel->getActiveSheet()->getStyle("A24")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B24',"Jumlah keluarga dengan penderita Kusta yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B24")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C24")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D24")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A25',"3"); 
    $this->excel->getActiveSheet()->getStyle("A25")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B25',"Jumlah keluarga dengan ibu hamil,melahirkan nifas dengan resti yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B25")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C25")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D25")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A26',"4"); 
    $this->excel->getActiveSheet()->getStyle("A26")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B26',"Jumlah keluarga dengan bayi Risti ( pneumonia berat,BBLR) yg Dibina");     
    $this->excel->getActiveSheet()->getStyle("B26")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C26")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D26")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A27',"5"); 
    $this->excel->getActiveSheet()->getStyle("A27")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B27',"Jumlah Keluarga dengan Tetanus Neonatorum yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B27")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C27")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D27")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A28',"6"); 
    $this->excel->getActiveSheet()->getStyle("A28")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B28',"Jumlah keluarga dengan anak balita Risti yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B28")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C28")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D28")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A29',"7"); 
    $this->excel->getActiveSheet()->getStyle("A29")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B29',"Jumlah keluarga dengan Usila Risti yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B29")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C29")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D29")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A30',"8"); 
    $this->excel->getActiveSheet()->getStyle("A30")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B30',"Jumlah keluarga dengan resiko lainnya yang dibina");     
    $this->excel->getActiveSheet()->getStyle("B30")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C30")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D30")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A31',"9"); 
    $this->excel->getActiveSheet()->getStyle("A31")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B31',"Jumlah keluarga yang mempunyai Kartu Menuju Sehat yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B31")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C31")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D31")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('A32',"10"); 
    $this->excel->getActiveSheet()->getStyle("A32")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B32',"Jumlah Panti/kelompok khusus yg dibina");     
    $this->excel->getActiveSheet()->getStyle("B32")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C32")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D32")->applyFromArray($styleArray);        

    $this->excel->getActiveSheet()->getStyle("A33:D33")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A34',"IV"); 
    $this->excel->getActiveSheet()->getStyle('A34')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A34")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B34',"PELAYANAN MEDIK DASAR KESEHATAN GIGI"); 
    $this->excel->getActiveSheet()->getStyle('B34')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B34")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C34:D34")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A35',"1"); 
    $this->excel->getActiveSheet()->getStyle("A35")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B35',"Jumlah penambalan gigi tetap");     
    $this->excel->getActiveSheet()->getStyle("B35")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C35")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D35")->applyFromArray($styleArray);   

    $this->excel->getActiveSheet()->setCellValue('A36',"2"); 
    $this->excel->getActiveSheet()->getStyle("A36")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B36',"Jumlah pencabutan gigi tetap");     
    $this->excel->getActiveSheet()->getStyle("B36")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C36")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D36")->applyFromArray($styleArray);   

    $this->excel->getActiveSheet()->setCellValue('A37',"3"); 
    $this->excel->getActiveSheet()->getStyle("A37")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B37',"Jumlah murid SD yang perlu perawatan kesehatan gigi");     
    $this->excel->getActiveSheet()->getStyle("B37")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C37")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D37")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A38',"4"); 
    $this->excel->getActiveSheet()->getStyle("A38")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B38',"Jumlah murid SD yang mendapat perawatan kesehatan gigi");     
    $this->excel->getActiveSheet()->getStyle("B38")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C38")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D38")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A39',"5"); 
    $this->excel->getActiveSheet()->getStyle("A39")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B39',"Jumlah perawatan gigi lainnya");     
    $this->excel->getActiveSheet()->getStyle("B39")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C39")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D39")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->getStyle("A40:D40")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A41',"V"); 
    $this->excel->getActiveSheet()->getStyle('A41')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A41")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B41',"KEGIATAN PELAYANAN JPKM"); 
    $this->excel->getActiveSheet()->getStyle('B41')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B41")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C41:D41")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A42',"1"); 
    $this->excel->getActiveSheet()->getStyle("A42")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B42',"Jumlah kunjungan peserta PT. ASKES");     
    $this->excel->getActiveSheet()->getStyle("B42")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C42")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D42")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A43',"2"); 
    $this->excel->getActiveSheet()->getStyle("A43")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B43',"Jumlah kunjungan peserta asuransi kesehatan lainnya");     
    $this->excel->getActiveSheet()->getStyle("B43")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C43")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D43")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->getStyle("A44:D44")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A45',"VI"); 
    $this->excel->getActiveSheet()->getStyle('A45')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A45")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B45',"KESEHATAN SEKOLAH"); 
    $this->excel->getActiveSheet()->getStyle('B45')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B45")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C45:D45")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A46',"1"); 
    $this->excel->getActiveSheet()->getStyle("A46")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B46',"Jumlah Sekolah Dasar dan Madrasah Ibtidaiyah (MI) kelas I dengan penjaringan kesehatan");     
    $this->excel->getActiveSheet()->getStyle("B46")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C46")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D46")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A47',"2"); 
    $this->excel->getActiveSheet()->getStyle("A47")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B47',"Jumlah Sekolah Lanjutan Tingkat Pertama (SLTP) dan Madrasah Tsanawiyah (MTs) kelas I");     
    $this->excel->getActiveSheet()->getStyle("B47")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C47")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D47")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A48',"3"); 
    $this->excel->getActiveSheet()->getStyle("A48")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B48',"Jumlah Sekolah Lanjutan Tingkat Atas (SLTA) dan Madrasah Aliyah kelas I dengan kegiatan penjaringan kesehatan");     
    $this->excel->getActiveSheet()->getStyle("B48")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C48")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D48")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A49',"4"); 
    $this->excel->getActiveSheet()->getStyle("A49")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B49',"Jumlah sekolah yg diperiksa sarana kesehatan lingkuangan (sarana air bersih, pembuangan sampah,jamban dan air bersih )");     
    $this->excel->getActiveSheet()->getStyle("B49")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C49")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D49")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A50',"5"); 
    $this->excel->getActiveSheet()->getStyle("A50")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B50',"Jumlah sekolah yg memenuhi syarat kesehatan lingkungan (tempat sampah, jamban, air bersih dan saluran air limbah )");     
    $this->excel->getActiveSheet()->getStyle("B50")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C50")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D50")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A51',"6"); 
    $this->excel->getActiveSheet()->getStyle("A51")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B51',"Jumlah kunjungan pembinaan UKS ke sekolah");     
    $this->excel->getActiveSheet()->getStyle("B51")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C51")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D51")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A52',"7"); 
    $this->excel->getActiveSheet()->getStyle("A52")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B52',"Jumlah SLTP, SLTA memperoleh konseling kesehatan remaja");    
    $this->excel->getActiveSheet()->getStyle("B52")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C52")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D52")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->setCellValue('A53',"8"); 
    $this->excel->getActiveSheet()->getStyle("A53")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B53',"Jumlah Taman Kanak-kanak (TK) melaksanakan kes. Anak pra sekolah");    
    $this->excel->getActiveSheet()->getStyle("B53")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C53")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D53")->applyFromArray($styleArray);       

    $this->excel->getActiveSheet()->getStyle("A54:D54")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A55',"VII"); 
    $this->excel->getActiveSheet()->getStyle('A55')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A55')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A55")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B55',"KESEHATAN OLAH RAGA"); 
    $this->excel->getActiveSheet()->getStyle('B55')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B55")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C55:D55")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A56',"1"); 
    $this->excel->getActiveSheet()->getStyle("A56")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B56',"Jumlah kelompok/klub olahraga yang dibina");    
    $this->excel->getActiveSheet()->getStyle("B56")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C56")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D56")->applyFromArray($styleArray); 

    $this->excel->getActiveSheet()->setCellValue('A57',"2"); 
    $this->excel->getActiveSheet()->getStyle("A57")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B57',"Jumlah yg mendptkan pelayanan kesehatan olah raga");    
    $this->excel->getActiveSheet()->getStyle("B57")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C57")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D57")->applyFromArray($styleArray); 

    $this->excel->getActiveSheet()->getStyle("A58:D58")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A59',"VIII"); 
    $this->excel->getActiveSheet()->getStyle('A59')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A59')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A59")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B59',"KEGIATAN PENYULUHAN KESEHATAN MASY."); 
    $this->excel->getActiveSheet()->getStyle('B59')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B59")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C59:D59")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A60',"1"); 
    $this->excel->getActiveSheet()->getStyle("A60")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B60',"Frekuensi Penyuluhan dlm wil. Puskesmas untuk kelp. Potensial");    
    $this->excel->getActiveSheet()->getStyle("B60")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C60")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D60")->applyFromArray($styleArray); 

    $this->excel->getActiveSheet()->setCellValue('A61',"2"); 
    $this->excel->getActiveSheet()->getStyle("A61")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B61',"Frekuensi Penyuluhan Kelommpok dlm wilayah puskesmas");    
    $this->excel->getActiveSheet()->getStyle("B61")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C61")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D61")->applyFromArray($styleArray); 

    $this->excel->getActiveSheet()->getStyle("A62:D62")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A63',"I"); 
    $this->excel->getActiveSheet()->getStyle('A63')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A63')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A63")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B63',"KESEHATAN LINGKUNGAN"); 
    $this->excel->getActiveSheet()->getStyle('B63')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B63")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C63:D63")->applyFromArray($styleArray);   

    $this->excel->getActiveSheet()->setCellValue('A64',"1"); 
    $this->excel->getActiveSheet()->getStyle("A64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B64',"Jumlah kelompok pemakai ari yang aktif");    
    $this->excel->getActiveSheet()->getStyle("B64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C64")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A65',"2"); 
    $this->excel->getActiveSheet()->getStyle("A65")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B65',"Jumlah sarana air bersih yg diinspeksi sanitasi");    
    $this->excel->getActiveSheet()->getStyle("B65")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C65")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D65")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A66',"3"); 
    $this->excel->getActiveSheet()->getStyle("A66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B66',"Jumlah sarana air bersih yg mempunyai risiko pencemaran Amat Tiggi dan Tinggi (AT,T)");    
    $this->excel->getActiveSheet()->getStyle("B66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C66")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A67',"4"); 
    $this->excel->getActiveSheet()->getStyle("A67")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B67',"Jumlah sarana air bersih yg mempunyai resiko pencemaran Sedang dan Rendah (S, R)");    
    $this->excel->getActiveSheet()->getStyle("B67")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C67")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D67")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A68',"5"); 
    $this->excel->getActiveSheet()->getStyle("A68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B68',"Jumlah sampel air yg memenuhi syarat fisik air");    
    $this->excel->getActiveSheet()->getStyle("B68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C68")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A69',"6"); 
    $this->excel->getActiveSheet()->getStyle("A69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B69',"Jumlah Tempat Pengelolaan Makanan (TPM) yg diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C69")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A70',"7"); 
    $this->excel->getActiveSheet()->getStyle("A70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B70',"Jumlah TPM yang memenuhi syarat");    
    $this->excel->getActiveSheet()->getStyle("B70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C70")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A71',"8"); 
    $this->excel->getActiveSheet()->getStyle("A71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B71',"Jumlah rumah yg diperiksa kesehatan lingk.nya (gunakan kartu rumah)");    
    $this->excel->getActiveSheet()->getStyle("B71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C71")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A72',"9"); 
    $this->excel->getActiveSheet()->getStyle("A72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B72',"Jumlah rumah yg memnuhi syarat sanitasi dasar ( tempat sampah sarana air bersih, jaga dan saluran air limbah)");    
    $this->excel->getActiveSheet()->getStyle("B72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C72")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A73',"10"); 
    $this->excel->getActiveSheet()->getStyle("A73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B73',"Jumlah Tempat Pengelolaan Pestisida (TP.2) yg diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C73")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A74',"11"); 
    $this->excel->getActiveSheet()->getStyle("A74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B74',"Jumlah TP. 2 yang memenuhi syarat ");    
    $this->excel->getActiveSheet()->getStyle("B74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C74")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A75',"12"); 
    $this->excel->getActiveSheet()->getStyle("A75")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B75',"Jumlah Tempat-tempat Umum (TTU) yg diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B75")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C75")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D75")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A76',"13"); 
    $this->excel->getActiveSheet()->getStyle("A76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B76',"Jumlah TTU yang memenuhi syarat");    
    $this->excel->getActiveSheet()->getStyle("B76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C76")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A77:D77")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A78',"II"); 
    $this->excel->getActiveSheet()->getStyle('A78')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A78')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A78")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B78',"LABORATORIUM"); 
    $this->excel->getActiveSheet()->getStyle('B78')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B78")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C78:D78")->applyFromArray($styleArray);  

    $this->excel->getActiveSheet()->setCellValue('A79',"1"); 
    $this->excel->getActiveSheet()->getStyle("A79")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B79',"Jumlah spesimen darah yang diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B79")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C79")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D79")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A80',"2"); 
    $this->excel->getActiveSheet()->getStyle("A80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B80',"Jumlah spesimen air seni yang diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C80")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A81',"3"); 
    $this->excel->getActiveSheet()->getStyle("A81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B81',"Jumlah spesimen tinja yang diperiksa");    
    $this->excel->getActiveSheet()->getStyle("B81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C81")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A82',"4"); 
    $this->excel->getActiveSheet()->getStyle("A82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B82',"Jumlah pemeriksaan BTA/TBC (sputum)");    
    $this->excel->getActiveSheet()->getStyle("B82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C82")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A83',"5"); 
    $this->excel->getActiveSheet()->getStyle("A83")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B83',"Jumlah pemeriksaan BTA/TBC (sputum) positif");    
    $this->excel->getActiveSheet()->getStyle("B83")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C83")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D83")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A84',"6"); 
    $this->excel->getActiveSheet()->getStyle("A84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B84',"Jumlah pemeriksaan darah untuk malaria");    
    $this->excel->getActiveSheet()->getStyle("B84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C84")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A85',"7"); 
    $this->excel->getActiveSheet()->getStyle("A85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B85',"Jumlah pemeriksaan darah untuk malaria positif");    
    $this->excel->getActiveSheet()->getStyle("B85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C85")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A86',"8"); 
    $this->excel->getActiveSheet()->getStyle("A86")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B86',"Jumlah pemeriksaan darah untuk malaria positif P Falciparum");    
    $this->excel->getActiveSheet()->getStyle("B86")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C86")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D86")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A87',"9"); 
    $this->excel->getActiveSheet()->getStyle("A87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B87',"Jumlah pemeriksaan BTA/Kusta (Reits Serum)");    
    $this->excel->getActiveSheet()->getStyle("B87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C87")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A88',"10"); 
    $this->excel->getActiveSheet()->getStyle("A88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B88',"Jumlah pemeriksaan BTA/Kusta (Reits Serum) positif");    
    $this->excel->getActiveSheet()->getStyle("B88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C88")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A89',"11"); 
    $this->excel->getActiveSheet()->getStyle("A89")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B89',"Jumlah pemeriksaan laboratorium lainnya");    
    $this->excel->getActiveSheet()->getStyle("B89")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C89")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D89")->applyFromArray($styleArray);

    // jml kunjungan puskesmas

    $sql="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?";

    $query = $this->db->query($sql,array($bln,$thn,$kd_puskes));
    foreach ($query->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C7",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D7",$row2['jml']);
        }
        
    }

    // akhir jml kunjungan puskesmas

    // perjenis pasien (umum,askes)

    $sql2="select count(daftar.nobukti_d) as jml ,daftar.jenis_pasien,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?";

    $query2 = $this->db->query($sql2,array($bln,$thn,$kd_puskes));
    foreach ($query2->result_array() as $row2)    
    {

        if ($row2['jenis_pasien']=='JAMKESMAS') {

            if ($row2['sex']=='Pria'){
                $this->excel->getActiveSheet()->setCellValue("C8",$row2['jml']);
            }else{
                $this->excel->getActiveSheet()->setCellValue("D8",$row2['jml']);
            }
        }

        if ($row2['jenis_pasien']=='ASKES/BPJS') {

            if ($row2['sex']=='Pria'){
                $this->excel->getActiveSheet()->setCellValue("C42",$row2['jml']);
            }else{
                $this->excel->getActiveSheet()->setCellValue("D42",$row2['jml']);
            }
        }
        
        if ($row2['jenis_pasien']=='ASURANSI LAIN') {

            if ($row2['sex']=='Pria'){
                $this->excel->getActiveSheet()->setCellValue("C43",$row2['jml']);
            }else{
                $this->excel->getActiveSheet()->setCellValue("D43",$row2['jml']);
            }
        }

        
    }

    // akhir perjenis pasien


    // jml kunjungan rawat jalan

    $sql3="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=? and daftar.jenis_daftar='1'";

    $query3 = $this->db->query($sql3,array($bln,$thn,$kd_puskes));
    foreach ($query3->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C9",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D9",$row2['jml']);
        }
        
    }

    // akhir jml kunjungan rawat jalan

    // jml kunjungan rawat jalan >=60

    $sql4="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=? and daftar.jenis_daftar='1' and daftar.umur_thn>=60";

    $query4 = $this->db->query($sql4,array($bln,$thn,$kd_puskes));
    foreach ($query4->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C10",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D10",$row2['jml']);
        }
        
    }

    // jml kunjungan rawat jalan >=60

    // jml kunjungan rawat jalan poli gigi

    $sql4="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=? and daftar.jenis_daftar='1' and daftar.nama_poli='POLI GIGI'";

    $query4 = $this->db->query($sql4,array($bln,$thn,$kd_puskes));
    foreach ($query4->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C11",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D11",$row2['jml']);
        }
        
    }

    // jml kunjungan rawat jalan poli gigi

    // jml kunjungan rawat inap

    $sql5="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=? and daftar.jenis_daftar='2'";

    $query5 = $this->db->query($sql5,array($bln,$thn,$kd_puskes));
    foreach ($query5->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C14",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D14",$row2['jml']);
        }
        
    }

    // jml kunjungan rawat inap

    // jml kunjungan rawat inap keluar

    $sql6="select count(daftar.nobukti_d) as jml ,pasien.sex from tr_daftar daftar inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tgl_keluar)=? and year(daftar.tgl_keluar)=? and daftar.kd_puskes=? and daftar.jenis_daftar='2'";

    $query6 = $this->db->query($sql6,array($bln,$thn,$kd_puskes));
    foreach ($query6->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C15",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D15",$row2['jml']);
        }
        
    }

    // jml kunjungan rawat inap keluar

    // rawat tinggal dari data

    $sql7="SELECT 
    sum(`jml_hml_pr`) as `jml_hml_prx`, 
    sum(`jml_balita`) as `jml_balitax`, 
    sum(`jml_kasus`) as `jml_kasusx`, 
    sum(`jml_khusus`) as `jml_khususx`, 
    sum(`jml_balita_pr`) as `jml_balita_prx`, 
    sum(`jml_kasus_pr`) as `jml_kasus_prx`, 
    sum(`jml_khusus_pr`) as `jml_khusus_prx`
    FROM `dt_rawat_tinggal`
    where
    bln_rawat=? and thn_rawat=? and kd_puskes=?";

    $query7 = $this->db->query($sql7,array($bln,$thn,$kd_puskes));
    foreach ($query7->result_array() as $row2)    
    {
    
        $this->excel->getActiveSheet()->setCellValue("D17",$row2['jml_hml_prx']);

        $this->excel->getActiveSheet()->setCellValue("C18",$row2['jml_balitax']);
        $this->excel->getActiveSheet()->setCellValue("D18",$row2['jml_balita_prx']);

        $this->excel->getActiveSheet()->setCellValue("C19",$row2['jml_kasusx']);
        $this->excel->getActiveSheet()->setCellValue("D19",$row2['jml_kasus_prx']);

        $this->excel->getActiveSheet()->setCellValue("C20",$row2['jml_khususx']);
        $this->excel->getActiveSheet()->setCellValue("D20",$row2['jml_khusus_prx']);
        
    }
    // akhir rawat tinggal dari data

    // perawatan kes masyarakat

    $sql8="SELECT 
    sum(`kel_tbparu`) as `kel_tbparux`, 
    sum(`kel_kusta`) as `kel_kustax`, 
    sum(`kel_hamil_pr`) as `kel_hamil_prx`, 
    sum(`kel_risti`) as `kel_ristix`, 
    sum(`kel_tetanus`) as `kel_tetanusx`, 
    sum(`kel_balita_risti`) as `kel_balita_ristix`, 
    sum(`kel_usila_risti`) as `kel_usila_ristix`, 
    sum(`kel_reslain`) as `kel_reslainx`, 
    sum(`kel_kartu`) as `kel_kartux`, 
    sum(`panti_khus`) as `panti_khusx`, 
    sum(`kel_tbparu_pr`) as `kel_tbparu_prx`, 
    sum(`kel_kusta_pr`) as `kel_kusta_prx`, 
    sum(`kel_risti_pr`) as `kel_risti_prx`, 
    sum(`kel_tetanus_pr`) as `kel_tetanus_prx`, 
    sum(`kel_balita_risti_pr`) as `kel_balita_risti_prx`, 
    sum(`kel_usila_risti_pr`) as `kel_usila_risti_prx`, 
    sum(`kel_reslain_pr`) as `kel_reslain_prx`, 
    sum(`kel_kartu_pr`) as `kel_kartu_prx`, 
    sum(`panti_khus_pr`) as `panti_khus_prx`, 
    sum(`sluh_wil`) as `sluh_wilx`, 
    sum(`sluh_kwil`) as `sluh_kwilx`, 
    sum(`sluh_wil_pr`) as `sluh_wil_prx`, 
    sum(`sluh_kwil_pr`) as `sluh_kwil_prx`
    FROM `dt_kesmas` WHERE
    bln_kesmas=? and thn_kesmas=? and kd_puskes=?";

    $query8 = $this->db->query($sql8,array($bln,$thn,$kd_puskes));
    foreach ($query8->result_array() as $row2)    
    {
    
        $this->excel->getActiveSheet()->setCellValue("C23",$row2['kel_tbparux']);
        $this->excel->getActiveSheet()->setCellValue("D23",$row2['kel_tbparu_prx']);

        $this->excel->getActiveSheet()->setCellValue("C24",$row2['kel_kustax']);
        $this->excel->getActiveSheet()->setCellValue("D24",$row2['kel_kusta_prx']);

        $this->excel->getActiveSheet()->setCellValue("D25",$row2['kel_hamil_prx']);

        $this->excel->getActiveSheet()->setCellValue("C26",$row2['kel_ristix']);
        $this->excel->getActiveSheet()->setCellValue("D26",$row2['kel_risti_prx']);
        
        $this->excel->getActiveSheet()->setCellValue("C27",$row2['kel_tetanusx']);
        $this->excel->getActiveSheet()->setCellValue("D27",$row2['kel_tetanus_prx']);

        $this->excel->getActiveSheet()->setCellValue("C28",$row2['kel_balita_ristix']);
        $this->excel->getActiveSheet()->setCellValue("D28",$row2['kel_balita_risti_prx']);

        $this->excel->getActiveSheet()->setCellValue("C29",$row2['kel_usila_ristix']);
        $this->excel->getActiveSheet()->setCellValue("D29",$row2['kel_usila_risti_prx']);

        $this->excel->getActiveSheet()->setCellValue("C30",$row2['kel_reslainx']);
        $this->excel->getActiveSheet()->setCellValue("D30",$row2['kel_reslain_prx']);

        $this->excel->getActiveSheet()->setCellValue("C31",$row2['kel_kartux']);
        $this->excel->getActiveSheet()->setCellValue("D31",$row2['kel_kartu_prx']);

        $this->excel->getActiveSheet()->setCellValue("C32",$row2['panti_khusx']);
        $this->excel->getActiveSheet()->setCellValue("D32",$row2['panti_khus_prx']);

        $this->excel->getActiveSheet()->setCellValue("C60",$row2['sluh_wilx']);
        $this->excel->getActiveSheet()->setCellValue("D60",$row2['sluh_wil_prx']);

        $this->excel->getActiveSheet()->setCellValue("C61",$row2['sluh_kwilx']);
        $this->excel->getActiveSheet()->setCellValue("D61",$row2['sluh_kwil_prx']);

    }

    // akhir perawatan kes masyarakat

    // tambal gigi

    $sql9="select count(daftar.nobukti_d) as jml,pasien.sex from tr_daftar daftar inner join tr_tindakan tindak
    on daftar.id_daftar=tindak.id_daftar
    inner join m_pasien pasien
    on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?
    and (tindak.nama_tindakan like '%tambal%' or tindak.nama_tindakan like '%nambal%')
    and daftar.nama_poli='POLI GIGI'";

    $query9 = $this->db->query($sql9,array($bln,$thn,$kd_puskes));
    foreach ($query9->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C35",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D35",$row2['jml']);
        }
        
    }

    // akhir tambal gigi

    // cabut gigi

    $sql10="select count(daftar.nobukti_d) as jml,pasien.sex from tr_daftar daftar inner join tr_tindakan tindak
    on daftar.id_daftar=tindak.id_daftar
    inner join m_pasien pasien
    on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?
    and tindak.nama_tindakan like '%cabut%'
    and daftar.nama_poli='POLI GIGI'";

   $query10 = $this->db->query($sql10,array($bln,$thn,$kd_puskes));
    foreach ($query10->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C36",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D36",$row2['jml']);
        }
        
    }    

    // akhir cabut gigi

    // prawatan gigi lainnya

    $sql11="select count(daftar.nobukti_d) as jml,pasien.sex from tr_daftar daftar inner join tr_tindakan tindak
    on daftar.id_daftar=tindak.id_daftar
    inner join m_pasien pasien
    on daftar.kd_pasien=pasien.kd_pasien
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?
    and not(tindak.nama_tindakan like '%tambal%' or tindak.nama_tindakan like '%nambal%' or tindak.nama_tindakan like '%cabut%')
    and daftar.nama_poli='POLI GIGI'";

    $query11 = $this->db->query($sql11,array($bln,$thn,$kd_puskes));
    foreach ($query11->result_array() as $row2)    
    {

        if ($row2['sex']=='Pria'){
            $this->excel->getActiveSheet()->setCellValue("C39",$row2['jml']);
        }

        if ($row2['sex']=='Wanita'){
            $this->excel->getActiveSheet()->setCellValue("D39",$row2['jml']);
        }
        
    }

    // akhir perawatan gigi lainnya

    // data dasar gigi

    $sql12="SELECT 
    sum(`jml_perlu`) as `jml_perlux`, 
    sum(`jml_dapat`) as `jml_dapatx`, 
    sum(`jml_perlu_pr`) as `jml_perlu_prx`, 
    sum(`jml_dapat_pr`) as `jml_dapat_prx`
    FROM `dt_gigi` WHERE
    bln_gigi=? and thn_gigi=? and kd_puskes=?";

    $query12 = $this->db->query($sql12,array($bln,$thn,$kd_puskes));
    foreach ($query12->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C37",$row2['jml_perlux']);
        $this->excel->getActiveSheet()->setCellValue("D37",$row2['jml_perlu_prx']);

        $this->excel->getActiveSheet()->setCellValue("C37",$row2['jml_dapatx']);
        $this->excel->getActiveSheet()->setCellValue("D37",$row2['jml_dapat_prx']);
        
    }   

    // akhir data dasar gigi

    // kesehatan sekolah

    $sql13="SELECT
    sum(`jml_mi`) as `jml_mix`,
    sum(`jml_mts`) as `jml_mtsx`,
    sum(`jml_sma`) as `jml_smax`, 
    sum(`jml_keslin`) as `jml_keslinx`, 
    sum(`jml_mkeslin`) as `jml_mkeslinx`, 
    sum(`jml_uks`) as `jml_uksx`, 
    sum(`jml_kons`) as `jml_konsx`, 
    sum(`jml_tk`) as `jml_tkx`, 
    sum(`jml_mi_pr`) as `jml_mi_prx`, 
    sum(`jml_mts_pr`) as `jml_mts_prx`, 
    sum(`jml_sma_pr`) as `jml_sma_prx`, 
    sum(`jml_keslin_pr`) as `jml_keslin_prx`, 
    sum(`jml_mkeslin_pr`) as `jml_mkeslin_prx`, 
    sum(`jml_uks_pr`) as `jml_uks_prx`, 
    sum(`jml_kons_pr`) as `jml_kons_prx`, 
    sum(`jml_tk_pr`) as `jml_tk_prx`
    FROM `dt_kes_sekolah` 
    WHERE bln_sekolah=? and thn_sekolah=? and kd_puskes=?";

    $query13 = $this->db->query($sql13,array($bln,$thn,$kd_puskes));
    foreach ($query13->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C46",$row2['jml_mix']);
        $this->excel->getActiveSheet()->setCellValue("D46",$row2['jml_mi_prx']);

        $this->excel->getActiveSheet()->setCellValue("C47",$row2['jml_mtsx']);
        $this->excel->getActiveSheet()->setCellValue("D47",$row2['jml_mts_prx']);
        
        $this->excel->getActiveSheet()->setCellValue("C48",$row2['jml_smax']);
        $this->excel->getActiveSheet()->setCellValue("D48",$row2['jml_sma_prx']);

        $this->excel->getActiveSheet()->setCellValue("C49",$row2['jml_keslinx']);
        $this->excel->getActiveSheet()->setCellValue("D49",$row2['jml_keslin_prx']);

        $this->excel->getActiveSheet()->setCellValue("C50",$row2['jml_mkeslinx']);
        $this->excel->getActiveSheet()->setCellValue("D50",$row2['jml_mkeslin_prx']);

        $this->excel->getActiveSheet()->setCellValue("C51",$row2['jml_uksx']);
        $this->excel->getActiveSheet()->setCellValue("D51",$row2['jml_uks_prx']);

        $this->excel->getActiveSheet()->setCellValue("C52",$row2['jml_konsx']);
        $this->excel->getActiveSheet()->setCellValue("D52",$row2['jml_kons_prx']);

        $this->excel->getActiveSheet()->setCellValue("C53",$row2['jml_tkx']);
        $this->excel->getActiveSheet()->setCellValue("D53",$row2['jml_tk_prx']);

    }   

    // akhir kesehatan sekolah

    // data dasar olahraga

    $sql14="SELECT 
    sum(`jml_klub`) as `jml_klubx`, 
    sum(`jml_pelkes`) as `jml_pelkesx`, 
    sum(`jml_klub_pr`) as `jml_klub_prx`, 
    sum(`jml_pelkes_pr`) as `jml_pelkes_prx`
    FROM `dt_olahraga` WHERE bln_olahraga=? and thn_olahraga=? and kd_puskes=?";

    $query14 = $this->db->query($sql14,array($bln,$thn,$kd_puskes));
    foreach ($query14->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C56",$row2['jml_klubx']);
        $this->excel->getActiveSheet()->setCellValue("D56",$row2['jml_klub_prx']);

        $this->excel->getActiveSheet()->setCellValue("C57",$row2['jml_pelkesx']);
        $this->excel->getActiveSheet()->setCellValue("D57",$row2['jml_pelkes_prx']);
        
    }   

    // akhir data dasar olahraga


    // data dasar kesehatan lingkungan

    $sql15="SELECT 
    sum(`jml_ari`) as `jml_arix`, 
    sum(`jml_air`) as `jml_airx`, 
    sum(`jml_sair`) as `jml_sairx`, 
    sum(`jml_sair2`) as `jml_sair2x`, 
    sum(`jml_sair3`) as `jml_sair3x`, 
    sum(`jml_kmakan`) as `jml_kmakanx`, 
    sum(`jml_tpm`) as `jml_tpmx`, 
    sum(`jml_periksa`) as `jml_periksax`, 
    sum(`jml_sani`) as `jml_sanix`, 
    sum(`jml_pesti`) as `jml_pestix`, 
    sum(`jml_tp2`) as `jml_tp2x`, 
    sum(`jml_ttu`) as `jml_ttux`, 
    sum(`jml_ttu2`) as `jml_ttu2x`, 
    sum(`jml_ari_pr`) as `jml_ari_pr`, 
    sum(`jml_air_pr`) as `jml_air_prx`, 
    sum(`jml_sair_pr`) as `jml_sair_prx`, 
    sum(`jml_sair2_pr`) as `jml_sair2_prx`, 
    sum(`jml_sair3_pr`) as `jml_sair3_prx`, 
    sum(`jml_kmakan_pr`) as `jml_kmakan_prx`, 
    sum(`jml_tpm_pr`) as `jml_tpm_prx`, 
    sum(`jml_periksa_pr`) as `jml_periksa_prx`, 
    sum(`jml_sani_pr`) as `jml_sani_prx`, 
    sum(`jml_pesti_pr`) as `jml_pesti_prx`, 
    sum(`jml_tp2_pr`) as `jml_tp2_prx`, 
    sum(`jml_ttu_pr`) as `jml_ttu_prx`, 
    sum(`jml_ttu2_pr`) as `jml_ttu2_prx`
    FROM `dt_kesling` WHERE bln_kesling=? and thn_kesling=? and kd_puskes=?";

    $query15 = $this->db->query($sql15,array($bln,$thn,$kd_puskes));
    foreach ($query15->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C64",$row2['jml_arix']);
        $this->excel->getActiveSheet()->setCellValue("D64",$row2['jml_ari_prx']);

        $this->excel->getActiveSheet()->setCellValue("C65",$row2['jml_airx']);
        $this->excel->getActiveSheet()->setCellValue("D65",$row2['jml_air_prx']);
        
        $this->excel->getActiveSheet()->setCellValue("C66",$row2['jml_sairx']);
        $this->excel->getActiveSheet()->setCellValue("D66",$row2['jml_sair_prx']);

        $this->excel->getActiveSheet()->setCellValue("C67",$row2['jml_sair2x']);
        $this->excel->getActiveSheet()->setCellValue("D67",$row2['jml_sair2_prx']);

        $this->excel->getActiveSheet()->setCellValue("C68",$row2['jml_sair3x']);
        $this->excel->getActiveSheet()->setCellValue("D68",$row2['jml_sair3_prx']);

        $this->excel->getActiveSheet()->setCellValue("C69",$row2['jml_kmakanx']);
        $this->excel->getActiveSheet()->setCellValue("D69",$row2['jml_kmakan_prx']);

        $this->excel->getActiveSheet()->setCellValue("C70",$row2['jml_tpmx']);
        $this->excel->getActiveSheet()->setCellValue("D70",$row2['jml_tpm_prx']);

        $this->excel->getActiveSheet()->setCellValue("C71",$row2['jml_periksax']);
        $this->excel->getActiveSheet()->setCellValue("D71",$row2['jml_periksa_prx']);

        $this->excel->getActiveSheet()->setCellValue("C72",$row2['jml_sanix']);
        $this->excel->getActiveSheet()->setCellValue("D72",$row2['jml_sani_prx']);

        $this->excel->getActiveSheet()->setCellValue("C73",$row2['jml_pestix']);
        $this->excel->getActiveSheet()->setCellValue("D73",$row2['jml_pesti_prx']);

        $this->excel->getActiveSheet()->setCellValue("C74",$row2['jml_tp2x']);
        $this->excel->getActiveSheet()->setCellValue("D74",$row2['jml_tp2_prx']);

        $this->excel->getActiveSheet()->setCellValue("C75",$row2['jml_ttux']);
        $this->excel->getActiveSheet()->setCellValue("D75",$row2['jml_ttu_prx']);

        $this->excel->getActiveSheet()->setCellValue("C76",$row2['jml_ttu2x']);
        $this->excel->getActiveSheet()->setCellValue("D76",$row2['jml_ttu2_prx']);


    }   

    // akhir data dasar kesehatan lingkungan

    // data dasar lab

    $sql16="SELECT
    sum(`jml_sdr`) as `jml_sdrx`, 
    sum(`jml_airsen`) as `jml_airsenx`, 
    sum(`jml_tinj`) as `jml_tinjx`, 
    sum(`jml_bt`) as `jml_btx`, 
    sum(`jml_bt2`) as `jml_bt2x`, 
    sum(`jml_drah_ml`) as `jml_drah_mlx`, 
    sum(`jml_drah_ml2`) as `jml_drah_ml2x`, 
    sum(`jml_drah_ml3`) as `jml_drah_ml3x`, 
    sum(`jml_kust`) as `jml_kustx`, 
    sum(`jml_kust2`) as `jml_kust2x`, 
    sum(`jml_lain`) as `jml_lainx`, 
    sum(`jml_sdr_pr`) as `jml_sdr_prx`, 
    sum(`jml_airsen_pr`) as `jml_airsen_prx`, 
    sum(`jml_tinj_pr`) as `jml_tinj_prx`, 
    sum(`jml_bt_pr`) as `jml_bt_prx`, 
    sum(`jml_bt2_pr`) as `jml_bt2_prx`, 
    sum(`jml_drah_ml_pr`) as `jml_drah_ml_prx`, 
    sum(`jml_drah_ml2_pr`) as `jml_drah_ml2_prx`, 
    sum(`jml_drah_ml3_pr`) as `jml_drah_ml3_prx`, 
    sum(`jml_kust_pr`) as `jml_kust_prx`, 
    sum(`jml_kust2_pr`) as `jml_kust2_prx`, 
    sum(`jml_lain_pr`) as `jml_lain_prx`
    FROM `dt_lab` WHERE bln_lab=? and thn_lab=? and kd_puskes=?";

    $query16 = $this->db->query($sql16,array($bln,$thn,$kd_puskes));
    foreach ($query16->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C79",$row2['jml_sdrx']);
        $this->excel->getActiveSheet()->setCellValue("D79",$row2['jml_sdr_prx']);

        $this->excel->getActiveSheet()->setCellValue("C80",$row2['jml_airsenx']);
        $this->excel->getActiveSheet()->setCellValue("D80",$row2['jml_airsen_prx']);
        
        $this->excel->getActiveSheet()->setCellValue("C81",$row2['jml_tinjx']);
        $this->excel->getActiveSheet()->setCellValue("D81",$row2['jml_tinj_prx']);

        $this->excel->getActiveSheet()->setCellValue("C82",$row2['jml_btx']);
        $this->excel->getActiveSheet()->setCellValue("D82",$row2['jml_bt_prx']);

        $this->excel->getActiveSheet()->setCellValue("C83",$row2['jml_bt2']);
        $this->excel->getActiveSheet()->setCellValue("D83",$row2['jml_bt2_prx']);

        $this->excel->getActiveSheet()->setCellValue("C84",$row2['jml_drah_mlx']);
        $this->excel->getActiveSheet()->setCellValue("D84",$row2['jml_drah_ml_prx']);

        $this->excel->getActiveSheet()->setCellValue("C85",$row2['jml_drah_ml2x']);
        $this->excel->getActiveSheet()->setCellValue("D85",$row2['jml_drah_ml2_prx']);

        $this->excel->getActiveSheet()->setCellValue("C86",$row2['jml_drah_ml3x']);
        $this->excel->getActiveSheet()->setCellValue("D86",$row2['jml_drah_ml3_prx']);

        $this->excel->getActiveSheet()->setCellValue("C87",$row2['jml_kustx']);
        $this->excel->getActiveSheet()->setCellValue("D87",$row2['jml_kust_prx']);

        $this->excel->getActiveSheet()->setCellValue("C88",$row2['jml_kust2x']);
        $this->excel->getActiveSheet()->setCellValue("D88",$row2['jml_kust2_prx']);

        $this->excel->getActiveSheet()->setCellValue("C89",$row2['jml_lainx']);
        $this->excel->getActiveSheet()->setCellValue("D89",$row2['jml_lain_prx']);

    }   

    // akhir data dasar lab

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(115);

        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(8);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(8);

            $filename='LB4.xlsx'; //save our workbook as this file name


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
// akhir export excel



}