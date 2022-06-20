<?php

namespace App\Service;

use App\Entity\Establishment;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Manage user favorites (movies and series) in session
 */
class FavoritesManager
{
    private $user;

    /** @var bool $emptyEnabled Authorise empty list */
    private $emptyEnabled;

    // Dans un service, on va utiliser RequestStack pour récupérer la Session
    // @link https://symfony.com/doc/current/session.html#basic-usage
    public function __construct(Establishment $establishment, $emptyEnabled)
    {
        $this->establishment = $establishment->getUsers();
        $this->emptyEnabled = $emptyEnabled;
    }

    /**
     * Add or remove establishment in favorites list
     * 
     * @param Establishment $establishment
     * 
     * @return bool true if added, false if removed
     */
    public function toggle(Establishment $establishment): bool
    {
        $favorites = $this->establishment->getUsers();

        if ($favorites != null) {

            if (array_key_exists($establishment->getId(), $favorites)) {

                unset($favorites[$establishment->getId()]);

                $this->establishment->getUsers();

                return false;
            }
        }

        $favorites[$establishment->getId()] = $establishment;

        $this->establishment->getUsers();

        return true;
    }

    /**
     * Empty favorites list
     */
    public function empty()
    {
        // Si on autorise le vidage de la liste
        if ($this->emptyEnabled) {
            $this->establishment->getUsers()->remove();
            return true;
        }

        return false;
    }
}
