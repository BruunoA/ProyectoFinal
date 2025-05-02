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
        // Crear instancias de los modelos
        $classificacioModel = new ClassificacioModel();
        
        // Obtener todas las categorías y grupos disponibles
        $categorias = $classificacioModel->distinct()->select('categoria')->findAll();  // Obtén todas las categorías únicas
        $grupos = $classificacioModel->distinct()->select('grup')->findAll();  // Obtén todos los grupos únicos
        
        // Obtener los resultados filtrados (si se seleccionan categoría y grupo)
        $categoriaId = $this->request->getVar('categoria');
        $grupoId = $this->request->getVar('grupo');
        
        if ($categoriaId && $grupoId) {
            // Filtrar por categoría y grupo
            $taula = $classificacioModel->where('categoria', $categoriaId)->where('grup', $grupoId)->findAll();
        } else {
            // Obtener todos los resultados si no hay filtros
            $taula = $classificacioModel->findAll();
        }
    
        // Datos a pasar a la vista
        $data = [
            'títol' => 'Classificació',
            'taula' => $taula,
            'categorias' => $categorias,
            'grupos' => $grupos,
        ];
    
        return view('classificacio', $data);
    }
    
    public function filtrar()
    {
        // Obtener los filtros de categoría y grupo desde la solicitud
        $categoriaId = $this->request->getVar('categoria');
        $grupoId = $this->request->getVar('grupo');
        
        // Filtrar los datos según los valores seleccionados
        $classificacioModel = new ClassificacioModel();
        
        if ($categoriaId && $grupoId) {
            $taula = $classificacioModel->where('categoria', $categoriaId)->where('grup', $grupoId)->findAll();
        } else {
            $taula = $classificacioModel->findAll();  // Si no hay filtros, mostrar todos los resultados
        }
        
        // Recargar la vista con los resultados filtrados
        $data = [
            'títol' => 'Classificació',
            'taula' => $taula,
            'categorias' => $classificacioModel->distinct()->select('categoria')->findAll(),
            'grupos' => $classificacioModel->distinct()->select('grup')->findAll(),
        ];
        
        return view('classificacio', $data);
    }

    private function getCategoryAndGroup($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));

        $categoria = isset($segments[3]) ? ucfirst(str_replace('-', ' ', $segments[3])) : 'Desconocido';
        $grupo = isset($segments[4]) ? ucfirst(str_replace('-', ' ', $segments[4])) : 'Desconocido'; 

        return [$categoria, $grupo];
    }

    private function filterCellsByClass($cells, $classToAvoid)
    {
        $filteredCells = [];

        foreach ($cells as $cell) {
            $classAttribute = $cell->getAttribute('class');
            if (strpos($classAttribute, $classToAvoid) === false) {
                $filteredCells[] = $cell;
            }
        }

        return $filteredCells;
    }

    public function obtenirDades()
    {
        $urls = [
            'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5',
            'https://www.fcf.cat/classificacio/2425/futbol-11/juvenil-segona-divisio/grup-46',
            'https://www.fcf.cat/classificacio/2425/futbol-11/juvenil-segona-divisio/grup-22',
            'https://www.fcf.cat/classificacio/2425/futbol-11/tercera-catalana/grup-14',
            'https://www.fcf.cat/classificacio/2425/futbol-11/primera-federacio/grup-1',
        ];

        foreach ($urls as $url) {
            list($categoria, $grupo) = $this->getCategoryAndGroup($url);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $html = curl_exec($ch);
            curl_close($ch);

            $dom = new DOMDocument();
            @$dom->loadHTML($html);

            $xpath = new DOMXPath($dom);
            $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

            if ($table) {
                $clasificacionModel = new ClassificacioModel();
                echo "<table border='1'>";
                echo "<tr><th>Posición</th><th>Equipo</th><th>Puntos</th><th>PJ</th><th>PG</th><th>PE</th><th>PP</th><th>GF</th><th>GC</th><th>resultado</th><th>categoria</th><th>grupo</th></tr>";

                foreach ($table->getElementsByTagName('tr') as $index => $row) {
                    if ($index === 0 || $index === 1) {
                        continue;
                    }

                    $cells = $row->getElementsByTagName('td');
                    $cells = $this->filterCellsByClass($cells, 'detallada');

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
                        echo "<td>$categoria</td>";
                        echo "<td>$grupo</td>";
                        echo "</tr>";

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
                            'categoria' => $categoria,
                            'grup' => $grupo,
                        ]);
                    }
                }
                echo "</table>";
            } else {
                echo "No se encontró la tabla de clasificación para la URL: $url";
            }
        }
    }
}
