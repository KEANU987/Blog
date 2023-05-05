<?php
namespace App\src\model;
class Comment{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $pseudo;
    /**
     * @var string
     */
    private $content;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /** A Rajouter !
     * @var bool
     */
    private $flag;
    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id){
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getPseudo(){
        return $this->pseudo;
    }
    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    /**
     * @return string

    */
    public function getContent(){
        return $this->content;
    }
    /**
     * @param string $content
     */
    public function setContent($content){
        $this->content = $content;
    }
    /**
     * @return \DateTime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }
    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }

    /** Rajouter les lignes ci-dessous
    * @return bool
    */
    public function isFlag(){
        return $this->flag;
    }
    /**
    * @param bool $flag
    */
    public function setFlag($flag){
        $this->flag = $flag;
    }
}
