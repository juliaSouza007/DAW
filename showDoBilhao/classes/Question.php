<?php
class Question {
    public $enunciado;
    public $alternativas;
    public $resposta; // índice correto (int, base 0)

    public function __construct($enunciado, $alternativas, $resposta) {
        $this->enunciado = $enunciado;
        $this->alternativas = $alternativas;
        $this->resposta = (int)$resposta;
    }

    public static function loadAll($file) {
        if (!file_exists($file)) return [];
        $arr = json_decode(file_get_contents($file), true) ?: [];
        $out = [];
        foreach ($arr as $q) {
            $out[] = new Question($q['enunciado'], $q['alternativas'], $q['resposta']);
        }
        return $out;
    }

    public static function getById($file, $id) {
        $all = self::loadAll($file);
        if (!isset($all[$id])) return null;
        return $all[$id];
    }
}
?>
