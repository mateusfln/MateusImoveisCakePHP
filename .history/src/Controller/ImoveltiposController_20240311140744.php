<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class ImoveltiposController extends AppController
{
    public function display()
    {
        $tableImoveis = TableRegistry::getTableLocator()->get('Imoveltipos');
        $query = $tableImoveis->find('all');

        echo '<pre>';
        print_r($query);
        /* END Filtros das colunas (consulta no banco de dados) */

        //$query->contain('Midias');

        $imoveis = $query;

        $this->set(compact('page', 'subpage','imoveis'));
       
    }
}
