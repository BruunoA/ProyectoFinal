<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassificacioModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClassificacioController extends BaseController
{
    public function index()
    {
        $data = [
            'títol' => 'Classificació',
            'resultats' => [
                ['equip_v' => 'Alpicat', 'equip_l' => 'Lleida', 'gols_v' => 3, 'gols_l' => 1],
                ['equip_v' => 'Balaguer', 'equip_l' => 'Alpicat', 'gols_v' => 2, 'gols_l' => 2],
            ],
            'taula' => [
                ['posicio' => 1, 'equip' => 'Alpicat', 'punts' => 30, 'pj' => 7, 'pg' => 6, 'pe' => 1, 'pp' => 0, 'gf' => 18, 'gc' => 3, 'dg' => 15],
                ['posicio' => 2, 'equip' => 'Lleida', 'punts' => 28, 'pj' => 7, 'pg' => 5, 'pe' => 2, 'pp' => 0, 'gf' => 14, 'gc' => 5, 'dg' => 9],
                ['posicio' => 3, 'equip' => 'Balaguer', 'punts' => 20, 'pj' => 7, 'pg' => 3, 'pe' => 1, 'pp' => 3, 'gf' => 10, 'gc' => 10, 'dg' => 0],
            ],
        ];        

        return view('classificacio', $data);
    }

    public function obtenirDades()
    {
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
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        // Buscamos la tabla por la clase "fcftable-e"
        $xpath = new \DOMXPath($dom);
        $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

        // Si encontramos la tabla, procesamos sus filas
        if ($table) {
            $clasificacionModel = new ClassificacioModel();

            // Iteramos sobre las filas de la tabla (saltamos la cabecera)
            foreach ($table->getElementsByTagName('tr') as $index => $row) {
                if ($index === 0 || $index === 1) {
                    // Saltamos la primera fila (cabecera)
                    continue;
                }

                $cells = $row->getElementsByTagName('td');
                $cells = filterCellsByClass($cells, 'detallada');

                if (count($cells) > 0) {
                    // Posición
                    $position = trim($cells[0]->nodeValue);

                    // Logo (si existe una imagen en la celda)
                    $logoCell = $cells[1];
                    $logoImg = $logoCell->getElementsByTagName('img')->item(0);
                    $logo = $logoImg ? $logoImg->getAttribute('src') : 'No Logo';

                    // Nombre del equipo
                    $teamName = trim($cells[2]->nodeValue);

                    // Puntos
                    $points = trim($cells[3]->nodeValue);

                    // Partits jugats (PJ)
                    $gamesPlayed = trim($cells[5]->nodeValue);

                    // Patits guanyats (PG)
                    $gamesFor = trim($cells[6]->nodeValue);

                    // Partits empatats (PE)
                    $gamesDrawn = trim($cells[7]->nodeValue);

                    // Partits perduts (PP)
                    $gamesLost = trim($cells[8]->nodeValue);

                    // Gols a favor (GF)
                    $goalsFor = trim($cells[9]->nodeValue);

                    // Gols contra (GC)
                    $goalsAgainst = trim($cells[10]->nodeValue);

                    // Resultados de los partidos
                    $resultadosConLogos = [];
                    $links = $cells[12]->getElementsByTagName('a');
                    foreach ($links as $link) {
                        // Obtener el <span> dentro del <a> y extraer el texto del resultado
                        $span = $link->getElementsByTagName('span')->item(0);
                        $resultado = ($span) ? trim($span->nodeValue) : "N/A";
                        // Obtener todas las imágenes dentro del <a>
                        $imgs = $link->getElementsByTagName('img');
                        // Si hay al menos 2 imágenes, guardarlas
                        if ($imgs->length >= 2) {
                            $logo1 = "<img src='" . $imgs->item(0)->getAttribute('src') . "' width='30' height='30' style='vertical-align:middle; margin-right:5px;'>";
                            $logo2 = "<img src='" . $imgs->item(1)->getAttribute('src') . "' width='30' height='30' style='vertical-align:middle; margin-right:5px;'>";
                        } else {
                            // Si no hay suficientes imágenes, mostrar "No Logo"
                            $logo1 = "No Logo";
                            $logo2 = "No Logo";
                        }
                        // Guardar en array con formato: [logo1] resultado [logo2]
                        $resultadosConLogos[] = $logo1 . " " . $resultado . " " . $logo2;
                    }
                    $resultados = implode("<br>", $resultadosConLogos);

                    // Insertar en la base de datos
                    $clasificacionModel->insert([
                        'posicio' => $position,
                        'logo' => $logo,
                        'nom' => $teamName,
                        'punts' => $points,
                        'pj' => $gamesPlayed,
                        'pg' => $gamesFor,
                        'pe' => $gamesDrawn,
                        'pp' => $gamesLost,
                        'gf' => $goalsFor,
                        'gc' => $goalsAgainst,
                        'resultados' => $resultados,
                    ]);
                }
            }
        } else {
            echo "No se encontró la tabla de clasificación.";
        }
    }
}