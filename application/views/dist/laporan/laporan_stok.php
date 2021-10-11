<?php
    $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
    // set default header data

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetTitle('Laporan Stok');
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->AddPage();
    //$pdf->Write(5, 'Laporan Stok Toko');
            $i=0;
            $j=0;
            $html='<table>
            <tr><td>Laporan Stok Barang</td></tr>
            <tr><td>PT Bintang Tujuh</td></tr>
            <tr><td>Periode : '.$awal.' s/d '.$akhir.'</td></tr>
            <tr><td>Toko : '.$toko['nama_toko'].'</td></tr>
            <tr><td>Merchandiser : '.$md['nama_md'].'</td></tr>
            <table>';
           
            $html.='<h3>Daftar Stok Barang</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="1">
                        <tr bgcolor="#ffffff">
                            <th width="10%" align="center">No</th>
                            <th width="20%" align="center">Nama Barang</th>
                            <th width="20%" align="center">Nama Toko</th>
                            <th width="20%" align="center">Nama Md</th>
                            <th width="10%" align="center">Stok</th>
                        </tr>';
            foreach ($stok as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td>'.$row['nama_toko'].'</td>
                            <td>'.$row['nama_md'].'</td>
                            <td>'.$row['stok'].'</td>
                            
                        </tr>';
                }
            $html.='</table>';
            $html.='<h3>Daftar Stok Barang Kompetitor</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="1">
                        <tr bgcolor="#ffffff">
                            <th width="10%" align="center">No</th>
                            <th width="20%" align="center">Nama Barang</th>
                            <th width="20%" align="center">Nama Toko</th>
                            <th width="20%" align="center">Nama Md</th>
                            <th width="10%" align="center">Stok</th>
                        </tr>';
            foreach ($stok_komp as $row) 
                {
                    $j++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$j.'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td>'.$row['nama_toko'].'</td>
                            <td>'.$row['nama_md'].'</td>
                            <td>'.$row['stok'].'</td>
                            
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('laporan stok.pdf', 'I');
?>