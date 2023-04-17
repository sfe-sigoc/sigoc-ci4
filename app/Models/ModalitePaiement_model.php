<?php

/**
 * Created by PhpStorm.
 * User: Herizo
 * Date: 11/05/2016
 * Time: 17:37
 */
class ModalitePaiement_model extends MY_Model implements JsonSerializable
{

    private $code_modalite;
    private $libelle_modalite;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->config->item('ssoc_tables')['modalite_paiement'];
    }

    public function get_modalites_paiement()
    {
        // $_modalites = array();
        $_modaliteResults = parent::read();
        $array_CODE_MODALITE_PAIEMENT = array_unique(array_column($_modaliteResults, 'LIBELLE_MODALITE_PAIEMENT', 'CODE_MODALITE_PAIEMENT'));
        $arrayModalites = array_map(function ($code, $libelle) {
            return $code . ' - ' . $libelle;
        }, array_keys($array_CODE_MODALITE_PAIEMENT), array_values($array_CODE_MODALITE_PAIEMENT));
        return $arrayModalites;
        // foreach ($_modaliteResults as $_modaliteResult) {
        //     $_code = $_modaliteResult->CODE_MODALITE_PAIEMENT;
        //     $_libelle = $_modaliteResult->LIBELLE_MODALITE_PAIEMENT;
        //     $_modalites[$_code] = $_code . ' - ' . $_libelle;
        // }
        // return $_modalites;
    }

    public function get_code_modalites_paiement()
    {
        $_modalites = array();
        $_modaliteResults = parent::read('CODE_MODALITE_PAIEMENT');
        foreach ($_modaliteResults as $_modaliteResult) {
            $_modalites[$_modaliteResult->CODE_MODALITE_PAIEMENT] = $_modaliteResult->CODE_MODALITE_PAIEMENT;
        }
        return $_modalites;
    }

    /**
     * @return mixed
     */
    public function getCodeModalite()
    {
        return $this->code_modalite;
    }

    /**
     * @param mixed $code_modalite
     * @return ModalitePaiement_model
     */
    public function setCodeModalite($code_modalite)
    {
        $this->code_modalite = $code_modalite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelleModalite()
    {
        return $this->libelle_modalite;
    }

    /**
     * @param mixed $libelle_modalite
     * @return ModalitePaiement_model
     */
    public function setLibelleModalite($libelle_modalite)
    {
        $this->libelle_modalite = $libelle_modalite;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function get_all_modalite_paiement()
    {
        $_modalite_paiementResults = parent::read('*');
        $_modalite_paiements = array();

        foreach ($_modalite_paiementResults as $_modalite_paiementResult) {
            $_b = new ModalitePaiement_model();
            $_modalite_paiements[] = $_b->setCodeModalite($_modalite_paiementResult->CODE_MODALITE_PAIEMENT)
                ->setLibelleModalite($_modalite_paiementResult->LIBELLE_MODALITE_PAIEMENT);
        }

        return $_modalite_paiements;
    }

    public function get_modalite_paiements_per_page($page = 0, $per_page = PAGINATION_PER_PAGE)
    {
        $_mpResultsCount = parent::count();
        $_mpResults = parent::read('*', array(), 'LIBELLE_MODALITE_PAIEMENT', 'ASC', $per_page, $page * $per_page);
        $_mps = array();

        foreach ($_mpResults as $_mpResult) {
            $_b = new ModalitePaiement_model();
            $_mps[] = $_b->setCodeModalite($_mpResult->CODE_MODALITE_PAIEMENT)
                ->setLibelleModalite($_mpResult->LIBELLE_MODALITE_PAIEMENT);
        }
        $this->load->model('PagedList_model');
        $pagedList = new PagedList_model();
        $pagedList->setPageCourant($page)->setItems($_mps)->setParPage($per_page)
            ->setTotalItems($_mpResultsCount);
        return $pagedList;
    }

    public function get_modalite_paiement($code_modalite_paiement)
    {
        $_mp = parent::read('*', array('CODE_MODALITE_PAIEMENT' => $code_modalite_paiement));
        $_a = new ModalitePaiement_model();

        if (count($_mp) == 1) {
            $_bk = $_mp[0];
            $_a->setCodeModalite($_bk->CODE_MODALITE_PAIEMENT)
                ->setLibelleModalite($_bk->LIBELLE_MODALITE_PAIEMENT);
            return $_a;
        }
        return NULL;
    }

    public function create_modalite_paiement(ModalitePaiement_model $mp)
    {
        return parent::create(
            array(
                'CODE_MODALITE_PAIEMENT' => $mp->getCodeModalite(),
                'LIBELLE_MODALITE_PAIEMENT' => $mp->getLibelleModalite()
            )
        );
    }

    public function update_modalite_paiement(ModalitePaiement_model $mp, $where)
    {
        return parent::update(
            $where,
            array(
                'LIBELLE_MODALITE_PAIEMENT' => $mp->getLibelleModalite()
            )
        );
    }

    public function get_delai_garde($code_modalite)
    {
        $r = parent::read_first('DELAI_GARDE', array('CODE_MODALITE_PAIEMENT' => $code_modalite));
        if ($r !== NULL) {
            return (int) $r->DELAI_GARDE;
        }
        return 0;
    }

    public function get_min_delai_garde($numero_doms)
    {
        $table_ddom = $this->config->item('ssoc_tables')['demande_domiciliation'];
        $table_dom = $this->config->item('ssoc_tables')['domiciliation'];
        $row = $this->db->select_min('"modalite".DELAI_GARDE')
            ->from($table_dom . ' dom')
            ->join($table_ddom . ' ddom', 'dom.ID_DEMANDE_DOMICILIATION = ddom.ID_DEMANDE_DOMICILIATION')
            ->join($this->table . ' modalite', 'ddom.CODE_MODALITE_PAIEMENT = modalite.CODE_MODALITE_PAIEMENT')
            ->where_in(array('"dom".NUMERO_DOMICILIATION', $numero_doms))
            ->get()->row();
        if ($row !== NULL) {
            return (int) $row->DELAI_GARDE;
        }
        return NULL;
    }
}
