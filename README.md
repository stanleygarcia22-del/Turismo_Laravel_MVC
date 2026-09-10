Catálogo Turístico de El Salvador — Patrón MVC en Laravel

Este proyecto es una aplicación web desarrollada en Laravel que demuestra la implementación del patrón arquitectónico MVC (Modelo-Vista-Controlador), mapeando el ciclo de vida de una petición HTTP y el flujo de datos entre la capa de presentación y la lógica de negocio sin depender de un motor de base de datos relacional.

🎯 Objetivo de la Actividad
Comprender la interacción entre las capas Model, View y Controller en Laravel.

Trabajar con estructuras de datos en PHP y almacenamiento local mediante archivos .json.

Analizar el flujo completo de información desde el navegador (Request) hasta la renderización (Response).

🛠️ Tecnologías Utilizadas
- PHP 8.x
- Laravel Framework 11.x
- Bootstrap 5 (Interfaz de usuario)
- JSON (Fuente de datos estática)

🔄 Flujo y Ciclo de Vida del Patrón MVC Implementado

[ Cliente / Navegador ] 
       │ 
  1. Request HTTP (GET /lugar/1)
       ▼
  [ Router (routes/web.php) ]
       │
  2. Invoca el método TurismoController@show
       ▼
  [ Controller (TurismoController.php) ]
       │
  3. Solicita los datos al Modelo
       ▼
  [ Model (Lugar.php) ] ── (Lee storage/app/lugares.json)
       │
  4. Retorna el arreglo de datos procesado
       ▼
  [ Controller ]
       │
  5. Envía los datos a la vista 'lugares.show'
       ▼
  [ View (resources/views/lugares/show.blade.php) ]
       │
  6. Genera el HTML y responde al usuario
       ▼
[ Cliente / Navegador ]

1. Ruta (routes/web.php): Captura la solicitud HTTP enviada por el usuario (ej. /, /lugar/{id}, /contacto) y la dirige al método correspondiente dentro del controlador.

2. Modelo (App\Models\Lugar): Funciona como la capa de acceso a datos. En lugar de consultar una base de datos MySQL, utiliza la fachada File para leer y deserializar el archivo storage/app/lugares.json.

3. Controlador (App\Http\Controllers\TurismoController): Procesa la lógica de negocio, solicita la información al modelo, valida los datos enviados por formulario y selecciona la vista adecuada.

4. Vista (resources/views/): Plantillas Blade que reciben los datos desde el controlador para estructurar y presentar el HTML dinámico utilizando estilos de Bootstrap.

Instrucciones de Instalación

Sigue estos pasos para ejecutar el proyecto en tu entorno local:

1. Clonar el repositorio: 

git clone https://github.com/stanleygarcia22-del/Tu-Repositorio.git
cd Tu-Repositorio

2. Instalar dependencias de PHP: composer install

3. Configurar el archivo de entorno: cp .env.example .env
php artisan key:generate

4. Iniciar el servidor local: php artisan serve

Acceder a la aplicación:
Abre tu navegador e ingresa a [http://127.0.0.1:8000](http://127.0.0.1:8000).

Archivos de Prueba y Estructura Principal

- Fuente de Datos JSON: storage/app/lugares.json
- Modelo: app/Models/Lugar.php
- Controlador: app/Http/Controllers/TurismoController.php
- Rutas: routes/web.php
- Vistas: resources/views/lugares/ y resources/views/layouts/
