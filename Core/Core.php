<?php

namespace Esolving\Eschool\CoreBundle\Core;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\Translator;
use Symfony\Component\DependencyInjection\Container;

class Core {

    private $translator;
    private $container;

    public function __construct(Translator $translator, Container $container) {
        $this->translator = $translator;
        $this->container = $container;
    }

    public function getTypeByCategoryByLanguage($xcategory, $xlanguage) {
        return $getSex = $this
                ->container
                ->get("doctrine")
                ->getRepository("EsolvingEschoolCoreBundle:Type")
                ->findByCategoryByLanguage($xcategory, $xlanguage);
        ;
    }

    public function getTypeByCategoryByLanguageObject($xlanguage) {
        return $getSex = $this
                ->container
                ->get("doctrine")
                ->getRepository("EsolvingEschoolCoreBundle:Type")
                ->findAllCustomObject($xlanguage);
        ;
    }

    public function getLanguages() {
//        $finder = new Finder();
//        $languages = $finder->directories()->depth("0")->in("../app/Resources/translations/");
//        return $languages;
        $languages['es'] = $this->translator->trans('spanish', array(), 'EsolvingEschoolCoreBundle');
        $languages['en'] = $this->translator->trans('english', array(), 'EsolvingEschoolCoreBundle');
        $languages['fr'] = $this->translator->trans('french', array(), 'EsolvingEschoolCoreBundle');
        return $languages;
    }

    public function getSectionId() {
        $getTokenUser = $this->container->get('security.context')->getToken()->getUser();
        $section = ($this->container->get('session')->get('section') != "") ? $this->container->get('session')->get('section') : $getTokenUser->getSectionType()->getId();
        return $section;
    }

    public function getSection() {
        $language = $this->container->get('request')->getLocale();
        $em = $this->container->get('doctrine')->getManager();
        $section = $em->getRepository('EsolvingEschoolCoreBundle:Type')->findOneByTypeIdByLanguage($this->getSectionId(), $language);
        return $section;
    }

    public function getHeadquarter() {
        $language = $this->container->get('request')->getLocale();
        $em = $this->container->get('doctrine')->getManager();
        $headquarter = $em->getRepository('EsolvingEschoolCoreBundle:Type')->findOneByTypeIdByLanguage($this->getHeadquarterId(), $language);
        return $headquarter;
    }

    public function getHeadquarterId() {
        $getTokenUser = $this->container->get('security.context')->getToken()->getUser();
        $headquarter = ($this->container->get('session')->get('headquarter') != "") ? $this->container->get('session')->get('headquarter') : $getTokenUser->getHeadquarterType()->getId();
        return $headquarter;
    }

    public function ddlbLanguage() {
        $html = '';
        $html .= '<select name="ddlbLanguage">';
        foreach ($this->getLanguages() as $languageK => $language) {
            $selected = ($languageK == $this->container->get('request')->getLocale()) ? "selected='selected'" : '';
            $html .= '<option value="' . $languageK . '"' . $selected . '>' . $language . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function ddlbSection() {
        $sections = $this->getTypeByCategoryByLanguage('section', $this->container->get('request')->getLocale());
        $getTokenUser = $this->container->get('security.context')->getToken()->getUser();

        $html = '';
        $html .= '<select name="ddlbSection">';
        foreach ($sections as $sectionV) {
            $section_language = $sectionV->getLanguages();
            if ($this->container->get('session')->get('section') != "") {
                $selected = ($sectionV->getId() == $this->container->get('session')->get('section')) ? "selected='selected'" : '';
            } else {
                $selected = ($sectionV->getId() == $getTokenUser->getSectionType()->getId()) ? "selected='selected'" : '';
            }
            $html .= '<option value="' . $sectionV->getId() . '"' . $selected . '>' . $section_language[0]->getDescription() . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function ddlbHeadquarter() {
        $headquarters = $this->getTypeByCategoryByLanguage('headquarter', $this->container->get('request')->getLocale());
        $getTokenUser = $this->container->get('security.context')->getToken()->getUser();
//        echo $getTokenUser->getHeadquarterType()."asdf";
//        exit;
        $html = '';
        $html .= '<select name="ddlbHeadquarter">';
        foreach ($headquarters as $headquarterV) {
            $headquarter_language = $headquarterV->getLanguages();
            if ($this->container->get('session')->get('headquarter') != "") {
                $selected = ($headquarterV->getId() == $this->container->get('session')->get('headquarter')) ? "selected='selected'" : '';
            } else {
                $selected = ($headquarterV->getId() == $getTokenUser->getHeadquarterType()->getId()) ? "selected='selected'" : '';
            }
            $html .= '<option value="' . $headquarterV->getId() . '"' . $selected . '>' . $headquarter_language[0]->getDescription() . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function getSetting($xsetting) {
        $em = $this->container->get('doctrine')->getManager();
        $setting = $em->getRepository('EsolvingEschoolCoreBundle:Setting')->findOneByNameByLanguage($xsetting, $this->container->get('request')->getLocale());
        return $setting;
    }

//    public function resultsTypeObject() {
//        $headquarters = $this->getTypeByCategoryByLanguageObject($this->container->get('request')->getLocale());
//        $html = '';
//        foreach ($headquarters as $headquarterV) {
//            $html .= "Type: <br>";
//            $html.= $headquarterV->getId() . ' ' . $headquarterV->getName() . '<br>';
//            $html.="Lenguajes: <br>";
//            $headquarter_language = $headquarterV->getLanguages();
//            $html.=$headquarter_language[0]->getDescription();
////            foreach ($headquarterV->getLanguages() as $languagesV) {
////                $html.= $languagesV->getDescription();
////            }
//            $html.='<br>-----------<br>';
//        }
//        return $html;
//    }
}