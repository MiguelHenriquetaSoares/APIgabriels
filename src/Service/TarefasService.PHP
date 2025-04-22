<?php
 
// Definição do namespace para organizar o código e evitar conflitos
namespace PedroSantos\api_usuarioss\Service;
 
class TarefaService
{
    // Define o caminho do arquivo JSON onde os dados das tarefas serão armazenados
    private $filePath = __DIR__ . '/../data.json';
   
    /**
     * Método privado para ler os dados do arquivo JSON
     * Retorna um array associativo com as tarefas
     */
    private function readData()
    {
        // Verifica se o arquivo existe, se não, cria um com um array vazio
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
       
        // Lê o conteúdo do arquivo JSON
        $json = file_get_contents($this->filePath);
       
        // Decodifica o JSON para um array associativo e retorna
        return json_decode($json, true);
    }
 
    /**
     * Método privado para salvar dados no arquivo JSON
     * Recebe um array de tarefas e o grava no arquivo
     */
    private function writeData($data)
    {
        // Codifica o array para JSON e salva no arquivo com formatação legível
        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
 
    /**
     * Método para criar uma nova tarefa
     * Recebe um array contendo os dados da tarefa
     */
    public function createTarefa($tarefa)
    {
        // Lê os dados existentes do arquivo JSON
        $data = $this->readData();
       
        // Gera um ID único para a nova tarefa
        $tarefa['id'] = uniqid();
       
        // Adiciona a nova tarefa ao array de tarefas
        $data[] = $tarefa;
       
        // Salva os dados atualizados no arquivo JSON
        $this->writeData($data);
    }
 
    /**
     * Método para obter todas as tarefas
     * Retorna um array com todas as tarefas salvas
     */
    public function getAllTarefas()
    {
        return $this->readData();
    }
 
    /**
     * Método para buscar uma tarefa pelo ID
     * Retorna a tarefa correspondente ou null se não encontrada
     */
    public function getTarefaById($id)
    {
        // Lê todas as tarefas do arquivo JSON
        $data = $this->readData();
       
        // Percorre o array de tarefas
        foreach ($data as $tarefa) {
            // Compara o ID da tarefa com o ID buscado
            if ($tarefa['id'] == $id) {
                return $tarefa; // Retorna a tarefa encontrada
            }
        }
       
        return null; // Retorna null se nenhuma tarefa for encontrada
    }
    public function updateTarefa($id, $updatedTarefa)
    {
        $data = $this->readData();
        foreach ($data as $tarefa) {
           
        }
    }
}
 