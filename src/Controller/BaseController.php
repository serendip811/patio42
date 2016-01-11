<?php
namespace Wandu\Publ\Controller;

use Wandu\Modelr\Repository;
use Wandu\Template\Manager;

class BaseController
{
    /** @var Manager */
    protected $view;

    /** @var Repository */
    protected $repository;

    /**
     * @param Manager $view
     * @param Repository $repository
     */
    public function __construct(Manager $view, Repository $repository = null)
    {
        $this->view = $view;
        $this->repository = $repository;
    }
}
