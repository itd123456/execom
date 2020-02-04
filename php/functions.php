<?php

class Exom {

    var $post = null;
    private $host="192.168.0.26"; //live sofia server
    private $user="saprog";
    private $pass = 'SQL@2012!';
    private $db="GLOBAL_SOFIADB";
    private $conn;


    public function __construct($post){
        
        $this->conn=  new PDO("sqlsrv:server=".$this->host.";Database=".$this->db, $this->user, $this->pass);
 
    }

    public function get($post){
        $year = $post['ID'];
        // $month = $post['m'];
        $sql = "select
          bch.BRAN_NAME as 'Branch', /*Branch*/
          lm.LOAN_RELEASED_DATE as 'Released_Date', /*Released Date*/
          lm.LOAN_PN_NUMBER as 'PN_Number', /*PN Number*/
          dbo.get_borrowers_name(lm.LOAN_BORROWER_CODE) as 'Borr_Name',  /*Borrowers Name*/
          --dbo.get_area_name(bch.BRAN_NAME) as 'Area',/*Area*/

          lm.LOAN_AMOUNT,
          --(lm.LOAN_AMOUNT + dbo.get_addon_amortcharges(lm.LOAN_PN_NUMBER))as 'TLoan_Amount', /*Total Loan Amount*/

          prod.PROD_NAME Prod_Type,/*Product Type*/
           CASE
                WHEN PROD_TYPE = 0 THEN 'Non-Collateral Group'
                WHEN PROD_TYPE = 1 THEN 'Collateral Group'
                ELSE 'Special Accounts'
            END as 'Product_Group'

          from LM_LOAN lm
        
          join PR_BORROWERS b 
            with (nolock)
            ON lm.LOAN_BORROWER_CODE = b.BORR_CODE
        
          JOIN PR_BRANCH bch 
            with (nolock)
            ON lm.LOAN_BR = bch.BRAN_CODE
        
          JOIN PR_PRODUCT prod 
            with (nolock)
            ON prod.PROD_CODE = lm.LOAN_PRODUCT_CODE
        
          where prod.PROD_BR = bch.BRAN_CODE
            and lm.LOAN_APP_TYPE !=4 and lm.LOAN_APP_TYPE !=3
            and lm.LOAN_RELEASED_DATE != 0
            and  bch.BRAN_NAME != 'Branch Test'
            and dbo.get_zero_out_pn(lm.LOAN_PN_NUMBER)=0
            and year(lm.LOAN_RELEASED_DATE) = '$year'
        order by lm.LOAN_RELEASED_DATE desc";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array());
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // print_r($data);
        $res = array();
        
        $branAmount = 0;

                $ant = 0;
                $Bacolod = 0;
                $Baguio = 0;
                $Baler = 0;
                $Baliuag = 0;
                $Bataan = 0;
                $Butuan = 0;
                $Cabanatuan = 0;
                $Cagayan = 0;
                $Cainta = 0;
                $Calamba = 0;
                $Cauayan = 0;
                $Cavite = 0;
                $Cebu = 0;
                $Consolacion = 0;
                $Dagupan = 0;
                $Dau = 0;
                $Davao = 0;
                $Digos = 0;
                $Digostrike = 0;
                $Dumaguete = 0;
                $Gapan = 0;
                $General = 0;
                $Harrison = 0;
                $Head = 0;
                $Iloilo = 0;
                $Imus = 0;
                $Intramuros = 0;
                $Kabankalan = 0;
                $Kidapawan = 0;
                $Koronadal = 0;
                $Latrinidad = 0;
                $Launion = 0;
                $Lagro = 0;
                $Laoag = 0;
                $Laspinas = 0;
                $Lipa = 0;
                $Makati = 0;
                $Malaybalay = 0;
                $Malolos = 0;
                $Mandaue = 0;
                $Manila = 0;
                $Marikina = 0;
                $MBL = 0;
                $Meycauayan = 0;
                $Muntinlupa = 0;
                $Naga = 0;
                $Olongapo = 0;
                $Parañaque = 0;
                $POEA = 0;
                $Quezonave = 0;
                $Roxas = 0;
                $Sanfernando = 0;
                $Sanjose = 0;
                $Sanmateo = 0;
                $Sanpablo = 0;
                $Santiago = 0;
                $SCkoronadal = 0;
                $SCpanabo = 0;
                $SMEantipolo  = 0;
                $SMEmarikina = 0;
                $Tacloban = 0;
                $Tagbilaran = 0;
                $Tagum = 0;
                $Tanay = 0;
                $Tandangsora = 0;
                $Tarlac = 0;
                $Tuguegarao = 0;
                $Valencia = 0;
                $Valenzuela = 0;




                $jan = 0;
                $feb = 0;
                $mar = 0;
                $apr = 0;
                $may = 0;
                $jun = 0;
                $jul = 0;
                $aug = 0;
                $sep = 0;
                $oct = 0;
                $nov = 0;
                $dec = 0;
                $nowmonth = 0;

                $lastmonth = 0;

                $count = 0;
  

                $ant1 = 0;
                $Bacolod1 = 0;
                $Baguio1 = 0;
                $Baler1 = 0;
                $Baliuag1 = 0;
                $Bataan1 = 0;
                $Butuan1 = 0;
                $Cabanatuan1 = 0;
                $Cagayan1 = 0;
                $Cainta1 = 0;
                $Calamba1 = 0;
                $Cauayan1 = 0;
                $Cavite1 = 0;
                $Cebu1 = 0;
                $Consolacion1 = 0;
                $Dagupan1 = 0;
                $Dau1 = 0;
                $Davao1 = 0;
                $Digos1 = 0;
                $Digostrike1 = 0;
                $Dumaguete1 = 0;
                $Gapan1 = 0;
                $General1 = 0;
                $Harrison1 = 0;
                $Head1 = 0;
                $Iloilo1 = 0;
                $Imus1 = 0;
                $Intramuros1 = 0;
                $Kabankalan1 = 0;
                $Kidapawan1 = 0;
                $Koronadal1 = 0;
                $Latrinidad1 = 0;
                $Launion1 = 0;
                $Lagro1 = 0;
                $Laoag1 = 0;
                $Laspinas1 = 0;
                $Lipa1 = 0;
                $Makati1 = 0;
                $Malaybalay1 = 0;
                $Malolos1 = 0;
                $Mandaue1 = 0;
                $Manila1 = 0;
                $Marikina1 = 0;
                $MBL1 = 0;
                $Meycauayan1 = 0;
                $Muntinlupa1 = 0;
                $Naga1 = 0;
                $Olongapo1 = 0;
                $Parañaque1 = 0;
                $POEA1 = 0;
                $Quezonave1 = 0;
                $Roxas1 = 0;
                $Sanfernando1 = 0;
                $Sanjose1 = 0;
                $Sanmateo1 = 0;
                $Sanpablo1 = 0;
                $Santiago1 = 0;
                $SCkoronadal1 = 0;
                $SCpanabo1 = 0;
                $SMEantipolo1  = 0;
                $SMEmarikina1 = 0;
                $Tacloban1 = 0;
                $Tagbilaran1 = 0;
                $Tagum1 = 0;
                $Tanay1 = 0;
                $Tandangsora1 = 0;
                $Tarlac1 = 0;
                $Tuguegarao1 = 0;
                $Valencia1 = 0;
                $Valenzuela1 = 0;
                foreach($data as $k=>$v){
                    if($v['Branch'] == 'Antipolo City'){
                       $ant += $v['LOAN_AMOUNT'];
                       $ant1+=1;
                    }
                    else if($v['Branch'] == 'Bacolod' ){
                        $Bacolod += $v['LOAN_AMOUNT'];
                        $Bacolod1+=1;
                    }
                    else if($v['Branch'] == 'Baguio'){
                        $Baguio += $v['LOAN_AMOUNT'];
                        $Baguio1+=1;
                    }
                    else if($v['Branch'] == 'Baler'){
                        $Baler += $v['LOAN_AMOUNT'];
                        $Baler1+=1;
                    }
                    else if($v['Branch'] == 'Baliuag'){
                        $Baliuag += $v['LOAN_AMOUNT'];
                        $Baliuag1+=1;
                    }
                    else if($v['Branch'] == 'Bataan'){
                        $Bataan += $v['LOAN_AMOUNT'];
                        $Bataan1+=1;
                    }
                    else if($v['Branch'] == 'Butuan'){
                        $Butuan += $v['LOAN_AMOUNT'];
                        $Butuan1+=1;
                    }
                    else if($v['Branch'] == 'Cabanatuan'){
                        $Cabanatuan += $v['LOAN_AMOUNT'];
                        $Cabanatuan1+=1;
                    }
                    else if($v['Branch'] == 'Cagayan De Oro'){
                        $Cagayan += $v['LOAN_AMOUNT'];
                        $Cagayan1+=1;
                    }
                    else if($v['Branch'] == 'Cainta'){
                        $Cainta += $v['LOAN_AMOUNT'];
                        $Cainta1+=1;
                    }
                    else if($v['Branch'] == 'Calamba'){
                        $Calamba += $v['LOAN_AMOUNT'];
                        $Calamba1+=1;
                    }
                    else if($v['Branch'] == 'Cauayan'){
                        $Cauayan += $v['LOAN_AMOUNT'];
                        $Cauayan1+=1;
                    }
                    else if($v['Branch'] == 'Cavite'){     
                        $Cavite += $v['LOAN_AMOUNT'];
                        $Cavite1+=1;
                    }
                    else if($v['Branch'] == 'Cebu'){
                        $Cebu += $v['LOAN_AMOUNT'];
                        $Cebu1+=1;
                    }
                    else if($v['Branch'] == 'Consolacion'){
                        $Consolacion += $v['LOAN_AMOUNT'];
                        $Consolacion1+=1;

                    }
                    else if($v['Branch'] == 'Dagupan'){
                        $Dagupan += $v['LOAN_AMOUNT'];
                        $Dagupan1+=1;

                    }
                    else if($v['Branch'] == 'Dau'){
                        $Dau += $v['LOAN_AMOUNT'];
                        $Dau1+=1;
                    }
                    else if($v['Branch'] == 'Davao'){;
                        $Davao += $v['LOAN_AMOUNT'];
                        $Davao1+=1;
                    }
                    else if($v['Branch'] == 'Digos'){
                        $Digos += $v['LOAN_AMOUNT'];
                        $Digos1+=1;
                    }
                    else if($v['Branch'] == 'Digos Trike'){
                        $Digostrike += $v['LOAN_AMOUNT'];
                        $Digostrike1+=1;
                    }
                    else if($v['Branch'] == 'Dumaguete'){
                        $Dumaguete += $v['LOAN_AMOUNT'];
                        $Dumaguete1+=1;
                    }
                    else if($v['Branch'] == 'Gapan'){
                        $Gapan += $v['LOAN_AMOUNT'];
                        $Gapan1+=1;
                    }
                    else if($v['Branch'] == 'General Santos'){
                        $General += $v['LOAN_AMOUNT'];
                        $General1+=1;         
                    }
                    else if($v['Branch'] == 'Harrison Plaza'){
                        $Harrison += $v['LOAN_AMOUNT'];
                        $Harrison1+=1;
                    }
                    else if($v['Branch'] == 'Head Office'){
                        $Head += $v['LOAN_AMOUNT'];
                        $Head1+=1;
                    }
                    else if($v['Branch'] == 'Iloilo'){
                        $Iloilo += $v['LOAN_AMOUNT'];
                        $Iloilo1+=1;
                    }
                    else if($v['Branch'] == 'Imus'){
                        $Imus += $v['LOAN_AMOUNT'];
                        $Imus1+=1;
                    }
                    else if($v['Branch'] == 'Intramuros'){
                        $Intramuros += $v['LOAN_AMOUNT'];
                        $Intramuros1+=1;           
                    }
                    else if($v['Branch'] == 'Kidapawan'){
                        $Kidapawan +=$v['LOAN_AMOUNT'];
                        $Kidapawan1+=1;
                    }
                    else if($v['Branch'] == 'Kabankalan'){
                        $Kabankalan += $v['LOAN_AMOUNT'];
                        $Kabankalan1+=1;
                    }
                    else if($v['Branch'] == 'Koronadal'){
                        $Koronadal += $v['LOAN_AMOUNT'];
                        $Koronadal1+=1;
                    }
                    else if($v['Branch'] == 'La Trinidad'){
                        $Latrinidad += $v['LOAN_AMOUNT'];
                        $Latrinidad1+=1;
                    }
                    else if($v['Branch'] == 'La Union'){
                        $Launion += $v['LOAN_AMOUNT'];
                        $Launion1+=1;
                    }
                    else if($v['Branch'] == 'Lagro'){
                        $Lagro += $v['LOAN_AMOUNT'];
                        $Lagro1+=1;
                    }
                    else if($v['Branch'] == 'Laoag'){
                        $Laoag += $v['LOAN_AMOUNT'];

                        $Laoag1+=1;
                    }
                    else if($v['Branch'] == 'Las Piñas'){
                        $Laspinas += $v['LOAN_AMOUNT'];
                        $Laspinas1+=1;
                    }
                    else if($v['Branch'] == 'Lipa'){
                        $Lipa += $v['LOAN_AMOUNT'];
                        $Lipa1+=1;
                    }
                    else if($v['Branch'] == 'Makati'){
                        $Makati += $v['LOAN_AMOUNT'];
                        $Makati1+=1;
                    }
                    else if($v['Branch'] == 'Malaybalay'){
                        $Malaybalay += $v['LOAN_AMOUNT'];
                        $Malaybalay1+=1;
                    }
                    else if($v['Branch'] == 'Malolos'){
                        $Malolos += $v['LOAN_AMOUNT'];
                        $Malolos1+=1;
                    }
                    else if($v['Branch'] == 'Mandaue'){
                        $Mandaue += $v['LOAN_AMOUNT'];
                        $Mandaue1+=1;
                    }
                    else if($v['Branch'] == 'Manila'){
                        $Manila += $v['LOAN_AMOUNT'];
                        $Manila1+=1;
                    }
                    else if($v['Branch'] == 'Marikina'){
                        $Marikina += $v['LOAN_AMOUNT'];
                        $Marikina1+=1;
                    }
                    else if($v['Branch'] == 'MBL'){
                        $MBL += $v['LOAN_AMOUNT'];
                        $MBL1+=1;
                    }
                    else if($v['Branch'] == 'Meycauayan'){
                        $Meycauayan += $v['LOAN_AMOUNT'];
                        $Meycauayan1+=1;
                    }
                    else if($v['Branch'] == 'Muntinlupa'){
                        $Muntinlupa += $v['LOAN_AMOUNT'];
                        $Muntinlupa1+=1;
                    }
                    else if($v['Branch'] == 'Naga'){
                        $Naga += $v['LOAN_AMOUNT'];
                        $Naga1+=1;
                    }
                    else if($v['Branch'] == 'Olongapo'){
                        $Olongapo += $v['LOAN_AMOUNT'];
                        $Olongapo1+=1;
                    }
                    else if($v['Branch'] == 'Parañaque'){
                        $Parañaque += $v['LOAN_AMOUNT'];
                        $Parañaque1+=1;
                    }
                    else if($v['Branch'] == 'POEA'){
                        $POEA += $v['LOAN_AMOUNT'];
                        $POEA1+=1;
                    }
                    else if($v['Branch'] == 'Quezon Ave.'){
                        $Quezonave += $v['LOAN_AMOUNT'];
                        $Quezonave1+=1;
                    }
                    else if($v['Branch'] == 'Roxas'){
                        $Roxas += $v['LOAN_AMOUNT'];
                        $Roxas1+=1;
                    }
                    else if($v['Branch'] == 'San Fernando, PA'){
                        $Sanfernando += $v['LOAN_AMOUNT'];
                        $Sanfernando1+=1;
                    }
                    else if($v['Branch'] == 'San Jose'){
                        $Sanjose += $v['LOAN_AMOUNT'];
                        $Sanjose1+=1;
                    }
                    else if($v['Branch'] == 'San Mateo'){
                        $Sanmateo += $v['LOAN_AMOUNT'];
                        $Sanmateo1+=1;
                    }
                    else if($v['Branch'] == 'San Pablo'){
                        $Sanpablo += $v['LOAN_AMOUNT'];
                        $Sanpablo1+=1;
                    }
                    else if($v['Branch'] == 'Santiago'){
                        $Santiago += $v['LOAN_AMOUNT'];
                        $Santiago1+=1;
                    }
                    else if($v['Branch'] == 'SC Koronadal'){
                        $SCkoronadal += $v['LOAN_AMOUNT'];
                        $SCkoronadal1+=1;
                    }
                    else if($v['Branch'] == 'SC Panabo'){
                        $SCpanabo += $v['LOAN_AMOUNT'];
                        $SCpanabo1+=1;
                    }
                    else if($v['Branch'] == 'SME Antipolo'){
                        $SMEantipolo += $v['LOAN_AMOUNT'];
                        $SMEantipolo1+=1;
                    }
                    else if($v['Branch'] == 'SME Marikina'){
                        $SMEmarikina += $v['LOAN_AMOUNT'];
                        $SMEmarikina1+=1;
                    }
                    else if($v['Branch'] == 'Tacloban'){
                        $Tacloban += $v['LOAN_AMOUNT'];
                        $Tacloban1+=1;
                    }
                    else if($v['Branch'] == 'Tagbilaran'){
                        $Tagbilaran += $v['LOAN_AMOUNT'];
                        $Tagbilaran1+=1;
                    }
                    else if($v['Branch'] == 'Tagum'){
                        $Tagum += $v['LOAN_AMOUNT'];
                        $Tagum1+=1;
                    }
                    else if($v['Branch'] == 'Tanay'){
                        $Tanay += $v['LOAN_AMOUNT'];
                        $Tanay1+=1;
                    }
                    else if($v['Branch'] == 'Tandang Sora'){
                        $Tandangsora += $v['LOAN_AMOUNT'];
                        $Tandangsora1+=1;
                    }
                    else if($v['Branch'] == 'Tarlac'){
                        $Tarlac += $v['LOAN_AMOUNT'];
                        $Tarlac1+=1;
                    }
                    else if($v['Branch'] == 'Tuguegarao'){
                        $Tuguegarao += $v['LOAN_AMOUNT'];                            
                        $Tuguegarao1+=1;
                    }
                    else if($v['Branch'] == 'Valencia'){
                        $Valencia += $v['LOAN_AMOUNT'];
                        $Valencia1+=1;
                    }
                    else if($v['Branch'] == 'Valenzuela'){
                        $Valenzuela += $v['LOAN_AMOUNT'];
                        $Valenzuela1+=1;
                    }
    
                    $yrdata= strtotime($v['Released_Date']);
                    $dateAmount = date('M', $yrdata);
                    


                    if($dateAmount == 'Jan'){
                        $jan += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Feb'){
                        $feb += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Mar'){
                        $mar += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Apr'){
                        $apr += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'May'){
                        $may += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Jun'){
                        $jun += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Jul'){
                        $jul += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Aug'){
                        $aug += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Sep'){
                        $sep += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Oct'){
                        $oct += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Nov'){
                        $nov += $v['LOAN_AMOUNT'];
                    }else if($dateAmount == 'Dec'){
                        $dec += $v['LOAN_AMOUNT'];
                    }




                    if($dateAmount == date('M')){
                        $nowmonth += $v['LOAN_AMOUNT'];
                    }

                    if($dateAmount ==  date('M', strtotime('-1 months'))){
                        $lastmonth += $v['LOAN_AMOUNT'];
                    }


                    $branAmount += $v['LOAN_AMOUNT'];
                    $count++;
                    // $res[$k][] = $v;a
                }
                // $res['Month']['vs'] = $nowmonth - $lastmonth / $lastmonth * 100;
                $res['Month']['vs'] = number_format(($nowmonth - $lastmonth) / $lastmonth * 100, 2, '.', ',');

                $res['Month']['target'] = number_format(($nowmonth - 700000000) / 700000000 * 100, 2, '.', ',');

                $res['total_amount'] = number_format($branAmount, 2, '.', ',');
                $res['Month']['count'] = number_format($count);

                $res['Month']['jan'] = $jan;
                $res['Month']['feb'] = $feb;
                $res['Month']['mar'] = $mar;
                $res['Month']['apr'] = $apr;
                $res['Month']['may'] = $may;
                $res['Month']['jun'] = $jun;
                $res['Month']['jul'] = $jul;
                $res['Month']['aug'] = $aug;
                $res['Month']['sep'] = $sep;
                $res['Month']['oct'] = $oct;
                $res['Month']['nov'] = $nov;
                $res['Month']['dec'] = $dec;
                $res['Month']['nowmonth'] = number_format($nowmonth, 2, '.', ',');


                $res['Month']['gmanorth'] = number_format($ant + $Cainta + $Head + $Lagro + $Marikina + $POEA + $Quezonave + $Tanay + $Tandangsora + $Valenzuela , 2, '.', ',');
                $res['Month']['gmasouth'] = number_format($Calamba + $Cavite + $Harrison + $Imus + $Intramuros + $Laspinas + $Lipa + $Makati + $Manila + $Muntinlupa + $Naga + $Parañaque + $Sanpablo , 2, '.', ',');
                $res['Month']['northluzon'] = number_format($Baguio + $Baler + $Baliuag + $Bataan + $Cabanatuan + $Cauayan + $Dagupan + $Dau + $Gapan + $Latrinidad + $Launion + $Laoag + $Malolos + $Meycauayan + $Olongapo + $Sanfernando + $Sanjose + $Santiago + $Tarlac + $Tuguegarao , 2, '.', ',');
                $res['Month']['visayas'] = number_format($Bacolod + $Cebu + $Consolacion + $Dumaguete + $Iloilo + $Kabankalan + $Mandaue + $Roxas + $Tacloban + $Tagbilaran , 2, '.', ',');
                $res['Month']['mindanao'] = number_format($Butuan + $Cagayan + $Davao + $Digos + $General + $Kidapawan + $Koronadal + $Malaybalay + $Tagum + $Valencia, 2, '.', ',');
                $res['Month']['global'] = number_format($Digostrike + $SCkoronadal + $SCpanabo, 2, '.', ',');
                $res['Month']['mbl'] = number_format($MBL , 2, '.', ',');
                $res['Month']['globalsme'] = number_format($SMEantipolo + $SMEmarikina + $Sanmateo , 2, '.', ',');

                                                
                $res['Antipolo'] = number_format($ant, 2, '.', ',');
                $res['Bacolod'] = number_format($Bacolod, 2, '.', ',');
                $res['Baguio'] = number_format($Baguio, 2, '.', ',');
                $res['Baler'] = number_format($Baler, 2, '.', ',');
                $res['Baliuag'] = number_format($Baliuag, 2, '.', ',');
                $res['Bataan'] = number_format($Bataan, 2, '.', ',');
                $res['Butuan'] = number_format($Butuan, 2, '.', ',');
                $res['Cabanatuan'] = number_format($Cabanatuan, 2, '.', ',');
                $res['Cagayan De Oro'] = number_format($Cagayan, 2, '.', ',');
                $res['Cainta'] = number_format($Cainta, 2, '.', ',');
                $res['Calamba'] = number_format($Calamba, 2, '.', ',');
                $res['Cauayan'] = number_format($Cauayan, 2, '.', ',');
                $res['Cavite'] = number_format($Cavite, 2, '.', ',');
                $res['Cebu'] = number_format($Cebu, 2, '.', ',');
                $res['Consolacion'] = number_format($Consolacion, 2, '.', ',');
                $res['Dagupan'] = number_format($Dagupan, 2, '.', ',');
                $res['Dau'] = number_format($Dau, 2, '.', ',');
                $res['Davao'] = number_format($Davao, 2, '.', ',');
                $res['Digos'] = number_format($Digos, 2, '.', ',');
                $res['Digos Trike'] = number_format($Digostrike, 2, '.', ',');
                $res['Dumaguete'] = number_format($Dumaguete, 2, '.', ',');
                $res['Gapan'] = number_format($Gapan, 2, '.', ',');
                $res['General'] = number_format($General, 2, '.', ',');
                $res['Harrison'] = number_format($Harrison, 2, '.', ',');
                $res['Head Office'] = number_format($Head, 2, '.', ',');
                $res['Iloilo'] = number_format($Iloilo, 2, '.', ',');
                $res['Imus'] = number_format($Imus, 2, '.', ',');
                $res['Intramuros'] = number_format($Intramuros, 2, '.', ',');
                $res['Kabankalan'] = number_format($Kabankalan, 2, '.', ',');
                $res['Kidapawan'] = number_format($Kidapawan, 2, '.', ',');
                $res['Koronadal'] = number_format($Koronadal, 2, '.', ',');
                $res['Latrinidad'] = number_format($Latrinidad, 2, '.', ',');
                $res['Launion'] = number_format($Launion, 2, '.', ',');
                $res['Lagro'] = number_format($Lagro, 2, '.', ',');
                $res['Laoag'] = number_format($Laoag, 2, '.', ',');
                $res['Las Piñas'] = number_format($Laspinas, 2, '.', ',');
                $res['Lipa'] = number_format($Lipa, 2, '.', ',');
                $res['Makati'] = number_format($Makati, 2, '.', ',');
                $res['Malaybalay'] = number_format($Malaybalay, 2, '.', ',');
                $res['Malolos'] = number_format($Malolos, 2, '.', ',');
                $res['Mandaue'] = number_format($Mandaue, 2, '.', ',');
                $res['Manila'] = number_format($Manila, 2, '.', ',');
                $res['Marikina'] = number_format($Marikina, 2, '.', ',');
                $res['MBL'] = number_format($MBL, 2, '.', ',');
                $res['Meycauayan'] = number_format($Meycauayan, 2, '.', ',');
                $res['Muntinlupa'] = number_format($Muntinlupa, 2, '.', ',');
                $res['Naga'] = number_format($Naga, 2, '.', ',');
                $res['Olongapo'] = number_format($Olongapo, 2, '.', ',');
                $res['Parañaque'] = number_format($Parañaque, 2, '.', ',');
                $res['POEA'] = number_format($POEA, 2, '.', ',');
                $res['Quezon Ave.'] = number_format($Quezonave, 2, '.', ',');
                $res['Roxas'] = number_format($Roxas, 2, '.', ',');
                $res['San Fernando, PA'] = number_format($Sanfernando, 2, '.', ',');
                $res['San Jose'] = number_format($Sanjose, 2, '.', ',');
                $res['San Mateo'] = number_format($Sanmateo, 2, '.', ',');
                $res['San Pablo'] = number_format($Sanpablo, 2, '.', ',');
                $res['Santiago'] = number_format($Santiago, 2, '.', ',');
                $res['SC Koronadal'] = number_format($SCkoronadal, 2, '.', ',');
                $res['SC Panabo'] = number_format($SCpanabo, 2, '.', ',');
                $res['SME Antipolo'] = number_format($SMEantipolo, 2, '.', ',');
                $res['SME Marikina'] = number_format($SMEmarikina, 2, '.', ',');
                $res['Tacloban'] = number_format($Tacloban, 2, '.', ',');
                $res['Tagbilaran'] = number_format($Tagbilaran, 2, '.', ',');
                $res['Tagum'] = number_format($Tagum, 2, '.', ',');
                $res['Tanay'] = number_format($Tanay, 2, '.', ',');
                $res['Tandangsora'] = number_format($Tandangsora, 2, '.', ',');
                $res['Tarlac'] = number_format($Tarlac, 2, '.', ',');
                $res['Tuguegarao'] = number_format($Tuguegarao, 2, '.', ',');
                $res['Valencia'] = number_format($Valencia, 2, '.', ',');
                $res['Valenzuela'] = number_format($Valenzuela, 2, '.', ',');

                print_r(json_encode($res));
                // print_r($data);

    }

