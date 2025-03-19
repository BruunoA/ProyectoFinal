<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassificacioModel;
use CodeIgniter\HTTP\ResponseInterface;

use DOMDocument;
use DOMXPath;

class ClassificacioController extends BaseController
{
    public function index()
    {     
        
        $classificacioModel = new ClassificacioModel();
        $taula = $classificacioModel->findAll(); 

        $data = [
            'títol' => 'Classificació',
            'taula' => $taula,
            'resultats' => [
                ['equip_v' => 'Alpicat', 'equip_l' => 'Lleida', 'gols_v' => 3, 'gols_l' => 1],
                ['equip_v' => 'Balaguer', 'equip_l' => 'Alpicat', 'gols_v' => 2, 'gols_l' => 2],
            ],
        ];

        return view('classificacio', $data);
    }

    public function obtenirDades()
    {
// URL de la página
$url = 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5';


function filterCellsByClass($cells, $classToAvoid) {
    $filteredCells = [];

    foreach ($cells as $cell) {
        $classAttribute = $cell->getAttribute('class');
       
        // Si no contiene 'classToAvoid', lo agregamos al resultado
        if (strpos($classAttribute, $classToAvoid) === false) {
            $filteredCells[] = $cell;
        }
    }

    return $filteredCells;
}


// Inicializamos cURL
$ch = curl_init();

// Establecemos la URL y algunas opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Deshabilitar la verificación SSL (si es necesario)

// Ejecutamos la petición
$html = curl_exec($ch);

// Cerramos cURL
curl_close($ch);

// Cargar el HTML en DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);

// Buscamos la tabla por la clase "fcftable-e"
$xpath = new DOMXPath($dom);
$table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

// Si encontramos la tabla, procesamos sus filas
if ($table) {
    $clasificacionModel = new ClassificacioModel();
    echo "<table border='1'>";
    echo "<tr><th>Posición</th><th>Equipo</th><th>Puntos</th><th>PJ</th><th>PG</th><th>PE</th><th>PP</th><th>GF</th><th>GC</th><th>resultado</th></tr>";

    // Iteramos sobre las filas de la tabla (saltamos la cabecera)
    foreach ($table->getElementsByTagName('tr') as $index => $row) {
        if ($index === 0 || $index===1) {
            // Saltamos la primera fila (cabecera)
            continue;
        }

        $cells = $row->getElementsByTagName('td');

        $cells = filterCellsByClass($cells, 'detallada');

        if (count($cells) > 0) {
            echo "<tr>";
           
            $position = $cells[0]->nodeValue;
            echo "<td>" . trim($position) . "</td>";

            $teamName = $cells[2]->nodeValue;
            echo "<td>" . trim($teamName) . "</td>";
           
            $points = $cells[3]->nodeValue;
            echo "<td>" . trim($points) . "</td>";
           
            $gamesPlayed = $cells[6]->nodeValue;
            echo "<td>" . trim($gamesPlayed) . "</td>";
           
            $gamesFor = $cells[7]->nodeValue;
            echo "<td>" . trim($gamesFor) . "</td>";
           
            $gamesDrawn = $cells[8]->nodeValue;
            echo "<td>" . trim($gamesDrawn) . "</td>";

             $gamesLost = $cells[9]->nodeValue;
             echo "<td>" . trim($gamesLost) . "</td>";
           
            $goalsFor = $cells[10]->nodeValue;
            echo "<td>" . trim($goalsFor) . "</td>";
        
            $goalsAgainst = $cells[11]->nodeValue;
            echo "<td>" . trim($goalsAgainst) . "</td>";

                $resultadosConLogos = [];
                $links = $cells[12]->getElementsByTagName('a');
            
                $resultados = [];
            $links = $cells[12]->getElementsByTagName('a');
            
            foreach ($links as $link) {
                $span = $link->getElementsByTagName('span')->item(0);
                $resultado = ($span) ? trim($span->nodeValue) : "N/A";
                
                $resultados[] = $resultado;
            }
            
            echo "<td>";
            foreach ($resultados as $resultado) {
                echo $resultado . "<br>";
            }
            echo "</td>";

            echo "</tr>";
        }
        $clasificacionModel->insert([
            'posicio' => $position,
            'nom' => $teamName,
            'punts' => $points,
            'pj' => $gamesPlayed,
            'pg' => $gamesFor,
            'pe' => $gamesDrawn,
            'pp' => $gamesLost,
            'gf' => $goalsFor,
            'gc' => $goalsAgainst,
            'resultats' => json_encode($resultados),
        ]);
    }
    echo "</table>";
} else {
    echo "No se encontró la tabla de clasificación.";
}
    }
}
