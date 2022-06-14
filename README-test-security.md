<?php

/**
     * @Route("/connexion", name="user_login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('front/user/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }