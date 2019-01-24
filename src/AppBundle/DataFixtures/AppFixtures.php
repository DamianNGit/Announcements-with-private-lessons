<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Ogloszenia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of AppFixtures
 *
 * @author Ania i Czarek
 */
class AppFixtures extends Fixture{
    //put your code here
    
    public function load(ObjectManager $manager){
        //require_once 'vendor/autoload.php';
        //$faker = new Faker\Generator();
        $faker = \Faker\Factory::create();
        
        for ($i=0; $i<=30; $i++){
            $ogloszenia = new Ogloszenia();
            $ogloszenia->setTresc($faker->text(100));
            $ogloszenia->setSzkola($faker->sentence(1));
            $ogloszenia->setPrzedmiot($faker->sentence(1));
            $ogloszenia->setKontakt($faker->text(20));
            $ogloszenia->setCena($faker->buildingNumber(2));
            $manager->persist($ogloszenia);
        }
        $manager->flush();
    }
}
