<?php

/**
 * Model for CNVParticipationRecap
 */
class CnvValidationRecap_model extends MY_Model
{
    protected $id;
    protected $reference_validation;
    protected $date_validation;
    protected $user_validation;
    protected $etat_recap_path;
    protected $user_saisie;
    protected $date_saisie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->table = $this->config->item('ssoc_tables')['recap_validation_cnv'];
    }

    /**
     * Set reference validation
     * 
     * @return \CnvValidationRecap_model
     */
    public function setReference_validation($reference_validation)
    {
        $this->reference_validation = $reference_validation;
        return $this;
    }

    /**
     * Set date validation
     * 
     * @return \CnvValidationRecap_model
     */
    public function setDate_validation($date_validation)
    {
        $this->date_validation = $date_validation;
        return $this;
    }

    /**
     * Set user validation
     * 
     * @return \CnvValidationRecap_model
     */
    public function setUser_validation($user_validation)
    {
        $this->user_validation = $user_validation;
        return $this;
    }

    /**
     * Set etat recap path
     * 
     * @return \CnvValidationRecap_model
     */
    public function setEtat_recap_path($etat_recap_path)
    {
        $this->etat_recap_path = $etat_recap_path;
        return $this;
    }

    /**
     * Set user saisie
     * 
     * @return \CnvValidationRecap_model
     */
    public function setUser_saisie($user_saisie)
    {
        $this->user_saisie = $user_saisie;
        return $this;
    }

    /**
     * Set date saisie
     * 
     * @return \CnvValidationRecap_model
     */
    public function setDate_saisie($date_saisie)
    {
        $this->date_saisie = $date_saisie;
        return $this;
    }

    /**
     * Set validation recap Id
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reference validation
     * 
     * @return string
     */
    public function getReference_validation()
    {
        return $this->reference_validation;
    }

    /**
     * Set date validation
     * 
     * @return string
     */
    public function getDate_validation()
    {
        return $this->date_validation;
    }

    /**
     * Set user validation
     * 
     * @return string
     */
    public function getUser_validation()
    {
        return $this->user_validation;
    }

    /**
     * Set etat recap path
     * 
     * @return string
     */
    public function getEtat_recap_path()
    {
        return $this->etat_recap_path;
    }

    /**
     * Set user saisie
     * 
     * @return string
     */
    public function getUser_saisie()
    {
        return $this->user_saisie;
    }

    /**
     * Set date saisie
     * 
     * @return string
     */
    public function getDate_saisie()
    {
        return $this->date_saisie;
    }

    /**
     * Create empty record
     */
    public function new_instance()
    {
        return new static();
    }
    
    /**
     * Find a record by ID
     * 
     * @return \CnvValidationRecap_model
     */
    public function find_by_id($id)
    {
        if (empty($id)) {
            return null;
        }

        $query_select = '"cnv_recap".ID_RECAP_VALIDATION_CNV, 
                        "cnv_recap".REFERENCE_VALIDATION,
                        to_char("cnv_recap".DATE_VALIDATION, \'DD/MM/YYYY\') as DATE_VALIDATION,
                        "cnv_recap".USER_VALIDATION,
                        "cnv_recap".ETAT_RECAP_PATH,
                        "cnv_recap".USER_SAISIE,
                        to_char("cnv_recap".DATE_SAISIE, \'DD/MM/YYYY\') as DATE_SAISIE';
        $result = $this->db->select($query_select, FALSE)
            ->distinct()
            ->from($this->table . ' cnv_recap')
            ->where('ID_RECAP_VALIDATION_CNV = ', $id)
            ->get()
            ->result();
        
        if (count($result) < 1) {
            return false;
        }

        $result = $result[0];

        $record = $this->new_instance();
        $record->id = ($result->ID_RECAP_VALIDATION_CNV);
        $record->setReference_validation($result->REFERENCE_VALIDATION);
        $record->setDate_validation($result->DATE_VALIDATION);
        $record->setUser_validation($result->USER_VALIDATION);
        $record->setEtat_recap_path($result->ETAT_RECAP_PATH);
        $record->setUser_saisie($result->USER_SAISIE);
        $record->setDate_saisie($result->DATE_SAISIE);

        return $record;
    }

    /**
     * Retrieve record by Id
     */
    public function retrieve($id)
    {
        $record = $this->find_by_id($id);

        if (!$record) {
            return false;
        }

        $this->id = $record->getId();
        $this->setReference_validation($record->getReference_validation());
        $this->setDate_validation($record->getDate_validation());
        $this->setUser_validation($record->getUser_validation());
        $this->setEtat_recap_path($record->getEtat_recap_path());
        $this->setUser_saisie($record->getUser_saisie());
        $this->setDate_saisie($record->getDate_saisie());

        return true;
    }

    /**
     * Save record into DB
     * 
     * @return bool
     */
    public function save()
    {
        $this->db->trans_start();

        $validation_id = $this->get_sequence_next_id(ORCL_SEQ_S_RECAP_VALIDATION_CNV);

        $arr = array(   
            'ID_RECAP_VALIDATION_CNV' => $validation_id,
            'REFERENCE_VALIDATION' => $this->getReference_validation(),
            'USER_VALIDATION' => $this->getUser_validation(),
            'ETAT_RECAP_PATH' => $this->getEtat_recap_path(),
            'USER_SAISIE' => $this->getUser_saisie(),
        );

        $validation_status = $this->create(
            $arr,
            array(
                'DATE_SAISIE' => ORCL_SYSDATE,
                'DATE_VALIDATION' => $this->getDate_validation(),
            )
        );

        $this->db->trans_complete();

        $this->retrieve($validation_id);

        return $validation_status;
    }

    /**
     * Object to Array conversion
     */
    public function toArray() 
    {
        $props = ['id', 'reference_validation', 'date_validation', 'user_validation', 'etat_recap_path', 'user_saisie', 'date_saisie'];

        $return = [];
        foreach ($props as $prop) {
            $method = "get" . ucfirst($prop);
            $return[$prop] = $this->$method();
        }

        return $return;
    }
}