# Entregable 10: Form Request Classes en Laravel

## Resumen del Aprendizaje

Hoy se exploró cómo utilizar clases de solicitud (Form Request Classes) para validar datos en Laravel. Las clases de solicitud permiten encapsular la lógica de validación y hacer que el código sea más organizado y reusable.

### **1. Creación de una nueva clase de solicitud**

Puedes crear una nueva clase de solicitud utilizando Artisan CLI:

```bash
php artisan make:request StoreIdeaRequest
```

Esto generará un archivo `StoreIdeaRequest.php` en la carpeta `app/Http/Requests`.

### **2. Implementación de la lógica de validación**

Dentro de la clase `StoreIdeaRequest`, puedes definir las reglas de validación utilizando el método `rules()`:

```php
// app/Http/Requests/StoreIdeaRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required'
        ];
    }
}
```

### **3. Uso de la clase de solicitud en el controlador**

Puedes utilizar la clase `StoreIdeaRequest` en el método `store()` del controlador `IdeaController`:

```php
// app/Http/Controllers/IdeaController.php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::all();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIdeaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaRequest $request)
    {
        Idea::create($request->validated());

        return redirect()->route('ideas.index')->with('success', 'Idea creada con éxito');
    }

    // Otros métodos...
}
```

## Capturas

````carousel
![Captura de la solicitud de formulario](docs/img/store_idea_request.png)
<!--slide -->
![Captura del controlador](docs/img/idea_controller_request.png)

## Archivos Modificados

- `app/Http/Requests/StoreIdeaRequest.php`
- `app/Http/Controllers/IdeaController.php`

## Apuntes para Próximos Episodios

Continuar trabajando en la aplicación implementando nuevas funcionalidades como la validación de datos más compleja, la integración de bases de datos más avanzadas y posiblemente el desarrollo de vistas más detalladas.