    public function get2($post){
        // $year = $post['y'];
        // $month = $post['m'];
        $sql = "
        select
          bch.BRAN_NAME as 'Branch', /*Branch*/
          lm.LOAN_RELEASED_DATE as 'Released_Date', /*Released Date*/
          lm.LOAN_PN_NUMBER as 'PN_Number', /*PN Number*/
          dbo.get_borrowers_name(lm.LOAN_BORROWER_CODE) as 'Borr_Name',  /*Borrowers Name*/
          --dbo.get_area_name(bch.BRAN_NAME) as 'Area',/*Area*/

          lm.LOAN_AMOUNT,
          --(lm.LOAN_AMOUNT + dbo.get_addon_amortcharges(lm.LOAN_PN_NUMBER))as 'TLoan_Amount', /*Total Loan Amount*/

          prod.PROD_NAME Prod_Type,/*Product Type*/
           CASE
                WHEN PROD_TYPE = 0 THEN 'Non-Collateral Group'
                WHEN PROD_TYPE = 1 THEN 'Collateral Group'
                ELSE 'Special Accounts'
            END as 'Product_Group'

          from LM_LOAN lm
        
          join PR_BORROWERS b 
            with (nolock)
            ON lm.LOAN_BORROWER_CODE = b.BORR_CODE
        
          JOIN PR_BRANCH bch 
            with (nolock)
            ON lm.LOAN_BR = bch.BRAN_CODE
        
          JOIN PR_PRODUCT prod 
            with (nolock)
            ON prod.PROD_CODE = lm.LOAN_PRODUCT_CODE
        
          where prod.PROD_BR = bch.BRAN_CODE
            and lm.LOAN_APP_TYPE !=4 and lm.LOAN_APP_TYPE !=3
            and lm.LOAN_RELEASED_DATE != 0
            and  bch.BRAN_NAME != 'Branch Test'
            and dbo.get_zero_out_pn(lm.LOAN_PN_NUMBER)=0
            and month(lm.LOAN_RELEASED_DATE) = '2'
            and year(lm.LOAN_RELEASED_DATE) = '2020'

        order by lm.LOAN_RELEASED_DATE desc";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array());
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $res = array();
        
        $branAmount = 0;

                $ant = 0;
                $Bacolod = 0;
                $Baguio = 0;
                $Baler = 0;
                $Baliuag = 0;
                $Bataan = 0;
                $Butuan = 0;
                $Cabanatuan = 0;
                $Cagayan = 0;
                $Cainta = 0;
                $Calamba = 0;
                $Cauayan = 0;
                $Cavite = 0;
                $Cebu = 0;
                $Consolacion = 0;
                $Dagupan = 0;
                $Dau = 0;
                $Davao = 0;
                $Digos = 0;
                $Digostrike = 0;
                $Dumaguete = 0;
                $Gapan = 0;
                $General = 0;
                $Harrison = 0;
                $Head = 0;
                $Iloilo = 0;
                $Imus = 0;
                $Intramuros = 0;
                $Kabankalan = 0;
                $Kidapawan = 0;
                $Koronadal = 0;
                $Latrinidad = 0;
                $Launion = 0;
                $Lagro = 0;
                $Laoag = 0;
                $Laspinas = 0;
                $Lipa = 0;
                $Makati = 0;
                $Malaybalay = 0;
                $Malolos = 0;
                $Mandaue = 0;
                $Manila = 0;
                $Marikina = 0;
                $MBL = 0;
                $Meycauayan = 0;
                $Muntinlupa = 0;
                $Naga = 0;
                $Olongapo = 0;
                $Parañaque = 0;
                $POEA = 0;
                $Quezonave = 0;
                $Roxas = 0;
                $Sanfernando = 0;
                $Sanjose = 0;
                $Sanmateo = 0;
                $Sanpablo = 0;
                $Santiago = 0;
                $SCkoronadal = 0;
                $SCpanabo = 0;
                $SMEantipolo  = 0;
                $SMEmarikina = 0;
                $Tacloban = 0;
                $Tagbilaran = 0;
                $Tagum = 0;
                $Tanay = 0;
                $Tandangsora = 0;
                $Tarlac = 0;
                $Tuguegarao = 0;
                $Valencia = 0;
                $Valenzuela = 0;

                $nowmonth = 0;

                $lastmonth = 0;

                $count = 0;



                $ant1 = 0;
                $Bacolod1 = 0;
                $Baguio1 = 0;
                $Baler1 = 0;
                $Baliuag1 = 0;
                $Bataan1 = 0;
                $Butuan1 = 0;
                $Cabanatuan1 = 0;
                $Cagayan1 = 0;
                $Cainta1 = 0;
                $Calamba1 = 0;
                $Cauayan1 = 0;
                $Cavite1 = 0;
                $Cebu1 = 0;
                $Consolacion1 = 0;
                $Dagupan1 = 0;
                $Dau1 = 0;
                $Davao1 = 0;
                $Digos1 = 0;
                $Digostrike1 = 0;
                $Dumaguete1 = 0;
                $Gapan1 = 0;
                $General1 = 0;
                $Harrison1 = 0;
                $Head1 = 0;
                $Iloilo1 = 0;
                $Imus1 = 0;
                $Intramuros1 = 0;
                $Kabankalan1 = 0;
                $Kidapawan1 = 0;
                $Koronadal1 = 0;
                $Latrinidad1 = 0;
                $Launion1 = 0;
                $Lagro1 = 0;
                $Laoag1 = 0;
                $Laspinas1 = 0;
                $Lipa1 = 0;
                $Makati1 = 0;
                $Malaybalay1 = 0;
                $Malolos1 = 0;
                $Mandaue1 = 0;
                $Manila1 = 0;
                $Marikina1 = 0;
                $MBL1 = 0;
                $Meycauayan1 = 0;
                $Muntinlupa1 = 0;
                $Naga1 = 0;
                $Olongapo1 = 0;
                $Parañaque1 = 0;
                $POEA1 = 0;
                $Quezonave1 = 0;
                $Roxas1 = 0;
                $Sanfernando1 = 0;
                $Sanjose1 = 0;
                $Sanmateo1 = 0;
                $Sanpablo1 = 0;
                $Santiago1 = 0;
                $SCkoronadal1 = 0;
                $SCpanabo1 = 0;
                $SMEantipolo1  = 0;
                $SMEmarikina1 = 0;
                $Tacloban1 = 0;
                $Tagbilaran1 = 0;
                $Tagum1 = 0;
                $Tanay1 = 0;
                $Tandangsora1 = 0;
                $Tarlac1 = 0;
                $Tuguegarao1 = 0;
                $Valencia1 = 0;
                $Valenzuela1 = 0;

                foreach($data as $k=>$v){
                    if($v['Branch'] == 'Antipolo City'){
                       $ant += $v['LOAN_AMOUNT'];
                       $ant1+=1;
                    }
                    else if($v['Branch'] == 'Bacolod' ){
                        $Bacolod += $v['LOAN_AMOUNT'];
                        $Bacolod1+=1;
                    }
                    else if($v['Branch'] == 'Baguio'){
                        $Baguio += $v['LOAN_AMOUNT'];
                        $Baguio1+=1;
                    }
                    else if($v['Branch'] == 'Baler'){
                        $Baler += $v['LOAN_AMOUNT'];
                        $Baler1+=1;
                    }
                    else if($v['Branch'] == 'Baliuag'){
                        $Baliuag += $v['LOAN_AMOUNT'];
                        $Baliuag1+=1;
                    }
                    else if($v['Branch'] == 'Bataan'){
                        $Bataan += $v['LOAN_AMOUNT'];
                        $Bataan1+=1;
                    }
                    else if($v['Branch'] == 'Butuan'){
                        $Butuan += $v['LOAN_AMOUNT'];
                        $Butuan1+=1;
                    }
                    else if($v['Branch'] == 'Cabanatuan'){
                        $Cabanatuan += $v['LOAN_AMOUNT'];
                        $Cabanatuan1+=1;
                    }
                    else if($v['Branch'] == 'Cagayan De Oro'){
                        $Cagayan += $v['LOAN_AMOUNT'];
                        $Cagayan1+=1;
                    }
                    else if($v['Branch'] == 'Cainta'){
                        $Cainta += $v['LOAN_AMOUNT'];
                        $Cainta1+=1;
                    }
                    else if($v['Branch'] == 'Calamba'){
                        $Calamba += $v['LOAN_AMOUNT'];
                        $Calamba1+=1;
                    }
                    else if($v['Branch'] == 'Cauayan'){
                        $Cauayan += $v['LOAN_AMOUNT'];
                        $Cauayan1+=1;
                    }
                    else if($v['Branch'] == 'Cavite'){     
                        $Cavite += $v['LOAN_AMOUNT'];
                        $Cavite1+=1;
                    }
                    else if($v['Branch'] == 'Cebu'){
                        $Cebu += $v['LOAN_AMOUNT'];
                        $Cebu1+=1;
                    }
                    else if($v['Branch'] == 'Consolacion'){
                        $Consolacion += $v['LOAN_AMOUNT'];
                        $Consolacion1+=1;

                    }
                    else if($v['Branch'] == 'Dagupan'){
                        $Dagupan += $v['LOAN_AMOUNT'];
                        $Dagupan1+=1;

                    }
                    else if($v['Branch'] == 'Dau'){
                        $Dau += $v['LOAN_AMOUNT'];
                        $Dau1+=1;
                    }
                    else if($v['Branch'] == 'Davao'){;
                        $Davao += $v['LOAN_AMOUNT'];
                        $Davao1+=1;
                    }
                    else if($v['Branch'] == 'Digos'){
                        $Digos += $v['LOAN_AMOUNT'];
                        $Digos1+=1;
                    }
                    else if($v['Branch'] == 'Digos Trike'){
                        $Digostrike += $v['LOAN_AMOUNT'];
                        $Digostrike1+=1;
                    }
                    else if($v['Branch'] == 'Dumaguete'){
                        $Dumaguete += $v['LOAN_AMOUNT'];
                        $Dumaguete1+=1;
                    }
                    else if($v['Branch'] == 'Gapan'){
                        $Gapan += $v['LOAN_AMOUNT'];
                        $Gapan1+=1;
                    }
                    else if($v['Branch'] == 'General Santos'){
                        $General += $v['LOAN_AMOUNT'];
                        $General1+=1;         
                    }
                    else if($v['Branch'] == 'Harrison Plaza'){
                        $Harrison += $v['LOAN_AMOUNT'];
                        $Harrison1+=1;
                    }
                    else if($v['Branch'] == 'Head Office'){
                        $Head += $v['LOAN_AMOUNT'];
                        $Head1+=1;
                    }
                    else if($v['Branch'] == 'Iloilo'){
                        $Iloilo += $v['LOAN_AMOUNT'];
                        $Iloilo1+=1;
                    }
                    else if($v['Branch'] == 'Imus'){
                        $Imus += $v['LOAN_AMOUNT'];
                        $Imus1+=1;
                    }
                    else if($v['Branch'] == 'Intramuros'){
                        $Intramuros += $v['LOAN_AMOUNT'];
                        $Intramuros1+=1;           
                    }
                    else if($v['Branch'] == 'Kidapawan'){
                        $Kidapawan +=$v['LOAN_AMOUNT'];
                        $Kidapawan1+=1;
                    }
                    else if($v['Branch'] == 'Kabankalan'){
                        $Kabankalan += $v['LOAN_AMOUNT'];
                        $Kabankalan1+=1;
                    }
                    else if($v['Branch'] == 'Koronadal'){
                        $Koronadal += $v['LOAN_AMOUNT'];
                        $Koronadal1+=1;
                    }
                    else if($v['Branch'] == 'La Trinidad'){
                        $Latrinidad += $v['LOAN_AMOUNT'];
                        $Latrinidad1+=1;
                    }
                    else if($v['Branch'] == 'La Union'){
                        $Launion += $v['LOAN_AMOUNT'];
                        $Launion1+=1;
                    }
                    else if($v['Branch'] == 'Lagro'){
                        $Lagro += $v['LOAN_AMOUNT'];
                        $Lagro1+=1;
                    }
                    else if($v['Branch'] == 'Laoag'){
                        $Laoag += $v['LOAN_AMOUNT'];

                        $Laoag1+=1;
                    }
                    else if($v['Branch'] == 'Las Piñas'){
                        $Laspinas += $v['LOAN_AMOUNT'];
                        $Laspinas1+=1;
                    }
                    else if($v['Branch'] == 'Lipa'){
                        $Lipa += $v['LOAN_AMOUNT'];
                        $Lipa1+=1;
                    }
                    else if($v['Branch'] == 'Makati'){
                        $Makati += $v['LOAN_AMOUNT'];
                        $Makati1+=1;
                    }
                    else if($v['Branch'] == 'Malaybalay'){
                        $Malaybalay += $v['LOAN_AMOUNT'];
                        $Malaybalay1+=1;
                    }
                    else if($v['Branch'] == 'Malolos'){
                        $Malolos += $v['LOAN_AMOUNT'];
                        $Malolos1+=1;
                    }
                    else if($v['Branch'] == 'Mandaue'){
                        $Mandaue += $v['LOAN_AMOUNT'];
                        $Mandaue1+=1;
                    }
                    else if($v['Branch'] == 'Manila'){
                        $Manila += $v['LOAN_AMOUNT'];
                        $Manila1+=1;
                    }
                    else if($v['Branch'] == 'Marikina'){
                        $Marikina += $v['LOAN_AMOUNT'];
                        $Marikina1+=1;
                    }
                    else if($v['Branch'] == 'MBL'){
                        $MBL += $v['LOAN_AMOUNT'];
                        $MBL1+=1;
                    }
                    else if($v['Branch'] == 'Meycauayan'){
                        $Meycauayan += $v['LOAN_AMOUNT'];
                        $Meycauayan1+=1;
                    }
                    else if($v['Branch'] == 'Muntinlupa'){
                        $Muntinlupa += $v['LOAN_AMOUNT'];
                        $Muntinlupa1+=1;
                    }
                    else if($v['Branch'] == 'Naga'){
                        $Naga += $v['LOAN_AMOUNT'];
                        $Naga1+=1;
                    }
                    else if($v['Branch'] == 'Olongapo'){
                        $Olongapo += $v['LOAN_AMOUNT'];
                        $Olongapo1+=1;
                    }
                    else if($v['Branch'] == 'Parañaque'){
                        $Parañaque += $v['LOAN_AMOUNT'];
                        $Parañaque1+=1;
                    }
                    else if($v['Branch'] == 'POEA'){
                        $POEA += $v['LOAN_AMOUNT'];
                        $POEA1+=1;
                    }
                    else if($v['Branch'] == 'Quezon Ave.'){
                        $Quezonave += $v['LOAN_AMOUNT'];
                        $Quezonave1+=1;
                    }
                    else if($v['Branch'] == 'Roxas'){
                        $Roxas += $v['LOAN_AMOUNT'];
                        $Roxas1+=1;
                    }
                    else if($v['Branch'] == 'San Fernando, PA'){
                        $Sanfernando += $v['LOAN_AMOUNT'];
                        $Sanfernando1+=1;
                    }
                    else if($v['Branch'] == 'San Jose'){
                        $Sanjose += $v['LOAN_AMOUNT'];
                        $Sanjose1+=1;
                    }
                    else if($v['Branch'] == 'San Mateo'){
                        $Sanmateo += $v['LOAN_AMOUNT'];
                        $Sanmateo1+=1;
                    }
                    else if($v['Branch'] == 'San Pablo'){
                        $Sanpablo += $v['LOAN_AMOUNT'];
                        $Sanpablo1+=1;
                    }
                    else if($v['Branch'] == 'Santiago'){
                        $Santiago += $v['LOAN_AMOUNT'];
                        $Santiago1+=1;
                    }
                    else if($v['Branch'] == 'SC Koronadal'){
                        $SCkoronadal += $v['LOAN_AMOUNT'];
                        $SCkoronadal1+=1;
                    }
                    else if($v['Branch'] == 'SC Panabo'){
                        $SCpanabo += $v['LOAN_AMOUNT'];
                        $SCpanabo1+=1;
                    }
                    else if($v['Branch'] == 'SME Antipolo'){
                        $SMEantipolo += $v['LOAN_AMOUNT'];
                        $SMEantipolo1+=1;
                    }
                    else if($v['Branch'] == 'SME Marikina'){
                        $SMEmarikina += $v['LOAN_AMOUNT'];
                        $SMEmarikina1+=1;
                    }
                    else if($v['Branch'] == 'Tacloban'){
                        $Tacloban += $v['LOAN_AMOUNT'];
                        $Tacloban1+=1;
                    }
                    else if($v['Branch'] == 'Tagbilaran'){
                        $Tagbilaran += $v['LOAN_AMOUNT'];
                        $Tagbilaran1+=1;
                    }
                    else if($v['Branch'] == 'Tagum'){
                        $Tagum += $v['LOAN_AMOUNT'];
                        $Tagum1+=1;
                    }
                    else if($v['Branch'] == 'Tanay'){
                        $Tanay += $v['LOAN_AMOUNT'];
                        $Tanay1+=1;
                    }
                    else if($v['Branch'] == 'Tandang Sora'){
                        $Tandangsora += $v['LOAN_AMOUNT'];
                        $Tandangsora1+=1;
                    }
                    else if($v['Branch'] == 'Tarlac'){
                        $Tarlac += $v['LOAN_AMOUNT'];
                        $Tarlac1+=1;
                    }
                    else if($v['Branch'] == 'Tuguegarao'){
                        $Tuguegarao += $v['LOAN_AMOUNT'];                            
                        $Tuguegarao1+=1;
                    }
                    else if($v['Branch'] == 'Valencia'){
                        $Valencia += $v['LOAN_AMOUNT'];
                        $Valencia1+=1;
                    }
                    else if($v['Branch'] == 'Valenzuela'){
                        $Valenzuela += $v['LOAN_AMOUNT'];
                        $Valenzuela1+=1;
                    }
                    $branAmount += $v['LOAN_AMOUNT'];
                    $count++;
                    // $res[$k][] = $v;a
                }
                // $res['Month']['vs'] = $nowmonth - $lastmonth / $lastmonth * 100;

                $res['Month']['target'] = number_format(($nowmonth - 700000000) / 700000000 * 100, 2, '.', ',');

                $res['total_amount'] = number_format($branAmount, 2, '.', ',');
                $res['Month']['count'] = number_format($count);

                $res['Month']['nowmonth'] = number_format($nowmonth, 2, '.', ',');


                $res['Month']['gmanorth'] = number_format($ant + $Cainta + $Head + $Lagro + $Marikina + $POEA + $Quezonave + $Tanay + $Tandangsora + $Valenzuela , 2, '.', ',');
                $res['Month']['gmasouth'] = number_format($Calamba + $Cavite + $Harrison + $Imus + $Intramuros + $Laspinas + $Lipa + $Makati + $Manila + $Muntinlupa + $Naga + $Parañaque + $Sanpablo , 2, '.', ',');
                $res['Month']['northluzon'] = number_format($Baguio + $Baler + $Baliuag + $Bataan + $Cabanatuan + $Cauayan + $Dagupan + $Dau + $Gapan + $Latrinidad + $Launion + $Laoag + $Malolos + $Meycauayan + $Olongapo + $Sanfernando + $Sanjose + $Santiago + $Tarlac + $Tuguegarao , 2, '.', ',');
                $res['Month']['visayas'] = number_format($Bacolod + $Cebu + $Consolacion + $Dumaguete + $Iloilo + $Kabankalan + $Mandaue + $Roxas + $Tacloban + $Tagbilaran , 2, '.', ',');
                $res['Month']['mindanao'] = number_format($Butuan + $Cagayan + $Davao + $Digos + $General + $Kidapawan + $Koronadal + $Malaybalay + $Tagum + $Valencia, 2, '.', ',');
                $res['Month']['global'] = number_format($Digostrike + $SCkoronadal + $SCpanabo, 2, '.', ',');
                $res['Month']['mbl'] = number_format($MBL , 2, '.', ',');
                $res['Month']['globalsme'] = number_format($SMEantipolo + $SMEmarikina + $Sanmateo , 2, '.', ',');

                $gmanorth = $ant + $Cainta + $Head + $Lagro + $Marikina + $POEA + $Quezonave + $Tanay + $Tandangsora + $Valenzuela;
                $gmasouth = $Calamba + $Cavite + $Harrison + $Imus + $Intramuros + $Laspinas + $Lipa + $Makati + $Manila + $Muntinlupa + $Naga + $Parañaque + $Sanpablo;
                $northluzon= $Baguio + $Baler + $Baliuag + $Bataan + $Cabanatuan + $Cauayan + $Dagupan + $Dau + $Gapan + $Latrinidad + $Launion + $Laoag + $Malolos + $Meycauayan + $Olongapo + $Sanfernando + $Sanjose + $Santiago + $Tarlac + $Tuguegarao;
                $visayas = $Bacolod + $Cebu + $Consolacion + $Dumaguete + $Iloilo + $Kabankalan + $Mandaue + $Roxas + $Tacloban + $Tagbilaran / $branAmount;
                $mindanao= $Butuan + $Cagayan + $Davao + $Digos + $General + $Kidapawan + $Koronadal + $Malaybalay + $Tagum + $Valencia / $branAmount;
                $global= $Digostrike + $SCkoronadal + $SCpanabo / $branAmount;
                $mbl = $MBL / $branAmount;
                $globalsme= $SMEantipolo + $SMEmarikina + $Sanmateo / $branAmount;
                         
                

                $res['Month']['percentage']['gmanorth'] = $gmanorth;
                $res['Month']['percentage']['gmasouth'] = $gmasouth;
                $res['Month']['percentage']['northluzon'] = $northluzon;
                $res['Month']['percentage']['visayas'] = $visayas;
                $res['Month']['percentage']['mindanao'] = $mindanao;
                $res['Month']['percentage']['global'] = $global;
                $res['Month']['percentage']['mbl'] = $mbl;
                $res['Month']['percentage']['globalsme'] = $globalsme;

                $res['Month']['percentage']['total'] = $branAmount;




                $res['Antipolo'] = number_format($ant, 2, '.', ',');
                $res['Bacolod'] = number_format($Bacolod, 2, '.', ',');
                $res['Baguio'] = number_format($Baguio, 2, '.', ',');
                $res['Baler'] = number_format($Baler, 2, '.', ',');
                $res['Baliuag'] = number_format($Baliuag, 2, '.', ',');
                $res['Bataan'] = number_format($Bataan, 2, '.', ',');
                $res['Butuan'] = number_format($Butuan, 2, '.', ',');
                $res['Cabanatuan'] = number_format($Cabanatuan, 2, '.', ',');
                $res['Cagayan De Oro'] = number_format($Cagayan, 2, '.', ',');
                $res['Cainta'] = number_format($Cainta, 2, '.', ',');
                $res['Calamba'] = number_format($Calamba, 2, '.', ',');
                $res['Cauayan'] = number_format($Cauayan, 2, '.', ',');
                $res['Cavite'] = number_format($Cavite, 2, '.', ',');
                $res['Cebu'] = number_format($Cebu, 2, '.', ',');
                $res['Consolacion'] = number_format($Consolacion, 2, '.', ',');
                $res['Dagupan'] = number_format($Dagupan, 2, '.', ',');
                $res['Dau'] = number_format($Dau, 2, '.', ',');
                $res['Davao'] = number_format($Davao, 2, '.', ',');
                $res['Digos'] = number_format($Digos, 2, '.', ',');
                $res['Digos Trike'] = number_format($Digostrike, 2, '.', ',');
                $res['Dumaguete'] = number_format($Dumaguete, 2, '.', ',');
                $res['Gapan'] = number_format($Gapan, 2, '.', ',');
                $res['General'] = number_format($General, 2, '.', ',');
                $res['Harrison'] = number_format($Harrison, 2, '.', ',');
                $res['Head Office'] = number_format($Head, 2, '.', ',');
                $res['Iloilo'] = number_format($Iloilo, 2, '.', ',');
                $res['Imus'] = number_format($Imus, 2, '.', ',');
                $res['Intramuros'] = number_format($Intramuros, 2, '.', ',');
                $res['Kabankalan'] = number_format($Kabankalan, 2, '.', ',');
                $res['Kidapawan'] = number_format($Kidapawan, 2, '.', ',');
                $res['Koronadal'] = number_format($Koronadal, 2, '.', ',');
                $res['Latrinidad'] = number_format($Latrinidad, 2, '.', ',');
                $res['Launion'] = number_format($Launion, 2, '.', ',');
                $res['Lagro'] = number_format($Lagro, 2, '.', ',');
                $res['Laoag'] = number_format($Laoag, 2, '.', ',');
                $res['Las Piñas'] = number_format($Laspinas, 2, '.', ',');
                $res['Lipa'] = number_format($Lipa, 2, '.', ',');
                $res['Makati'] = number_format($Makati, 2, '.', ',');
                $res['Malaybalay'] = number_format($Malaybalay, 2, '.', ',');
                $res['Malolos'] = number_format($Malolos, 2, '.', ',');
                $res['Mandaue'] = number_format($Mandaue, 2, '.', ',');
                $res['Manila'] = number_format($Manila, 2, '.', ',');
                $res['Marikina'] = number_format($Marikina, 2, '.', ',');
                $res['MBL'] = number_format($MBL, 2, '.', ',');
                $res['Meycauayan'] = number_format($Meycauayan, 2, '.', ',');
                $res['Muntinlupa'] = number_format($Muntinlupa, 2, '.', ',');
                $res['Naga'] = number_format($Naga, 2, '.', ',');
                $res['Olongapo'] = number_format($Olongapo, 2, '.', ',');
                $res['Parañaque'] = number_format($Parañaque, 2, '.', ',');
                $res['POEA'] = number_format($POEA, 2, '.', ',');
                $res['Quezon Ave.'] = number_format($Quezonave, 2, '.', ',');
                $res['Roxas'] = number_format($Roxas, 2, '.', ',');
                $res['San Fernando, PA'] = number_format($Sanfernando, 2, '.', ',');
                $res['San Jose'] = number_format($Sanjose, 2, '.', ',');
                $res['San Mateo'] = number_format($Sanmateo, 2, '.', ',');
                $res['San Pablo'] = number_format($Sanpablo, 2, '.', ',');
                $res['Santiago'] = number_format($Santiago, 2, '.', ',');
                $res['SC Koronadal'] = number_format($SCkoronadal, 2, '.', ',');
                $res['SC Panabo'] = number_format($SCpanabo, 2, '.', ',');
                $res['SME Antipolo'] = number_format($SMEantipolo, 2, '.', ',');
                $res['SME Marikina'] = number_format($SMEmarikina, 2, '.', ',');
                $res['Tacloban'] = number_format($Tacloban, 2, '.', ',');
                $res['Tagbilaran'] = number_format($Tagbilaran, 2, '.', ',');
                $res['Tagum'] = number_format($Tagum, 2, '.', ',');
                $res['Tanay'] = number_format($Tanay, 2, '.', ',');
                $res['Tandangsora'] = number_format($Tandangsora, 2, '.', ',');
                $res['Tarlac'] = number_format($Tarlac, 2, '.', ',');
                $res['Tuguegarao'] = number_format($Tuguegarao, 2, '.', ',');
                $res['Valencia'] = number_format($Valencia, 2, '.', ',');
                $res['Valenzuela'] = number_format($Valenzuela, 2, '.', ',');
                


                $res['mon']['Antipolo'] = number_format($ant1);
                $res['mon']['Bacolod'] = number_format($Bacolod1);
                $res['mon']['Baguio'] = number_format($Baguio1);
                $res['mon']['Baler'] = number_format($Baler1);
                $res['mon']['Baliuag'] = number_format($Baliuag1);
                $res['mon']['Bataan'] = number_format($Bataan1);
                $res['mon']['Butuan'] = number_format($Butuan1);
                $res['mon']['Cabanatuan'] = number_format($Cabanatuan1);
                $res['mon']['Cagayan De Oro'] = number_format($Cagayan1);
                $res['mon']['Cainta'] = number_format($Cainta1);
                $res['mon']['Calamba'] = number_format($Calamba1);
                $res['mon']['Cauayan'] = number_format($Cauayan1);
                $res['mon']['Cavite'] = number_format($Cavite1);
                $res['mon']['Cebu'] = number_format($Cebu1);
                $res['mon']['Consolacion'] = number_format($Consolacion1);
                $res['mon']['Dagupan'] = number_format($Dagupan1);
                $res['mon']['Dau'] = number_format($Dau1);
                $res['mon']['Davao'] = number_format($Davao1);
                $res['mon']['Digos'] = number_format($Digos1);
                $res['mon']['Digos Trike'] = number_format($Digostrike1);
                $res['mon']['Dumaguete'] = number_format($Dumaguete1);
                $res['mon']['Gapan'] = number_format($Gapan1);
                $res['mon']['General'] = number_format($General1);
                $res['mon']['Harrison'] = number_format($Harrison1);
                $res['mon']['Head Office'] = number_format($Head1);
                $res['mon']['Iloilo'] = number_format($Iloilo1);
                $res['mon']['Imus'] = number_format($Imus1);
                $res['mon']['Intramuros'] = number_format($Intramuros1);
                $res['mon']['Kabankalan'] = number_format($Kabankalan1);
                $res['mon']['Kidapawan'] = number_format($Kidapawan1);
                $res['mon']['Koronadal'] = number_format($Koronadal1);
                $res['mon']['Latrinidad'] = number_format($Latrinidad1);
                $res['mon']['Launion'] = number_format($Launion1);
                $res['mon']['Lagro'] = number_format($Lagro1);
                $res['mon']['Laoag'] = number_format($Laoag1);
                $res['mon']['Las Piñas'] = number_format($Laspinas1, 2);
                $res['mon']['Lipa'] = number_format($Lipa1);
                $res['mon']['Makati'] = number_format($Makati1);
                $res['mon']['Malaybalay'] = number_format($Malaybalay1);
                $res['mon']['Malolos'] = number_format($Malolos1);
                $res['mon']['Mandaue'] = number_format($Mandaue1);
                $res['mon']['Manila'] = number_format($Manila1);
                $res['mon']['Marikina'] = number_format($Marikina1);
                $res['mon']['MBL'] = number_format($MBL1);
                $res['mon']['Meycauayan'] = number_format($Meycauayan1);
                $res['mon']['Muntinlupa'] = number_format($Muntinlupa1);
                $res['mon']['Naga'] = number_format($Naga1);
                $res['mon']['Olongapo'] = number_format($Olongapo1);
                $res['mon']['Parañaque'] = number_format($Parañaque1);
                $res['mon']['POEA'] = number_format($POEA1);
                $res['mon']['Quezon Ave.'] = number_format($Quezonave1);
                $res['mon']['Roxas'] = number_format($Roxas1);
                $res['mon']['San Fernando, PA'] = number_format($Sanfernando1);
                $res['mon']['San Jose'] = number_format($Sanjose1);
                $res['mon']['San Mateo'] = number_format($Sanmateo1);
                $res['mon']['San Pablo'] = number_format($Sanpablo1);
                $res['mon']['Santiago'] = number_format($Santiago1);
                $res['mon']['SC Koronadal'] = number_format($SCkoronadal1);
                $res['mon']['SC Panabo'] = number_format($SCpanabo1);
                $res['mon']['SME Antipolo'] = number_format($SMEantipolo1);
                $res['mon']['SME Marikina'] = number_format($SMEmarikina1);
                $res['mon']['Tacloban'] = number_format($Tacloban1);
                $res['mon']['Tagbilaran'] = number_format($Tagbilaran1);
                $res['mon']['Tagum'] = number_format($Tagum1);
                $res['mon']['Tanay'] = number_format($Tanay1);
                $res['mon']['Tandangsora'] = number_format($Tandangsora1);
                $res['mon']['Tarlac'] = number_format($Tarlac1);
                $res['mon']['Tuguegarao'] = number_format($Tuguegarao1);
                $res['mon']['Valencia'] = number_format($Valencia1);
                $res['mon']['Valenzuela'] = number_format($Valenzuela1);

                print_r(json_encode($res));

    }






}



?>