<?php defined('BASEPATH') OR exit('No direct script access allowed');
class mdl_lap_lb1 extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function export_excel($bln,$thn,$kd_puskes){

    $this->load->library('Excel');

    $this->excel->setActiveSheetIndex(0);
        
    //name the worksheet
    $this->excel->getActiveSheet()->setTitle('LB1');

    $styleArray = array(
                'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    ),
    );

    $this->excel->getActiveSheet()->setCellValue('A1',"LAPORAN BULANAN DATA KESAKITAN"); 
    $this->excel->getActiveSheet()->mergeCells('A1:BB1');
    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('A3',"NO"); 
    $this->excel->getActiveSheet()->mergeCells('A3:A7');
	$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    
	$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);    
    $this->excel->getActiveSheet()->getStyle('A3:A7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('B3',"JENIS PENYAKIT"); 
	$this->excel->getActiveSheet()->mergeCells('B3:B7');
	$this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    
	$this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);        
    $this->excel->getActiveSheet()->getStyle('B3:B7')->applyFromArray($styleArray);


    $this->excel->getActiveSheet()->setCellValue('C3',"JUMLAH PENDERITA"); 
    $this->excel->getActiveSheet()->mergeCells('C3:BB4');
    $this->excel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);        
    $this->excel->getActiveSheet()->getStyle('C3:BB4')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C5',"0-7 HR"); 
    $this->excel->getActiveSheet()->mergeCells('C5:F5');
    $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C5:F5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C6',"LAMA"); 
	$this->excel->getActiveSheet()->mergeCells('C6:D6');
    $this->excel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C6:D6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('C7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('C7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('D7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('D7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('E6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('E6:F6');
    $this->excel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('E6:F6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('E7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('E7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('F7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('F7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('G5',"8-28 HR"); 
    $this->excel->getActiveSheet()->mergeCells('G5:J5');
    $this->excel->getActiveSheet()->getStyle('G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $this->excel->getActiveSheet()->getStyle('G5:J5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('G6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('G6:H6');
    $this->excel->getActiveSheet()->getStyle('G6:H6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('G7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('G7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('H7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('H7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('I6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('I6:J6');
    $this->excel->getActiveSheet()->getStyle('I6:J6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('I7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('I7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('J7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('J7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('G6:J7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $this->excel->getActiveSheet()->setCellValue('K5',"1BL<1TH"); 
    $this->excel->getActiveSheet()->mergeCells('K5:N5');
    $this->excel->getActiveSheet()->getStyle('K5:N5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('K6',"LAMA");
	$this->excel->getActiveSheet()->mergeCells('K6:L6');    
    $this->excel->getActiveSheet()->getStyle('K6:L6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('K7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('K7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('L7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('L7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('M6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('M6:N6');    
    $this->excel->getActiveSheet()->getStyle('M6:N6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('M7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('M7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('N7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('N7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('K5:N7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $this->excel->getActiveSheet()->setCellValue('O5',"1-4TH");
    $this->excel->getActiveSheet()->mergeCells('O5:R5');
    $this->excel->getActiveSheet()->getStyle('O5:R5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('O6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('O6:P6');
    $this->excel->getActiveSheet()->getStyle('O6:P6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('O7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('O7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('P7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('P7')->applyFromArray($styleArray);    

    $this->excel->getActiveSheet()->setCellValue('Q6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('Q6:R6');
    $this->excel->getActiveSheet()->getStyle('Q6:R6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('Q7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('Q7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('R7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('R7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('O5:R7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('S5',"5-9TH"); 
    $this->excel->getActiveSheet()->mergeCells('S5:V5');
    $this->excel->getActiveSheet()->getStyle('S5:V5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('S6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('S6:T6');
    $this->excel->getActiveSheet()->getStyle('S6:T6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('S7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('S7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('T7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('T7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('U6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('U6:V6');
    $this->excel->getActiveSheet()->getStyle('U6:V6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('U7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('U7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('V7',"PR");
    $this->excel->getActiveSheet()->getStyle('V7')->applyFromArray($styleArray);

	$this->excel->getActiveSheet()->getStyle('S5:V7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('W5',"10-14TH"); 
    $this->excel->getActiveSheet()->mergeCells('W5:Z5');
    $this->excel->getActiveSheet()->getStyle('W5:Z5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('W6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('W6:X6');
    $this->excel->getActiveSheet()->getStyle('W6:X6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('W7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('W7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('X7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('X7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('Y6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('Y6:Z6');
    $this->excel->getActiveSheet()->getStyle('Y6:Z6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('Y7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('Y7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('Z7',"PR");
    $this->excel->getActiveSheet()->getStyle('Z7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('W5:Z7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    
    $this->excel->getActiveSheet()->setCellValue('AA5',"15-19TH"); 
    $this->excel->getActiveSheet()->mergeCells('AA5:AD5');
    $this->excel->getActiveSheet()->getStyle('AA5:AD5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AA6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AA6:AB6');
    $this->excel->getActiveSheet()->getStyle('AA6:AB6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AA7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AA7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AB7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AB7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AC6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AC6:AD6');
    $this->excel->getActiveSheet()->getStyle('AC6:AD6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AC7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AC7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AD7',"PR");
    $this->excel->getActiveSheet()->getStyle('AD7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AA5:AD7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('AE5',"20-44TH"); 
    $this->excel->getActiveSheet()->mergeCells('AE5:AH5');
    $this->excel->getActiveSheet()->getStyle('AE5:AH5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AE6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AE6:AF6');
    $this->excel->getActiveSheet()->getStyle('AE6:AF6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AE7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AE7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AF7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AF7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AG6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AG6:AH6');
    $this->excel->getActiveSheet()->getStyle('AG6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AG7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AG7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AH7',"PR");
    $this->excel->getActiveSheet()->getStyle('AH7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AE5:AH7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    


    $this->excel->getActiveSheet()->setCellValue('AI5',"45-54TH"); 
    $this->excel->getActiveSheet()->mergeCells('AI5:AL5');
    $this->excel->getActiveSheet()->getStyle('AI5:AL5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AI6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AI6:AJ6');
    $this->excel->getActiveSheet()->getStyle('AI6:AJ6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AI7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AI7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AJ7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AJ7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AK6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AK6:AL6');
    $this->excel->getActiveSheet()->getStyle('AK6:AL6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AK7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AK7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AL7',"PR");
    $this->excel->getActiveSheet()->getStyle('AL7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AI5:AL7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('AM5',"55-59TH"); 
    $this->excel->getActiveSheet()->mergeCells('AM5:AP5');
    $this->excel->getActiveSheet()->getStyle('AM5:AP5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AM6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AM6:AN6');
    $this->excel->getActiveSheet()->getStyle('AM6:AN6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AM7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AM7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AN7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AN7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AO6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AO6:AP6');
    $this->excel->getActiveSheet()->getStyle('AO6:AP6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AO7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AO7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AP7',"PR");
    $this->excel->getActiveSheet()->getStyle('AP7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AM5:AP7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('AQ5',"60-69TH");
    $this->excel->getActiveSheet()->mergeCells('AQ5:AT5');
    $this->excel->getActiveSheet()->getStyle('AQ5:AT5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AQ6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AQ6:AR6');
    $this->excel->getActiveSheet()->getStyle('AQ6:AR6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AQ7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AQ7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AR7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AR7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AS6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AS6:AT6');
    $this->excel->getActiveSheet()->getStyle('AS6:AT6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AS7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AS7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AT7',"PR");
    $this->excel->getActiveSheet()->getStyle('AT7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AQ5:AT7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('AU5',">70TH"); 
    $this->excel->getActiveSheet()->mergeCells('AU5:AX5');
    $this->excel->getActiveSheet()->getStyle('AU5:AX5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AU6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AU6:AV6');
    $this->excel->getActiveSheet()->getStyle('AU6:AV6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AU7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AU7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AV7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AV7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AW6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('AW6:AX6');
    $this->excel->getActiveSheet()->getStyle('AW6:AX6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AW7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AW7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AX7',"PR");
    $this->excel->getActiveSheet()->getStyle('AX7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AU5:AX7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $this->excel->getActiveSheet()->setCellValue('AY5',"TOTAL"); 
    $this->excel->getActiveSheet()->mergeCells('AY5:BB5');
    $this->excel->getActiveSheet()->getStyle('AY5:BB5')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AY6',"LAMA"); 
    $this->excel->getActiveSheet()->mergeCells('AY6:AZ6');
    $this->excel->getActiveSheet()->getStyle('AY6:AZ6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AY7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('AY7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('AZ7',"PR"); 
    $this->excel->getActiveSheet()->getStyle('AZ7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('BA6',"BARU"); 
    $this->excel->getActiveSheet()->mergeCells('BA6:BB6');
    $this->excel->getActiveSheet()->getStyle('BA6:BB6')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('BA7',"LK"); 
    $this->excel->getActiveSheet()->getStyle('BA7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->setCellValue('BB7',"PR");
    $this->excel->getActiveSheet()->getStyle('BB7')->applyFromArray($styleArray);

    $this->excel->getActiveSheet()->getStyle('AY5:BB7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);    

    $sql="select penyakit.kd_penyakit,penyakit.nama_penyakit from m_penyakit penyakit where 
    penyakit.kd_penyakit in ( select diagnosa.kd_penyakit_tr from tr_diagnosa diagnosa 
    inner join tr_daftar daftar on diagnosa.id_daftar=daftar.id_daftar 
    where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and daftar.kd_puskes=?) order by penyakit.kd_penyakit asc ";

    $query = $this->db->query($sql,array($bln,$thn,$kd_puskes));       

        $no=7;

        foreach ($query->result_array() as $row)
        {
            $kd_penyakit=$row['kd_penyakit'];
            $nama_penyakit=$row['nama_penyakit'];

            $rcell = "A" . strval($no+1);
            $this->excel->getActiveSheet()->setCellValue($rcell,$kd_penyakit );
            $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

            $rcell = "B" . strval($no+1);
            $this->excel->getActiveSheet()->setCellValue($rcell,$nama_penyakit );
            $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

            $sql2="select daftar.umur_hr,daftar.umur_bln,daftar.umur_thn,pasien.sex as jenis_kelamin,month(pasien.tgl_daftar) as bln_daft,year(pasien.tgl_daftar) as thn_daft,count(daftar.nobukti_d) as jml
            from tr_diagnosa diagnosa inner join tr_daftar daftar on diagnosa.id_daftar=daftar.id_daftar
            inner join m_pasien pasien on daftar.kd_pasien=pasien.kd_pasien
            where month(daftar.tanggal_msk)=? and year(daftar.tanggal_msk)=? and diagnosa.kd_penyakit_tr=? and daftar.kd_puskes=?
            group by daftar.umur_hr,daftar.umur_bln,daftar.umur_thn,pasien.sex,month(pasien.tgl_daftar),year(pasien.tgl_daftar)";


            $_0_7hr_lama_laki = 0;
            $_0_7hr_lama_perempuan = 0;
            $_0_7hr_baru_laki = 0;
            $_0_7hr_baru_perempuan = 0;

            $_8_28hr_lama_laki = 0;
            $_8_28hr_lama_perempuan = 0;
            $_8_28hr_baru_laki = 0;
            $_8_28hr_baru_perempuan = 0;            

            $_1bln_1thn_lama_laki = 0;
            $_1bln_1thn_lama_perempuan = 0;
            $_1bln_1thn_baru_laki = 0;
            $_1bln_1thn_baru_perempuan = 0;

            $_1_4thn_lama_laki = 0;
            $_1_4thn_lama_perempuan = 0;
            $_1_4thn_baru_laki = 0;
            $_1_4thn_baru_perempuan = 0;

            $_5_9thn_lama_laki = 0;
            $_5_9thn_lama_perempuan = 0;
            $_5_9thn_baru_laki = 0;
            $_5_9thn_baru_perempuan = 0;

            $_10_14thn_lama_laki = 0;
            $_10_14thn_lama_perempuan = 0;
            $_10_14thn_baru_laki = 0;
            $_10_14thn_baru_perempuan = 0;

            $_15_19thn_lama_laki = 0;
            $_15_19thn_lama_perempuan = 0;
            $_15_19thn_baru_laki = 0;
            $_15_19thn_baru_perempuan = 0;

            $_20_44thn_lama_laki = 0;
            $_20_44thn_lama_perempuan = 0;
            $_20_44thn_baru_laki = 0;
            $_20_44thn_baru_perempuan = 0;

            $_45_54thn_lama_laki = 0;
            $_45_54thn_lama_perempuan = 0;
            $_45_54thn_baru_laki = 0;
            $_45_54thn_baru_perempuan = 0;

            $_55_59thn_lama_laki = 0;
            $_55_59thn_lama_perempuan = 0;
            $_55_59thn_baru_laki = 0;
            $_55_59thn_baru_perempuan = 0;

            $_60_69thn_lama_laki = 0;
            $_60_69thn_lama_perempuan = 0;
            $_60_69thn_baru_laki = 0;
            $_60_69thn_baru_perempuan = 0;

            $_70thn_lama_laki = 0;
            $_70thn_lama_perempuan = 0;
            $_70thn_baru_laki = 0;
            $_70thn_baru_perempuan = 0;

            $_tot_lama_laki = 0;
            $_tot_lama_perempuan = 0;
            $_tot_baru_laki = 0;
            $_tot_baru_perempuan = 0;


             $query2 = $this->db->query($sql2,array($bln,$thn,$kd_penyakit,$kd_puskes));    
             foreach ($query2->result_array() as $row2)    
             {

                $umur_hr = $row2['umur_hr'];
                $umur_bln = $row2['umur_bln'];
                $umur_thn = $row2['umur_thn'];
                $jns_kelamin = $row2['jenis_kelamin'];
                $bln_daft = $row2['bln_daft'];
                $thn_daft = $row2['thn_daft'];
                $jml = $row2['jml'];

                // awal total
                if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_tot_baru_laki = $_tot_baru_laki + $jml;
                        }else{
                            $_tot_baru_perempuan = $_tot_baru_perempuan + $jml;
                        }
                }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_tot_lama_laki = $_tot_lama_laki + $jml;
                        }else{
                            $_tot_lama_perempuan = $_tot_lama_perempuan + $jml;
                        }
                }
                // akhir total


                if ($umur_hr>=0 && $umur_hr<=7 && $umur_bln==0 && $umur_thn==0){

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_0_7hr_baru_laki = $_0_7hr_baru_laki + $jml;
                        }else{
                            $_0_7hr_baru_perempuan = $_0_7hr_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_0_7hr_lama_laki = $_0_7hr_lama_laki + $jml;
                        }else{
                            $_0_7hr_lama_perempuan = $_0_7hr_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_hr>=8 and $umur_hr<=30) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_8_28hr_baru_laki = $_8_28hr_baru_laki + $jml;
                        }else{
                            $_8_28hr_baru_perempuan = $_8_28hr_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_8_28hr_lama_laki = $_8_28hr_lama_laki + $jml;
                        }else{
                            $_8_28hr_lama_perempuan = $_8_28hr_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_bln>=1 and $umur_bln<=12) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_1bln_1thn_baru_laki = $_1bln_1thn_baru_laki + $jml;
                        }else{
                            $_1bln_1thn_baru_perempuan = $_1bln_1thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_1bln_1thn_lama_laki = $_1bln_1thn_lama_laki + $jml;
                        }else{
                            $_1bln_1thn_lama_perempuan = $_1bln_1thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=1 and $umur_thn<=4) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_1_4thn_baru_laki = $_1_4thn_baru_laki + $jml;
                        }else{
                            $_1_4thn_baru_perempuan = $_1_4thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_1_4thn_lama_laki = $_1_4thn_lama_laki + $jml;
                        }else{
                            $_1_4thn_lama_perempuan = $_1_4thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=5 and $umur_thn<=9) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_5_9thn_baru_laki = $_5_9thn_baru_laki + $jml;
                        }else{
                            $_5_9thn_baru_perempuan = $_5_9thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_5_9thn_lama_laki = $_5_9thn_lama_laki + $jml;
                        }else{
                            $_5_9thn_lama_perempuan = $_5_9thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=10 and $umur_thn<=14) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_10_14thn_baru_laki = $_10_14thn_baru_laki + $jml;
                        }else{
                            $_10_14thn_baru_perempuan = $_10_14thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_10_14thn_lama_laki = $_10_14thn_lama_laki + $jml;
                        }else{
                            $_10_14thn_lama_perempuan = $_10_14thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=15 and $umur_thn<=19) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_15_19thn_baru_laki = $_15_19thn_baru_laki + $jml;
                        }else{
                            $_15_19thn_baru_perempuan = $_15_19thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_15_19thn_lama_laki = $_15_19thn_lama_laki + $jml;
                        }else{
                            $_15_19thn_lama_perempuan = $_15_19thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=20 and $umur_thn<=44) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_20_44thn_baru_laki = $_20_44thn_baru_laki + $jml;
                        }else{
                            $_20_44thn_baru_perempuan = $_20_44thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_20_44thn_lama_laki = $_20_44thn_lama_laki + $jml;
                        }else{
                            $_20_44thn_lama_perempuan = $_20_44thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar

                }else if ($umur_thn>=45 and $umur_thn<=54) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_45_54thn_baru_laki = $_45_54thn_baru_laki + $jml;
                        }else{
                            $_45_54thn_baru_perempuan = $_45_54thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_45_54thn_lama_laki = $_45_54thn_lama_laki + $jml;
                        }else{
                            $_45_54thn_lama_perempuan = $_45_54thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar                    

                }else if ($umur_thn>=55 and $umur_thn<=59) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_55_59thn_baru_laki = $_55_59thn_baru_laki + $jml;
                        }else{
                            $_55_59thn_baru_perempuan = $_55_59thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_55_59thn_lama_laki = $_55_59thn_lama_laki + $jml;
                        }else{
                            $_55_59thn_lama_perempuan = $_55_59thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar                    

                }else if ($umur_thn>=60 and $umur_thn<=69) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_60_69thn_baru_laki = $_60_69thn_baru_laki + $jml;
                        }else{
                            $_60_69thn_baru_perempuan = $_60_69thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_60_69thn_lama_laki = $_60_69thn_lama_laki + $jml;
                        }else{
                            $_60_69thn_lama_perempuan = $_60_69thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar                    

                }else if ($umur_thn>=70) {

                    if ($bln_daft==$bln && $thn_daft==$thn) {
                        // kalau baru
                        if ($jns_kelamin=='Pria') {
                            $_70thn_baru_laki = $_60_69thn_baru_laki + $jml;
                        }else{
                            $_70thn_baru_perempuan = $_60_69thn_baru_perempuan + $jml;
                        }
                    }else{
                        // kalau lama
                        if ($jns_kelamin=='Pria') {
                            $_70thn_lama_laki = $_60_69thn_lama_laki + $jml;
                        }else{
                            $_70thn_lama_perempuan = $_60_69thn_lama_perempuan + $jml;
                        }
                    }
                    // akhir cek bln tahun daftar                                        

                }
                //akhir if

            }

                $rcell = "C" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_0_7hr_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "D" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_0_7hr_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "E" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_0_7hr_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "F" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_0_7hr_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "G" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_8_28hr_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "H" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_8_28hr_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "I" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_8_28hr_baru_laki);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "J" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_8_28hr_baru_perempuan);                                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "K" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1bln_1thn_lama_laki);                                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "L" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1bln_1thn_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "M" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1bln_1thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "N" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1bln_1thn_baru_perempuan);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "O" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1_4thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "P" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1_4thn_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "Q" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1_4thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "R" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_1_4thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "S" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_5_9thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "T" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_5_9thn_lama_perempuan);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "U" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_5_9thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "V" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_5_9thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "W" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_10_14thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "X" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_10_14thn_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "Y" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_10_14thn_baru_laki);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "Z" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_10_14thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AA" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_15_19thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AB" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_15_19thn_lama_perempuan);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AC" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_15_19thn_baru_laki);    
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);            

                $rcell = "AD" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_15_19thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AE" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_20_44thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AF" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_20_44thn_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AG" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_20_44thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AH" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_20_44thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AI" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_45_54thn_lama_laki);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AJ" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_45_54thn_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AK" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_45_54thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AL" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_45_54thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AM" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_55_59thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AN" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_55_59thn_lama_perempuan);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AO" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_55_59thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AP" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_55_59thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AQ" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_60_69thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AR" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_60_69thn_lama_perempuan);                
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AS" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_60_69thn_baru_laki);    
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);            

                $rcell = "AT" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_60_69thn_baru_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AU" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_70thn_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AV" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_70thn_lama_perempuan);  
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);              

                $rcell = "AW" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_70thn_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AX" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_70thn_baru_perempuan);  
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);              

                $rcell = "AY" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_tot_lama_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "AZ" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_tot_lama_perempuan);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "BA" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_tot_baru_laki);
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $rcell = "BB" . strval($no+1);
                $this->excel->getActiveSheet()->setCellValue($rcell,$_tot_baru_perempuan);        
                $this->excel->getActiveSheet()->getStyle($rcell)->applyFromArray($styleArray);

                $no = $no +1;

        }

            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);

            $this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AD')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AE')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AH')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AI')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AK')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AL')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AM')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AN')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AO')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AP')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AR')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AS')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AT')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AU')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AV')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AW')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AX')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AY')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(5);

            $this->excel->getActiveSheet()->getColumnDimension('BA')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('BB')->setWidth(5);


            $filename='LB1.xlsx'; //save our workbook as this file name

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