<?php

require_once './App/Models/Brand.class.php';

// Le mot-clé 'abstract' permet de déclarer une classe comme "abstraite"
// Une classe abstraite ne peut pas être instanciée (il n'est pas possible
// de créer des objets à partir de cette classe en écrivant, en l'occurrence
// new Component)
// Une classe abstraite a simplement vocation à définir une interface pour
// d'autres classes qui hériteront d'elle (à l'aide du mot-clé 'extends')
abstract class Component
{
    protected $id;
    protected $name;
    protected $price;
    protected $brandId;

    /**
     * Create new Component object
     * 
     * @param int $id Component database ID
     * @param string $name Component name
     * @param float $price Component price
     * @param int $brandId Component brand database ID
     */
    public function __construct(
        int $id = null,
        string $name = '',
        float $price = 0,
        int $brandId = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->brandId = $brandId;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get component brand as Brand object
     * 
     * @return Brand
     */
    public function getBrand(): ?Brand
    {
        return fetchBrandById($this->brandId);
    }

    /**
     * Set component brand from Brand object
     * 
     * @param Brand $brand Related Brand object
     * @return self
     */
    public function setBrand(Brand $brand): self
    {
        $this->brandId = $brand->getId();

        return $this;
    }
}
