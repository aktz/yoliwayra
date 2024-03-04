<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $alimentacion = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $acceso = [
        'codigo' => [
            'rules' => 'required|string|min_length[3]|max_length[10]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Código es obligatorio.',
                'string' => 'El campo Código debe ser un texto.',
                'min_length' => 'El campo Código debe tener al menos 3 caracteres.',
                'max_length' => 'El campo Código debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Código debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $alojamiento = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $autoridad = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $banco = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'oficina' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Oficina es obligatorio.',
                'integer' => 'El campo Oficina debe ser un número entero.',
                'exact_length' => 'El campo Oficina debe tener una longitud exacta de 1.'
            ]
            ],
        'cajero' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Cajero es obligatorio.',
                'integer' => 'El campo Cajero debe ser un número entero.',
                'exact_length' => 'El campo Cajero debe tener una longitud exacta de 1.'
            ]
        ],
        'corresponsal' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Corresponsal es obligatorio.',
                'integer' => 'El campo Corresponsal debe ser un número entero.',
                'exact_length' => 'El campo Corresponsal debe tener una longitud exacta de 1.'
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $categoria = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $ciudad = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'estado' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Estado es obligatorio.',
                'integer' => 'El campo Estado debe ser un número entero.',
                'min_length' => 'El campo Estado debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Estado debe tener una longitud máxima de 3.'
            ]
        ],
        'region' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Región es obligatorio.',
                'integer' => 'El campo Región debe ser un número entero.',
                'min_length' => 'El campo Región debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Región debe tener una longitud máxima de 3.'
            ]
        ],
        'clima' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Clima es obligatorio.',
                'integer' => 'El campo Clima debe ser un número entero.',
                'min_length' => 'El campo Clima debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Clima debe tener una longitud máxima de 3.'
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];
    
    public $clima = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $divisa = [
        'codigo' => [
            'rules' => 'required|string|min_length[3]|max_length[10]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Código es obligatorio.',
                'string' => 'El campo Código debe ser un texto.',
                'min_length' => 'El campo Código debe tener al menos 3 caracteres.',
                'max_length' => 'El campo Código debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Código debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];
    
    public $embajada = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'consulado' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Consulado es obligatorio.',
                'integer' => 'El campo Consulado debe ser un número entero.',
                'exact_length' => 'El campo Consulado debe tener una longitud exacta de 1.'
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $idioma = [
        'codigo' => [
            'rules' => 'required|string|min_length[2]|max_length[10]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Código es obligatorio.',
                'string' => 'El campo Código debe ser un texto.',
                'min_length' => 'El campo Código debe tener al menos 3 caracteres.',
                'max_length' => 'El campo Código debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Código debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $indumentaria = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $pais = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];
    
    public $estado = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'pais' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Pais es obligatorio.',
                'integer' => 'El campo Pais debe ser un número entero.',
                'min_length' => 'El campo Pais debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Pais debe tener una longitud máxima de 3.'
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $perfil = [
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'crear' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Crear es obligatorio.',
                'integer' => 'El campo Crear debe ser un número entero.',
                'exact_length' => 'El campo Crear debe tener una longitud exacta de 1.'
            ]
        ],
        'actualizar' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Actualizar es obligatorio.',
                'integer' => 'El campo Actualizar debe ser un número entero.',
                'exact_length' => 'El campo Actualizar debe tener una longitud exacta de 1.'
            ]
        ],
        'eliminar' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Eliminar es obligatorio.',
                'integer' => 'El campo Eliminar debe ser un número entero.',
                'exact_length' => 'El campo Eliminar debe tener una longitud exacta de 1.'
            ]
        ],
        'aprobar' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Aprobar es obligatorio.',
                'integer' => 'El campo Aprobar debe ser un número entero.',
                'exact_length' => 'El campo Aprobar debe tener una longitud exacta de 1.'
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];

    public $region = [
        'nombre' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Nombre es obligatorio.',
                'string' => 'El campo Nombre debe ser un texto.',
                'min_length' => 'El campo Nombre debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Nombre debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Nombre debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'activo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Activo es obligatorio.',
                'integer' => 'El campo Activo debe ser un número entero.',
                'exact_length' => 'El campo Activo debe tener una longitud exacta de 1.'
            ]
        ]
    ];
}
