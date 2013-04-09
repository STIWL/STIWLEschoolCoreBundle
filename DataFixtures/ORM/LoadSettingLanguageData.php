<?php

namespace Esolving\Eschool\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Esolving\Eschool\CoreBundle\Entity\Setting,
    Esolving\Eschool\CoreBundle\Entity\SettingLanguage;

class LoadSettingLanguageData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    protected $manager;
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $this->manager = $manager;
        $settings = array(
            'period_of_months_to_exam' => array(
                'name' => 'period_of_months_to_exam',
                'value' => '3',
                'settingType' => 'setting_period_of_months_to_exam',
                'status' => '1',
                'domType' => 'input'
            ),
            'language' => array(
                'name' => 'language',
                'value' => 'es',
                'settingType' => 'setting_language',
                'status' => '1',
                'domType' => 'choice'
            )
        );

        foreach ($settings as $settingV) {
            $setting = new Setting();
            $setting->setName($settingV['name']);
            $setting->setSettingType($manager->merge($this->getReference($settingV['settingType'])));
            $setting->setStatus($settingV['status']);
            $setting->setValue($settingV['value']);
            $setting->setDomType($settingV['domType']);
            $manager->persist($setting);
        }
        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}
