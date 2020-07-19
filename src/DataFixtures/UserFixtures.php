<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Map;
use App\Entity\Pin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const DEFAULT_USER_LOGIN = 'login';

    public const DEFAULT_USER_PASSWORD = 'bar';

    public function load(ObjectManager $manager): void
    {
        $userEntity = new User();
        $userEntity->setUsername(self::DEFAULT_USER_LOGIN);
        $userEntity->setPassword(self::DEFAULT_USER_PASSWORD);
        $userEntity->setRoles(['ROLE_FOO']);

        $map = new Map();
        $map->setName('Ma carte');
        $map->setCreator($userEntity);
        $map->setPublic(true);

        $pin = new Pin();
        $pin->setName('Wsh gro');
        $pin->setMap($map);
        $pin->setDayPassed(10);
        $pin->setLat(48.856613);
        $pin->setLng(2.352222);

        $manager->persist($userEntity);
        $manager->persist($map);
        $manager->persist($pin);
        $manager->flush();
    }
}
