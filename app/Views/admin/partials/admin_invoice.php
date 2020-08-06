<style type="text/css">
    body {
        font-family: Arial, calibri;
    }
    .invoice {
        margin: 30px auto;
        width: 700px
    }
    .invoice table {
        width: 100%;
        border:1px solid;
        border-spacing: 0px;
        border-collapse: separate;
    }
    .invoice table th,
    .invoice table td {
        padding: 5px;
    }
    .invoice table thead th {
        border-bottom:1px solid;
    }
    .invoice table td {
        border-right:1px solid;
        text-align: left;
        vertical-align: top;
    }
    .invoice table tbody tr td:last-child,
    .invoice table thead th:last-child {
        border-right:none;
    }
    .invoice table thead th {
        border-right:1px solid;
        text-align: center;
        font-style: italic;
    }
</style>
<div class="invoice">
    <p style="text-align:right"><b>DATE : <?php echo date('d/m/Y') ?></b></p>
    <h1 style="text-align: center">Facture N°: <?php echo $invoiceId ?>/<?php echo date('y') ?></h1>
    <p><b>Client :</b> <?php echo $vehicle['cf_name'] ?> <?php echo $vehicle['cl_name'] ?></p>
    <p><b>Adresse :</b> <?php echo $vehicle['c_address'] ?></p>
    <p style="text-align:right"><b>Matricule Fiscal :</b> 827892/R</p>
    <br>
    <br>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th><i>Désignation</i></th>
                    <th><i>Nbr jours</i></th>
                    <th><i>Tarif jour HT</i></th>
                    <th><i>Montant H.T</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height: 300px">
                        Location d'une Voiture 
                        <br>
                        <br>
                        <br>
                        <br>
                        Du : <?php echo $startDate ?> Au <?php echo $endDate ?>
                        <br>
                        Contrat de location N°: <?php echo $invoiceId ?>
                    </td>
                    <td>
                        <?php echo $days ?>j
                    </td>
                    <td>
                        <?php echo number_format($rentPricePerDayExcluVat, 3) ?>
                    </td>
                    <td>
                        <?php echo number_format($subTotal, 3) ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: right">Montant : H.T.V.A</td>
                    <td><?php echo number_format($subTotal, 3) ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: right">TVA <?php echo $tax ?>%</td>
                    <td><?php echo number_format(($subTotal * $tax / 100), 3) ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Timbre Fiscal</td>
                    <td><?php echo number_format($stampTax, 3) ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Montant T.T.C</td>
                    <td><?php echo number_format($total, 3) ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <p><b>Arrêtée la présente facture à la somme de :</b> <?php echo $totalLabel ?></p>

    </div>
    </div>