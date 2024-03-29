<?php
class Postagem{
    private int $autonomo_id;
    private $conteudo;
    private string $dtRegistro;

    public function __construct(int $autonomo_id, $conteudo)
    {
        $this->autonomo_id = $autonomo_id;
        $this->conteudo = $conteudo;
        $this->dtRegistro =  date("Y-m-d H:i:s");
    } 


    public function getAutonomo() : string
    {
        return  $this->autonomo_id;
    }

    public function setAutonomo(string $autonomo_id) : void
    {
        $this->autonomo_id = $autonomo_id; 
    }

    public function getConteudo() : string
    {
        return  $this->conteudo;
    }

    public function setConteudo(string $conteudo) : void
    {
        $this->conteudo = $conteudo; 
    }

    public function getDataRegistro() : string
    {
        return  $this->dtRegistro;
    }

    public function setDataRegistro(string $dtRegistro) : void
    {
        $this->dtRegistro = $dtRegistro; 
    }


    public function inserirPostagem(int $autonomo_id, $conteudo, String $dtRegistro){
        try{
            include_once('../conexao/mongo_con.php');
            $colecao = $mongo_db->postagem;
            $result = $colecao->insertOne( 
                [ 
                    'autonomo' => $autonomo_id, 
                    'conteudo' => $conteudo,
                    'dt_registro' => $dtRegistro
                ]
            );          

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }   

    public static function listarPostagens(){
        try{
            include_once('C:/xampp/htdocs/Projeto-Freelando-WebSite/src/classes/conexao/mongo_con.php');
            $colecao = $mongo_db->postagem;
            return $colecao->find([]);

        }catch(PDOException $e){
            echo 'Erro'.$e->getMessage();
        }
    }

} 