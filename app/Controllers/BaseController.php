<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controllers;

/*
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use Config\Services;

class BaseController extends Controller
{
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * @var \CodeIgniter\Validation\Validation
     */
    protected $validation;

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->session = Services::session();
        $this->validation = Services::validation();
    }

    public function isAdmin(): bool
    {
        return $this->session->get('isLogin') && ('admin' === $this->session->get('type'));
    }


    protected function upload($fileFieldName, $destDir = '/')
    {
        $fileName = '';
        $img = $this->request->getFile($fileFieldName);

        if ($img->isValid() && !$img->hasMoved()) {
            $fileName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads'.$destDir, $fileName);
            // @todo use imagick helper to resize
        } else {
            $this->validation->setError($fileFieldName, $img->getErrorString() . '(' . $img->getError() . ')');
        }

        return $fileName;
    }

    protected function deleteFile($filename, $dir = '/')
    {
        $dirParts = explode('/', $dir);
        array_unshift($dirParts, 'uploads');

        $filepath = WRITEPATH.implode('/', $dirParts).'/'.$filename;
        if (is_file($filepath) && file_exists($filepath)) {
            unlink($filepath);
        }
    }
}
