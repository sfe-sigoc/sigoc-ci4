<?php

namespace App\Entities;

use CodeIgniter\I18n\Time;
use CodeIgniter\Entity\Entity;

class DomiciliationEntity extends Entity
{
    public $facturesDomiciliation; //import,export
    public $operations; //Creation,Modification,Annulation,Autorisation,Degagement,Transfert (Import)
    /*
    'demande_annulation_dom' => 'DEMANDE_ANNULATION_DOM',
    'demande_annulation_complement' => 'DEMANDE_ANNULATION_COMPL',
    'demande_autorisation' => 'DEMANDE_AUTORISATION',
    'demande_degagement' => 'DEMANDE_DEGAGEMENT',
    'demande_domiciliation' => 'DEMANDE_DOMICILIATION',
    'demande_modification_dom' => 'DEMANDE_MODIFICATION_DOM',
    'demande_modification_complement' => 'DEMANDE_MODIFICATION_COMPL',
    'demande_transfert' => 'DEMANDE_DE_TRANSFERT',
    'depasse_acompte' => 'DEPASSE_ACOMPTE',
    */
    public $regimeRapatrimement;
    public $paiementImports;  //transfert-PaiementImports->import
    public $apurementExports; //Rapatriement-Apurement->export, dispense de paiement
    public $secteurActivites;
    public $Daus;
    public $fraisDeGestions;
    public $infractions;
    public $agBanquesAutApurer; //banques autorisées à apurer cette domiciliation
    /*
    defined('INFRACTION_NON_RAPATRIEMENT') OR define('INFRACTION_NON_RAPATRIEMENT', 'NR');
    defined('INFRACTION_RETARD_RAPATRIEMENT') OR define('INFRACTION_RETARD_RAPATRIEMENT', 'RR');
    defined('INFRACTION_IMPORT_NON_APURER') OR define('INFRACTION_IMPORT_NON_APURER', 'INA');
    defined('INFRACTION_PAIEMENT_NON_APURER') OR define('INFRACTION_PAIEMENT_NON_APURER', 'PNA');
    defined('INFRACTION_PAIEMENT_EN_TROP') OR define('INFRACTION_PAIEMENT_EN_TROP', 'PET');
    defined('INFRACTION_DEPASSEMENT_ACOMPTE') OR define('INFRACTION_DEPASSEMENT_ACOMPTE', 'DAR');
    defined('INFRACTION_NEGOCE_SANS_MARGE') OR define('INFRACTION_NEGOCE_SANS_MARGE', 'NSM');
    defined('INFRACTION_NON_CESSION') OR define('INFRACTION_NON_CESSION', 'NC');

    defined('INFRACTION_NON_RAPATRIEMENT_NEGOCE') OR define('INFRACTION_NON_RAPATRIEMENT_NEGOCE', 'NRN');
    defined('INFRACTION_RETARD_RAPATRIEMENT_NEGOCE') OR define('INFRACTION_RETARD_RAPATRIEMENT_NEGOCE', 'RRN');
    */
    public $amendes;
    private $AMENDE_PAYER;
    private $TAUX_RAPAT_AV80P;
    //     defined('STATUT_VALIDE') OR define('STATUT_VALIDE', 'VAL');
    // defined('STATUT_EN_COURS') OR define('STATUT_EN_COURS', 'ENC');
    // defined('STATUT_CEDE') OR define('STATUT_CEDE', 'CED');
    // defined('STATUT_RAPATRIE_RETARD') OR define('STATUT_RAPATRIE_RETARD', 'RAR');
    // defined('STATUT_EXIGIBLE') OR define('STATUT_EXIGIBLE', 'EXI');
    // defined('STATUT_ANNULE') OR define('STATUT_ANNULE', 'ANN');
    // defined('STATUT_RAPATRIE') OR define('STATUT_RAPATRIE', 'RAP');
    // defined('STATUT_REJETE') OR define('STATUT_REJETE', 'REJ');
    // defined('STATUT_MODIFIE') OR define('STATUT_MODIFIE', 'MOD');
    // defined('STATUT_EN_ATTENTE') OR define('STATUT_EN_ATTENTE', 'EAV');
    // defined('STATUT_EMBARQUE') OR define('STATUT_EMBARQUE', 'EMB');
    // defined('STATUT_NON_RAPATRIE') OR define('STATUT_NON_RAPATRIE', 'NRP');
    // defined('STATUT_NON_EMBARQUE') OR define('STATUT_NON_EMBARQUE', 'NEM');
    // defined('STATUT_NON_PAYE') OR define('STATUT_NON_PAYE', 'NOP');
    // defined('STATUT_NON_DEBARQUE') OR define('STATUT_NON_DEBARQUE', 'NDE');
    // defined('STATUT_APURE') OR define('STATUT_APURE', 'APU');
    // defined('STATUT_PAYE') OR define('STATUT_PAYE', 'PAY');
    // defined('STATUT_PAYE_PARTIEL') OR define('STATUT_PAYE_PARTIEL', 'PAP');
    // defined('STATUT_APURE_PARTIEL') OR define('STATUT_APURE_PARTIEL', 'APP');
    // defined('STATUT_RAPATRIE_PARTIEL') OR define('STATUT_RAPATRIE_PARTIEL', 'RPP');
    // defined('STATUT_NON_APURE') OR define('STATUT_NON_APURE', 'NAP');
    // defined('STATUT_NON_CEDE') OR define('STATUT_NON_CEDE', 'NCD');
    // defined('STATUT_EMBARQUE_MODIFIE') OR define('STATUT_EMBARQUE_MODIFIE', 'EMM');
    // defined('STATUT_DEBARQUE') OR define('STATUT_DEBARQUE', 'DEB');
    // defined('STATUT_DEBARQUE_MODIFIE') OR define('STATUT_DEBARQUE_MODIFIE', 'DEM');
    // defined('STATUT_EN_RETARD') OR define('STATUT_EN_RETARD', 'ENR');
    // defined('STATUT_FAVORABLE') OR define('STATUT_FAVORABLE', 'FAV');
    // defined('STATUT_DEFAVORABLE') OR define('STATUT_DEFAVORABLE', 'DEF');
    // defined('STATUT_SANS_AVIS') OR define('STATUT_SANS_AVIS', 'SSA');
    // defined('STATUT_EN_ATTENTE_DECISION_SUPERIEUR_HIERARCHIQUE') OR define('STATUT_EN_ATTENTE_DECISION_SUPERIEUR_HIERARCHIQUE', 'EAD');
    // defined('STATUT_EN_ATTENTE_COMPLEMENT_DOSSIER') OR define('STATUT_EN_ATTENTE_COMPLEMENT_DOSSIER', 'EAC');
    // defined('STATUT_SUPPRIME') OR define('STATUT_SUPPRIME', 'DEL');
    // defined('STATUT_TRANSFERE') OR define('STATUT_TRANSFERE', 'TRF');

