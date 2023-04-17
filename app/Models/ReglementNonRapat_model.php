<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * Created on 02 oct 2017 09:41:45 by Herizo
 */

/**
 * Description of ReglementNonRapat_model
 *
 * @author Herizo
 */


class ReglementNonRapat_model extends MY_Model implements JsonSerializable {

	private $chemin_dr;
	private $date_dr;
	private $id_reglement;
	private $id_relance;
	private $login_createur;
	private $date_creation_reglement;
    private $numero_cheque;
    private $code_statut;
    private $libelle_statut;
    private $date_validation;
    private $montant_versement;


	public function __construct() {
        parent::__construct();
        $this->table = $this->config->item('ssoc_tables')['reglement_non_rapat'];
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }


    /**
     * @return mixed
     */
    public function getMontantVersement()
    {
        return $this->montant_versement;
    }

    /**
     * @param mixed $montant_versement
     *
     * @return self
     */
    public function setMontantVersement($montant_versement)
    {
        $this->montant_versement = $montant_versement;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getCheminDr()
    {
        return $this->chemin_dr;
    }

    /**
     * @param mixed $chemin_pv
     *
     * @return self
     */
    public function setCheminDr($chemin_dr)
    {
        $this->chemin_dr = $chemin_dr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDr()
    {
        return $this->date_dr;
    }

    /**
     * @param mixed $date_dr
     *
     * @return self
     */
    public function setDateDr($date_dr)
    {
        $this->date_dr = $date_dr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdReglement()
    {
        return $this->id_reglement;
    }

    /**
     * @param mixed $id_reglement
     *
     * @return self
     */
    public function setIdReglement($id_reglement)
    {
        $this->id_reglement = $id_reglement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRelance()
    {
        return $this->id_relance;
    }

    /**
     * @param mixed $id_relance
     *
     * @return self
     */
    public function setIdRelance($id_relance)
    {
        $this->id_relance = $id_relance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginCreateur()
    {
        return $this->login_createur;
    }

    /**
     * @param mixed $login_createur
     *
     * @return self
     */
    public function setLoginCreateur($login_createur)
    {
        $this->login_createur = $login_createur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreationReglement()
    {
        return $this->date_creation_reglement;
    }

    /**
     * @param mixed $date_creation_reglement
     *
     * @return self
     */
    public function setDateCreationReglement($date_creation_reglement)
    {
        $this->date_creation_reglement = $date_creation_reglement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroCheque()
    {
        return $this->numero_cheque;
    }

    /**
     * @param mixed $numero_cheque
     *
     * @return self
     */
    public function setNumeroCheque($numero_cheque)
    {
        $this->numero_cheque = $numero_cheque;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeStatut()
    {
        return $this->code_statut;
    }

    /**
     * @param mixed $code_statut
     *
     * @return self
     */
    public function setCodeStatut($code_statut)
    {
        $this->code_statut = $code_statut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelleStatut()
    {
        return $this->libelle_statut;
    }

    /**
     * @param mixed $libelle_statut
     *
     * @return self
     */
    public function setLibelleStatut($libelle_statut)
    {
        $this->libelle_statut = $libelle_statut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateValidation()
    {
        return $this->date_validation;
    }

    /**
     * @param mixed $date_validation
     *
     * @return self
     */
    public function setDateValidation($date_validation)
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    public function get_reglements_by_relance($id_relance) {
        $results = $this->db->select('ID_RELANCE_SSOC, ID_REGLEMENT, MONTANT_VERSEMENT, CODE_STATUT, NUMERO_CHEQUE, '
                            . ' to_char(DATE_DR, \'DD/MM/YYYY\') as DATE_DR'
                            , FALSE)
                        ->from($this->table)
                        ->where('ID_RELANCE_SSOC', $id_relance)
                        ->order_by('DATE_DR', 'DESC')
                        ->order_by('DATE_CREATION_REGLEMENT', 'DESC')
                        ->get()->result();

        $reglements = array();
        foreach ($results as $r) {
            $reglement_model = new ReglementNonRapat_model();
            $reglement_model->setIdReglement($r->ID_REGLEMENT)
                            ->setIdRelance($r->ID_RELANCE_SSOC)
                            ->setMontantVersement(string_vers_float($r->MONTANT_VERSEMENT))
                            ->setDateDr($r->DATE_DR);
            $reglements[] = $reglement_model;
        }

        return $reglements;
    }

    public function is_download_authorized($id_relance, $id_reglement) {
        $table_relance = $this->config->item('ssoc_tables')['relance_ssoc'];
        $relance = $this->db->select('"reglement".CHEMIN_DR, "relance".NIF')
                        ->from($this->table . ' reglement')
                        ->join($table_relance . ' relance', 'reglement.ID_RELANCE_SSOC = relance.ID_RELANCE_SSOC')
                        ->where(array('"reglement".ID_RELANCE_SSOC' => $id_relance, '"reglement".ID_REGLEMENT' => $id_reglement))
                        ->get()->row();
        if ($relance !== NULL) {
            $current_user = $this->userprofile->getCurrentUser();
            $is_authorized = FALSE;
            switch ($current_user['CODE_GROUPE']) {
                case OPERATEUR:
                    $is_authorized = $current_user['NIF'] === $relance->NIF;
                    break;
                case VIP:
                case ADMIN:
                case DOF:
                case DGT:
                case ADMIN_LOW:
                    $is_authorized = TRUE;
                    break;
                default :
                    $is_authorized = FALSE;
                    break;
            }
            if ($this->userprofile->isSSOC()) {
                $is_authorized = TRUE;
            }

            return array('authorized' => $is_authorized, 'relance' => $relance);
        }
        return array('authorized' => FALSE);
    }
}