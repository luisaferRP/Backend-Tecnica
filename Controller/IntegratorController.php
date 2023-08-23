<?php
include 'RedditAPIController.php';
include 'ReditController.php';

class Integrator
{
    public ReditController $redit_controller;

    public function __construct()
    {
        $this->redit_controller = new ReditController();
        $this->save($this->get_data_reddit());
    }

    //Obtiene los datos del JSON
    private function get_data_reddit(): array
    {
        // Convertir el arreglo en una cadena JSON
        $user_agent = json_encode(array(
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ));

        // Crear una instancia de la clase RedditAPI con el User-Agent personalizado
        $redditAPI = new RedditAPI('https://www.reddit.com/reddits.json', $user_agent);

        try {
            // Obtener la lista de reddits
            $reddits = $redditAPI->getReddits();
            return $reddits;
        } catch (Exception $e) {
            echo 'Se produjo un error: ' . $e->getMessage();
        }
    }

    private function save($parametros)
    {
        $data = $parametros['data']['children'];

        foreach ($data as $item) {
            $id_table = $item['data']['id'];
            // Si no existe el registro inserterlo
            if (!$this->redit_controller->find_by_id($id_table)) {
                $data_insert = [
                    'id' => $id_table,
                    'name' => $item['data']['name'],
                    'display_name' => $item['data']['display_name'],
                    'header_title' => $item['data']['header_title'],
                    'title' => $item['data']['title'],
                    'description' => $item['data']['description'],
                    'public_description' => $item['data']['public_description'],
                    'header_img' => $item['data']['header_img'],
                    'icon_img' => $item['data']['icon_img'],
                    'banner_img' => $item['data']['banner_img']
                ];
                $this->redit_controller->save($data_insert);
            }
        }
    }

    private function get()
    {
        return $this->redit_controller->getAll();
    }

    public function index()
    {
        return $this->get();
    }
}