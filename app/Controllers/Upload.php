<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controllers;

class Upload extends BaseController
{
    public function index(...$paths)
    {
        $filePath = WRITEPATH.'uploads/'.implode('/', $paths);

        if (file_exists($filePath) && is_file($filePath)) {
            $this->response->setHeader('Content-Type', mime_content_type($filePath));
            readfile($filePath);
        } else {
            $this->response->setStatusCode(404, 'File not found.');
        }
    }
}
