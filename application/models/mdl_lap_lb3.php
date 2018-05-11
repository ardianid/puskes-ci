<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_lap_lb3 extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

function export_excel($bln,$thn,$kd_puskes){

	$this->load->library('Excel');

    $this->excel->setActiveSheetIndex(0);
        
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('LB3');

    $styleArray = array(
                'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    ),
    );

    $this->excel->getActiveSheet()->setCellValue('B2',"LB 3"); 

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

    $this->excel->getActiveSheet()->setCellValue('A6',"I."); 
    $this->excel->getActiveSheet()->getStyle('A6')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B6',"GIZI"); 
    $this->excel->getActiveSheet()->getStyle('B6')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B6")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C6:D6")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A7',"1"); 
    $this->excel->getActiveSheet()->getStyle("A7")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B7',"Jml bayi (6 - 11) bulan dapat vitamin A (100.000 SI)"); 
    $this->excel->getActiveSheet()->getStyle("B7")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->getStyle("C7")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D7")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A8',"2"); 
    $this->excel->getActiveSheet()->getStyle("A8")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B8',"Jml anak balita dapat vitamin A dosis tinggi (200.000 SI)"); 
    $this->excel->getActiveSheet()->getStyle("B8")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C8")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D8")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A9',"3"); 
    $this->excel->getActiveSheet()->getStyle("A9")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B9',"Jml ibu nifas dapat vitamin A dosis tinggi"); 
    $this->excel->getActiveSheet()->getStyle("B9")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C9")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D9")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A10',"4"); 
    $this->excel->getActiveSheet()->getStyle("A10")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B10',"Jml ibu hamil dapat tablet tambah darah (Fe) 30 tablet (Fe1)"); 	
    $this->excel->getActiveSheet()->getStyle("B10")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C10")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D10")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A11',"5"); 
    $this->excel->getActiveSheet()->getStyle("A11")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B11',"Jml ibu hamil dapat tablet tambah darah (Fe) 90 tablet (Fe3)"); 	
    $this->excel->getActiveSheet()->getStyle("B11")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C11")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D11")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A12',"6"); 
    $this->excel->getActiveSheet()->getStyle("A12")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B12',"Jml balita dapat syrup tambah darah (Fe) botol I 150 cc (Febal1)"); 	
    $this->excel->getActiveSheet()->getStyle("B12")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C12")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D12")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A13',"7"); 
    $this->excel->getActiveSheet()->getStyle("A13")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B13',"Jml balita dapat sirup tambah darah [Fe] botol II 300 cc [Febal2]"); 	
    $this->excel->getActiveSheet()->getStyle("B13")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C13")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D13")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A14',"8"); 
    $this->excel->getActiveSheet()->getStyle("A14")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B14',"Jml bayi [ <1 tahun] ditimbang"); 	
    $this->excel->getActiveSheet()->getStyle("B14")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C14")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D14")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A15',"9"); 
    $this->excel->getActiveSheet()->getStyle("A15")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B15',"Jml anak balita [1-4 tahun] ditimbang"); 	
    $this->excel->getActiveSheet()->getStyle("B15")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C15")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D15")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A16',"10"); 
    $this->excel->getActiveSheet()->getStyle("A16")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B16',"Jml bayi dan anak balita dengan Berat Badan di Bawah Garis Merah [BGM]"); 	
    $this->excel->getActiveSheet()->getStyle("B16")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C16")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D16")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A17',"11"); 
    $this->excel->getActiveSheet()->getStyle("A17")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B17',"Jml anak SD kelas 1-6 yang mendapat kapsul yodium"); 	
    $this->excel->getActiveSheet()->getStyle("B17")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C17")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D17")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A18',"12"); 
    $this->excel->getActiveSheet()->getStyle("A18")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B18',"Jml WUS (15-49 th) yang mendpat kapsul yodium"); 	
    $this->excel->getActiveSheet()->getStyle("B18")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C18")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D18")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A19',"13"); 
    $this->excel->getActiveSheet()->getStyle("A19")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B19',"Jml bumil mendpat kapsul yodium"); 	
    $this->excel->getActiveSheet()->getStyle("B19")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C19")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D19")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A20',"14"); 
    $this->excel->getActiveSheet()->getStyle("A20")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B20',"Jml buteki lainnya mendpat kapsul yodium"); 	
    $this->excel->getActiveSheet()->getStyle("B20")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C20")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D20")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A21',"15"); 
    $this->excel->getActiveSheet()->getStyle("A21")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B21',"Jml WUS baru (15-45 th) yang diukur LILA (Lingkar Lengan Atas)"); 	
    $this->excel->getActiveSheet()->getStyle("B21")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C21")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D21")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('A22',"16"); 
    $this->excel->getActiveSheet()->getStyle("A22")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->setCellValue('B22',"Jml WUS baru dengan LILA < 23,5 cm."); 	
    $this->excel->getActiveSheet()->getStyle("B22")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C22")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D22")->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->getStyle('A7:A22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->getStyle("A23:D23")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A24',"II"); 
    $this->excel->getActiveSheet()->getStyle('A24')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A24")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle('A24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('B24',"KIA"); 
    $this->excel->getActiveSheet()->getStyle('B24')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B24")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C24:D24")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A25',"1"); 
    $this->excel->getActiveSheet()->getStyle("A25")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B25',"Jml Kunjungan K1 Ibu Hamil");  
    $this->excel->getActiveSheet()->getStyle("B25")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C25")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D25")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A26',"2"); 
    $this->excel->getActiveSheet()->getStyle("A26")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B26',"Jml Kunjungan K4 Ibu Hamil");  
    $this->excel->getActiveSheet()->getStyle("B26")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C26")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D26")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A27',"3"); 
    $this->excel->getActiveSheet()->getStyle("A27")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B27',"Jml Kunjungan Ibu hamil dengan faktor risiko (umur < 20 th > 35 th, ");  
    $this->excel->getActiveSheet()->getStyle("B27")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C27")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D27")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A28',"4"); 
    $this->excel->getActiveSheet()->getStyle("A28")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B28',"Jml bumil risiko tinggi (perdarahan, infeksi, abortus, keracunan, kehamilan partus lama), yang ditangani.");  
    $this->excel->getActiveSheet()->getStyle("B28")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C28")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D28")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A29',"5"); 
    $this->excel->getActiveSheet()->getStyle("A29")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B29',"Jml bumil risiko tinggi (perdarahan, infeksi, abortus, keracunan, kehamilan partus lama), yang di rujuk ke RS.");  
    $this->excel->getActiveSheet()->getStyle("B29")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C29")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D29")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A30',"6"); 
    $this->excel->getActiveSheet()->getStyle("A30")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B30',"Jml persalinan oleh tenaga, termasuk didampingi tenaga kesehatan");  
    $this->excel->getActiveSheet()->getStyle("B30")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C30")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D30")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A31',"7"); 
    $this->excel->getActiveSheet()->getStyle("A31")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B31',"Jml bayi lahir hidup dengan BBLR (Berat Badan Bayi Lahir Rendah) < 2500 gram");  
    $this->excel->getActiveSheet()->getStyle("B31")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C31")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D31")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A32',"8"); 
    $this->excel->getActiveSheet()->getStyle("A32")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B32',"Jml lahir mati");  
    $this->excel->getActiveSheet()->getStyle("B32")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C32")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D32")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A33',"9"); 
    $this->excel->getActiveSheet()->getStyle("A33")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B33',"Jml kunjungan Neonatus");  
    $this->excel->getActiveSheet()->getStyle("B33")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C33")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D33")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A34',"10"); 
    $this->excel->getActiveSheet()->getStyle("A34")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B34',"Jml Neonatus Risti (asfiksia, trauma lahir, tetanus neonatorum), dirujuk ke RS");  
    $this->excel->getActiveSheet()->getStyle("B34")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C34")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D34")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A35',"11"); 
    $this->excel->getActiveSheet()->getStyle("A35")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B35',"Jml kematian Neonatus dilaporkan (bayi usia dibawah 28 hari)");  
    $this->excel->getActiveSheet()->getStyle("A35")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C35")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D35")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A36',"12"); 
    $this->excel->getActiveSheet()->getStyle("A36")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B36',"Jml kematian Maternal dilaporkan (ibu hamil/melahirkan/nifas)");  
    $this->excel->getActiveSheet()->getStyle("B36")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C36")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D36")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A37',"13"); 
    $this->excel->getActiveSheet()->getStyle("A37")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B37',"Jml balita dideteksi/stimulasi tumbuh kembang (kontak pertama)");  
    $this->excel->getActiveSheet()->getStyle("B37")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C37")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D37")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A38',"14"); 
    $this->excel->getActiveSheet()->getStyle("A38")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B38',"Jml anak pra sekolah dideteksi/stimulasi tumbuh kembang (kontak pertama)");      
    $this->excel->getActiveSheet()->getStyle("B38")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C38")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D38")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('A25:A38')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->getStyle("A39:D39")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A40',"I"); 
    $this->excel->getActiveSheet()->getStyle('A40')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A40")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle('A40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('B40',"IMUNISASI"); 
    $this->excel->getActiveSheet()->getStyle('B40')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B40")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("C40:D40")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A41',"1"); 
    $this->excel->getActiveSheet()->getStyle("A41")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B41',"Jml. Bayi 9 - 11 bln, divaksinasi campak");      
    $this->excel->getActiveSheet()->getStyle("B41")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C41")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D41")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A42',"2"); 
    $this->excel->getActiveSheet()->getStyle("A42")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B42',"Jml. Bayi 2-11 bln, divaksinasi DPT I");      
    $this->excel->getActiveSheet()->getStyle("B42")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C42")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D42")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A43',"3"); 
    $this->excel->getActiveSheet()->getStyle("A43")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B43',"Jml. Bayi 0-11 bln, divaksinasi Hepatitis B1");      
    $this->excel->getActiveSheet()->getStyle("B43")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C43")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D43")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A44',"4"); 
    $this->excel->getActiveSheet()->getStyle("A44")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B44',"Jml. Bayi 0-11 bln, divaksinasi Hepatitis B3");      
    $this->excel->getActiveSheet()->getStyle("B44")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C44")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D44")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A45',"5"); 
    $this->excel->getActiveSheet()->getStyle("A45")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B45',"Jml. Ibu hamil divaksinasi TT I");      
    $this->excel->getActiveSheet()->getStyle("B45")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C45")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D45")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A46',"6"); 
    $this->excel->getActiveSheet()->getStyle("A46")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B46',"Jml. Ibu hamil divaksinasi TT II");      
    $this->excel->getActiveSheet()->getStyle("B46")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C46")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D46")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A47',"7"); 
    $this->excel->getActiveSheet()->getStyle("A47")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B47',"Jml. Ibu hamil divaksinasi TT boster");      
    $this->excel->getActiveSheet()->getStyle("B47")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C47")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D47")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A48',"8"); 
    $this->excel->getActiveSheet()->getStyle("A48")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B48',"Jml. Wanita Usia Subur/calon pengantin (WUS), divaksinasi TT I");      
    $this->excel->getActiveSheet()->getStyle("B48")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C48")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D48")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A49',"9"); 
    $this->excel->getActiveSheet()->getStyle("A49")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B49',"Jml. Murid SD kelas I, divaksinasi DT I");      
    $this->excel->getActiveSheet()->getStyle("A49")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C49")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D49")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A50',"10"); 
    $this->excel->getActiveSheet()->getStyle("A50")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B50',"Jml. Murid SD kelas I, divaksinasi DT II");      
    $this->excel->getActiveSheet()->getStyle("B50")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C50")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D50")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A51',"11"); 
    $this->excel->getActiveSheet()->getStyle("A51")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B51',"Jml. Murid wanita SD kelas VI, divaksinasi TT I");      
    $this->excel->getActiveSheet()->getStyle("B51")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C51")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D51")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A52',"12"); 
    $this->excel->getActiveSheet()->getStyle("A52")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B52',"Jml. Murid wanita SD kelas VI, divaksinasi TT II");      
    $this->excel->getActiveSheet()->getStyle("B52")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C52")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D52")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('A41:A52')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->getStyle("A53:D53")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A54',"II"); 
    $this->excel->getActiveSheet()->getStyle('A54')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A54")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle('A54')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('B54',"PENGAMATAN PENYAKIT MENULAR"); 
    $this->excel->getActiveSheet()->getStyle('B54')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B54")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C54:D54")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A55',"A"); 
    $this->excel->getActiveSheet()->getStyle('A55')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A55")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B55',"ACUTE FLACCID PARALYSIS (AFP)");          
    $this->excel->getActiveSheet()->getStyle('B55')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B55")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C55")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D55")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A56',"1"); 
    $this->excel->getActiveSheet()->getStyle("A56")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B56',"Jumlah kasus AFP baru (0-15 tahun) ditemukan");          
    $this->excel->getActiveSheet()->getStyle("B56")->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->getStyle("C56")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D56")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A57',"2"); 
    $this->excel->getActiveSheet()->getStyle("A57")->applyFromArray($styleArray);


    $this->excel->getActiveSheet()->setCellValue('B57',"Jumlah kasus AFP (0-15 tahun) dilacak");          
    $this->excel->getActiveSheet()->getStyle("B57")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C57")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D57")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A58:D58")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A59',"B"); 
    $this->excel->getActiveSheet()->getStyle('A59')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A59")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B59',"TETANUS NEONATORUM");          
    $this->excel->getActiveSheet()->getStyle('B59')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B59")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C59")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D59")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A60',"1"); 
    $this->excel->getActiveSheet()->getStyle("A60")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B60',"Jumlah kasus tetanus neonatorum ditemukan");          
    $this->excel->getActiveSheet()->getStyle("B60")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C60")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D60")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A61',"2"); 
    $this->excel->getActiveSheet()->getStyle("A61")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B61',"Jumlah kasus tetanus neonatorum dilacak");          
    $this->excel->getActiveSheet()->getStyle("B61")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C61")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D61")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A62:D62")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A63',"C"); 
    $this->excel->getActiveSheet()->getStyle('A63')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A63")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B63',"MALARIA");          
    $this->excel->getActiveSheet()->getStyle('B63')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B63")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C63")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D63")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A64',"1"); 
    $this->excel->getActiveSheet()->getStyle("A64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B64',"Jumlah penderita malaria berat dan komplikasi");          
    $this->excel->getActiveSheet()->getStyle("B64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C64")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D64")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A65',"2"); 
    $this->excel->getActiveSheet()->getStyle("A65")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B65',"Jumlah Bumil yang memperoleh pengobatan profilaksis/pendegahan");          
    $this->excel->getActiveSheet()->getStyle("B65")->applyFromArray($styleArray);
    
    $this->excel->getActiveSheet()->getStyle("C65")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D65")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A66',"3"); 
    $this->excel->getActiveSheet()->getStyle("A66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B66',"Jumlah rumah yang disemprot");          
    $this->excel->getActiveSheet()->getStyle("B66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C66")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D66")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A67:D67")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A68',"D"); 
    $this->excel->getActiveSheet()->getStyle('A68')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B68',"DBD (Demam Berdarah)");          
    $this->excel->getActiveSheet()->getStyle('B68')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C68")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D68")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A69',"1"); 
    $this->excel->getActiveSheet()->getStyle("A69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B69',"Jumlah pelacakan penderita demam berdarah");          
    $this->excel->getActiveSheet()->getStyle("B69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C69")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D69")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A70',"2"); 
    $this->excel->getActiveSheet()->getStyle("A70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B70',"Jumlah fogging fokus");          
    $this->excel->getActiveSheet()->getStyle("B70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C70")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D70")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A71',"3"); 
    $this->excel->getActiveSheet()->getStyle("A71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B71',"Jumlah desa/kelurahan diabatisasi selektif");          
    $this->excel->getActiveSheet()->getStyle("B71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C71")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D71")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A72',"4"); 
    $this->excel->getActiveSheet()->getStyle("A72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B72',"Jumlah desa/kelurahan dilakukan PSN");          
    $this->excel->getActiveSheet()->getStyle("B72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C72")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D72")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A73',"5"); 
    $this->excel->getActiveSheet()->getStyle("A73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B73',"Jumlah rumah dilakukan pemeriksaan jentik");          
    $this->excel->getActiveSheet()->getStyle("B73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C73")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D73")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A74',"6"); 
    $this->excel->getActiveSheet()->getStyle("A74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B74',"Jumlah rumah yang ada jentik");          
    $this->excel->getActiveSheet()->getStyle("B74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C74")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D74")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A75:D75")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A76',"E"); 
    $this->excel->getActiveSheet()->getStyle('A76')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B76',"RABIES");              
    $this->excel->getActiveSheet()->getStyle('B76')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C76")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D76")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A77',"1"); 
    $this->excel->getActiveSheet()->getStyle("A77")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B77',"Jumlah penderita digigit oleh hewan penular rabies");          
    $this->excel->getActiveSheet()->getStyle("B77")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C77")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D77")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A78',"2"); 
    $this->excel->getActiveSheet()->getStyle("A78")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B78',"Jumlah penderita gigitan yang di VAR dan VAR + serum anti rabies (SAR)");          
    $this->excel->getActiveSheet()->getStyle("B78")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C78")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D78")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A79:D79")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A80',"F"); 
    $this->excel->getActiveSheet()->getStyle('A80')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B80',"FILARIA");              
    $this->excel->getActiveSheet()->getStyle('B80')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C80")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D80")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A81',"1"); 
    $this->excel->getActiveSheet()->getStyle("A81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B81',"Jumlah desa endemis");              
    $this->excel->getActiveSheet()->getStyle("B81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C81")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D81")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A82',"2"); 
    $this->excel->getActiveSheet()->getStyle("A82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B82',"Jumlah desa dengan cakupan pengobatan massal > 80%");              
    $this->excel->getActiveSheet()->getStyle("B82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C82")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D82")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A83:D83")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A84',"G"); 
    $this->excel->getActiveSheet()->getStyle('A84')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B84',"PENYAKIT ZOONOSIS LAIN  ANTRAKS");              
    $this->excel->getActiveSheet()->getStyle('B84')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C84")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D84")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A85',"1"); 
    $this->excel->getActiveSheet()->getStyle("A85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B85',"Jumlah yang diobati");              
    $this->excel->getActiveSheet()->getStyle("B85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C85")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D85")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A86:D86")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A87',"H"); 
    $this->excel->getActiveSheet()->getStyle('A87')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B87',"FRAMBUSIA");                  
    $this->excel->getActiveSheet()->getStyle('B87')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C87")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D87")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A88',"1"); 
    $this->excel->getActiveSheet()->getStyle("A88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B88',"Jumlah penduduk 0-14 th yang diperiksa untuk frambusia");                  
    $this->excel->getActiveSheet()->getStyle("B88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C88")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D88")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A89',"2"); 
    $this->excel->getActiveSheet()->getStyle("A89")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B89',"Jumlah penderita frambusia yang ditemukan");                  
    $this->excel->getActiveSheet()->getStyle("B89")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C89")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D89")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A90',"3"); 
    $this->excel->getActiveSheet()->getStyle("A90")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B90',"Jumlah penderita/kontak penderita yang diobati");                  
    $this->excel->getActiveSheet()->getStyle("B90")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C90")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D90")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A91:D91")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A92',"I"); 
    $this->excel->getActiveSheet()->getStyle('A92')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A92")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B92',"DIARE");                  
    $this->excel->getActiveSheet()->getStyle('B92')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B92")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C92")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D92")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A93',"1"); 
    $this->excel->getActiveSheet()->getStyle("A93")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B93',"Jumlah penderita diare (tmsk. Tersangka kolera & disentri) dpt. oralit");                  
    $this->excel->getActiveSheet()->getStyle("B93")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C93")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D93")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A94',"2"); 
    $this->excel->getActiveSheet()->getStyle("A94")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B94',"Jumlah penderita diare (tmsk. Tersangka kolera & disentri) dpt. Infus");                  
    $this->excel->getActiveSheet()->getStyle("B94")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C94")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D94")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A95',"3"); 
    $this->excel->getActiveSheet()->getStyle("A95")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B95',"Jumlah penderita diare (tmsk. Tersangka kolera & disentri) dpt antibiotik");                  
    $this->excel->getActiveSheet()->getStyle("B95")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C95")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D95")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A96:D96")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A97',"J"); 
    $this->excel->getActiveSheet()->getStyle('A97')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A97")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B97',"ISPA");                      
    $this->excel->getActiveSheet()->getStyle('B97')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B97")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C97")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D97")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A98',"1"); 
    $this->excel->getActiveSheet()->getStyle("A98")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B98',"Jumlah penderita pneumonia balita dirujuk kader");                      
    $this->excel->getActiveSheet()->getStyle("B98")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C98")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D98")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A99:D99")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A100',"K"); 
    $this->excel->getActiveSheet()->getStyle('A100')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A100")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B100',"TB PARU");                      
    $this->excel->getActiveSheet()->getStyle('B100')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("B100")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C100")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D100")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A101',"1"); 
    $this->excel->getActiveSheet()->getStyle("A101")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B101',"Jumlah penderita BTA + baru diobati");                          
    $this->excel->getActiveSheet()->getStyle("AB101")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C101")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D101")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A102',"2"); 
    $this->excel->getActiveSheet()->getStyle("A102")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B102',"Jumlah penderita BTA - dan dg. Ronsen +  diobati");                              
    $this->excel->getActiveSheet()->getStyle("B102")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C102")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D102")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A103',"3"); 
    $this->excel->getActiveSheet()->getStyle("A102")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B103',"Jumlah penderita mengikuti pengobatan lengkap");                              
    $this->excel->getActiveSheet()->getStyle("B103")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C103")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D103")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A104',"4"); 
    $this->excel->getActiveSheet()->getStyle("A104")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B104',"Jumlah penderita TB Paru yang sembuh");                              
    $this->excel->getActiveSheet()->getStyle("B104")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C104")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D104")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A105',"5"); 
    $this->excel->getActiveSheet()->getStyle("A105")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B105',"Jumlah penderita kambuh");                              
    $this->excel->getActiveSheet()->getStyle("B105")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C105")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D105")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("A106:D106")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A107',"L"); 
    $this->excel->getActiveSheet()->getStyle('A107')->getfont()->setbold(true);
    $this->excel->getActiveSheet()->getStyle("A107")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B107',"KUSTA");  
    $this->excel->getActiveSheet()->getStyle('B107')->getfont()->setbold(true);                            
    $this->excel->getActiveSheet()->getStyle("B107")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C107")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D107")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A108',"1"); 
    $this->excel->getActiveSheet()->getStyle("A108")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B108',"Jumlah penderita terdaftar (PB/PAUSIBASILER+MB/MULTIBASILER)");                              
    $this->excel->getActiveSheet()->getStyle("B108")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C108")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D108")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A109',"2"); 
    $this->excel->getActiveSheet()->getStyle("A109")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B109',"Jumlah penderta baru yang ditemukan");                              
    $this->excel->getActiveSheet()->getStyle("B109")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C109")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D109")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A110',"3"); 
    $this->excel->getActiveSheet()->getStyle("A110")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B110',"Jumlah penderita MB diantara kasus baru");                              
    $this->excel->getActiveSheet()->getStyle("B110")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C110")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D110")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A111',"4"); 
    $this->excel->getActiveSheet()->getStyle("A111")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B111',"Jumlah penderita baru menurut cacat tk. II");                              
    $this->excel->getActiveSheet()->getStyle("B111")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C111")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D111")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A112',"5"); 
    $this->excel->getActiveSheet()->getStyle("A112")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B112',"Jumlah penderita MB yang dpt. pengobatan MDT/MULTI DRUG TREATMENT)");                              
    $this->excel->getActiveSheet()->getStyle("B112")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C112")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D112")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A113',"6"); 
    $this->excel->getActiveSheet()->getStyle("A113")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B113',"Jumlah penderita PB yang dpt pengobatan MDT");                              
    $this->excel->getActiveSheet()->getStyle("B113")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C113")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D113")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A114',"7"); 
    $this->excel->getActiveSheet()->getStyle("A114")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B114',"Jumlah penderita MB yg dpt MDT komplit (RFT/RELEASE FROM TREATMENT)");                              
    $this->excel->getActiveSheet()->getStyle("B114")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C114")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D114")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('A115',"8"); 
    $this->excel->getActiveSheet()->getStyle("A115")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B115',"Jumlah penderita PB yg dpt MDT komlit (RFT)");                              
    $this->excel->getActiveSheet()->getStyle("B115")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle("C115")->applyFromArray($styleArray);
    $this->excel->getActiveSheet()->getStyle("D115")->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('A55:A115')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $sql="select sum(`jml_bayi_vit`) as `jml_bayi_vith`,
    sum(`jml_balita_200`) as `jml_balita_200h`, 
    sum(`jml_ibu_nifas`) as `jml_ibu_nifash`, 
    sum(`jml_ibu_hml_f1`) as `jml_ibu_hml_f1h`, 
    sum(`jml_ibu_hml_f3`) as `jml_ibu_hml_f3h`, 
    sum(`jml_balita_febal1`) as `jml_balita_febal1h`, 
    sum(`jml_balita_febal2`) as `jml_balita_febal2h`, 
    sum(`jml_bayi1_timbang`) as `jml_bayi1_timbangh`, 
    sum(`jml_balita14_timbang`) as `jml_balita14_timbangh`, 
    sum(`jml_bayi_bawah`) as `jml_bayi_bawahh`, 
    sum(`jml_sd16_yodium`) as `jml_sd16_yodiumh`, 
    sum(`jml_wus_yodium`) as `jml_wus_yodiumh`, 
    sum(`jml_bumil_yodium`) as `jml_bumil_yodiumh`, 
    sum(`jml_buteki_yodium`) as `jml_buteki_yodiumh`, 
    sum(`jml_wus1445_lila`) as `jml_wus1445_lilah`, 
    sum(`jml_wus23_lila`) as `jml_wus23_lilah`, 
    sum(`jml_bayi_vit_pr`) as `jml_bayi_vit_prh`, 
    sum(`jml_balita_200_pr`) as `jml_balita_200_prh`, 
    sum(`jml_ibu_nifas_pr`) as `jml_ibu_nifas_prh`, 
    sum(`jml_ibu_hml_f1_pr`) as `jml_ibu_hml_f1_prh`, 
    sum(`jml_ibu_hml_f3_pr`) as `jml_ibu_hml_f3_prh`, 
    sum(`jml_balita_febal1_pr`) as `jml_balita_febal1_prh`, 
    sum(`jml_balita_febal2_pr`) as `jml_balita_febal2_prh`, 
    sum(`jml_bayi1_timbang_pr`) as `jml_bayi1_timbang_prh`, 
    sum(`jml_balita14_timbang_pr`) as `jml_balita14_timbang_prh`, 
    sum(`jml_bayi_bawah_pr`) as `jml_bayi_bawah_prh`, 
    sum(`jml_sd16_yodium_pr`) as `jml_sd16_yodium_prh`, 
    sum(`jml_wus_yodium_pr`) as `jml_wus_yodium_prh`, 
    sum(`jml_bumil_yodium_pr`) as `jml_bumil_yodium_prh`, 
    sum(`jml_buteki_yodium_pr`) as `jml_buteki_yodium_prh`, 
    sum(`jml_wus1445_lila_pr`) as `jml_wus1445_lila_prh`, 
    sum(`jml_wus23_lila_pr`) as `jml_wus23_lila_prh` from dt_gizi where bln_gizi=? and thn_gizi=? and kd_puskes=?";
    $query = $this->db->query($sql,array($bln,$thn,$kd_puskes));
    foreach ($query->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C7",$row2['jml_bayi_vith']);
        $this->excel->getActiveSheet()->setCellValue("D7",$row2['jml_bayi_vit_prh']);
        
        $this->excel->getActiveSheet()->setCellValue("C8",$row2['jml_balita_200h']);
        $this->excel->getActiveSheet()->setCellValue("D8",$row2['jml_balita_200_prh']);

        $this->excel->getActiveSheet()->setCellValue("C9",$row2['jml_ibu_nifash']);
        $this->excel->getActiveSheet()->setCellValue("D9",$row2['jml_ibu_nifas_prh']);

        $this->excel->getActiveSheet()->setCellValue("C10",$row2['jml_ibu_hml_f1h']);
        $this->excel->getActiveSheet()->setCellValue("D10",$row2['jml_ibu_hml_f1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C11",$row2['jml_ibu_hml_f3h']);
        $this->excel->getActiveSheet()->setCellValue("D11",$row2['jml_ibu_hml_f3_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C12",$row2['jml_balita_febal1h']);
        $this->excel->getActiveSheet()->setCellValue("D12",$row2['jml_balita_febal1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C13",$row2['jml_balita_febal2h']);
        $this->excel->getActiveSheet()->setCellValue("D13",$row2['jml_balita_febal2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C14",$row2['jml_bayi1_timbangh']);
        $this->excel->getActiveSheet()->setCellValue("D14",$row2['jml_bayi1_timbang_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C15",$row2['jml_bayi14_timbangh']);
        $this->excel->getActiveSheet()->setCellValue("D15",$row2['jml_bayi14_timbang_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C16",$row2['jml_bayi_bawahh']);
        $this->excel->getActiveSheet()->setCellValue("D16",$row2['jml_bayi_bawah_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C17",$row2['jml_sd16_yodiumh']);
        $this->excel->getActiveSheet()->setCellValue("D17",$row2['jml_sd16_yodium_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C18",$row2['jml_wus_yodiumh']);
        $this->excel->getActiveSheet()->setCellValue("D18",$row2['jml_wus_yodium_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C19",$row2['jml_bumil_yodiumh']);
        $this->excel->getActiveSheet()->setCellValue("D19",$row2['jml_bumil_yodium_prh']);
        
        
        $this->excel->getActiveSheet()->setCellValue("C20",$row2['jml_buteki_yodiumh']);
        $this->excel->getActiveSheet()->setCellValue("D20",$row2['jml_buteki_yodium_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C21",$row2['jml_wus1445_lilah']);
        $this->excel->getActiveSheet()->setCellValue("D21",$row2['jml_wus1445_lila_prh']);
        
        
        $this->excel->getActiveSheet()->setCellValue("C22",$row2['jml_wus23_lilah']);
        $this->excel->getActiveSheet()->setCellValue("D22",$row2['jml_wus23_lila_prh']);
        


    }

    $sql2="select sum(`hml_k1`) as `hml_k1h`, 
    sum(`hml_k4`) as `hml_k4h`, 
    sum(`hml_fresiko`) as `hml_fresikoh`, 
    sum(`hml_tgi`) as `hml_tgih`, 
    sum(`hml_tgi_rjuk`) as `hml_tgi_rjukh`, 
    sum(`salin_tng`) as `salin_tngh`, 
    sum(`lahir_hdp_bblr`) as `lahir_hdp_bblrh`, 
    sum(`lahir_mti`) as `lahir_mtih`, 
    sum(`jml_neo`) as `jml_neoh`, 
    sum(`jml_neo_risti`) as `jml_neo_ristih`, 
    sum(`jml_neo_mti`) as `jml_neo_mtih`, 
    sum(`jml_materi`) as `jml_materih`, 
    sum(`balita_stimul`) as `balita_stimulh`, 
    sum(`pra_sekolah`) as `pra_sekolahh`, 
    sum(`hml_k1_pr`) as `hml_k1_prh`, 
    sum(`hml_k4_pr`) as `hml_k4_prh`, 
    sum(`hml_fresiko_pr`) as `hml_fresiko_prh`, 
    sum(`hml_tgi_pr`) as `hml_tgi_prh`, 
    sum(`hml_tgi_rjuk_pr`) as `hml_tgi_rjuk_prh`,
    sum(`salin_tng_pr`) as `salin_tng_prh`, 
    sum(`lahir_hdp_bblr_pr`) as `lahir_hdp_bblr_prh`, 
    sum(`lahir_mti_pr`) as `lahir_mti_prh`, 
    sum(`jml_neo_pr`) as `jml_neo_prh`, 
    sum(`jml_neo_risti_pr`) as `jml_neo_risti_prh`, 
    sum(`jml_neo_mti_pr`) as `jml_neo_mti_prh`, 
    sum(`jml_materi_pr`) as `jml_materi_prh`, 
    sum(`balita_stimul_pr`) as `balita_stimul_prh`, 
    sum(`pra_sekolah_pr`) as `pra_sekolah_prh`
    from dt_kia where bln_kia=? and thn_kia=? and kd_puskes=?";

    $query2 = $this->db->query($sql2,array($bln,$thn,$kd_puskes));
    foreach ($query2->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C25",$row2['hml_k1h']);
        $this->excel->getActiveSheet()->setCellValue("D25",$row2['hml_k1_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C26",$row2['hml_k4h']);
        $this->excel->getActiveSheet()->setCellValue("D26",$row2['hml_k4_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C27",$row2['hml_fresikoh']);
        $this->excel->getActiveSheet()->setCellValue("D27",$row2['hml_fresiko_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C28",$row2['hml_tgih']);
        $this->excel->getActiveSheet()->setCellValue("D28",$row2['hml_tgi_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C29",$row2['hml_tgi_rjukh']);
        $this->excel->getActiveSheet()->setCellValue("D29",$row2['hml_tgi_rjuk_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C30",$row2['salin_tngh']);
        $this->excel->getActiveSheet()->setCellValue("D30",$row2['salin_tng_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C31",$row2['lahir_hdp_bblrh']);
        $this->excel->getActiveSheet()->setCellValue("D31",$row2['lahir_hdp_bblr_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C32",$row2['lahir_mtih']);
        $this->excel->getActiveSheet()->setCellValue("D32",$row2['lahir_mti_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C33",$row2['jml_neoh']);
        $this->excel->getActiveSheet()->setCellValue("D33",$row2['jml_neo_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C34",$row2['jml_neo_ristih']);
        $this->excel->getActiveSheet()->setCellValue("D34",$row2['jml_neo_risti_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C35",$row2['jml_neo_mtih']);
        $this->excel->getActiveSheet()->setCellValue("D35",$row2['jml_neo_mti_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C36",$row2['jml_materih']);
        $this->excel->getActiveSheet()->setCellValue("D36",$row2['jml_materi_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C37",$row2['balita_stimulh']);
        $this->excel->getActiveSheet()->setCellValue("D37",$row2['balita_stimul_prh']);
       

        $this->excel->getActiveSheet()->setCellValue("C38",$row2['pra_sekolahh']);
        $this->excel->getActiveSheet()->setCellValue("D38",$row2['pra_sekolah_prh']);
       


    }

    $sql3="select sum(`campak`) as `campakh`, 
    sum(`dpt1`) as `dpt1h`, 
    sum(`hep_b1`) as `hep_b1h`, 
    sum(`hep_b3`) as `hep_b3h`, 
    sum(`tt1_pr`) as `tt1_prh`, 
    sum(`tt2_pr`) as `tt2_prh`, 
    sum(`tt_bos_pr`) as `tt_bos_prh`, 
    sum(`wanita_tt1_pr`) as `wanita_tt1_prh`, 
    sum(`dt1`) as `dt1h`, 
    sum(`dt2`) as `dt2h`, 
    sum(`sd_tt1_pr`) as `sd_tt1_prh`, 
    sum(`sd_tt2_pr`) as `sd_tt2_prh`, 
    sum(`campak_pr`) as `campak_prh`, 
    sum(`dpt1_pr`) as `dpt1_prh`, 
    sum(`hep_b1_pr`) as `hep_b1_prh`, 
    sum(`hep_b3_pr`) as `hep_b3_prh`, 
    sum(`dt1_pr`) as `dt1_prh`, 
    sum(`dt2_pr`) as `dt2_prh`
    from dt_imunisasi where bln_imun=? and thn_imun=? and kd_puskes=?";

    $query3 = $this->db->query($sql3,array($bln,$thn,$kd_puskes));
    foreach ($query3->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C41",$row2['campakh']);
        $this->excel->getActiveSheet()->setCellValue("D41",$row2['campak_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C42",$row2['dpt1h']);
        $this->excel->getActiveSheet()->setCellValue("D42",$row2['dpt1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C43",$row2['hep_b1h']);
        $this->excel->getActiveSheet()->setCellValue("D43",$row2['hep_b1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C44",$row2['hep_b3h']);
        $this->excel->getActiveSheet()->setCellValue("D44",$row2['hep_b3_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("D45",$row2['tt1_prh']);
        $this->excel->getActiveSheet()->setCellValue("D46",$row2['tt2_prh']);
        $this->excel->getActiveSheet()->setCellValue("D47",$row2['tt_bos_pr']);
        $this->excel->getActiveSheet()->setCellValue("D48",$row2['wanita_tt1_pr']);

        $this->excel->getActiveSheet()->setCellValue("C49",$row2['dt1h']);
        $this->excel->getActiveSheet()->setCellValue("D49",$row2['dt1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C50",$row2['dt2h']);
        $this->excel->getActiveSheet()->setCellValue("D50",$row2['dt2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("D51",$row2['sd_tt1_pr']);
        $this->excel->getActiveSheet()->setCellValue("D52",$row2['sd_tt2_pr']);


    }


    $sql4 = "select 
    `a_afp1`    as  `a_afp1h`,
    `a_afp2`    as  `a_afp2h`,
    `b_tetanus1`    as  `b_tetanus1h`,
    `b_tetanus2`    as  `b_tetanus2h`,
    `c_komplikasi`  as  `c_komplikasih`,
    `c_semprot` as  `c_semproth`,
    `d_pdbd`    as  `d_pdbdh`,
    `d_foging`  as  `d_fogingh`,
    `d_diabit`  as  `d_diabith`,
    `d_psn` as  `d_psnh`,
    `d_jentik`  as  `d_jentikh`,
    `d_rjentik` as  `d_rjentikh`,
    `e_rabies`  as  `e_rabiesh`,
    `e_varsar`  as  `e_varsarh`,
    `f_endemis` as  `f_endemish`,
    `f_masal`   as  `f_masalh`,
    `g_zoon`    as  `g_zoonh`,
    `h_frambu1` as  `h_frambu1h`,
    `h_frambu2` as  `h_frambu2h`,
    `h_frambu3` as  `h_frambu3h`,
    `i_diare_oralit`    as  `i_diare_oralith`,
    `i_diare_infus` as  `i_diare_infush`,
    `i_diare_anti`  as  `i_diare_antih`,
    `j_ispa`    as  `j_ispah`,
    `k_bta1`    as  `k_bta1h`,
    `k_bta2`    as  `k_bta2h`,
    `k_lengkap` as  `k_lengkaph`,
    `k_sembuh`  as  `k_sembuhh`,
    `k_kambuh`  as  `k_kambuhh`,
    `l_pb1` as  `l_pb1h`,
    `l_baru`    as  `l_baruh`,
    `l_mb`  as  `l_mbh`,
    `l_cacat2`  as  `l_cacat2h`,
    `l_mdt` as  `l_mdth`,
    `l_pb2` as  `l_pb2h`,
    `l_mb_komplit`  as  `l_mb_komplith`,
    `l_pb_komplit`  as  `l_pb_komplith`,
    `a_afp1_pr` as  `a_afp1_prh`,
    `a_afp2_pr` as  `a_afp2_prh`,
    `b_tetanus1_pr` as  `b_tetanus1_prh`,
    `b_tetanus2_pr` as  `b_tetanus2_prh`,
    `c_komplikasi_pr`   as  `c_komplikasi_prh`,
    `c_bumil_pr`    as  `c_bumil_prh`,
    `c_semprot_pr`  as  `c_semprot_prh`,
    `d_pdbd_pr` as  `d_pdbd_prh`,
    `d_foging_pr`   as  `d_foging_prh`,
    `d_diabit_pr`   as  `d_diabit_prh`,
    `d_psn_pr`  as  `d_psn_prh`,
    `d_jentik_pr`   as  `d_jentik_prh`,
    `d_rjentik_pr`  as  `d_rjentik_prh`,
    `e_rabies_pr`   as  `e_rabies_prh`,
    `e_varsar_pr`   as  `e_varsar_prh`,
    `f_endemis_pr`  as  `f_endemis_prh`,
    `f_masal_pr`    as  `f_masal_prh`,
    `g_zoon_pr` as  `g_zoon_prh`,
    `h_frambu1_pr`  as  `h_frambu1_prh`,
    `h_frambu2_pr`  as  `h_frambu2_prh`,
    `h_frambu3_pr`  as  `h_frambu3_prh`,
    `i_diare_oralit_pr` as  `i_diare_oralit_prh`,
    `i_diare_infus_pr`  as  `i_diare_infus_prh`,
    `i_diare_anti_pr`   as  `i_diare_anti_prh`,
    `j_ispa_pr` as  `j_ispa_prh`,
    `k_bta1_pr` as  `k_bta1_prh`,
    `k_bta2_pr` as  `k_bta2_prh`,
    `k_lengkap_pr`  as  `k_lengkap_prh`,
    `k_sembuh_pr`   as  `k_sembuh_prh`,
    `k_kambuh_pr`   as  `k_kambuh_prh`,
    `l_pb1_pr`  as  `l_pb1_prh`,
    `l_baru_pr` as  `l_baru_prh`,
    `l_mb_pr`   as  `l_mb_prh`,
    `l_cacat2_pr`   as  `l_cacat2_prh`,
    `l_mdt_pr`  as  `l_mdt_prh`,
    `l_pb2_pr`  as  `l_pb2_prh`,
    `l_mb_komplit_pr`   as  `l_mb_komplit_prh`,
    `l_pb_komplit_pr`   as  `l_pb_komplit_prh`
    from dt_penyakitm where bln_penyakit=? and thn_penyakit=? and kd_puskes=?";

    $query4 = $this->db->query($sql4,array($bln,$thn,$kd_puskes));
    foreach ($query4->result_array() as $row2)    
    {

        $this->excel->getActiveSheet()->setCellValue("C56",$row2['a_afp1h']);
        $this->excel->getActiveSheet()->setCellValue("D56",$row2['a_afp1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C57",$row2['a_afp2h']);
        $this->excel->getActiveSheet()->setCellValue("D57",$row2['a_afp2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C60",$row2['b_tetanus1h']);
        $this->excel->getActiveSheet()->setCellValue("D60",$row2['b_tetanus1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C61",$row2['b_tetanus2h']);
        $this->excel->getActiveSheet()->setCellValue("D61",$row2['b_tetanus2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C64",$row2['c_komplikasih']);
        $this->excel->getActiveSheet()->setCellValue("D64",$row2['c_komplikasi_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("D65",$row2['c_bumil_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C66",$row2['c_semproth']);
        $this->excel->getActiveSheet()->setCellValue("D66",$row2['c_semprot_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C69",$row2['d_pdbdh']);
        $this->excel->getActiveSheet()->setCellValue("D69",$row2['d_pdbd_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C70",$row2['d_fogingh']);
        $this->excel->getActiveSheet()->setCellValue("D70",$row2['d_foging_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C71",$row2['d_diabith']);
        $this->excel->getActiveSheet()->setCellValue("D71",$row2['d_diabit_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C72",$row2['d_psnh']);
        $this->excel->getActiveSheet()->setCellValue("D72",$row2['d_psn_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C73",$row2['d_jentikh']);
        $this->excel->getActiveSheet()->setCellValue("D73",$row2['d_jentik_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C74",$row2['d_rjentikh']);
        $this->excel->getActiveSheet()->setCellValue("D74",$row2['d_rjentik_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C77",$row2['e_rabiesh']);
        $this->excel->getActiveSheet()->setCellValue("D77",$row2['e_rabies_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C78",$row2['e_varsarh']);
        $this->excel->getActiveSheet()->setCellValue("D78",$row2['e_varsar_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C81",$row2['f_endemish']);
        $this->excel->getActiveSheet()->setCellValue("D81",$row2['f_endemis_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C82",$row2['f_masalh']);
        $this->excel->getActiveSheet()->setCellValue("D82",$row2['f_masal_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C85",$row2['g_zoonh']);
        $this->excel->getActiveSheet()->setCellValue("D85",$row2['g_zoon_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C88",$row2['h_frambu1h']);
        $this->excel->getActiveSheet()->setCellValue("D88",$row2['h_frambu1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C89",$row2['h_frambu2h']);
        $this->excel->getActiveSheet()->setCellValue("D89",$row2['h_frambu2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C90",$row2['h_frambu3h']);
        $this->excel->getActiveSheet()->setCellValue("D90",$row2['h_frambu3_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C93",$row2['i_diare_oralith']);
        $this->excel->getActiveSheet()->setCellValue("D93",$row2['i_diare_oralit_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C94",$row2['i_diare_infush']);
        $this->excel->getActiveSheet()->setCellValue("D94",$row2['i_diare_infus_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C95",$row2['i_diare_antih']);
        $this->excel->getActiveSheet()->setCellValue("D95",$row2['i_diare_anti_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C98",$row2['j_ispah']);
        $this->excel->getActiveSheet()->setCellValue("D98",$row2['j_ispa_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C101",$row2['k_bta1h']);
        $this->excel->getActiveSheet()->setCellValue("D101",$row2['k_bta1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C102",$row2['k_bta2h']);
        $this->excel->getActiveSheet()->setCellValue("D102",$row2['k_bta2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C103",$row2['k_lengkaph']);
        $this->excel->getActiveSheet()->setCellValue("D103",$row2['k_lengkap_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C104",$row2['k_sembuhh']);
        $this->excel->getActiveSheet()->setCellValue("D104",$row2['k_sembuh_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C105",$row2['k_kambuhh']);
        $this->excel->getActiveSheet()->setCellValue("D105",$row2['k_kambuh_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C108",$row2['l_pb1h']);
        $this->excel->getActiveSheet()->setCellValue("D108",$row2['l_pb1_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C109",$row2['l_baruh']);
        $this->excel->getActiveSheet()->setCellValue("D109",$row2['l_baru_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C110",$row2['l_mbh']);
        $this->excel->getActiveSheet()->setCellValue("D110",$row2['l_mb_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C111",$row2['l_cacat2h']);
        $this->excel->getActiveSheet()->setCellValue("D111",$row2['l_cacat2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C112",$row2['l_mdth']);
        $this->excel->getActiveSheet()->setCellValue("D112",$row2['l_mdt_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C113",$row2['l_pb2h']);
        $this->excel->getActiveSheet()->setCellValue("D113",$row2['l_pb2_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C114",$row2['l_mb_komplith']);
        $this->excel->getActiveSheet()->setCellValue("D114",$row2['l_mb_komplit_prh']);
        

        $this->excel->getActiveSheet()->setCellValue("C115",$row2['l_pb_komplith']);
        $this->excel->getActiveSheet()->setCellValue("D115",$row2['l_pb_komplit_prh']);
        
           
    }

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(99);

        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(8);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(8);

            $filename='LB3.xlsx'; //save our workbook as this file name

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