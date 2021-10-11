<?php
    $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Laporan Expired');
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage('L');
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //$pdf->Write(5, 'Laporan Stok Toko');
            $i=0;
            $j=0;
            $html='<table>
            <tr><td>Laporan Expired Barang</td></tr>
            <tr><td>PT Bintang Tujuh</td></tr>
            <tr><td>Periode : '.date('d-m-Y',strtotime($awal)).' s/d '.date('d-m-Y',strtotime($akhir)).'</td></tr>
            <tr><td>Toko : '.$toko['nama_toko'].'</td></tr>
            <tr><td>Merchandiser : '.$md['nama_md'].'</td></tr>
            <table>';
           
            $html.='<h3>Daftar Expired Barang</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="1">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="18%" align="center">Nama Barang</th>
                            <th width="26%" align="center">Nama Toko</th>
                            <th width="22%" align="center">Nama Md</th>
                            <th width="12%" align="center">Expired</th>
                        </tr>';
            foreach ($exp as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td>'.$row['nama_toko'].'</td>
                            <td>'.$row['nama_md'].'</td>
                            <td>'.date('d-m-Y',strtotime($row['tgl_expired'])).'</td>
                            
                        </tr>';
                }
            $html.='</table>';
            $html.='<h3>Daftar Expired Barang Kompetitor</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="1">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="18%" align="center">Nama Barang</th>
                            <th width="26%" align="center">Nama Toko</th>
                            <th width="22%" align="center">Nama Md</th>
                            <th width="12%" align="center">Expired</th>
                        </tr>';
            foreach ($exp_komp as $row) 
                {
                    $j++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$j.'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td>'.$row['nama_toko'].'</td>
                            <td>'.$row['nama_md'].'</td>
                            <td>'.date('d-m-Y',strtotime($row['tgl_expired'])).'</td>
                            
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('laporan stok.pdf', 'I');
?>