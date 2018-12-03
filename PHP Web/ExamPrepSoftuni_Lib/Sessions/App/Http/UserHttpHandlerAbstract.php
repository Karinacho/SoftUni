<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/29/2018
 * Time: 13:29
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class UserHttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName, $data = null,array $errors=[]){
        $this->template->render($templateName, $data,$errors);
    }

    public function redirect(string $url){
        header("Location: $url");
    }

}