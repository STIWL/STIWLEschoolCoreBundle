<?php

namespace Esolving\Eschool\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller {

    public function deniedAction() {
        return $this->render('EsolvingEschoolCoreBundle:Core:denied.html.twig');
    }

    public function javascriptDisabledAction() {
        return $this->render('EsolvingEschoolCoreBundle:Core:javascriptDisabled.html.twig');
    }

    public function setLanguageAction($route) {
//        $this->getRequest()->setLocale($this->getRequest()->get('ddlbLanguages'));
        $_locale = $this->getRequest()->get('ddlbLanguage');
        if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
            if ($this->getRequest()->get('admin')) {
                return $this->redirect($this->generateUrl('sonata_admin_dashboard', array('_locale' => $_locale)));
            } else {
                return $this->redirect($this->generateUrl('esolving_eschool_userB_index', array('_locale' => $_locale)));
            }
        } else {
            if ($this->getRequest()->get('user')) {
                return $this->redirect($this->generateUrl('esolving_eschool_userB_index', array('_locale' => $_locale)));
            } else {
                return $this->redirect($this->generateUrl('esolving_eschool_guestB_index', array('_locale' => $_locale)));
            }
        }
//        return $this->redirect($this->generateUrl($this->getRequest()->get('_route')));
    }

}
