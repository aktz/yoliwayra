<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\LoginModel;
use App\Models\AccesoModel;
use App\Models\AlimentacionModel;
use App\Models\AlojamientoModel;
use App\Models\AutoridadModel;
use App\Models\BancoModel;
use App\Models\CategoriaModel;
use App\Models\CiudadModel;
use App\Models\CiudadAlimentacionModel;
use App\Models\CiudadAlojamientoModel;
use App\Models\CiudadAtraccionModel;
use App\Models\CiudadBancoModel;
use App\Models\CiudadEmbajadaModel;
use App\Models\CiudadTerminalModel;
use App\Models\CiudadTransporteModel;
use App\Models\ClimaModel;
use App\Models\DivisaModel;
use App\Models\EmbajadaModel;
use App\Models\EstadoModel;
use App\Models\IdiomaModel;
use App\Models\IndumentariaModel;
use App\Models\LugarModel;
use App\Models\LugarAccesoModel;
use App\Models\LugarAlimentacionModel;
use App\Models\PaisDivisaModel;
use App\Models\PaisIdiomaModel;
use App\Models\PaisRequerimientoModel;
use App\Models\PaisModel;
use App\Models\PerfilModel;
use App\Models\RegionModel;
use App\Models\RequerimientoModel;
use App\Models\TerminalModel;
use App\Models\TransporteModel;

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
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        helper('form');
        helper('filesystem');

        $this->login = new LoginModel();
        $this->acceso = new AccesoModel();
        $this->alimentacion = new AlimentacionModel();
        $this->alojamiento = new AlojamientoModel();
        $this->autoridad = new AutoridadModel();
        $this->banco = new BancoModel();
        $this->categoria = new CategoriaModel();
        $this->ciudad = new CiudadModel();
        $this->ciudad_alimentacion = new CiudadAlimentacionModel();
        $this->ciudad_alojamiento = new CiudadAlojamientoModel();
        $this->ciudad_atraccion = new CiudadAtraccionModel();
        $this->ciudad_banco = new CiudadBancoModel();
        $this->ciudad_embajada = new CiudadEmbajadaModel();
        $this->ciudad_terminal = new CiudadTerminalModel();
        $this->ciudad_transporte = new CiudadTransporteModel();
        $this->clima = new ClimaModel();
        $this->divisa = new DivisaModel();
        $this->embajada = new EmbajadaModel();
        $this->estado = new EstadoModel();
        $this->idioma = new IdiomaModel();
        $this->indumentaria = new IndumentariaModel();
        $this->lugar = new LugarModel();
        $this->lugar_acceso = new LugarAccesoModel();
        $this->lugar_alimentacion = new LugarAlimentacionModel();
        $this->pais_divisa = new PaisDivisaModel();
        $this->pais_idioma = new PaisIdiomaModel();
        $this->pais_requerimiento = new PaisRequerimientoModel();
        $this->pais = new PaisModel();
        $this->perfil = new PerfilModel();
        $this->region = new RegionModel();
        $this->requerimiento = new RequerimientoModel();
        $this->terminal = new TerminalModel();
        $this->transporte = new TransporteModel();

        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
    }
}
