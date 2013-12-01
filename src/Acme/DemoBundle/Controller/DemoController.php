<?php

namespace Acme\DemoBundle\Controller;

use Jlaso\ZimbraSoapApiBundle\Service\Admin\AccountAdmin;
use Jlaso\ZimbraSoapApiBundle\Service\Admin\AliasAdmin;
use Jlaso\ZimbraSoapApiBundle\Service\Admin\CosAdmin;
use Jlaso\ZimbraSoapApiBundle\Service\Admin\DomainAdmin;
use Jlaso\ZimbraSoapApiBundle\Service\ZCS\SoapClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/account/list", name="_demo_accounts")
     * @Template()
     */
    public function indexAccountAction()
    {
        /** @var AccountAdmin $accountAdmin */
        $accountAdmin = $this->get('jlaso_zimbra_soap_api.account_admin');

        $accounts = $accountAdmin->getAccountList();

        return array(
            'accounts' => $accounts,
        );
    }

    /**
     * @Route("/account/{id}", name="_demo_account")
     * @Template()
     */
    public function viewAccountAction($id)
    {
        /** @var AccountAdmin $accountAdmin */
        $accountAdmin = $this->get('jlaso_zimbra_soap_api.account_admin');

        $account = $accountAdmin->getAccount($id);

        return array(
            'account' => $account,
        );
    }

    /**
     * @Route("/domain", name="_demo_domains")
     * @Template()
     */
    public function indexDomainsAction()
    {
        /** @var DomainAdmin $domainAdmin */
        $domainAdmin = $this->get('jlaso_zimbra_soap_api.domain_admin');

        $domains = $domainAdmin->getDomains();

        return array(
            'domains' => $domains
        );
    }

    /**
     * @Route("/domain/{id}", name="_demo_domain")
     * @Template()
     */
    public function viewDomainAction($id)
    {
        /** @var DomainAdmin $domainAdmin */
        $domainAdmin = $this->get('jlaso_zimbra_soap_api.domain_admin');

        $domain = $domainAdmin->getDomain($id);

        return array(
            'domain' => $domain
        );
    }

    /**
     * @Route("/alias/{id}", name="_demo_aliases")
     * @Template()
     */
    public function indexAliasAction($id = '*')
    {
        /** @var AliasAdmin $aliasAdmin */
        $aliasAdmin = $this->get('jlaso_zimbra_soap_api.alias_admin');

        $aliases = $aliasAdmin->getAliasListByAccount($id);

        return array(
            'aliases' => $aliases
        );
    }

    /**
     * @Route("/cos", name="_demo_coses")
     * @Template()
     */
    public function indexCosAction()
    {
        /** @var CosAdmin $cosAdmin */
        $cosAdmin = $this->get('jlaso_zimbra_soap_api.cos_admin');

        $coses = $cosAdmin->getCosList();

        return array(
            'coses' => $coses
        );
    }



    /**
     * @Route("/cos/{id}", name="_demo_cos")
     * @Template()
     */
    public function viewCosAction($id)
    {
        /** @var CosAdmin $cosAdmin */
        $cosAdmin = $this->get('jlaso_zimbra_soap_api.cos_admin');

        $cos = $cosAdmin->getCos($id);

        //print('<pre>');var_dump($cos); die;
        return array(
            'cos' => $cos
        );
    }


}
