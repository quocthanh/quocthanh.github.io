<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class NewsController extends AppController
{
    public function index()
    {

    }
    /*
     * insert record
     */
    public function add(int $recordNum)
    {
        set_time_limit(0);
        for ($i = 0; $i < $recordNum; $i++) {
            $news = $this->News->newEntity();
            $news->title = 'This is title ' . $i;
            $news->content = 'This is content ' . $i;

            if (!$this->News->save($news)) {
                echo 'Sth went wrong!';
            }
        }
        echo $recordNum . ' records was added.';
    }
    /**
     *
     */
    public function delete()
    {
        // if ($this->News->deleteAll('1=1')) {
        /* ($this->News->query('TRUNCAT TABLE news;')) {
            echo 'Deleted';
        } else {
            echo 'Opp! Sth went wrong!';
        }*/
        $conn = ConnectionManager::get('default');
        $conn->execute('TRUNCATE TABLE news');
    }
    /**
     *
     */
    public function get(int $recordNum)
    {
        $result = $this->News->find('all', ['limit' => 30]);
        pr($result->toArray());
    }
}