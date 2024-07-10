<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::factory(1)->create([
            'name' => 'Calculadora de fertilización',
            'url_photo' => 'storage/icons/Calculadora-Color.svg',
            'description' => 'Este aplicativo te permite digitar el resultado de un análisis de suelos y obtener el contenido de los nutrientes presentes en el suelo al momento de tomar la muestra.',
            'route' => 'frontend.user.calculator'
        ]);
        Module::factory(1)->create([
            'name' => 'Formato GAP',
            'url_photo' => 'storage/icons/GAP-color.svg',
            'description' => 'Al descargar esta plantilla te permitirá realizar la autoevaluación de un predio productor de fruta(s) de exportación, teniendo como referente los requerimientos de global GAP en su versión 5.2 y obteniendo un informe con el estado actual del predio resumido en una gráfica.',
            'route' => 'frontend.format.download'
        ]);
        Module::factory(1)->create([
            'name' => 'Estaciones meteorológicas',
            'url_photo' => 'storage/icons/Climatica-Color.svg',
            'description' => 'La producción de los cultivos a cielo abierto está enlazada con las condiciones ambientales a las que están expuestos, por esto es importante medirlas, guardarlas y analizarlas. Al ingresar a esta opción encontrarás datos climáticos de estaciones instaladas en los municipios del oriente antiqueño en cultivos de aguacate.',
            'route' => 'frontend.user.station'
        ]);
        Module::factory(1)->create([
            'name' => 'Canal',
            'url_photo' => 'storage/icons/canal.svg',
            'description' => 'Acompáñanos a realizar un recorrido por el proceso de implementación de la norma Global G.A.P, en donde podrás aprender de los requerimientos, procesos e infraestructura necesaria sobre esta norma altamente demandada.',
            'url' => 'https://www.youtube.com/channel/UCrHtg4UEofVeQV5loAVx8cg'
        ]);
        Module::factory(1)->create([
            'name' => 'Plantilla de costos',
            'url_photo' => 'storage/icons/costos.svg',
            'description' => 'Te invitamos a realizar un ejercicio de costos en el cultivo de aguacate, que te permitirá tener un contexto financiero para la toma de decisiones económicas.',
            'route' => 'frontend.format.download'
        ]);
        Module::factory(1)->create([
            'name' => 'Documentos',
            'url_photo' => 'storage/icons/cartilla.svg',
            'description' => 'Disfruta de tú recorrido leyendo un poco de lo generado por nuestros instructores.',
            'route' => 'frontend.user.document'
        ]);
    }
}
