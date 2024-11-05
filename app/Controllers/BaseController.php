<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ConfiguracionesModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller {

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $configuraciones;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ["auth", "utilerias"];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->configuraciones = new ConfiguracionesModel();

        /*
        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $locale = $this->request->getLocale();
        $currentLanguage = $session->get('language');
         * 
         */
/*
        $datos = $this->configuraciones->where("id", 1)->first();

        if (!$currentLanguage):
            $session->set('language', $locale);
        endif;

        $datos = $this->configuraciones->where("id", 1)->first();


        $session->set('language', $datos["languaje"]);
        $language->setLocale($session->language);
        $this->request->setLocale('es');
        Config('App')->negotiateLocale  = true;
        Config('App')->defaultLocale = $session->language;
         config('App')->supportedLocales = ['es'];
        $this->request->setLocale('es');
 * 
 * 
 */
        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();
    }
}
