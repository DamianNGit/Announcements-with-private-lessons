<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of LoadPostData
 *
 * @author Ania i Czarek
 */
class LoadPostData implements FixtureInterface{
    //put your code here
    
    public function load(ObjectManager $manager){
        $faker = Faker\Factory::create();
        for ($i=0; $i<=10; $i++){
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
