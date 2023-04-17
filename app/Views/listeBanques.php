<?php

use App\Libraries\Concrete\RegimeRapatriements\SocieteRegimeRapatriement;

?>

<p>This page uses frames. The current browser you are using does not
    support frames.</p>
<?= $this->extend("Template\base"); ?>
<?= $this->section("body") ?>
<?php
$Banky = new SocieteRegimeRapatriement();
echo 'BONJOUR<BR>';
$AgBqs = $Banky->_codeRegimeRapatriement('DC1', ['TYPE_DEMANDE' => 'I', 'CODE_STATUT' => 'VAL',    'ANNEE' => '2022']); //('040000122E03520');//('5003355787');//_Banque('00008'); // ,'01001');//'3000256078');
echo '<BR>';
if (isset($AgBqs)) {
    if (is_array($AgBqs)) {
        echo 'Count = ' . count($AgBqs) . '<BR>';
        foreach ($AgBqs as $AgBq) {
            echo 'ID_DEMANDE =' . $AgBq->ID_DEMANDE_DOMICILIATION . ' CODE_STATUT = ' . $AgBq->CODE_STATUT . ' NUMERO= ' . $AgBq->NUMERO_COMPTE . ' NIF = ' . $AgBq->NIF . ' DATE = ' . $AgBq->DATE_CREATION_DEMANDE . '<BR>';
        }
        echo '<BR> ';
    } else {
        echo '<BR> ';
        print_r($AgBqs);
        echo '<BR>';
    }
}
?>
<?= $this->endSection() ?>