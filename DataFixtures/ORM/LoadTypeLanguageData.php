<?php

namespace Esolving\Eschool\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Esolving\Eschool\CoreBundle\Entity\Type,
    Esolving\Eschool\CoreBundle\Entity\TypeLanguage;

class LoadTypeLanguageData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    protected $manager;
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $this->manager = $manager;
        $types = array(
            'category_category' => array(
                'category' => 'category',
                'name' => 'category',
                'languages' => array(
                    'en' => 'Category',
                    'es' => 'Categoría'
                )
            ),
            'sex_sex' => array(
                'category' => 'sex',
                'name' => 'sex',
                'languages' => array(
                    'en' => 'Sex',
                    'es' => 'Sexo'
                )
            ),
            'sex_man' => array(
                'category' => 'sex',
                'name' => 'man',
                'languages' => array(
                    'es' => 'Hombre',
                    'en' => 'Man'
                )
            ),
            'sex_woman' => array(
                'category' => 'sex',
                'name' => 'woman',
                'languages' => array(
                    'es' => 'Mujer',
                    'en' => 'Woman'
                )
            ),
            'headquarter_headquarter' => array(
                'category' => 'headquarter',
                'name' => 'headquarter',
                'languages' => array(
                    'es' => 'Sede',
                    'en' => 'Headquarter'
                )
            ),
            'groupblod_groupblod' => array(
                'category' => 'groupblod',
                'name' => 'groupblod',
                'languages' => array(
                    'es' => 'Grupo sanguíneo',
                    'en' => 'Group blod'
                )
            ),
            'groupblod_o+' => array(
                'category' => 'groupblod',
                'name' => 'o+',
                'languages' => array(
                    'es' => 'O+ - es',
                    'en' => 'O+ - en'
                )
            ),
            'groupblod_o-' => array(
                'category' => 'groupblod',
                'name' => 'o-',
                'languages' => array(
                    'es' => 'O- es',
                    'en' => 'O- en'
                )
            ),
            'headquarter_atte' => array(
                'category' => 'headquarter',
                'name' => 'atte',
                'languages' => array(
                    'es' => 'Atte - es',
                    'en' => 'Atte - en'
                )
            ),
            'headquarter_lamolina' => array(
                'category' => 'headquarter',
                'name' => 'lamolina',
                'languages' => array(
                    'es' => 'La molina - es',
                    'en' => 'La molina - en'
                )
            ),
            'distrit_distrit' => array(
                'category' => 'distrit',
                'name' => 'distrit',
                'languages' => array(
                    'es' => 'Distrito',
                    'en' => 'Distrit'
                )
            ),
            'distrit_lince' => array(
                'category' => 'distrit',
                'name' => 'lince',
                'languages' => array(
                    'es' => 'Lince - es',
                    'en' => 'Lince - en'
                )
            ),
            'distrit_villamaria' => array(
                'category' => 'distrit',
                'name' => 'villamaria',
                'languages' => array(
                    'es' => 'Villa maría del triunfo - es',
                    'en' => 'Villa maría del triunfo - en'
                )
            ),
            'section_section' => array(
                'category' => 'section',
                'name' => 'section',
                'languages' => array(
                    'es' => 'Sección',
                    'en' => 'Section'
                )
            ),
            'section_initial' => array(
                'category' => 'section',
                'name' => 'initial',
                'languages' => array(
                    'es' => 'Inicial',
                    'en' => 'Initial'
                )
            ),
            'section_primary' => array(
                'category' => 'section',
                'name' => 'primary',
                'languages' => array(
                    'es' => 'Primaria',
                    'en' => 'Primary'
                )
            ),
            'section_secundary' => array(
                'category' => 'section',
                'name' => 'secundary',
                'languages' => array(
                    'es' => 'Secundaria',
                    'en' => 'Secundary'
                )
            ),
            'room_room' => array(
                'category' => 'room',
                'name' => 'room',
                'languages' => array(
                    'es' => 'Salón',
                    'en' => 'Room'
                )
            ),
            'room_1a' => array(
                'category' => 'room',
                'name' => '1a',
                'languages' => array(
                    'es' => '1° A',
                    'en' => '1th A'
                )
            ),
            'room_2a' => array(
                'category' => 'room',
                'name' => '2a',
                'languages' => array(
                    'es' => '2° A',
                    'en' => '2th A'
                )
            ),
            'role_role' => array(
                'category' => 'role',
                'name' => 'role',
                'languages' => array(
                    'es' => 'Rol',
                    'en' => 'Role'
                )
            ),
            'role_ROLE_ADMIN' => array(
                'category' => 'role',
                'name' => 'ROLE_ADMIN',
                'languages' => array(
                    'es' => 'Rol Administrador',
                    'en' => 'Role Admin'
                )
            ),
            'role_ROLE_USER' => array(
                'category' => 'role',
                'name' => 'ROLE_USER',
                'languages' => array(
                    'es' => 'Rol Usuario',
                    'en' => 'Role User'
                )
            ),
            'role_ROLE_TEACHER' => array(
                'category' => 'role',
                'name' => 'ROLE_TEACHER',
                'languages' => array(
                    'es' => 'Rol Docente',
                    'en' => 'Role Teacher'
                )
            ),
            'role_ROLE_FATHER' => array(
                'category' => 'role',
                'name' => 'ROLE_FATHER',
                'languages' => array(
                    'es' => 'Rol Padre',
                    'en' => 'Role Father'
                )
            ),
            'role_ROLE_STUDENT' => array(
                'category' => 'role',
                'name' => 'ROLE_STUDENT',
                'languages' => array(
                    'es' => 'Rol Alumno',
                    'en' => 'Role Student'
                )
            ),
            'role_ROLE_ACADEMIC' => array(
                'category' => 'role',
                'name' => 'ROLE_ACADEMIC',
                'languages' => array(
                    'es' => 'Rol Coordinador académico',
                    'en' => 'Role Acadmic coordinator'
                )
            ),
            'role_ROLE_TREASURY' => array(
                'category' => 'role',
                'name' => 'ROLE_TREASURY',
                'languages' => array(
                    'es' => 'Rol Tesorería',
                    'en' => 'Role Treasury'
                )
            ),
            'role_ROLE_SYSTEM' => array(
                'category' => 'role',
                'name' => 'ROLE_SYSTEM',
                'languages' => array(
                    'es' => 'Rol Sistemas',
                    'en' => 'Role Systems'
                )
            ),
            'setting_setting' => array(
                'category' => 'setting',
                'name' => 'setting',
                'languages' => array(
                    'es' => 'Configuración',
                    'en' => 'Setting'
                )
            ),
            'setting_period_of_months_to_exam' => array(
                'category' => 'setting',
                'name' => 'setting_period_of_months_to_exam',
                'languages' => array(
                    'es' => 'Periodo de meses para exámen',
                    'en' => 'Period of months to exam'
                )
            ),
            'setting_language' => array(
                'category' => 'setting',
                'name' => 'setting_language',
                'languages' => array(
                    'es' => 'Lenguaje',
                    'en' => 'Language'
                )
            )
        );

        foreach ($types as $typeK => $typeV) {
            $type = new Type();
            $type->setCategory($typeV['category']);
            $type->setName($typeV['name']);
            foreach ($typeV['languages'] as $languageK => $languageV) {
                $typeLanguage = new TypeLanguage();
                $typeLanguage->setLanguage($languageK);
                $typeLanguage->setDescription($languageV);
                $typeLanguage->setType($type);
                $manager->persist($typeLanguage);
            }
            $manager->persist($type);
            $this->addReference($typeK, $type);
        }

        $manager->flush();

//        for ($i = 0; $i < 10000; $i++) {
//            $rand = rand(0, 100000);
//            $type = new Type();
//            $type->setCategory($rand);
//            $type->setName($rand);
//            for ($j = 0; $j < 2; $j++) {
//                switch ($j) {
//                    case 0:
//                        $languageInput = 'es';
//                        break;
//                    case 1:
//                        $languageInput = 'en';
//                        break;
//                }
//                $typeLanguage = new TypeLanguage();
//                $typeLanguage->setLanguage($languageInput);
//                $typeLanguage->setDescription($rand . ' - ' . $languageInput);
//                $typeLanguage->setType($type);
//                $manager->persist($typeLanguage);
//            }
//            $manager->persist($type);
////            $this->addReference($rand, $type);
//        }
//        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
