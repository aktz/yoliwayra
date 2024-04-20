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
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ()\- ]+$/]',
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
    
    public $ciudad_alimentacion = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'alimentacion' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Alimentación es obligatorio.',
                'integer' => 'El campo Alimentación debe ser un número entero.',
                'min_length' => 'El campo Alimentación debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Alimentación debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];
    
    public $ciudad_alojamiento = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'alojamiento' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Alojamiento es obligatorio.',
                'integer' => 'El campo Alojamiento debe ser un número entero.',
                'min_length' => 'El campo Alojamiento debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Alojamiento debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];

    public $ciudad_atraccion = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
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
    
    public $ciudad_banco = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'banco' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Banco es obligatorio.',
                'integer' => 'El campo Banco debe ser un número entero.',
                'min_length' => 'El campo Banco debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Banco debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];
    
    public $ciudad_coworking = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notasx debe ser un texto.',
                'min_length' => 'El campo Notasx debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notasx debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notasx debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];
    
    public $ciudad_embajada = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'embajada' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Embajada es obligatorio.',
                'integer' => 'El campo Embajada debe ser un número entero.',
                'min_length' => 'El campo Embajada debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Embajada debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];

    public $ciudad_evento = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'titulo' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Título es obligatorio.',
                'string' => 'El campo Título debe ser un texto.',
                'min_length' => 'El campo Título debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Título debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Título debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'subtitulo' => [
            'rules' => 'required|string|min_length[4]|max_length[512]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Subtítulo es obligatorio.',
                'string' => 'El campo Subtítulo debe ser un texto.',
                'min_length' => 'El campo Subtítulo debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Subtítulo debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Subtítulo debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[3000]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'fecha_inicio' => [
            'rules' => 'required|string|min_length[9]|max_length[10]|regex_match[/^[0-9\-\/\.]+$/]',
            'errors' => [
                'required' => 'El campo Fecha Inicio es obligatorio.',
                'min_length' => 'El campo Fecha Inicio debe tener al menos 9 caracteres.',
                'max_length' => 'El campo Fecha Inicio debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Fecha Inicio debe contener sólo caracteres numéricos y algunos especiales',
            ]
        ],
        'fecha_fin' => [
            'rules' => 'required|string|min_length[9]|max_length[10]|regex_match[/^[0-9\-\/\.]+$/]',
            'errors' => [
                'required' => 'El campo Fecha Fin es obligatorio.',
                'min_length' => 'El campo Fecha Fin debe tener al menos 9 caracteres.',
                'max_length' => 'El campo Fecha Fin debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Fecha Fin debe contener sólo caracteres numéricos y algunos especiales',
            ]
        ],
        'valor' => [
            'rules' => 'string|max_length[3000]|regex_match[/^[0-9\.]+$/]',
            'errors' => [
                'string' => 'El campo Valor debe ser un texto.',
                'min_length' => 'El campo Valor debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Valor debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Valor debe contener sólo caracteres numéricos y punto.',
            ]
        ],
    ];

    public $ciudad_guianza = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'nombre' => [
            'rules' => 'required|string|min_length[3]|max_length[255]',
            'errors' => [
                'required' => 'El campo Guianza es obligatorio.',
                'integer' => 'El campo Guianza debe ser un número entero.',
                'min_length' => 'El campo Guianza debe tener una longitud mínima de 3.',
                'max_length' => 'El campo Guianza debe tener una longitud máxima de 254.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];
    
    public $ciudad_terminal = [
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'terminal' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Terminal es obligatorio.',
                'integer' => 'El campo Terminal debe ser un número entero.',
                'min_length' => 'El campo Terminal debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Terminal debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
    ];
    
    public $ciudad_transporte = [
        'origen' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Origen es obligatorio.',
                'integer' => 'El campo Origen debe ser un número entero.',
                'min_length' => 'El campo Origen debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Origen debe tener una longitud máxima de 3.'
            ]
        ],
        'destino' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Destino es obligatorio.',
                'integer' => 'El campo Destino debe ser un número entero.',
                'min_length' => 'El campo Destino debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Destino debe tener una longitud máxima de 3.'
            ]
        ],
        'transporte' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Transporte es obligatorio.',
                'integer' => 'El campo Transporte debe ser un número entero.',
                'min_length' => 'El campo Transporte debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Transporte debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ&#$\- ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'string|max_length[3000]',
            'errors' => [
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 3000 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
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

    public $lugar = [
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
        'ciudad' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Ciudad es obligatorio.',
                'integer' => 'El campo Ciudad debe ser un número entero.',
                'min_length' => 'El campo Ciudad debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Ciudad debe tener una longitud máxima de 3.'
            ]
        ],
        'region' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Region es obligatorio.',
                'integer' => 'El campo Region debe ser un número entero.',
                'min_length' => 'El campo Region debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Region debe tener una longitud máxima de 3.'
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
        'postal' => [
            'rules' => 'string|min_length[5]|max_length[10]|regex_match[/^[0-9]+$/]',
            'errors' => [
                'string' => 'El campo Código Postal debe ser un texto.',
                'min_length' => 'El campo Código Postal debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Código Postal debe tener como máximo 10 caracteres.',
                'regex_match' => 'El campo Código Postal debe contener sólo caracteres numéricos',
            ]
        ],
        'titulo' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Título es obligatorio.',
                'string' => 'El campo Título debe ser un texto.',
                'min_length' => 'El campo Título debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Título debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Título debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'subtitulo' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Subtítulo es obligatorio.',
                'string' => 'El campo Subtítulo debe ser un texto.',
                'min_length' => 'El campo Subtítulo debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Subtítulo debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Subtítulo debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[5]|max_length[3000]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'required|string|min_length[5]|max_length[3000]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Notas es obligatorio.',
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'valor' => [
            'rules' => 'required|string|min_length[1]|max_length[15]|regex_match[/^[0-9.,]+$/]',
            'errors' => [
                'required' => 'El campo Valor es obligatorio.',
                'string' => 'El campo Valor debe ser un texto.',
                'min_length' => 'El campo Valor debe tener al menos 1 caracteres.',
                'max_length' => 'El campo Valor debe tener como máximo 30 caracteres.',
                'regex_match' => 'El campo Valor debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'ancestral' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Ancestral es obligatorio.',
                'integer' => 'El campo Ancestral debe ser un número entero.',
                'exact_length' => 'El campo Ancestral debe tener una longitud exacta de 1.'
            ]
        ],
        'extremo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Extremo es obligatorio.',
                'integer' => 'El campo Extremo debe ser un número entero.',
                'exact_length' => 'El campo Extremo debe tener una longitud exacta de 1.'
            ]
        ],
        'avistamiento' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Avistamiento es obligatorio.',
                'integer' => 'El campo Avistamiento debe ser un número entero.',
                'exact_length' => 'El campo Avistamiento debe tener una longitud exacta de 1.'
            ]
        ],
        'deportivo' => [
            'rules' => 'required|integer|exact_length[1]',
            'errors' => [
                'required' => 'El campo Deportivo es obligatorio.',
                'integer' => 'El campo Deportivo debe ser un número entero.',
                'exact_length' => 'El campo Deportivo debe tener una longitud exacta de 1.'
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

    public $lugar_acceso = [
        'lugar' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Lugar es obligatorio.',
                'integer' => 'El campo Lugar debe ser un número entero.',
                'min_length' => 'El campo Lugar debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Lugar debe tener una longitud máxima de 3.'
            ]
        ],
        'acceso' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Acceso es obligatorio.',
                'integer' => 'El campo Acceso debe ser un número entero.',
                'min_length' => 'El campo Acceso debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Acceso debe tener una longitud máxima de 3.'
            ]
        ]
    ];
    
    public $lugar_alimentacion = [
        'lugar' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Lugar es obligatorio.',
                'integer' => 'El campo Lugar debe ser un número entero.',
                'min_length' => 'El campo Lugar debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Lugar debe tener una longitud máxima de 3.'
            ]
        ],
        'alimentacion' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Alimentación es obligatorio.',
                'integer' => 'El campo Alimentación debe ser un número entero.',
                'min_length' => 'El campo Alimentación debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Alimentación debe tener una longitud máxima de 3.'
            ]
        ],
        'descripcion' => [
            'rules' => 'required|string|min_length[5]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Descripción es obligatorio.',
                'string' => 'El campo Descripción debe ser un texto.',
                'min_length' => 'El campo Descripción debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Descripción debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Descripción debe contener sólo caracteres alfanuméricos',
            ]
        ],
        'notas' => [
            'rules' => 'required|string|min_length[5]|max_length[3000]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Notas es obligatorio.',
                'string' => 'El campo Notas debe ser un texto.',
                'min_length' => 'El campo Notas debe tener al menos 4 caracteres.',
                'max_length' => 'El campo Notas debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Notas debe contener sólo caracteres alfanuméricos',
            ]
        ],
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

    public $pais_divisa = [
        'pais' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo País es obligatorio.',
                'integer' => 'El campo País debe ser un número entero.',
                'min_length' => 'El campo País debe tener una longitud mínima de 1.',
                'max_length' => 'El campo País debe tener una longitud máxima de 3.'
            ]
        ],
        'divisa' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Divisa es obligatorio.',
                'integer' => 'El campo Divisa debe ser un número entero.',
                'min_length' => 'El campo Divisa debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Divisa debe tener una longitud máxima de 3.'
            ]
        ]
    ];
    
    public $pais_idioma = [
        'pais' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo País es obligatorio.',
                'integer' => 'El campo País debe ser un número entero.',
                'min_length' => 'El campo País debe tener una longitud mínima de 1.',
                'max_length' => 'El campo País debe tener una longitud máxima de 3.'
            ]
        ],
        'idioma' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Idioma es obligatorio.',
                'integer' => 'El campo Idioma debe ser un número entero.',
                'min_length' => 'El campo Idioma debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Idioma debe tener una longitud máxima de 3.'
            ]
        ]
    ];
    
    public $pais_requerimiento = [
        'pais' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo País es obligatorio.',
                'integer' => 'El campo País debe ser un número entero.',
                'min_length' => 'El campo País debe tener una longitud mínima de 1.',
                'max_length' => 'El campo País debe tener una longitud máxima de 3.'
            ]
        ],
        'requerimiento' => [
            'rules' => 'required|integer|min_length[1]|max_length[3]',
            'errors' => [
                'required' => 'El campo Requerimiento es obligatorio.',
                'integer' => 'El campo Requerimiento debe ser un número entero.',
                'min_length' => 'El campo Requerimiento debe tener una longitud mínima de 1.',
                'max_length' => 'El campo Requerimiento debe tener una longitud máxima de 3.'
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

    public $requerimiento = [
        'nombre' => [
            'rules' => 'required|string|min_length[4]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
            'errors' => [
                'required' => 'El campo Requerimiento es obligatorio.',
                'string' => 'El campo Requerimiento debe ser un texto.',
                'min_length' => 'El campo Requerimiento debe tener al menos 5 caracteres.',
                'max_length' => 'El campo Requerimiento debe tener como máximo 255 caracteres.',
                'regex_match' => 'El campo Requerimiento debe contener sólo caracteres alfanuméricos',
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

    public $terminal = [
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
    
    public $transporte = [
        'nombre' => [
            'rules' => 'required|string|min_length[3]|max_length[255]|regex_match[/^[a-zA-Z0-9áéíóúñÑ ]+$/]',
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
}
