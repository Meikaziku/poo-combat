<?php

abstract class Character
{

    private string $nom;
    private int $hp;
    private int $attaque;
    private int $max_hp;
    private string $img;

    public function __construct(string $nom, int $hp, int $attaque, int $max_hp, string $img)
    {
        $this->nom = $nom;
        $this->hp = $hp;
        $this->attaque = $attaque;
        $this->max_hp = $max_hp;
        $this->img = $img;
    }


    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of hp
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of attaque
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Set the value of attaque
     *
     * @return  self
     */ 
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;

        return $this;
    }

    /**
     * Get the value of max_hp
     */
    public function getMax_hp()
    {
        return $this->max_hp;
    }

    /**
     * Set the value of max_hp
     *
     * @return  self
     */ 
    public function setMax_hp($max_hp)
    {
        $this->max_hp = $max_hp;

        return $this;
    }

     /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

      /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function attaque(Character $ennemie): CombatLog
    {

        $combatLog = new CombatLog();

        if (($ennemie->getHp() - $this->attaque) < 0) {
            $ennemie->setHp(0);
        } else {
            $ennemie->setHp($ennemie->getHp() - $this->attaque);
        }

        $combatLog->setMessage($this->getNom() . " attaque " . $ennemie->getNom() . " et lui inflige " . $this->attaque . " points de dégats. <br>Il reste " . $ennemie->getHp() . " à " . $ennemie->getNom());

        if (is_a($this, "Hero")) {
            $combatLog->setColor("blue");
        }

        if (is_a($this, "Monstre")) {
            $combatLog->setColor("red");
        }



        return $combatLog;
    }

    
}
