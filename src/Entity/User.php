<?php
        // src/AppBundle/Entity/User.php

        namespace App\Entity;

        use FOS\UserBundle\Model\User as BaseUser;
        use Doctrine\ORM\Mapping as ORM;

        /**
         * @ORM\Entity
         * @ORM\Table(name="fos_user")
         */
        class User extends BaseUser
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;

            /**
             * @ORM\Column(type="string")
             */
            protected $nom;

            /**
             * @ORM\Column(type="string")
             */
            protected $prenom;

            /**
             * @ORM\Column(type="string")
             */
            protected $type;

            public function __construct()
            {
                parent::__construct();
                // your own logic
            }

            public function getId(): ?int
            {
                return $this->id;
            }

            public function getNom(): ?string
            {
                return $this->nom;
            }

            public function setNom(string $nom): self
            {
                $this->nom = $nom;

                return $this;
            }

            public function getPrenom(): ?string
            {
                return $this->prenom;
            }

            public function setPrenom(string $prenom): self
            {
                $this->prenom = $prenom;

                return $this;
            }

            public function getType(): ?string
            {
                return $this->type;
            }

            public function setType(string $type): self
            {
                $this->type = $type;

                return $this;
            }
        }