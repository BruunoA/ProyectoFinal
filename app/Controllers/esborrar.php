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
        $url = 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5';
    
        function filterCellsByClass($cells, $classToAvoid) {
            $filteredCells = [];
            foreach ($cells as $cell) {
                $classAttribute = $cell->getAttribute('class');
                if (strpos($classAttribute, $classToAvoid) === false) {
                    $filteredCells[] = $cell;
                }
            }
            return $filteredCells;
        }
    
        // Inicializamos cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        curl_close($ch);
    
        // Cargar el HTML en DOMDocument
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);
    
        if ($table) {
            $classificacioModel = new ClassificacioModel();
    
            foreach ($table->getElementsByTagName('tr') as $index => $row) {
                if ($index === 0 || $index === 1) continue; // Saltar cabecera
    
                $cells = $row->getElementsByTagName('td');
                $cells = filterCellsByClass($cells, 'detallada');
    
                if (count($cells) > 0) {
                    $position = trim($cells[0]->nodeValue);
                    $teamName = trim($cells[2]->nodeValue);
                    $points = trim($cells[3]->nodeValue);
                    $gamesPlayed = trim($cells[6]->nodeValue);
                    $gamesFor = trim($cells[7]->nodeValue);
                    $gamesDrawn = trim($cells[8]->nodeValue);
                    $gamesLost = trim($cells[9]->nodeValue);
                    $goalsFor = trim($cells[10]->nodeValue);
                    $goalsAgainst = trim($cells[11]->nodeValue);
    
                    // Obtener resultados
                    $resultados = [];
                    $links = $cells[12]->getElementsByTagName('a');
                    foreach ($links as $link) {
                        $span = $link->getElementsByTagName('span')->item(0);
                        $resultado = ($span) ? trim($span->nodeValue) : "N/A";
                        $resultados[] = $resultado;
                    }
    
                    // Guardar datos en la base de datos
                    $classificacioModel->insert([
                        'posicio' => $position,
                        'nom' => $teamName,
                        'punts' => $points,
                        'pj' => $gamesPlayed,
                        'pg' => $gamesFor,
                        'pe' => $gamesDrawn,
                        'pp' => $gamesLost,
                        'gf' => $goalsFor,
                        'gc' => $goalsAgainst,
                        'resultats' => json_encode($resultados), // Guardar en formato JSON
                    ]);
                }
            }
    
            echo "Datos guardados correctamente.";
        } else {
            echo "No se encontró la tabla de clasificación.";
        }
    }
    
}