    // defined('STATUT_A_TRAITER') OR define('STATUT_A_TRAITER', 'TDO');
    // defined('STATUT_PIECE_NON_CONFORME') OR define('STATUT_PIECE_NON_CONFORME', 'PNC');
    // defined('STATUT_INTROUVABLE') OR define('STATUT_INTROUVABLE', 'NOF');
    //     defined('DOMICILIATION_IMPORT') OR define('DOMICILIATION_IMPORT', 'Import');
    // defined('DOMICILIATION_EXPORT') OR define('DOMICILIATION_EXPORT', 'Export');
    // defined('DOMICILIATION_TYPE_IMPORT') OR define('DOMICILIATION_TYPE_IMPORT', 'I');
    // defined('DOMICILIATION_TYPE_EXPORT') OR define('DOMICILIATION_TYPE_EXPORT', 'E');

    // defined('DOMICILIATION_TYPE_NEGOCE') OR define('DOMICILIATION_TYPE_NEGOCE', 'N');
    // defined('DOMICILIATION_NEGOCE') OR define('DOMICILIATION_NEGOCE', 'Negoce');

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        // Initialiser la liste d'agences avec un tableau vide.
        $this->facturesDomiciliation = [];
        $this->operations = [];
        $this->paiementImports = [];
        $this->apurementExports = [];
        $this->Daus = [];
        $this->fraisDeGestions = [];
        $this->infractions = [];
        $this->agBanquesAutApurer = []; //ban
        helper('date');
    }
    //EXIGIBLE DOM
    public function getTAUX_RAPAT_AV80P()
    {
        $mtRapat = $this->attributes['MONTANT_RAPATRIEMENT'];
        $this->attributes['TAUX_RAPAT_AV80P'] = ($this->attributes['MONTANT_GLOBAL'] - ((isset($mtRapat)) ? $mtRapat : 0)) * $this->attributes['COURS_DEVISE'];
        return $this;
    }
    public function getRETARD()
    {
        $statut = array('VAL', 'EMB', 'RPP');
        $typeDemande = array('E', 'N');
        $this->attributes['RETARD'] = null;
        if (in_array($this->attributes['CODE_STATUT'], $statut)) {
            if ($this->attributes['APURER_PAR_TRANSACTION'] == 0) {
                if (in_array($this->attributes['TYPE_DEMANDE'], $typeDemande)) {
                    if ($this->attributes['DATE_PREVU_RAPATRIEMENT'] < Time::now()) {
                        $aujourdhui = Time::now();
                        $diff = $aujourdhui->difference(Time::parse($this->attributes['DATE_PREVU_RAPATRIEMENT']));
                        $this->attributes['RETARD'] = $diff->getDays();
                    }
                }
            }
        }
        return  $this;
    }
    public function aucun_rapat()
    {
        $this->attributes['RETARD'] = null;
        if ($this->attributes['DATE_PREVU_RAPATRIEMENT'] < $this->attributes['DATE_RAPATRIEMENT']) {
            if ($this->attributes['TYPE_DEMANDE'] == 'E') {
                if ($this->attributes['CODE_STATUT'] == 'APU') {
                    if ($this->attributes['APURER_PAR_TRANSACTION'] == 0) {
                        $dateRapatriement = Time::parse($this->attributes['DATE_RAPATRIEMENT']);
                        $diff = $dateRapatriement->difference(Time::parse($this->attributes['DATE_PREVU_RAPATRIEMENT']));
                        $this->attributes['RETARD'] = $diff->getDays();
                    }
                }
            }
        }
        return $this;
    }
    private function enlever_non_en_retard()
    {
        $this->attributes['RETARD'] = null;
        if ($this->attributes['DATE_PREVU_RAPATRIEMENT'] > Time::now()) {
            if ($this->attributes['TYPE_DEMANDE'] == 'E') {
                $this->attributes['RETARD'] = null;
            }
        }
        return $this;
    }
    private function enlever_apurer_en_avance()
    {
        $this->attributes['RETARD'] = null;
        if ($this->attributes['DATE_PREVU_RAPATRIEMENT'] < $this->attributes['DATE_RAPATRIEMENT']) {
            if ($this->attributes['TYPE_DEMANDE'] == 'E') {
                if ($this->attributes['CODE_STATUT'] == 'APU') {
                    if ($this->attributes['APURER_PAR_TRANSACTION'] == 0) {
                        $this->attributes['RETARD'] = null;
                    }
                }
            }
        }
        return $this;
    }
    //     defined('LIMITE_TAUX_RETARD') OR define('LIMITE_TAUX_RETARD', 'taux_mensuel_retard');
    //     // 31	taux_mensuel_retard	0,01	04/02/2020 11:45:06	1	Taux progressif mensuel amende transactionnelle pour retard de rapatriement	NUM
    //     defined('LIMITE_TAUX_SEUIL_RETARD') OR define('LIMITE_TAUX_SEUIL_RETARD', 'seuil_retardnonrapat');
    //     // 32	seuil_retardnonrapat	12	04/02/2020 11:45:25	1	Nombre de mois au delà duquel le taux amende pour retard de rapatriement est le même que le taux pour non rapatriement	NUM
    //     defined('LIMITE_TAUX_NON_RAPAT') OR define('LIMITE_TAUX_NON_RAPAT', 'taux_non_rapat');
    //     // 29	taux_non_rapat	0,15	05/04/2022 11:33:39	1	Taux amende transactionnelle pour non rapatriement des exportations	NUM
    //     defined('LIMITE_TAUX_SUP_ARRONDIR') OR define('LIMITE_TAUX_SUP_ARRONDIR', 'arrondir_sup_amende');
    // $taux_amende_transactionnel_retard = taux_amende_transactionnel((int)$d->RETARD, $taux_retard_mensuel/* 0.01 */, $seuil_retardnonrapat/* 12 */, $taux_non_rapat /* 0.15 */, $est_taux_amende_arrondi_sup/* égale à 0-> false */);
}
