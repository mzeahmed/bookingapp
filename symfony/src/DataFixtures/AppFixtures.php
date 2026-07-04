<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UsersFixtures $usersFixtures,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        $this->usersFixtures->load($manager);
    }
}
